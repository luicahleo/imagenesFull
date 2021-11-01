@extends('layouts.app2')



@section('content')
<div class="container">
    <div class="row">
        <div class="col">

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
                @foreach ($files as $file)
                <div class="card" style="width:18rem;">
                    <img src="{{asset($file->url)}}" class="card-img-top mt-4" alt="...">
                </div>
                @endforeach

                
            </div>
            <br>
            <div class="col-12">
                {{$files->links()}}
            
            </div>
        </div>
    </div>
</div>

@endsection