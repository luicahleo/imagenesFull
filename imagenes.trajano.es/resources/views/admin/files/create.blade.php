@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css"
    integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />


@endsection




@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h1> Subir imagenes</h1>

            <form action="{{ route('admin.files.store') }}" class="dropzone" id="my-awesome-dropzone" method="POST">

            </form>
            {{-- <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.files.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <input type="file" name="file" id="" accept="image/*">
                            <br>
                            @error('file')
                            <small class="text-danger">{{$message}}</small>
                            @enderror

                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Enviar</button>
                    </form>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
<script>
    Dropzone.options.myAwesomeDropzone = { // camelized version of the `id`
          headers: {
            'X-CSRF-TOKEN' : "{{csrf_token()}}"
          },
          dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo",
          acceptedFiles: "image/*",
          maxFiles: 8,
        };
</script>
@endsection