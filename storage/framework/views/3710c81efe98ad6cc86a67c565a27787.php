


<?php $__env->startSection('title', 'Subscriber Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div class="dashboard-container">
        <!-- Menu -->
         <h1 > hi every body </h1>
        <div class="dashboard-menu">
            <ul>
                <li><a href="<?php echo e(route('subscriber.dashboard')); ?>">Home</a></li>
                <li><a href="<?php echo e(route('subscriber.history')); ?>">History</a></li>
                <li><a href="<?php echo e(route('subscriber.profile')); ?>">Profile</a></li>
                <li>
                    <form action="<?php echo e(route('logout')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn-logout">Logout</button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Body -->
        <div class="dashboard-body">
            <!-- Articles from Subscribed Themes -->
            <div class="articles-container">
                <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="article-card">
                        <h3><?php echo e($article->title); ?></h3>
                        <p><?php echo e($article->content); ?></p>
                        <p><strong>Theme:</strong> <?php echo e($article->theme->name); ?></p>

                        <!-- Rating Section -->
                        <div class="rating-section">
                            <p><strong>Rating:</strong> <?php echo e($article->averageRating()); ?> / 5</p>
                            <form action="<?php echo e(route('article.rate', $article->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <select name="rating">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <button type="submit">Rate</button>
                            </form>
                        </div>

                        <!-- Comment Section -->
                        <div class="comment-section">
                            <h4>Comments</h4>
                            <?php $__currentLoopData = $article->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="comment">
                                    <p><strong><?php echo e($comment->user->name); ?>:</strong> <?php echo e($comment->message); ?></p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <form action="<?php echo e(route('article.comment', $article->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <textarea name="message" rows="3" placeholder="Write a comment..."></textarea>
                                <button type="submit">Post Comment</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Form to Write a New Article -->
            <div class="write-article">
                <h2>Write Your Own Article</h2>
                <form action="<?php echo e(route('article.submit')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea id="content" name="content" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="theme">Theme</label>
                        <select id="theme" name="theme_id" required>
                            <?php $__currentLoopData = $subscribedThemes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($theme->id); ?>"><?php echo e($theme->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <button type="submit" class="btn-submit">Submit Article</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Elitebook\Desktop\TechRorizons\resources\views/subscriber/dashboard.blade.php ENDPATH**/ ?>