@extends('adminlte::page')



@section('title', 'Crear Usuario')

@section('css')
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .select2-selection {
            height: calc(2.25rem + 2px) !important;
        }



        .valida{
            margin-top:-14px ;
            color: red;
            font-size: 11px;
        }

        @media screen and (max-width: 768px) {
            h1{
                font-size:18px;
                font-weight: bold;
            }
        }
    </style>
@stop



@section('content_header')
    <h1>Crear Usuario</h1>
@stop

@section("content")
    <form action="/admin/users" method="post" class="grabado">
    @csrf
        <div class="m-0 row justify-content-center">
            <div class="col-md-10">
                <h1 class="text-center">DATOS DEL USUARIO</h1>
                <div class="card">
                    <div class="row card-body">
                        <div class="form-group col-md-12">
                            <label for="">NOMBRE COMPLETO</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombre Completo">

                                @error('name')
                                <br>
                                <div class="valida">*{{ $message }}</div>
                                <br>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label for="">EMAIL</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="example@gmail.com">

                            @error('email')
                            <br>
                            <div class="valida">*{{ $message }}</div>
                            <br>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label for="">PASSWORD</label>
                            <input id="password" type="password" class="form-control" name="password" value="{{ old('email') }}" placeholder="***********">

                            @error('password')
                            <br>
                            <div class="valida">*{{ $message }}</div>
                            <br>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label for="">TIPO DE USUARIO</label>

                            <select name="tipo" id="tipo" class="form-control form-select" >
                                <option selected="false" value="">SELECCIONE EL TIPO DE USUARIO</option>

                                    <option value="admin">ADMIN</option>
                                    <option value="mozo">MOZO</option>
                                    <option value="cocinero">COCINERO</option>
                                    <option value="caja">CAJA</option>
                            </select>
                            @error('tipo')
                            <br>
                            <div class="valida">*{{ $message }}</div>
                            <br>
                            @enderror
                        </div>

                        <div class="col-md-4" style="margin-top: 3%;">
                            <button type="submit" class="btn btn-success btn-block">Registrar</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

@endsection

@section("js")
@endsection
