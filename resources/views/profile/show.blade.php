@extends('layouts.app')

@section('title', 'Mi Perfil')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><i class="fas fa-user me-2"></i>Mi Perfil</h2>
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                <i class="fas fa-edit me-1"></i>Editar Perfil
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                @if($user->photo)
                    <img src="{{ asset('storage/' . $user->photo) }}" alt="Foto de perfil" 
                         class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                @else
                    <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center mb-3 mx-auto" 
                         style="width: 150px; height: 150px;">
                        <i class="fas fa-user fa-3x text-white"></i>
                    </div>
                @endif
                <h4>{{ $user->name }}</h4>
                <p class="text-muted">{{ $user->email }}</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-info-circle me-2"></i>Información Personal</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <strong>Nombre Completo:</strong>
                        <p class="text-muted">{{ $user->name }}</p>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <strong>Correo Electrónico:</strong>
                        <p class="text-muted">{{ $user->email }}</p>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <strong>Departamento:</strong>
                        <p class="text-muted">{{ $user->department ? $user->department->name : 'No asignado' }}</p>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <strong>Puesto:</strong>
                        <p class="text-muted">{{ $user->position ?: 'No especificado' }}</p>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <strong>Miembro desde:</strong>
                        <p class="text-muted">{{ $user->created_at->format('d/m/Y') }}</p>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <strong>Total de Tickets:</strong>
                        <p class="text-muted">{{ $user->tickets->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card mt-4">
            <div class="card-header">
                <h5><i class="fas fa-chart-bar me-2"></i>Estadísticas de Tickets</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 text-center">
                        <div class="border rounded p-3">
                            <h3 class="text-warning">{{ $user->tickets->where('status', 'pendiente')->count() }}</h3>
                            <p class="text-muted mb-0">Pendientes</p>
                        </div>
                    </div>
                    
                    <div class="col-md-3 text-center">
                        <div class="border rounded p-3">
                            <h3 class="text-info">{{ $user->tickets->where('status', 'en_proceso')->count() }}</h3>
                            <p class="text-muted mb-0">En Proceso</p>
                        </div>
                    </div>
                    
                    <div class="col-md-3 text-center">
                        <div class="border rounded p-3">
                            <h3 class="text-success">{{ $user->tickets->where('status', 'resuelto')->count() }}</h3>
                            <p class="text-muted mb-0">Resueltos</p>
                        </div>
                    </div>
                    
                    <div class="col-md-3 text-center">
                        <div class="border rounded p-3">
                            <h3 class="text-danger">{{ $user->tickets->where('status', 'cancelado')->count() }}</h3>
                            <p class="text-muted mb-0">Cancelados</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

