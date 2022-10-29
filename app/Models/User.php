<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Billable;
use App\Models\Book;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function isAdmin()
    {
        return $this->administration_level > 0 ? True : False ; 
    }

    public function isSuperAdmin()
    {
        return $this->administration_level > 1 ? true : false ;
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function rated(Course $course)
    {
        return $this->ratings->where('course_id',$course->id)->isNotEmpty();
    }

    public function courseRating(Course $course)
    {
        return $this->rated($course) ? $this->ratings->where('course_id' , $course->id)->first() : Null;
    }

    public function coursesInCart()
    {
        return $this->belongsToMany(Course::class)->withPivot(['price' , 'bought'])->wherePivot('bought',FALSE);
    }

    public function ratedpurches()
    {
        return $this->belongsToMany(Course::class)->withPivot(['bought'])->wherePivot('bought' , true);
    }

    public function coursesPurches()
    {
        return $this->belongsToMany(Course::class)->withPivot(['bought'])->wherePivot('bought' , true);
    }

    public function PurchedProduct()
    {
        return $this->belongsToMany(Course::class)->withPivot(['bought' , 'price' , 'created_at'])->orderBy('pivot_created_at' , 'desc')->wherePivot('bought' , true);
    }

}
