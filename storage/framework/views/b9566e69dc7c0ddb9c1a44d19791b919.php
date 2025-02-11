
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
    <h1>Welcome to Your Dashboard, <?php echo e(auth()->user()->name); ?>!</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <h2>Your Selected Themes</h2>
    <?php if($selectedThemes->isEmpty()): ?>
        <p>You have not selected any themes yet.</p>
    <?php else: ?>
        <ul>
            <?php $__currentLoopData = $selectedThemes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($theme->name); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.subscriberViews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Elitebook\Desktop\TechRorizons\resources\views/subdashboard.blade.php ENDPATH**/ ?>