@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        @foreach ($files as $file)
        <div class="col-4">
            <div class="card">
                <img src="{{asset($file->url)}}" alt="" class="img-fluid" style="width:18rem;">

                <div class="card-footer">
                    <a href="{{ route('admin.files.edit', $file->id)}}" class="btn btn-primary">Editar</a>

                    <form action="{{route('admin.files.destroy', $file)}}" class="d-inline formulario-eliminar" 
                        method="POST">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Eliminar
                        </button>
                    </form>
                </div>
            </div>

        </div>

        @endforeach
        <br>
        <div class="col-12">
            {{$files->links()}}

        </div>
    </div>

</div>

@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('eliminar')=='ok')
<script>
    Swal.fire(
            'Eliminado!',
            'La imagen se elimino con exito.',
            'success'
            )
</script>
@endif


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
@endsection