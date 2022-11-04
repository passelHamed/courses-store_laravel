
    <?php $__env->startSection('style'); ?>
        <style>
            .card .card-body .card-title{
                height: 40px;
                overflow: hidden;
            }
            .color{
                background-color: #5fcf80;
            }
        </style>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('content'); ?>

        <section id="hero" class="d-flex justify-content-center align-items-center bg-white">
            <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
                <h1>Learning Today,<br>Leading Tomorrow</h1>
                <h2></h2>
                <a href="#popular-courses" class="btn-get-started">Get Started</a>
            </div>
        </section>

        <section id="popular-courses" class="courses bg-white">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <div class="row bg-white">
                        <form action="/search/#popular-courses" method="get">
                        <?php echo csrf_field(); ?>
                            <div class="row d-flex justify-content-center">
                                <input type="text" name="search" id="search" class="col-3 mx-sm-3 mb-2" placeholder="search for Course . . .">
                                <button type="submit" class="col-1 btn btn-secondary color mb-2">Search</button>
                            </div>
                        </form>
                    </div>
                    <h2>Courses</h2>
                    <p><?php echo e($title); ?></p>
                </div>
                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    <?php if($Courses->count()): ?>   
                        <?php $__currentLoopData = $Courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                                <div class="course-item">
                                    <a href="/courses/<?php echo e($course->id); ?>">
                                        <img src="<?php echo e(asset('storage/'. $course->cover_image)); ?>" class="card-img img-fluid" width="96" height="350" alt="">
                                    </a>
                                    <div class="course-content">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h3><a href="/courses/<?php echo e($course->id); ?>"><?php echo e($course->title); ?></a></h3>
                                        </div>
                                        <div class=" d-flex justify-content-between align-items-center">
                                            <div class="trainer-profile d-flex align-items-center">
                                                <div>
                                                    <span class="score">
                                                        <div class="score-wrap">
                                                            <span class="stars-active" style="width:<?php echo e($course->rate()*20); ?>%;">
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </span>
                                                            <span class="stars-inactive">
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </span>
                                                        </div>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="trainer-rank d-flex align-items-center">
                                                <p class="price">$<?php echo e($course->price); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="col-12 alert alert-info mt-4 mx-auto text-center">
                            not result
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <footer id="footer">
            <div class="container d-md-flex py-4">
                <div class="me-auto text-center text-md-start">
                    <div class="copyright">
                        &copy; Copyright <strong><span>MentorCourse</span></strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        This is the best <span class="text-success">course site</span>
                    </div>
                </div>
                <div class="social-links text-center text-md-right pt-3 pt-md-0">
                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>
            </div>
        </footer>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\server\1-web devlopment\2-back_end\2-laravel\coursesStore\resources\views/project/gallery.blade.php ENDPATH**/ ?>