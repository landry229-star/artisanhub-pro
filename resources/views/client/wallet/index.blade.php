@extends('layouts.dashboard')
@section('title', 'Mes paiements')
@section('page-title', 'Mes paiements')

@section('sidebar-nav')
    @include('client.partials.sidebar')
@endsection

@section('content')
<div class="mb-4 content-card">
    <div class="flex-wrap gap-3 d-flex justify-content-between align-items-center">
        <div>
            <p class="mb-1 section-label">HISTORIQUE FINANCIER</p>
            <h4 class="mb-1 fw-700">Mes paiements</h4>
            <p class="mb-0 text-muted">Total payé : <strong>{{ number_format($totalSpent, 0, ',', ' ') }} XOF</strong></p>
        </div>
        <a href="{{ route('client.wallet.statement') }}" class="btn btn-clay">
            <i class="bi bi-file-earmark-pdf me-1"></i>Relevé PDF
        </a>
    </div>
</div>

<div class="content-card">
    @forelse($payments as $payment)
        <div class="flex-wrap gap-3 py-3 border-bottom d-flex align-items-center" style="border-color:#F8F9FA!important">
            <div class="flex-grow-1">
                <div class="fw-600">{{ $payment->order->title }}</div>
                <div class="text-muted small">
                    Artisan : {{ $payment->order->artisan->name }} ·
                    {{ $payment->paid_at?->format('d/m/Y à H:i') ?? '—' }}
                </div>
            </div>
            <div class="text-end">
                <div class="fw-700 text-clay">{{ number_format($payment->amount, 0, ',', ' ') }} XOF</div>
                @php
                    $refundLabels = ['requested' => 'Remboursement demandé', 'pending' => 'Remboursement en cours', 'sent' => 'Remboursement réussi', 'completed' => 'Remboursement réussi', 'failed' => 'Remboursement échoué'];
                @endphp
                <div class="text-muted small">
                    {{ $payment->refund_status ? ($refundLabels[$payment->refund_status] ?? $payment->refund_status) : ($payment->status === 'refunded' ? 'Remboursé' : 'Payé') }}
                </div>
                @if($payment->refund_status)
                    <div class="small text-muted">
                        {{ ($payment->refunded_at ?? $payment->refund_requested_at)?->format('d/m/Y à H:i') ?? 'Date non renseignée' }}
                        @if($payment->fedapay_payout_id) · Réf. {{ $payment->fedapay_payout_id }} @endif
                    </div>
                @endif
                <a href="{{ route('client.wallet.receipt', $payment) }}" class="small text-clay">Facture PDF</a>
            </div>
        </div>
    @empty
        <p class="py-4 mb-0 text-center text-muted">Aucun paiement enregistré.</p>
    @endforelse
    <div class="mt-3">{{ $payments->links() }}</div>
</div>
@endsection
