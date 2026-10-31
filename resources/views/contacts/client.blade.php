@extends('layouts.dashboard')
@section('title', 'Mes contacts')
@section('page-title', 'Mes contacts')

@section('sidebar-nav')
    @include('client.partials.sidebar')
@endsection

@section('content')

@if($pendingDeliveries->isNotEmpty() && $livreurs->isNotEmpty())
    <div class="mb-4 content-card">
        <h5 class="mb-1 fw-700"><i class="bi bi-truck me-2 text-clay"></i>Livraison en attente d'un livreur</h5>
        <p class="mb-3 text-muted" style="font-size:.85rem">
            Vous pouvez demander directement un livreur déjà connu plutôt que d'attendre l'attribution automatique.
        </p>
        @foreach($pendingDeliveries as $delivery)
            <div class="p-3 mb-2 rounded" style="background:#F8F9FA">
                <div class="mb-2 fw-600">Commande #{{ $delivery->order_id }} — {{ $delivery->order->title }}</div>
                <div class="gap-2 d-flex flex-wrap">
                    @foreach($livreurs as $l)
                        <form action="{{ route('client.deliveries.request-livreur', [$delivery, $l]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-clay">
                                <i class="bi bi-telephone me-1"></i>Appeler {{ $l->name }}
                            </button>
                        </form>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endif

<div class="row g-4">
    <div class="col-md-6">
        <div class="content-card">
            <h5 class="mb-3 fw-700"><i class="bi bi-tools me-2 text-clay"></i>Artisans déjà sollicités</h5>
            @forelse($artisans as $a)
                <div class="gap-3 py-2 d-flex align-items-center" style="border-bottom:1px solid #DDE3EA">
                    <img src="{{ $a->avatarUrl() }}" class="rounded-circle" width="44" height="44" style="object-fit:cover">
                    <div class="flex-grow-1">
                        <div class="fw-600">{{ $a->name }}</div>
                        <div class="text-muted" style="font-size:.78rem">📍 {{ $a->city }}</div>
                    </div>
                    <a href="{{ route('artisans.show', $a) }}" class="btn btn-sm btn-outline-clay">Voir le profil</a>
                </div>
            @empty
                <p class="mb-0 text-muted" style="font-size:.85rem">Aucun artisan sollicité pour le moment.</p>
            @endforelse
        </div>
    </div>
    <div class="col-md-6">
        <div class="content-card">
            <h5 class="mb-3 fw-700"><i class="bi bi-bicycle me-2 text-clay"></i>Livreurs déjà sollicités</h5>
            @forelse($livreurs as $l)
                <div class="gap-3 py-2 d-flex align-items-center" style="border-bottom:1px solid #DDE3EA">
                    <img src="{{ $l->avatarUrl() }}" class="rounded-circle" width="44" height="44" style="object-fit:cover">
                    <div class="flex-grow-1">
                        <div class="fw-600">{{ $l->name }}</div>
                        <div class="text-muted" style="font-size:.78rem">📍 {{ $l->city }}
                            @if($l->phone) · 📞 {{ $l->phone }} @endif
                        </div>
                    </div>
                </div>
            @empty
                <p class="mb-0 text-muted" style="font-size:.85rem">Aucun livreur sollicité pour le moment.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
