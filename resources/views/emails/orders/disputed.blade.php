@extends('emails.layout')
@section('content')
<div class="title">Litige signalé — intervention requise ⚠️</div>
<div class="subtitle">Un litige a été ouvert sur une commande</div>

<p>Bonjour <strong>Admin ArtisanHub Pro</strong>,</p>
<p>
    Un litige vient d'être signalé. Veuillez intervenir dans les <strong>48 heures</strong>.
</p>

<div class="info-box">
    <div class="info-row">
        <span class="info-label">Commande #</span>
        <span class="info-value">{{ $order->id }}</span>
    </div>
    <div class="info-row">
        <span class="info-label">Titre</span>
        <span class="info-value">{{ $order->title }}</span>
    </div>
    <div class="info-row">
        <span class="info-label">Client</span>
        <span class="info-value">{{ $order->client->name }}</span>
    </div>
    <div class="info-row">
        <span class="info-label">Artisan</span>
        <span class="info-value">{{ $order->artisan->name }}</span>
    </div>
    @if($order->budget)
    <div class="info-row">
        <span class="info-label">Montant en jeu</span>
        <span class="info-value" style="color:#0B2545">{{ number_format($order->budget,0,',',' ') }} XOF</span>
    </div>
    @endif
</div>

<a href="{{ route('admin.orders.index') }}?status=litige" class="btn">
    Arbitrer le litige →
</a>
@endsection
