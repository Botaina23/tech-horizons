<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/history.css')); ?>">
<div class="container">
    <h1>Mon historique</h1>

    <!-- Formulaire de filtrage -->
    <form method="GET" action="<?php echo e(route('history.index')); ?>">
        <div>
            <label for="date">Filtrer par date :</label>
            <input type="date" id="date" name="date" value="<?php echo e(request('date')); ?>">
        </div>
        <div>
            <label for="theme">Filtrer par thème :</label>
            <select id="theme" name="theme">
                <option value="">Tous les thèmes</option>
                <?php $__currentLoopData = $history->pluck('article.theme.name')->unique(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($theme); ?>" <?php echo e(request('theme') == $theme ? 'selected' : ''); ?>>
                        <?php echo e($theme); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <button type="submit">Filtrer</button>
    </form>

    <!-- Liste de l'historique -->
    <ul>
        <?php $__empty_1 = true; $__currentLoopData = $history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <li>
                <h2><?php echo e($entry->article->title); ?></h2>
                <p><?php echo e($entry->article->content); ?></p>
                <p><strong>Date de consultation :</strong> <?php echo e($entry->created_at->format('d/m/Y H:i')); ?></p>
                <a href="<?php echo e(route('articles.show', $entry->article->id)); ?>">Voir l'article</a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p>Aucun historique disponible.</p>
        <?php endif; ?>
    </ul>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.subscriberViews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Elitebook\Desktop\TechRorizons\resources\views/history/index.blade.php ENDPATH**/ ?>