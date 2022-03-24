@extends('adminlte::page')



@section('title', 'Editar Usuario')

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
    <h1>Editar Usuario</h1>
@stop

@section("content")
    <form action="/admin/users/{{ $user->id}}" method="POST" class="grabado">
    @csrf
    @method('PUT')
        <div class="m-0 row justify-content-center">
            <div class="col-md-10">
                <h1 class="text-center">DATOS DEL USUARIO</h1>
                <div class="card">
                    <div class="row card-body">
                        <div class="form-group col-md-12">
                            <label for="">NOMBRE COMPLETO</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" placeholder="Nombre Completo">

                                @error('name')
                                <br>
                                <div class="valida">*{{ $message }}</div>
                                <br>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label for="">EMAIL</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" placeholder="example@gmail.com">

                            @error('email')
                            <br>
                            <div class="valida">*{{ $message }}</div>
                            <br>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label for="">TIPO DE USUARIO</label>

                            @foreach($roles as $role)

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role" id="{{$role->id}}" value="{{$role->id}}">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        {{$role->name}}
                                    </label>
                                </div>
                                @endforeach


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
