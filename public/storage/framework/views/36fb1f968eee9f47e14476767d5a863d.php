
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/themes.css')); ?>"> <!-- Home page styles -->
 
<div class="container">

       <div class="info">
           <img src="<?php echo e(asset('images/information.png')); ?>" alt="" width="32px"> <span>This list contains the
             themes you are subscribed to. If you want to add other themes, click the 'Plus' button below.  <br> </span>
        </div>
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <h2></h2>
    <?php if($selectedThemes->isEmpty()): ?>
        <p>You have not selected any themes yet.</p>
    <?php else: ?>
        <ul>
            <?php $__currentLoopData = $selectedThemes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                        <div class="bar">
                            <!-- Display theme image if available -->
                            <?php if($theme->image): ?>
                                <img class=".bar img" src="<?php echo e(asset('storage/' . $theme->image)); ?>" alt="<?php echo e($theme->name); ?>">
                            <?php endif; ?>

                            <!-- Theme description -->
                            <div id="desc">
                                <label for="">General concept:</label>
                                <span><?php echo e($theme->name); ?></span>
                                <hr>
                                <label for="">About:</label>
                                <span><?php echo e($theme->description); ?></span>
                                <label for="">Number of articles::</label>
                                <span>10</span>
                                <label for="">Followers:</label>
                                <span>10</span>
                            </div>

                            <!-- Icons for actions -->
                            <div class="icon-container">
                                <!-- Button to view articles -->
                                <a href="<?php echo e(route('themes.show', $theme->id)); ?>" class="icon-btn" title="Voir les articles">
                                    <img src="<?php echo e(asset('images/application.png')); ?>" alt="Voir les articles">
                                    <span class="hover-text">Voir les articles</span>
                                </a>

                                <!-- Button to create an article -->
                                <a href="<?php echo e(route('articles.create', $theme->id)); ?>" class="icon-btn" title="Créer un article">
                                    <img src="<?php echo e(asset('images/copywriting.png')); ?>" alt="Créer un article">
                                    <span class="hover-text">Créer un article</span>
                                </a>
                            </div>
                        </div>
                    </li>
                    <br>
              
                    <br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <div class="goback">

    <?php endif; ?>
    <a href="<?php echo e(route('select-themes')); ?>">
        <input type="image" src="<?php echo e(asset('../images/subsc.png')); ?>" width="48px" alt="Go Back">
    </a>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.subscriberViews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Elitebook\Desktop\TechRorizons\resources\views/subAllThemes.blade.php ENDPATH**/ ?>