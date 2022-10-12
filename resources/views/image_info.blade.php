<!DOCTYPE html>
<html lang="es">
<head>
    <title>Image Gallery</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- Fancybox -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>

    </style>
</head>
<body>
<div class="container">


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
</div>

</body>
<script>
</script>
</html>
