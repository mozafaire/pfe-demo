home

<a href="<?php echo e(route('reviewer.logout')); ?>" onclick="event.preventDefault();document.getElementById('logout.form').submit()">logout</a>
<form action="<?php echo e(route('reviewer.logout')); ?>" id="logout.form" method="POST">
    <?php echo csrf_field(); ?>
</form>

<?php /**PATH C:\Users\khalid1\Desktop\pfe-demo\resources\views/dashboard/Reviewer/home.blade.php ENDPATH**/ ?>