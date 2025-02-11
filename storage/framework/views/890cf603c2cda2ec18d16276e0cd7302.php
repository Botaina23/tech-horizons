<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo e(asset('css/global.css')); ?>"> <!-- Global styles -->
  <?php echo $__env->yieldContent('styles'); ?> <!-- Page-specific styles -->
  <script src="<?php echo e(asset('js/slides.js')); ?>"></script>
  <title>Tech Horizons | <?php echo $__env->yieldContent('title'); ?></title>
  <link rel="icon" href="<?php echo e(asset('images/favicon (2).png')); ?>">
</head>
<body>
  <nav class="navbar">
    <div class="navbar-logo">
      <span class="logo-icon"></span>
      <img src="<?php echo e(asset('images/log.png')); ?>" alt="Tech Horizons Logo">
      <span class="logo-text">Tech <br> Horizons</span>
    </div>
    <div class="navbar-links">
      <a href="<?php echo e(url('/home')); ?>">Home</a>
      <a href="<?php echo e(url('/about-us')); ?>" class="login-link">About Us</a>
    </div>
    <div class="navbar-actions">
      <a href="<?php echo e(url('/register')); ?>" style="text-decoration: none;">
        <button class="subscribe-btn"><span>Sign up</span></button>
      </a>
      <a href="<?php echo e(url('/login')); ?>" style="text-decoration: none;">
        <button class="subscribe-btn"><span>Login</span></button>
      </a>
    </div>
  </nav>

  <div class="content">
    <?php echo $__env->yieldContent('content'); ?>
  </div>
  <div id="custom-dialogue" class="dialogue-box">
  <div class="dialogue-content">
    <h3>Login Required</h3>
    <p>You need to log in or register to access this content.</p>
    <div class="dialogue-buttons">
      <button id="login-btn">LogIn</button>
      <button id="register-btn">Register</button>
    </div>
  </div>
</div>
</body>
</html><?php /**PATH C:\Users\Dell\Desktop\TechRorizons\resources\views/layouts/guestViews.blade.php ENDPATH**/ ?>