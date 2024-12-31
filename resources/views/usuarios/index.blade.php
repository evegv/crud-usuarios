@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
    @if (session('success'))
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div class="toast bg-success text-white" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    <div class="align-items-center mb-3 titulo-espaciado">
        LISTADO DE USUARIOS
    </div>
    <div class="d-grid justify-content-md-end">
        <a href="{{ route('usuarios.create') }}" class="btn btn-primary ">Crear Usuario
            <i class="fa-solid fa-plus"></i>
        </a>
    </div>
    <br>
    <table class="table " style="table-layout: fixed;">
        <thead class="table-light ">
            <tr>
                <th style="width: 16.6%;">Nombres</th>
                <th style="width: 16.6%;">Primer Apellido</th>
                <th style="width: 16.6%;">Segundo Apellido</th>
                <th style="width: 16.6%;">Correo Electronico</th>
                <th style="width: 16.6%;">Telefono</th>
                <th style="width: 16.6%;">Acciones</th>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($usuario as $user)
                <tr>
                    <td>{{ $user->names }}</td>
                    <td>{{ $user->first_lastname }}</td>
                    <td>{{ $user->second_lastname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>
                        <a href="{{ route('usuarios.show', $user->id_user) }}" class="btn btn-primary ">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('usuarios.edit', $user->id_user) }}" class="btn btn-primary ">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="{{ route('usuarios.destroy', $user->id_user) }}" method="POST"
                            style="display:inline-block;" onsubmit="return confirmDelete();">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-primary" type="submit">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $usuario->links('pagination::bootstrap-4') }}
    </div>
@endsection
<script>
    function confirmDelete() {
        return confirm('¿Estás seguro de que deseas eliminar este usuario?');
    }

    document.addEventListener('DOMContentLoaded', function() {
        var toastElement = document.querySelector('.toast');
        if (toastElement) {
            var toast = new bootstrap.Toast(toastElement);
            toast.show();

            setTimeout(function() {
                toast.hide();
            }, 2000); //2seg
        }
    });
</script>
