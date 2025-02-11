<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/ArticlesInTheme.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/edit&show.css')); ?>">


<div class="container">
    <h1>Modifier l'article</h1>

    <form action="<?php echo e(route('articles.update', $article->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <!-- Titre -->
        <div>
            <label for="title">Titre de l'article :</label>
            <input type="text" id="title" name="title" value="<?php echo e($article->title); ?>" required>
        </div>

        <!-- Contenu -->
        <div>
            <label for="content">Contenu :</label>
            <textarea id="content" name="content" rows="6" required><?php echo e($article->content); ?></textarea>
        </div>

        <!-- Image -->
        <div>
            <label for="image">Image actuelle :</label>
            <?php if($article->image): ?>
                <div>
                    <img src="<?php echo e(asset('storage/' . $article->image)); ?>" alt="<?php echo e($article->title); ?>" width="200" style="margin-bottom: 10px;">
                </div>
            <?php endif; ?>
            <input type="file" id="image" name="image">
        </div>

        <!-- Statut -->
        <div>
            <label for="status">Statut :</label>
            <select id="status" name="status" required>
                <option value="pending" <?php echo e($article->status == 'pending' ? 'selected' : ''); ?>>En attente</option>
                <option value="accepted" <?php echo e($article->status == 'accepted' ? 'selected' : ''); ?>>Accepté</option>
                <option value="rejected" <?php echo e($article->status == 'rejected' ? 'selected' : ''); ?>>Rejeté</option>
            </select>
        </div>

        <!-- Bouton de mise à jour -->
        <button type="submit">Mettre à jour</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Elitebook\Desktop\TechRorizons\resources\views/articles/edit.blade.php ENDPATH**/ ?>