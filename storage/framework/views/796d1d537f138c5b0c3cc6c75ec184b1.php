

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Statistiques pour le thème : <?php echo e($theme->name); ?></h1>

    <h2>Articles</h2>
    <ul>
        <li>Total d'articles : <?php echo e($totalArticles); ?></li>
        <li>Articles en cours : <?php echo e($articlesEnCours); ?></li>
        <li>Articles publiés : <?php echo e($articlesPublies); ?></li>
        <li>Articles refusés : <?php echo e($articlesRefuses); ?></li>
    </ul>

    <h2>Abonnés</h2>
    <p>Total d'abonnés : <?php echo e($totalSubscribers); ?></p>

    <h2>Commentaires</h2>
    <p>Total de commentaires : <?php echo e($totalComments); ?></p>

    <a href="<?php echo e(route('themes.show', $theme->id)); ?>" class="btn btn-primary">Retour au thème</a>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Elitebook\Desktop\TechRorizons\resources\views/themes/statistics.blade.php ENDPATH**/ ?>