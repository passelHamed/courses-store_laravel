<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('build/assets/app.9fa9f508.css')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&family=Norican&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="<?php echo e(asset('theme/theme/assets/img/favicon.png')); ?>" rel="icon">
    <link href="<?php echo e(asset('theme/theme/assets/img/apple-touch-icon.png')); ?>" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="<?php echo e(asset('theme/theme/assets/vendor/animate.css/animate.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('theme/theme/assets/vendor/aos/aos.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('theme/theme/assets/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('theme/theme/assets/vendor/bootstrap-icons/bootstrap-icons.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('theme/theme/assets/vendor/boxicons/css/boxicons.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('theme/theme/assets/vendor/remixicon/remixicon.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('theme/theme/assets/vendor/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('theme/theme/assets/css/style.css')); ?>" rel="stylesheet">
    <title>Course Store</title>

    <style>
        body{
            font-family: 'Cairo', sans-serif;
            background-color: #ffffff ; 
        }
        .score{
            display: block;
            font-size: 16px;
            position:relative;
            overflow: hidden;
        }
        .score-wrap{
            display: inline-block;
            position: relative;
            height: 19px
        }
        .score .stars-active{
            color: #FFCA00;
            position: relative;
            z-index: 10;
            display: block;
            overflow: hidden;
            white-space: nowrap;
        }
        .score .stars-inactive{
            color: lightgray;
            position: absolute;
            top: 0;
            left: 0;
        }
        .rating{
            overflow: hidden;
            display: inline-block;
            position: relative;
            font-size: 20px;
        }
        .rating-star{
            padding: 0 5px;
            margin: 0;
            cursor:pointer;
            display: block;
            float: right;
        }
        .rating-star:after{
            position: relative;
            font-family: "Font Awesome 5 Free";
            content:'\F005';
            color: lightgray;
        }
        .rating-star.checked ~ .rating-star:after,.rating-star.checked:after{
            content: '\f005';
            color: #FFCA00;
        }
        .rating:hover .rating-star:after{
            content:'\f005';
            color: lightgray;
        }
        .rating-star:hover ~ .rating-star:after,
        .rating .rating-star:hover:after{
            content: '\f005';
            color: #FFCA00;
        }
        .bg-cart{
            background-color: rgba(144, 10, 10, 0.776);
            color: #fff;
        }
        .bg-view{
            background-color: #5fcf80;
            color: #fff;
            text-decoration-line: none;
            
        }

        /* #footer{
            background-color: red;
        } */
    </style>
    <?php echo $__env->yieldContent('style'); ?>
