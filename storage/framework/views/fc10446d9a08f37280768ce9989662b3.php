
<?php $__env->startSection('validation_article'); ?>
<?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php echo e($editorId = auth::user()->email); ?>

<form action="<?php echo e(route('editor.update-etat')); ?>" method="get">
    <label for="">Set etat:</label>
    <input type="text" name="etat">
    <input type="hidden" name="id" value="<?php echo e($article->id); ?>">
    <button type="submit"> change</button>
    <input type="hidden" name="editorId" value="<?php echo e(auth::user()->email); ?>">
</form>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.editor.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\khalid1\Desktop\pfe-demo\resources\views/dashboard/editor/article/validation_article.blade.php ENDPATH**/ ?>