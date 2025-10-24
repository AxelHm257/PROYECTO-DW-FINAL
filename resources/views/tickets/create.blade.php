@extends('layouts.app')

@section('title', 'Crear Ticket')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4><i class="fas fa-plus me-2"></i>Crear Nuevo Ticket</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('tickets.store') }}">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Título del Ticket</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title') }}" required autofocus>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="priority" class="form-label">Prioridad</label>
                        <select class="form-select @error('priority') is-invalid @enderror" 
                                id="priority" name="priority" required>
                            <option value="">Seleccionar Prioridad</option>
                            <option value="baja" {{ old('priority') === 'baja' ? 'selected' : '' }}>Baja</option>
                            <option value="media" {{ old('priority') === 'media' ? 'selected' : '' }}>Media</option>
                            <option value="alta" {{ old('priority') === 'alta' ? 'selected' : '' }}>Alta</option>
                            <option value="urgente" {{ old('priority') === 'urgente' ? 'selected' : '' }}>Urgente</option>
                        </select>
                        @error('priority')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción del Problema</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="6" required 
                                  placeholder="Describe detalladamente el problema que necesitas resolver...">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">
                            <i class="fas fa-info-circle me-1"></i>
                            Proporciona todos los detalles relevantes para que podamos ayudarte mejor.
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('tickets.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>Crear Ticket
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

