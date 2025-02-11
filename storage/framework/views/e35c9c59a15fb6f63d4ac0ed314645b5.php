<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Horizons | <?php echo $__env->yieldContent('title'); ?></title>
    <link rel="icon" href="<?php echo e(asset('images/favicon (2).png')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(1deg, #a03497, #01021d, #080014);
            background-size: cover;
        }
        img {
            border-radius: 7px;
        }
        .navbar {
    position: fixed; /* Change sticky to fixed */
    top: 0; /* Keep the navbar at the top of the viewport */
    left: 0; /* Optional, to align it with the left edge */
    width: 100%; /* Make the navbar span the full width of the viewport */
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0px 20px;
    background-color: #ffffff; /* Ensure background color is visible over other content */
    border-bottom: 1px solid #ebdee1;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Add shadow */
    z-index: 1000; /* Ensure the navbar stays above other elements */
  }
  
  
  
  .navbar-logo {
    display: flex;
    align-items: center;
    gap: 8px;
  }
  
  .logo-icon {
    font-size: px;
    
    color: #ffffff; 
    padding: 5px 10px;
    border-radius: 1px;
  }
  
  .logo-text {
    font-weight: bold;
    font-size: 24px;
    color: #152674;
        font-weight: bold; /* Optional */
        background: linear-gradient(90deg, #0f2dd3, #ce2ec0); /* Define gradient colors */
        background-clip: text;
        -webkit-text-fill-color: transparent;
  
      
  }
        .menu-icon {
            cursor: pointer;
            font-size: 24px;
            color: #152674;
        }
        .side-menu {
            position: fixed;
            top: 70px;
            right: -250px; /* Changed from left to right */
            width: 250px;
            height: 100%;
            background-color: #ffffff;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1); /* Adjusted shadow direction */
            transition: right 0.3s ease; /* Changed from left to right */
            z-index: 100;
            display: flex;
             flex-direction: column;
              padding: 10px;
              bottom: 20px;
        }
        .side-menu.open {
            right: 0;
        }
        .side-menu a {
            display: block;
            padding: 15px 20px;
            text-decoration: none;
            color: #a361b1;
            font-size: 18px;
            border-bottom: 1px solid #ebdee1;
        }
        .side-menu a:hover {
            background-color: #f5f5f5;
        }
        .side-menu a {
    display: flex;
    align-items: center;
    gap: 8px; /* Espace entre l'icône et le texte */
    text-decoration: none;
    color: black;
    padding: 10px;
}

.side-menu a i {
    font-size: 18px; /* Taille des icônes FontAwesome */
}

.side-menu a img {
    width: 20px;
    height: 20px;
}
.bottom-links {
    margin-top: auto; /* Pousse les liens vers le bas */
    padding-top: 10px;
    border-top: 1px solid #ddd; /* Ligne de séparation */
    padding-bottom: 70px;
}

    </style>
    <script>
        function toggleMenu() {
            const sideMenu = document.getElementById('sideMenu');
            sideMenu.classList.toggle('open');
        }
    </script>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-logo">
        <span class="logo-icon"></span>
      <img src="<?php echo e(asset('images/log.png')); ?>" alt="Tech Horizons Logo">
      <span class="logo-text">Tech <br> Horizons</span>
        </div>
        <div class="menu-icon" onclick="toggleMenu()">
            &#9776; <!-- Hamburger icon -->
        </div>

    </div>

    <!-- Side Menu -->
    <div id="sideMenu" class="side-menu">
    <a href="<?php echo e(route('subscribed.articles')); ?>">
        <img src="<?php echo e(asset('images/Explore.png')); ?>" alt="Explore" width="20" height="20"> Explore
    </a>
    <a href="<?php echo e(route('AllTh')); ?>">
        <img src="<?php echo e(asset('images/book.png')); ?>" alt="Themes" width="20" height="20"> All themes
    </a>
    <a href="<?php echo e(route('history.index')); ?>">
        <img src="<?php echo e(asset('images/file.png')); ?>" alt="History" width="20" height="20"> History
    </a>
    <a href="<?php echo e(route('user.articles')); ?>">
        <img src="<?php echo e(asset('images/MyArticles.png')); ?>" alt="History" width="20" height="20"> My articles
    </a>
    
    <div class="bottom-links">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        <img src="<?php echo e(asset('images/user.png')); ?>" alt="User" width="20" height="20"> <?php echo e(Auth::user()->name); ?>

    </a>
    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
           onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
            <img src="<?php echo e(asset('images/log-out.png')); ?>" alt="Logout" width="20" height="20"> <?php echo e(__('Logout')); ?>

        </a>

        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
            <?php echo csrf_field(); ?>
        </form>
    </div>
    </div>
</div>


    <!-- Main Content -->
    <div class="container mx-auto px-6 py-20">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</body>
</html><?php /**PATH C:\Users\Elitebook\Desktop\TechRorizons\resources\views/layouts/subscriberViews.blade.php ENDPATH**/ ?>