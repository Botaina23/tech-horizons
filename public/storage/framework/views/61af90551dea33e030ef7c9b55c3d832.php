

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/createtheme.css')); ?>">
<div class="container theme-form">
    <h1 class="form-title">Créer un nouveau thème</h1>
    <form action="<?php echo e(route('themes.store')); ?>" method="POST" enctype="multipart/form-data" class="form">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="name">Nom du thème :</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description :</label>
            <textarea id="description" name="description" rows="4" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image :</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Créer le thème</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Elitebook\Desktop\TechRorizons\resources\views/themes/create.blade.php ENDPATH**/ ?>