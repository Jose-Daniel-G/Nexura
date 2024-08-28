                        <!-- Modal Edit -->
                        <div class="modal fade" id="editModal-{{ $empleado->id }}" tabindex="-1"
                            aria-labelledby="editModalLabel-{{ $empleado->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg"> <!-- Cambia 'modal-lg' a 'modal-xl' para tamaño extra grande -->                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel-{{ $empleado->id }}">Editar Empleado</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="mb-3">
                                                <label for="nombre-{{ $empleado->id }}" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" id="nombre-{{ $empleado->id }}"
                                                    name="nombre" value="{{ $empleado->nombre }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email-{{ $empleado->id }}" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email-{{ $empleado->id }}"
                                                    name="email" value="{{ $empleado->email }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Sexo</label>
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" id="sexo-m" name="sexo"
                                                        value="M" {{ $empleado->sexo === 'M' ? 'checked' : '' }} required>
                                                    <label class="form-check-label" for="sexo-m">Masculino</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" id="sexo-f" name="sexo"
                                                        value="F" {{ $empleado->sexo === 'F' ? 'checked' : '' }} required>
                                                    <label class="form-check-label" for="sexo-f">Femenino</label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="area-{{ $empleado->id }}" class="form-label">Área</label>
                                                <select class="form-select" id="area-{{ $empleado->id }}" name="area_id"
                                                    required>
                                                    <option selected>Open this select menu</option>
                                                    @foreach ($areas as $area)
                                                        <option value="{{ $area->id }}"
                                                            {{ $empleado->area_id == $area->id ? 'selected' : '' }}>
                                                            {{ $area->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-group">
                                                    <label for="descripcion-{{ $empleado->id }}"
                                                        class="form-label">Descripción</label>
                                                    <textarea class="form-control" id="descripcion-{{ $empleado->id }}" name="descripcion" rows="3" required>{{ $empleado->descripcion }}</textarea>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-group form-check">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="boletin-{{ $empleado->id }}" name="boletin" value="1"
                                                        {{ $empleado->boletin ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="boletin-{{ $empleado->id }}">Deseo
                                                        recibir boletín informativo</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Rol</label>
                                                @foreach ($roles as $role)
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="role_{{ $role->id }}" name="roles[]"
                                                            value="{{ $role->id }}"
                                                            {{ in_array($role->id, $empleado->roles->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="role_{{ $role->id }}">{{ $role->nombre }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>