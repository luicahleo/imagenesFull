


<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-4">
            <div class="card">
                <img src="<?php echo e(asset($file->url)); ?>" alt="" class="img-fluid" style="width:18rem;">

                <div class="card-footer">
                    <a href="<?php echo e(route('admin.files.edit', $file->id)); ?>" class="btn btn-primary">Editar</a>

                    <form action="<?php echo e(route('admin.files.destroy', $file)); ?>" class="d-inline formulario-eliminar" 
                        method="POST">
                        <?php echo method_field('delete'); ?>
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-danger">Eliminar
                        </button>
                    </form>
                </div>
            </div>

        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <br>
        <div class="col-12">
            <?php echo e($files->links()); ?>


        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if(session('eliminar')=='ok'): ?>
<script>
    Swal.fire(
            'Eliminado!',
            'La imagen se elimino con exito.',
            'success'
            )
</script>
<?php endif; ?>


<script>
    // const form = document.getElementById("formulario-eliminar");
    // form.addEventListener("submit", function(e){
    //     e.preventDefault();
    //     // console.log(e);

         
    //     Swal.fire({
    //     title: 'Esta seguro de borrar?',
    //     text: "La imagen eliminada no se puede recuperar!",
    //     icon: 'warning',
    //     showCancelButton: true,
    //     confirmButtonColor: '#3085d6',
    //     cancelButtonColor: '#d33',
    //     confirmButtonText: 'Si, Borrar!'
    //     }).then((result) => {
    //     if (result.isConfirmed) {
           
    //         this.submit();
    //     }
    //     });

    // });
    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();
        
        Swal.fire({
        title: 'Esta seguro de borrar?',
        text: "La imagen eliminada no se puede recuperar!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Borrar!'
        }).then((result) => {
        if (result.isConfirmed) {
           
            this.submit();
        }
        })

     });


     
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\imagenes\resources\views/admin/files/index.blade.php ENDPATH**/ ?>