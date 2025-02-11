<?php $__env->startSection('content'); ?>

<link rel="stylesheet" href="<?php echo e(asset('css/createArtc.css')); ?>"> <!-- Home page styles -->

<div class="container">
<h1>Créer un nouvel article pour le thème : <?php echo e($theme->name); ?></h1>

    <!-- Formulaire de création d'article -->
    <form id="articleForm" action="<?php echo e(route('articles.store', ['theme' => $theme->id])); ?>" method="POST" enctype="multipart/form-data" class="article-form">

        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="title">Titre de l'article :</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div class="form-group">            <label for="content">Contenu :</label>
            <textarea id="content" name="content" rows="6" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image :</label>
            <input type="file" id="image" name="image">
        </div>

        <!-- Bouton de soumission -->
        <button type="button" onclick="openStatusModal()" class="form-button">Créer l'article</button>
    </form>
    <div class="goback">
    <a href="<?php echo e(route('AllTh')); ?>">
        <input type="image" src="<?php echo e(asset('../images/go_back_btn.png')); ?>" alt="Go Back">
    </a>
</div>

    <!-- MODAL pour choisir le statut -->
    <div id="statusModal" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.3);">
        <h3>Choisir le statut de l'article</h3>
        <button onclick="submitFormWithStatus('accepted')">✅ Accepter</button>
        <button onclick="submitFormWithStatus('pending')">⏳ En attente</button>
        <button onclick="submitFormWithStatus('rejected')">❌ Refuser</button>
    </div>
</div>

<script>
    function openStatusModal() {
        document.getElementById("statusModal").style.display = "block";
    }

    function submitFormWithStatus(status) {
        let form = document.getElementById("articleForm");

        // Ajouter un champ caché pour stocker le statut
        let statusInput = document.createElement("input");
        statusInput.type = "hidden";
        statusInput.name = "status";
        statusInput.value = status;
        form.appendChild(statusInput);

        // Soumettre le formulaire
        form.submit();
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Elitebook\Desktop\TechRorizons\resources\views/articles/create.blade.php ENDPATH**/ ?>