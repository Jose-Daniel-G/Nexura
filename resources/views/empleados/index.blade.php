@extends('layouts.app') <!-- Asegúrate de tener un layout base -->

@section('content')
    <div class="container">
        <h1>Listado de Empleados</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <!-- Botón Crear -->
        <!-- Botón Crear alineado a la izquierda -->
        <div class="text-end mb-3">
            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal"> --}}
            <a href="{{ route('empleados.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-user-plus"></i>
            </a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Sexo</th>
                    <th>Área</th>
                    <th>Descripción</th>
                    <th>Boletín</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->id }}</td>
                        <td>{{ $empleado->nombre }}</td>
                        <td>{{ $empleado->email }}</td>
                        <td>{{ $empleado->sexo === 'M' ? 'Masculino' : 'Femenino' }}</td>
                        <td>{{ $empleado->area->nombre ?? 'No asignada' }}</td>
                        <td>{{ $empleado->descripcion }}</td>
                        <td>{{ $empleado->boletin ? 'Sí' : 'No' }}</td>
                        <td>
                            <!-- Botón para abrir el modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editModal-{{ $empleado->id }}">
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modal-{{ $empleado->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>

                    <!-- Incluye los modales -->
                    @include('empleados.modals.delete_modal', ['empleado' => $empleado])
                    @include('empleados.modals.edit_modal', ['empleado' => $empleado,'areas' => $areas,'roles' => $roles,])
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
