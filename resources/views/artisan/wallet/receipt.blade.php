<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: DejaVu Sans, sans-serif; color: #0B2545; font-size: 12px; }
        h1 { color: #0B2545; } .box { border: 1px solid #DDE3EA; padding: 16px; margin-top: 20px; }
        .row { padding: 7px 0; border-bottom: 1px solid #F8F9FA; } .label { color: #765F51; }
    </style>
</head>
<body>
    <img src="{{ public_path('images/artisanhub-pro-logo.jpg') }}" alt="ArtisanHub Pro" style="width:112px;height:112px;object-fit:cover;border-radius:12px">
    <h2>Justificatif de paiement</h2>
    <p class="label">Document n° {{ str_pad((string) $payment->id, 8, '0', STR_PAD_LEFT) }}</p>
    <div class="box">
        <div class="row"><span class="label">Artisan</span><br>{{ $artisan->name }}</div>
        <div class="row"><span class="label">Commande</span><br>{{ $payment->order->title }} (#{{ $payment->order_id }})</div>
        <div class="row"><span class="label">Date de paiement</span><br>{{ $payment->paid_at?->format('d/m/Y à H:i') ?? '—' }}</div>
        <div class="row"><span class="label">Montant brut</span><br>{{ number_format($payment->amount, 0, ',', ' ') }} XOF</div>
        <div class="row"><span class="label">Commission ({{ $payment->commissionLabel() }})</span><br>{{ number_format($payment->commission, 0, ',', ' ') }} XOF</div>
        <div class="row"><strong>Montant net artisan</strong><br><strong>{{ number_format($payment->net_amount, 0, ',', ' ') }} XOF</strong></div>
        <div class="row"><span class="label">Reversement</span><br>{{ $payment->reversed_at?->format('d/m/Y à H:i') ?? 'En attente' }}{{ $payment->fedapay_payout_id ? ' · '.$payment->fedapay_payout_id : '' }}</div>
    </div>
</body>
</html>
