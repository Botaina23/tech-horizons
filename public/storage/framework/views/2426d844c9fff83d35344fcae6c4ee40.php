<?php $__env->startSection('title', 'About us'); ?>

<?php $__env->startSection('styles'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('css/about-us.css')); ?>"> <!-- About Us page styles -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="about-us-container">
    <h1><?php echo e($pageData['title']); ?></h1>
    <div class="about-content">
      <section>
        <h2>Our Mission</h2>
        <p><?php echo e($pageData['mission']); ?></p>
      </section>
      <section>
        <h2>Our Team</h2>
        <p><?php echo e($pageData['team']); ?></p>
      </section>
      <section>
        <h2>Why Choose Us?</h2>
        <ul>
          <?php $__currentLoopData = $pageData['whyChooseUs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reason): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($reason); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </section>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guestViews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Elitebook\Desktop\TechRorizons\resources\views/about-us.blade.php ENDPATH**/ ?>