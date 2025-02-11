<?php $__env->startSection('title'); ?>
    <!-- Add your title here if needed -->
<?php $__env->stopSection(); ?>


<link rel="stylesheet" href="<?php echo e(asset('css/ArticlesInTheme.css')); ?>"> <!-- Home page styles -->


<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Articles du thème : <?php echo e($theme->name); ?></h1>


    <ul class="article-list">
        <?php $__currentLoopData = $theme->articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="article-item">
                <div class="article-content">
                    <h2 class="article-title"><?php echo e($article->title); ?></h2>
                    <?php if($article->image): ?>
                        <img src="<?php echo e(asset('storage/' . $article->image)); ?>" alt="<?php echo e($article->title); ?>" class="article-image">
                    <?php endif; ?>
                    <p class="article-description"><?php echo e($article->content); ?></p>
                    <a href="<?php echo e(route('articles.show', $article->id)); ?>" class="article-button">Lire l'article</a>

                </div>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.subscriberViews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Elitebook\Desktop\TechRorizons\resources\views/themes/show.blade.php ENDPATH**/ ?>