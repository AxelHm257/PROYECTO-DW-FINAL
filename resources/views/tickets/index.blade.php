@extends('layouts.app')

@section('title', 'Mis Tickets')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><i class="fas fa-ticket-alt me-2"></i>Mis Tickets</h2>
            <a href="{{ route('tickets.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i>Nuevo Ticket
            </a>
        </div>
    </div>
</div>

@if($tickets->count() > 0)
    <div class="row">
        @foreach($tickets as $ticket)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">{{ Str::limit($ticket->title, 30) }}</h6>
                    <span class="badge bg-{{ $ticket->status === 'pendiente' ? 'warning' : ($ticket->status === 'en_proceso' ? 'info' : ($ticket->status === 'resuelto' ? 'success' : 'danger')) }}">
                        {{ ucfirst($ticket->status) }}
                    </span>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ Str::limit($ticket->description, 100) }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge bg-{{ $ticket->priority === 'baja' ? 'secondary' : ($ticket->priority === 'media' ? 'primary' : ($ticket->priority === 'alta' ? 'warning' : 'danger')) }}">
                            {{ ucfirst($ticket->priority) }}
                        </span>
                        <small class="text-muted">{{ $ticket->created_at->format('d/m/Y') }}</small>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('tickets.show', $ticket) }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-eye me-1"></i>Ver
                        </a>
                        @if($ticket->canBeCancelled())
                            <form action="{{ route('tickets.cancel', $ticket) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger" 
                                        onclick="return confirm('¿Estás seguro de cancelar este ticket?')">
                                    <i class="fas fa-times me-1"></i>Cancelar
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@else
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center py-5">
                    <i class="fas fa-ticket-alt fa-4x text-muted mb-4"></i>
                    <h4 class="text-muted">No tienes tickets aún</h4>
                    <p class="text-muted">Crea tu primer ticket para comenzar a gestionar tus solicitudes</p>
                    <a href="{{ route('tickets.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i>Crear Primer Ticket
                    </a>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection

