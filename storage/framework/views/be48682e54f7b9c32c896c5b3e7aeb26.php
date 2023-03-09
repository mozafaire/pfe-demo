
<?php $__env->startSection('libre_article'); ?>
<div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Category</th>
      <th scope="col">Etat</th>
      <th scope="col">Author Email</th>
      <th scope="col">Editor Email</th>
      <th scope="col"> Fisrt Reviewer Email</th>
      <th scope="col"> Seconde Reviewer Email</th>
      <th scope="col"> Edit</th>
    </tr>
  </thead>
  <tbody>
  <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <th scope="row"><?php echo e($article->title); ?></th>
      <td><?php echo e($article->category); ?></td>
      <td><?php echo e($article->etat); ?></td>
      <td><?php echo e($article->authorId); ?></td>
      <td><?php echo e($article->editorId); ?></td>
      <td><?php echo e($article->reviewer1Id); ?></td>
      <td><?php echo e($article->reviewer2Id); ?></td>
      <td><div><form action="<?php echo e(route('editor.validation-article')); ?>"  method="get" ><input type="hidden" value="<?php echo e($article->id); ?>" name="id"><button type="submit" onclick=""> edit</button></form></div></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.editor.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\khalid1\Desktop\pfe-demo\resources\views/dashboard/editor/article/show_libre_article.blade.php ENDPATH**/ ?>