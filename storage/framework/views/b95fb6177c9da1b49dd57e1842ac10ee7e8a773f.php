



<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
                <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card" style="width:18rem;">
                    <img src="<?php echo e(asset($file->url)); ?>" class="card-img-top mt-4" alt="...">
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                
            </div>
            <br>
            <div class="col-12">
                <?php echo e($files->links()); ?>

            
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\imagenes\resources\views/welcome.blade.php ENDPATH**/ ?>