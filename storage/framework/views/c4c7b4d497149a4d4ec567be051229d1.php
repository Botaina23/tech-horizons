

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Statut des articles du thème : <?php echo e($theme->name); ?></h1>

    <!-- Articles en attente -->
    <h2>Articles en attente</h2>
    <?php $__empty_1 = true; $__currentLoopData = $articlesPending; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div>
            <h3><?php echo e($article->title); ?></h3>
            <p><?php echo e($article->content); ?></p>
            <span style="color: orange; font-weight: bold;">En attente</span>

            <!-- Formulaire pour modifier le statut -->
            <form action="<?php echo e(route('articles.update_status', $article->id)); ?>" method="POST" style="display: inline;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                <button name="status" value="accepted" class="btn btn-success">Accepter</button>
                <button name="status" value="rejected" class="btn btn-danger">Refuser</button>
                <button name="status" value="pending" class="btn btn-warning">En attente</button>
            </form>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p>Aucun article en attente.</p>
    <?php endif; ?>

    <!-- Articles acceptés -->
    <h2>Articles acceptés</h2>
    <?php $__empty_1 = true; $__currentLoopData = $articlesAccepted; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div>
            <h3><?php echo e($article->title); ?></h3>
            <span style="color: green; font-weight: bold;">Accepté</span>

            <!-- Formulaire pour modifier le statut -->
            <form action="<?php echo e(route('articles.update_status', $article->id)); ?>" method="POST" style="display: inline;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                <button name="status" value="rejected" class="btn btn-danger">Refuser</button>
                <button name="status" value="pending" class="btn btn-warning">En attente</button>
            </form>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p>Aucun article accepté.</p>
    <?php endif; ?>

    <!-- Articles refusés -->
    <h2>Articles refusés</h2>
    <?php $__empty_1 = true; $__currentLoopData = $articlesRejected; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div>
            <h3><?php echo e($article->title); ?></h3>
            <span style="color: red; font-weight: bold;">Rejeté</span>

            <!-- Formulaire pour modifier le statut -->
            <form action="<?php echo e(route('articles.update_status', $article->id)); ?>" method="POST" style="display: inline;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                <button name="status" value="accepted" class="btn btn-success">Accepter</button>
                <button name="status" value="pending" class="btn btn-warning">En attente</button>
            </form>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p>Aucun article refusé.</p>
    <?php endif; ?>

    <a href="<?php echo e(route('themes.index')); ?>" class="btn btn-secondary">Retour à la liste des thèmes</a>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Elitebook\Desktop\TechRorizons\resources\views/themes/article_status.blade.php ENDPATH**/ ?>