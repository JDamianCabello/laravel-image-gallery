@extends('layouts.master')

@section('title', 'Image Info')

@section('content')
    <h3 class="mt-2 mb-5">Laravel - Ver/Editar imagen</h3>
    @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>¡Whoops!</strong> Tenemos algunos contratiempos.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if(isset($image))
        <form action="{{ route('image.update', ['id' => $image->id]) }}" class="form mb-3" method="POST">
            <input type="hidden" name="_method" value="put">
            {!! csrf_field() !!}

            <div class="col-6 mx-auto">
                <div class="row mb-2">
                    <label for="tittle"><strong>Titulo de la imagen:</strong></label>
                    <input type="text" name="title" class="form-control" placeholder="Título" value="{{ $image->title }}">
                </div>
                <div class="row ">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-success btn-sm">Actualizar título</button>
                    </div>
                </div>

            </div>
        </form>
        <div class="col-lg-3 col-md-4 col-6 mx-auto">
            <a href="/images/{{ $image->image }}" class="d-block mb-4 h-100" data-fancybox="gallery" data-caption="{{ $image->title }}">
                <img class="img-fluid img-thumbnail" src="/images/{{ $image->image }}" alt="{{ $image->title }}">
                <div class='text-center'>
                    <small class='text-muted'>{{ $image->title }}</small>
                </div>
            </a>
        </div>
    @else
            <div class="col-lg-3 col-md-4 col-6 mx-auto">
                <a href="/images/no-image.png" class="d-block mb-4 h-100" data-fancybox="gallery" data-caption="Imagen no encontrada">
                    <img class="img-fluid img-thumbnail" src="/images/no-image.png" alt="no image">
                </a>
            </div>
    @endif
    <div class="row ">
        <div class="col text-center">
            <a href="/" class="text-white btn btn-info btn-sm">Volver a la galería</a>
        </div>
    </div>
@stop
