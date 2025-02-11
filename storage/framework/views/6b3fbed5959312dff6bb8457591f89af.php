<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startSection('styles'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('css/HomeStyle.css')); ?>"> <!-- Home page styles -->
<?php $__env->stopSection(); ?>
  <div class="background-image">
    <h1>Welcome to Our Website</h1>
    <p>Stay updated with the latest advancements in the world of technology <br><br>and explore topics tailored to your interests.</p>
  </div>

  <div class="newbar">
    <h2> Themes </h2>
    <div class="thems">
      <div id="slider-container" class="slider-container">
        <ul>
          <li>
            <div id="IAbar" class="bar">
              <a href="#">
                <img src="<?php echo e(asset('images/IAimage.jpg')); ?>" alt="">
                <h3 class="text-overlay">ARTIFICIAL INTELLIGENCE</h3>
                <p>Lorem ipsum dolor sit amet...</p>
                <button class="read-more-btn">Read More..</button>
              </a>
            </div>
          </li>
          <li>
            <div class="bar">
              <a href="#">
                <img src="<?php echo e(asset('images/cyberImage.jpg')); ?>" alt="">
                <h3 class="text-overlay">CYBERSECURITY</h3>
                <p>Lorem ipsum dolor sit amet...</p>
                <button class="read-more-btn">Read More..</button>
              </a>
            </div>
          </li>
          <li>
            <div class="bar">
              <a href="#">
                <img src="<?php echo e(asset('images/VR.jpg')); ?>" alt="">
                <h3 class="text-overlay">VIRTUAL REALITY</h3>
                <p>Lorem ipsum dolor sit amet...</p>
                <button class="read-more-btn">Read More..</button>
              </a>
            </div>
          </li>
          <li>
            <div class="bar">
              <a href="#">
                <img src="<?php echo e(asset('images/inter.avif')); ?>" alt="">
                <h3 class="text-overlay">INTERNET OF THINGS</h3>
                <p>Lorem ipsum dolor sit amet...</p>
                <button class="read-more-btn">Read More..</button>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="buttons">
      <br>
   
      <input type="image" src="<?php echo e(asset('images/right.png')); ?>" class="slider-button right" onclick="prevSlide()">
    </div>
  </div>
  <script src="<?php echo e(asset('js/slides.js')); ?>"></script><!-- Custom Dialogue Box -->

  <?php if(!auth()->check()): ?>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Get elements
      const dialogueBox = document.getElementById('custom-dialogue');
      const loginBtn = document.getElementById('login-btn');
      const registerBtn = document.getElementById('register-btn');

      // Get all theme cards
      const themeCards = document.querySelectorAll('.bar');

      // Add click event listener to each theme card
      themeCards.forEach(card => {
        card.addEventListener('click', function (event) {
          // Prevent default link behavior
          event.preventDefault();

          // Show the custom dialogue box
          dialogueBox.style.display = 'flex';
        });
      });

      // Handle login button click
      loginBtn.addEventListener('click', function () {
        // Redirect to login page
        window.location.href = "<?php echo e(route('login')); ?>";
      });

      // Handle register button click
      registerBtn.addEventListener('click', function () {
        // Redirect to registration page
        window.location.href = "<?php echo e(route('register')); ?>";
      });

      // Close the dialogue box when clicking outside of it
      window.addEventListener('click', function (event) {
        if (event.target === dialogueBox) {
          dialogueBox.style.display = 'none';
        }
      });
    });
  </script>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guestViews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Elitebook\Desktop\TechRorizons\resources\views/home.blade.php ENDPATH**/ ?>