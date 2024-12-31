@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
    <div class="align-items-center mb-3 titulo-espaciado">
        CREAR UN USUARIO
    </div>
    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <div class="col-6">
                <label for="names" class="form-label">Nombres:</label>
                <input type="text" class="form-control" id="names" name="names" value="{{ old('names') }}" required>
                @error('names')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <label for="first_lastname" class="form-label">Primer Apellido:</label>
                <input type="text" class="form-control" id="first_lastname" name="first_lastname"
                    value="{{ old('first_lastname') }}" required>
                @error('first_lastname')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6">
                <label for="second_lastname" class="form-label">Segundo Apellido:</label>
                <input type="text" class="form-control" id="second_lastname" name="second_lastname"
                    value="{{ old('second_lastname') }}" required>
                @error('second_lastname')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <div class="col-6">
                <label for="email" class="form-label">Correo Electronico:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                    required>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <div class="col-6">
                <label for="phone" class="form-label">Telefono:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}"
                    required>
                @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-success">Crear <i class="fa-solid fa-check"></i></button>
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar <i
                    class="fa-solid fa-xmark"></i></a>
        </div>
    </form>
@endsection
