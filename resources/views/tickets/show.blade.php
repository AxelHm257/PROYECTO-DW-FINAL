@extends('layouts.app')

@section('title', 'Ver Ticket')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><i class="fas fa-ticket-alt me-2"></i>{{ $ticket->title }}</h2>
            <div>
                <a href="{{ route('tickets.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i>Volver
                </a>
                @if($ticket->canBeCancelled())
                    <form action="{{ route('tickets.cancel', $ticket) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger" 
                                onclick="return confirm('¿Estás seguro de cancelar este ticket?')">
                            <i class="fas fa-times me-1"></i>Cancelar Ticket
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-info-circle me-2"></i>Descripción del Problema</h5>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $ticket->description }}</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-info me-2"></i>Información del Ticket</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Estado:</strong>
                    <span class="badge bg-{{ $ticket->status === 'pendiente' ? 'warning' : ($ticket->status === 'en_proceso' ? 'info' : ($ticket->status === 'resuelto' ? 'success' : 'danger')) }} ms-2">
                        {{ ucfirst($ticket->status) }}
                    </span>
                </div>
                
                <div class="mb-3">
                    <strong>Prioridad:</strong>
                    <span class="badge bg-{{ $ticket->priority === 'baja' ? 'secondary' : ($ticket->priority === 'media' ? 'primary' : ($ticket->priority === 'alta' ? 'warning' : 'danger')) }} ms-2">
                        {{ ucfirst($ticket->priority) }}
                    </span>
                </div>
                
                <div class="mb-3">
                    <strong>Creado:</strong>
                    <span class="text-muted">{{ $ticket->created_at->format('d/m/Y H:i') }}</span>
                </div>
                
                <div class="mb-3">
                    <strong>Última actualización:</strong>
                    <span class="text-muted">{{ $ticket->updated_at->format('d/m/Y H:i') }}</span>
                </div>
                
                @if($ticket->assignedTo)
                <div class="mb-3">
                    <strong>Asignado a:</strong>
                    <span class="text-muted">{{ $ticket->assignedTo->name }}</span>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

