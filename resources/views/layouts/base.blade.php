@extends('adminlte::page')

@section('title', 'Proveedores')
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

        .valida{
            margin-top:-14px ;
            color: red;
            font-size: 12px;
        }

        #mesas .card-header  {
            background-color: #005082;
            color:#fff;

        }


        a .mesadisp{
            background-color: #4a9ae9;
            padding:20px;
            color: #fff;
            text-transform: uppercase;
            font-family: Courier;
        }

        #botonesmesas .mesaselect{
            background-color: #0e4f8d;
            padding:20px;
            color: #fff;
            text-transform: uppercase;
            font-family: Courier;
        }



        a .mesadisp:hover{
            background-color: #256Edc;
            padding:20px;
            color: #fff;
            text-transform: uppercase;
            font-family: Courier;
        }

        #platodefondo{
            background-color: #e9eff3;
        }

        #mesas{
            background-color: #f3f6f8;
        }

        #buttonenviar{
            background-color: rgb(0, 120, 180);
            padding: 0.8rem 1rem;
            border-radius: 10px;
            text-decoration: none;
            display: block;
            margin: 2rem auto 1rem;
            font-size: 1.5rem;
            min-width: 118px;
            max-width: 585px;
            text-align: center;
            color: white !important;

        }

        #buttonenviar:hover{
            background-color: #003666;


        }


        #entradas{
            background-color: #e9eff3;

        }

    .inputbig input{
        height:100%;
        margin-left: 20px;
        padding: 10px ;
        font-size: 1.4em;
    }



        #entradas .card-header{
            background-color: #b95700;
            color:#fff;
        }

        li .active{
            background-color: #d56e00;
            color:#fff;
        }

        .card-body .form-row .btn-menu{
            background-color: #00aadc;
            text-transform: uppercase;
            color: #fff;
        }


        .card-body .form-row .btn-menu .disponibility{
            font-size: 0.8em;
        }


        .card-body .form-row .btn-menu:hover {
            background-color: #005082;
        }

        .card-body .form-row .btn-entrada{
            background-color: #0087be;
            text-transform: uppercase;

        }

        .card-body .form-row .btn-entrada:hover {
            background-color: #005082;
        }


        .card-body .form-row .btn-entrada .disponibility{
            font-size: 0.8em;
        }






    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <title>@yield('title')</title>
</head>
<body>

</body>
</html>
@section('content')

    <div class="container">
        @yield('contenido')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


@endsection

@section('css')
@stop
