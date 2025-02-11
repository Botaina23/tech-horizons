<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/edit&show.css')); ?>">

<div class="container">
    <h1><?php echo e($article->title); ?></h1>
    <p><?php echo e($article->content); ?></p>

    <?php if($article->image): ?>
        <div >
            <img src="<?php echo e(asset('storage/' . $article->image)); ?>"
                 alt="<?php echo e($article->title); ?>"
                >
        </div>
    <?php endif; ?>

    <h2>Commentaires</h2>

<?php $__currentLoopData = $article->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <p><strong><?php echo e($comment->user->name); ?>:</strong> <?php echo e($comment->message); ?></p>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<!-- Formulaire pour ajouter un commentaire -->
<form action="<?php echo e(route('comments.store', $article->id)); ?>" method="POST" class="comment-form">
    <?php echo csrf_field(); ?>
    <div class="comment-box">
        <textarea name="message" id="message" rows="1" placeholder="Écrire un commentaire..." required></textarea>
        <button type="submit">
            <img src="<?php echo e(asset('../images/send.png')); ?>"> <!-- Icône d'envoi -->
        </button>
    </div>
</form>


</div>
<div class="goback">
    <a href="<?php echo e(url('/subscribed-articles')); ?>">
        <input type="image" src="<?php echo e(asset('../images/go_back_btn.png')); ?>" alt="Go Back">
    </a>
</div>

   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Elitebook\Desktop\TechRorizons\resources\views/articles/show.blade.php ENDPATH**/ ?>