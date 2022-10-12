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
        .img-wraps {
            position: relative;
            display: inline-block;
            font-size: 0;

        }
        .img-wraps .delete-btn {
            position: absolute;
            right: -15px;
            top: -20px;
            padding: 5px 8px;
            color: white;
        }

        .img-wraps .delete-btn button {
            border-radius: 50%;
        }

        .img-wraps .update-btn {
            position: absolute;
            right: -5px;
            top: 33px;
            padding: 5px 8px;
            color: white;
            border-radius: 50%;
            scale: 1.15;
        }
        .img-wraps:hover .delete-btn,
        .img-wraps:hover .update-btn
        {
            opacity: 2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="mt-3 mb-2">Laravel - Gallery CRUD</h3>
        <form action="{{ url('gallery') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}
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


            <div class="row">
                <div class="col-md-5">
                    <label for="tittle"><strong>Titulo de la imagen:</strong></label>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
                <div class="col-md-5">
                    <strong>Imagen:</strong>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-2">
                    <br/>
                    <button type="submit" class="btn btn-success">Subir imagen</button>
                </div>
            </div>


        </form>
        <hr class="mt-2 mb-5">
        <div class="row text-center text-lg-start">

            @if($images->count())
                @foreach($images as $image)
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="img-wraps">
                            <form class="delete-btn" action="{{ url('gallery',$image->id) }}" method="POST">
                                <input type="hidden" name="_method" value="delete">
                                {!! csrf_field() !!}
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                            <a href="{{ url('gallery',$image->id) }}" type="button" class="update-btn btn btn-info"><i class="fa-solid fa-pen-to-square" aria-hidden="true"></i></a>

                            <a href="/images/{{ $image->image }}" class="d-block mb-4 h-100" data-fancybox="gallery" data-caption="{{ $image->title }}">
                                <img class="img-fluid img-thumbnail" src="/images/{{ $image->image }}" alt="{{ $image->title }}">
                            </a>
                        </div>
                        <div class='text-center'>
                            <small class='text-muted'>{{ $image->title }}</small>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-info show text-center">
                    <strong>¡Vaya!, parece que no hay ninguna imagen, prueba a añadir alguna :D</strong>
                </div>
            @endif
        </div>
    </div>

</body>
<script>
    document.addEventListener("DOMContentLoaded", function(){
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(element){
            return new bootstrap.Tooltip(element);
        });
    });
</script>
</html>
