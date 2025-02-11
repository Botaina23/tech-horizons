

<?php $__env->startSection('title'); ?>
    Articles from Subscribed Themes
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/ArticlesInTheme.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/themes.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/ArticlesInTheme.css')); ?>"> <!-- Home page styles -->

<div class="container">
    <h1>Explore articles from Your Subscribed Themes</h1>



    <ul class="article-list">
        <?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $theme->articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="article-item">
                    <div class="article-content">
                        <h2 class="article-title"><?php echo e($article->title); ?></h2>
                        <?php if($article->image): ?>
                            <img src="<?php echo e(asset('storage/' . $article->image)); ?>" alt="<?php echo e($article->title); ?>" class="article-image">
                        <?php endif; ?>
                        <!-- Short preview of the description -->
                        <p class="article-preview">
                            <?php echo e(Str::limit($article->content, 100)); ?> <!-- Show only 100 characters -->
                        </p>
                        <!-- Button to read the full article -->
                        <a href="<?php echo e(route('articles.show', $article->id)); ?>" class="article-button">Lire l'article</a>
                        <!-- Bouton Éditer l'article -->

                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <div class="info">
        <img src="<?php echo e(asset('images/information.png')); ?>" alt="" width="32px"> 
        <span>This list contains the articles from the themes you are subscribed to. If you want to add other themes, click the 'Plus' button below.</span>
    </div>
    <?php if(session('success')): ?>
        <div class="alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.SubscriberViews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Elitebook\Desktop\TechRorizons\resources\views/subDashboard.blade.php ENDPATH**/ ?>