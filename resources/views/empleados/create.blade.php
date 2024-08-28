@extends('layouts.app') <!-- Asegúrate de tener un layout base -->

@section('content')
    <!-- Main Content -->
    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" action="{{ route('empleados.store') }}">
                    @csrf <!-- Genera el token CSRF -->
                    @if (session('success'))
                        <h6 class="alert alert-success">{{ session('success') }}</h6>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Los campos con asteriscos (*) son obligatorios</strong>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="nombre">Nombre Completo *</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            placeholder="Ingrese su nombre completo">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico *</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Ingrese su correo electrónico">
                    </div>
                    <div class="form-group">
                        <label>Sexo *</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexo" id="sexoMasculino" value="M">
                            <label class="form-check-label" for="sexoMasculino">Masculino</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexo" id="sexoFemenino" value="F">
                            <label class="form-check-label" for="sexoFemenino">Femenino</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="area">Área *</label>
                        <select class="form-select" id="area_id" name="area_id">
                            <option value="">Seleccione una opción</option>
                            @foreach ($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción *</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="boletin" name="boletin" value="1"
                            {{ old('boletin') ? 'checked' : '' }}>
                        <label class="form-check-label" for="boletin">Deseo recibir boletín informativo</label>
                    </div>
                    <div class="form-group">
                        <label>Roles *</label>
                        @foreach ($roles as $role)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="role_{{ $role->id }}" name="roles[]"
                                    value="{{ $role->id }}"
                                    {{ in_array($role->id, old('roles', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="role_{{ $role->id }}">{{ $role->nombre }}</label>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </main>
@endsection