</head>
<body>
    <div>
        <nav class="shadow navbar navbar-expand-lg navbar-light bg-white fixed-top">
            <div class="container">
                <a class="navbar-brand" href="/">Courses Store</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/explainers">
                                Explainers
                                <i class="fas fa-list"></i>
                            </a>
                        </li>

                        <?php if(auth()->guard()->check()): ?>                            
                            <li class="nav-item">
                                <a class="nav-link" href="/purchases">
                                    my Courses
                                    <i class="fas fa-basket-shopping"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if(auth()->guard()->check()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/cart">
                                    <?php if(Auth::user()->coursesInCart()->count() > 0): ?>
                                        <span class="badge bg-secondary"><?php echo e(Auth::user()->coursesInCart()->count()); ?></span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">0</span>
                                    <?php endif; ?>
                                        the cart
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>

                    <ul class="navbar-nav mr-auto">
                        <?php if(auth()->guard()->guest()): ?>
                            <a class="nav-link btn" href="<?php echo e(route('login')); ?>"><?php echo e(__('sign in')); ?></a>
                            <?php if(Route::has('register')): ?>
                                <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Create an account')); ?></a>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-link dropdown justify-content-left">
                                <a id="navbarDrodown" class="nav-link" href="#" data-bs-toggle="dropdown">
                                    <div class="shrink-0 mr-3">
                                        <?php if(Auth::user()->profile_photo_path): ?>
                                            <img class="h-8 w-8 rounded-full object-cover" src="/storage/<?php echo e(Auth::user()->profile_photo_path); ?>" alt="<?php echo e(Auth::user()->name); ?>">
                                        <?php else: ?>
                                            <img class="h-8 w-8 rounded-full object-cover" src="<?php echo e(Auth::user()->profile_photo_url); ?>" alt="<?php echo e(Auth::user()->name); ?>">
                                        <?php endif; ?>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end px-2 text-right mt-2 bg-white overflow-hidden shadow-xl sm:rounded-lg">

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update-books')): ?>
                                        <a href="/admin" class="dropdown-item">Admin Panel</a>
                                    <?php endif; ?>

                                    <div class="pt-4 pb-1 border-t border-gray-200">
                                        <div class="flex items-center px-4">
                                            <div>
                                                <div class="font-medium text-base text-gray-800"><?php echo e(Auth::user()->name); ?></div>
                                            </div>
                                        </div>
                            
                                        <div class="mt-3 space-y-1">
                                            <!-- Account Management -->
                                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'jetstream::components.responsive-nav-link','data' => ['href' => ''.e(route('profile.show')).'','active' => request()->routeIs('profile.show')]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('jet-responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('profile.show')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('profile.show'))]); ?>
                                                <?php echo e(__('Profile')); ?>

                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            
                                            <?php if(Laravel\Jetstream\Jetstream::hasApiFeatures()): ?>
                                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'jetstream::components.responsive-nav-link','data' => ['href' => ''.e(route('api-tokens.index')).'','active' => request()->routeIs('api-tokens.index')]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('jet-responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('api-tokens.index')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('api-tokens.index'))]); ?>
                                                    <?php echo e(__('API Tokens')); ?>

                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                            <?php endif; ?>
                            
                                            <!-- Authentication -->
                                            <form method="POST" action="<?php echo e(route('logout')); ?>" x-data>
                                                <?php echo csrf_field(); ?>
                            
                                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'jetstream::components.responsive-nav-link','data' => ['href' => ''.e(route('logout')).'','onclick' => 'event.preventDefault();
                                                            this.closest(\'form\').submit();']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('jet-responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('logout')).'','onclick' => 'event.preventDefault();
                                                            this.closest(\'form\').submit();']); ?>
                                                    <?php echo e(__('Log Out')); ?>

                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                            </form>
                            
                                            <!-- Team Management -->
                                            <?php if(Laravel\Jetstream\Jetstream::hasTeamFeatures()): ?>
                                                <div class="border-t border-gray-200"></div>
                            
                                                <div class="block px-4 py-2 text-xs text-gray-400">
                                                    <?php echo e(__('Manage Team')); ?>

                                                </div>
                            
                                                <!-- Team Settings -->
                                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'jetstream::components.responsive-nav-link','data' => ['href' => ''.e(route('teams.show', Auth::user()->currentTeam->id)).'','active' => request()->routeIs('teams.show')]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('jet-responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('teams.show', Auth::user()->currentTeam->id)).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('teams.show'))]); ?>
                                                    <?php echo e(__('Team Settings')); ?>

                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', Laravel\Jetstream\Jetstream::newTeamModel())): ?>
                                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'jetstream::components.responsive-nav-link','data' => ['href' => ''.e(route('teams.create')).'','active' => request()->routeIs('teams.create')]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('jet-responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('teams.create')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('teams.create'))]); ?>
                                                        <?php echo e(__('Create New Team')); ?>

                                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                <?php endif; ?>
                            
                                                <div class="border-t border-gray-200"></div>
                            
                                                <!-- Team Switcher -->
                                                <div class="block px-4 py-2 text-xs text-gray-400">
                                                    <?php echo e(__('Switch Teams')); ?>

                                                </div>
                            
                                                <?php $__currentLoopData = Auth::user()->allTeams(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'jetstream::components.switchable-team','data' => ['team' => $team,'component' => 'jet-responsive-nav-link']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('jet-switchable-team'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['team' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($team),'component' => 'jet-responsive-nav-link']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <script src="https://kit.fontawesome.com/ca7b00f543.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo e(asset('theme/theme/assets/vendor/purecounter/purecounter_vanilla.js')); ?>"></script>
    <script src="<?php echo e(asset('theme/theme/assets/vendor/aos/aos.js')); ?>"></script>
    
    <script src="<?php echo e(asset('theme/theme/assets/vendor/swiper/swiper-bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('theme/theme/assets/vendor/php-email-form/validate.js')); ?>"></script>
    <script src="<?php echo e(asset('theme/theme/assets/js/main.js')); ?>"></script>
    <?php echo $__env->yieldContent('script'); ?>
</body>
</html><?php /**PATH C:\laragon\www\server\1-web devlopment\2-back_end\2-laravel\coursesStore\resources\views/layouts/main.blade.php ENDPATH**/ ?>