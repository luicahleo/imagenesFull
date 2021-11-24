

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css"
    integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />


<?php $__env->stopSection(); ?>




<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h1> Subir imagenes</h1>

            <form action="<?php echo e(route('admin.files.store')); ?>" class="dropzone" id="my-awesome-dropzone" method="POST">

            </form>
            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
<script>
    Dropzone.options.myAwesomeDropzone = { // camelized version of the `id`
          headers: {
            'X-CSRF-TOKEN' : "<?php echo e(csrf_token()); ?>"
          },
          dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo",
          acceptedFiles: "image/*",
          maxFiles: 8,
        };
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\imagenes\resources\views/admin/files/create.blade.php ENDPATH**/ ?>