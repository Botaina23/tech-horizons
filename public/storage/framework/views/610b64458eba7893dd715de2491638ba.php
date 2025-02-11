

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/Editor.css')); ?>"> <!-- Home page styles -->

<div class="container">
    <h1>📊 Dashboard de l'Éditeur</h1>

    <!-- Statistiques des Articles -->
    <h2>📝 Statistiques des Articles</h2>
    <ul>
        <li><strong>Total d'articles :</strong> <?php echo e($totalArticles); ?></li>
        <li><strong>🕐Articles en attente :</strong> <?php echo e($articlesPending); ?></li>
        <li><strong>✅ Articles acceptés :</strong> <?php echo e($articlesAccepted); ?></li>
        <li><strong>❌Articles refusés :</strong> <?php echo e($articlesRejected); ?></li>
    </ul>

    <!-- Statistiques des Abonnés -->
    <h2>👥 Statistiques des Abonnés</h2>
    <p><strong>Total d'abonnés :</strong> <?php echo e($totalSubscribers); ?></p>

    <!-- Statistiques des Thèmes -->
    <h2>📚 Statistiques des Thèmes</h2>
    <ul>
        <li><strong>Total de thèmes :</strong> <?php echo e($totalThemes); ?></li>
    </ul>

    <!-- Top 5 Thèmes avec le plus d'articles -->
    <h3>🔥 Top 5 Thèmes avec le plus d'articles</h3>
    <ul>
        <?php $__currentLoopData = $themesWithMostArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($theme->name); ?> (<?php echo e($theme->articles_count); ?> articles)</li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <!-- Top 5 Thèmes avec le plus d'abonnés -->
    <h3>🏆 Top 5 Thèmes les plus populaires</h3>
    <ul>
        <?php $__currentLoopData = $themesWithMostSubscribers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($theme->name); ?> (<?php echo e($theme->subscribers_count); ?> abonnés)</li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.respoViews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Elitebook\Desktop\TechRorizons\resources\views/editor/dashboard.blade.php ENDPATH**/ ?>