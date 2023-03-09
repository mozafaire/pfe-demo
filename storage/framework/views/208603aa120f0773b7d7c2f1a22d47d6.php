
<?php $__env->startSection('create_article_content'); ?>

<form method="POST" action="<?php echo e(route('author.uploade')); ?>"  enctype="multipart/form-data">
	<?php echo csrf_field(); ?>
	<label for="">title:</label>
	<input type="text" name="title">
	<br>
	<label for="">category:</label>
	<input type="text" name='category'>
	<br>
	<label for="">abstract</label>
	<input type="text" name='abstract' >
	<br>
	<br>
	<label for="">pdf:</label>
	<input type="file" name="obj_pdf" required>
	<label for="">pic:</label>
	<input type="file" name="pic" required>
	<input type="submit">
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.author.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\khalid1\Desktop\pfe-demo\resources\views/dashboard/author/article/create_article.blade.php ENDPATH**/ ?>