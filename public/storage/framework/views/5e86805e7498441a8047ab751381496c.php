

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/createtheme.css')); ?>">
<div class="container theme-form">
    <h1 class="form-title">Select Your Interested Themes</h1>
    <form action="<?php echo e(route('user.themes.store')); ?>" method="POST" class="form">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="theme-checkbox">
                    <input type="checkbox" id="theme_<?php echo e($theme->id); ?>" name="themes[]" value="<?php echo e($theme->id); ?>">
                    <label for="theme_<?php echo e($theme->id); ?>"><?php echo e($theme->name); ?></label>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <button type="submit" class="btn btn-primary">Save Themes</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\Desktop\TechRorizons\resources\views/test.blade.php ENDPATH**/ ?>