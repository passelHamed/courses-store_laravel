<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\shopping;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class PurchaseController extends Controller
{

    //  PAYPAL PAYMENT---------------

    private $provider;


    function __construct()
    {
        $this->provider = new PayPalClient();
        $this->provider->setApiCredentials(Config('paypal'));
        $token = $this->provider->getAccessToken();
        $this->provider->setAccessToken($token);
    }



    public function createPayment(Request $request)
    {
        $data = json_decode($request->getContent() , true);
        $courses = User::find($data['userId'])->coursesInCart;
        $total = 0;

        foreach ($courses as $course) {
            $total += $course->price;
        }

        $order = $this->provider->createOrder([
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => "USD",
                        'value' => $total,
                    ],
                    'description' => 'Order Description'
                ]
            ]
        ]);

        return response()->json($order);
    }



    public function executePayment(Request $request)
    {
        $data = json_decode($request->getContent() , true);
        $result = $this->provider->capturePaymentOrder($data['orderId']);

        if ($result['status' === 'COMPLETED']) {
            $user = User::find($data['userId']);
            $courses = $user->coursesInCart;
            $this->sendOrderConfirmationMail($courses , auth()->user());

            foreach ($courses as $course) {
                $coursePrice = $course->price;
                $purchaseTime = Carbon::now();
                $user->coursesInCart()->updateExistingPivot($course->id, ['bought' => TRUE , 'price' => $coursePrice , 'created_at' => $purchaseTime]);
                $course->save();
            }
        }
        return response()->json($result);
    }



    // CASHIER CART PAYMENT -------------


    public function creditCheckout(Request $request)
    {
        $intent = auth()->user()->createSetupIntent();
        $userId = auth()->user()->id;
        $courses = User::find($userId)->coursesInCart;
        $total = 0;
        foreach ($courses as $course) {
            $total += $course->price; 
        }
        return view('credit.checkout' , compact('total' , 'intent'));
    }


    public function purchase(Request $request)
    {
        $user = $request->user();
        $paymentMethod = $request->input('payment_method');

        $userId = auth()->user()->id;
        $courses = User::find($userId)->coursesInCart;
        $total = 0;
        foreach ($courses as $course) {
            $total += $course->price; 
        }

        try {
            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($paymentMethod);
            $user->charge($total * 100 , $paymentMethod);
        } catch (\Exception $exception) {
            return back()->with('warning','An error occurred while purchasing the product, please check the card information' , $exception->getMessage());
        }

        $this->sendOrderConfirmationMail($courses , auth()->user());

        foreach ($courses as $course) {
            $coursesPrice = $course->price;
            $purchaseTime = Carbon::now();
            $user->coursesInCart()->updateExistingPivot($course->id, ['bought' => TRUE , 'price' => $coursesPrice , 'created_at' => $purchaseTime]);
            $course->save();
        }
        return redirect('/cart')->with('message','Product purchased successfully');
    }


    // mail 

    public function sendOrderConfirmationMail($orders , $user)
    {
        Mail::to($user->email)->send(new OrderMail($orders , $user));
    }

    public function MyProduct()
    {
        $userId = auth()->user()->id;
        $myCourses = User::find($userId)->PurchedProduct;
        return view('project.myPurchases' , compact('myCourses'));
    }

    public function adminProduct()
    {
        $allCourses = shopping::with(['user' , 'Course'])->where('bought' , true)->get();
        return view('admin.indexPurchases' , compact('allCourses'));
    }

}
