  


<?php $__env->startSection('title'); ?>
    <!-- Add your title here if needed -->
<?php $__env->stopSection(); ?>


    <link rel="stylesheet" href="<?php echo e(asset('css/themes.css')); ?>"> <!-- Home page styles -->

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Liste des thèmes</h1>

        <div class="themes">
            <!-- Button to create a new theme -->
            <div class="icon-container" style="align-items: center;">
                <a href="<?php echo e(route('themes.create')); ?>" class="icon-btn" id="top-btn" title="Créer un article">
                                    <img src="<?php echo e(asset('images/template.png')); ?>" alt="Créer un nouveau thème">
                                    <span class="hover-text">Créer un nouveau thème</span>
                                </a>
            </div>

            <div class="info">
           <img src="<?php echo e(asset('images/information.png')); ?>" alt="" width="32px"> <span>This list contains the themes you are subscribed to. If you want to add other themes, click the 'Plus' button below.</span>
           </div>
            <ul style="list-style-type: none;">
                <?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <div class="bar">
                            <!-- Display theme image if available -->
                            <?php if($theme->image): ?>
                                <img class=".bar img" src="<?php echo e(asset('storage/' . $theme->image)); ?>" alt="<?php echo e($theme->name); ?>">
                            <?php endif; ?>

                            <!-- Theme description -->
                            <div id="desc">
                                <label for="">General concept:</label>
                                <span><?php echo e($theme->name); ?></span>
                                <hr>
                                <label for="">About:</label>
                                <span><?php echo e($theme->description); ?></span>
                                <label for="">Number of articles::</label>
                                <span>10</span>
                                <label for="">Followers:</label>
                                <span>10</span>
                            </div>

                            <!-- Icons for actions -->
                            <div class="icon-container">
                                <!-- Button to view articles -->
                                <a href="<?php echo e(route('themes.show', $theme->id)); ?>" class="icon-btn" title="Voir les articles">
                                    <img src="<?php echo e(asset('images/application.png')); ?>" alt="Voir les articles">
                                    <span class="hover-text">Voir les articles</span>
                                </a>

                                <!-- Button to create an article -->
                                <a href="<?php echo e(route('articles.create', $theme->id)); ?>" class="icon-btn" title="Créer un article">
                                    <img src="<?php echo e(asset('images/copywriting.png')); ?>" alt="Créer un article">
                                    <span class="hover-text">Créer un article</span>
                                </a>
                                                                   <!-- Bouton pour voir les statistiques -->

                                <a href="<?php echo e(route('themes.statistics', $theme->id)); ?>" class="icon-btn" title="Voir les statistiques">
                                    <img src="<?php echo e(asset('images/diagram.png')); ?>" alt="Créer un article">
                                    <span class="hover-text">Voir les statistiques</span>
                                </a>
                                <a href="<?php echo e(route('themes.articles_status', $theme->id)); ?>" class="icon-btn" title="Voir les notifications des articles">
                                    <img src="<?php echo e(asset('images/notification.png')); ?>" alt="Créer un article">
                                    <span class="hover-text">Voir les notifications des articles</span>
                                </a>
<!-- Bouton pour voir le statut des articles -->
                        </div>
                    </li>
                    <br>
                    <hr>
                     <br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.respoViews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Elitebook\Desktop\TechRorizons\resources\views/responsable/Mythemes.blade.php ENDPATH**/ ?>