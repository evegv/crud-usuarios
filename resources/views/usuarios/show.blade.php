@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
    <div class="align-items-center mb-3 titulo-espaciado">
        VER USUARIO
    </div>
    <form>
        <div class="mb-3">
            <div class="col-6">
                <label for="names" class="form-label">Nombres</label>
                <input type="text" class="form-control" id="names" name="names" value="{{ $usuario->names }}" disabled>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <label for="first_lastname" class="form-label">Primer Apellido</label>
                <input type="text" class="form-control" id="first_lastname" name="first_lastname"
                    value="{{ $usuario->first_lastname }}" disabled>
            </div>
            <div class="col-6">
                <label for="second_lastname" class="form-label">Segundo Apellido</label>
                <input type="text" class="form-control" id="second_lastname" name="second_lastname"
                    value="{{ $usuario->second_lastname }}" disabled>
            </div>
        </div>
        <div class="mb-3">
            <div class="col-6">
                <label for="email" class="form-label">Correo Electronico</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $usuario->email }}"
                    disabled>
            </div>
        </div>
        <div class="mb-3">
            <div class="col-6">
                <label for="phone" class="form-label">Telefono</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $usuario->phone }}"
                    disabled>
            </div>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Volver <i class="fa-solid fa-house"></i></a>
        </div>
    </form>
@endsection
