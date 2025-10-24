@extends('layouts.app')

@section('title', 'Editar Perfil')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4><i class="fas fa-edit me-2"></i>Editar Perfil</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Nombre Completo</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="department" class="form-label">Departamento</label>
                            <input type="text" class="form-control" 
                                   value="{{ $user->department ? $user->department->name : 'No asignado' }}" 
                                   readonly>
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>
                                El departamento no puede ser modificado.
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="position" class="form-label">Puesto</label>
                            <input type="text" class="form-control" 
                                   value="{{ $user->position ?: 'No especificado' }}" 
                                   readonly>
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>
                                El puesto no puede ser modificado.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="photo" class="form-label">Foto de Perfil</label>
                        <input type="file" class="form-control @error('photo') is-invalid @enderror" 
                               id="photo" name="photo" accept="image/*">
                        @error('photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">
                            <i class="fas fa-info-circle me-1"></i>
                            Formatos permitidos: JPG, PNG, GIF. Tamaño máximo: 2MB.
                        </div>
                        
                        @if($user->photo)
                            <div class="mt-2">
                                <strong>Foto actual:</strong>
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $user->photo) }}" alt="Foto actual" 
                                         class="rounded" style="width: 100px; height: 100px; object-fit: cover;">
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('profile.show') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

