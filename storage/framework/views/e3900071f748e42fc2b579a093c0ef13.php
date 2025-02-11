

<?php $__env->startSection('title', 'Mes Articles'); ?>

<link rel="stylesheet" href="<?php echo e(asset('css/ArticlesInTheme.css')); ?>">

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Mes articles</h1>
    <br> <br>
    <ul class="article-list">
        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="article-item">
                <div class="article-content">
                    <h2 class="article-title"><?php echo e($article->title); ?></h2>

                    <?php if($article->image): ?>
                        <img src="<?php echo e(asset('storage/' . $article->image)); ?>" alt="<?php echo e($article->title); ?>" class="article-image">
                    <?php endif; ?>
                    <p class="article-description"><?php echo e($article->content); ?></p>
                    <a href="<?php echo e(route('articles.show', $article->id)); ?>" class="article-button">Lire l'article</a>

                    <!-- Bouton Éditer avec icône -->
                     <div class="bottom-btn">
<a href="<?php echo e(route('articles.edit', $article->id)); ?>" class="btn btn-warning">
    <img src="<?php echo e(asset('../images/writing.png')); ?>" alt="">
    <span>Éditer</span>
</a>

<!-- Bouton Supprimer avec icône -->
<form action="<?php echo e(route('articles.destroy', $article->id)); ?>" method="POST" style="display: inline;">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">
        <img src="<?php echo e(asset('../images/delete.png')); ?>" alt="">
        <span>Supprimer</span>
    </button>
</form> </div>

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

<?php echo $__env->make('layouts.subscriberViews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Elitebook\Desktop\TechRorizons\resources\views/articles/MyArticles.blade.php ENDPATH**/ ?>