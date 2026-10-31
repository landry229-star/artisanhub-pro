<!doctype html>
<html lang="fr"><head><meta charset="utf-8"><style>
body{font-family:DejaVu Sans,sans-serif;color:#0B2545;font-size:12px}h1{color:#0B2545}.box{border:1px solid #DDE3EA;padding:16px;margin-top:20px}.row{padding:8px 0;border-bottom:1px solid #F8F9FA}.muted{color:#765F51}
</style></head><body>
<img src="{{ public_path('images/artisanhub-pro-logo.jpg') }}" alt="ArtisanHub Pro" style="width:112px;height:112px;object-fit:cover;border-radius:12px"><h2>Facture / justificatif de paiement</h2><p class="muted">Document n° {{ str_pad((string)$payment->id,8,'0',STR_PAD_LEFT) }}</p>
<div class="box"><div class="row"><span class="muted">Client</span><br>{{ $client->name }}</div>
<div class="row"><span class="muted">Artisan</span><br>{{ $payment->order->artisan->name }}</div>
<div class="row"><span class="muted">Commande</span><br>{{ $payment->order->title }} (#{{ $payment->order_id }})</div>
<div class="row"><span class="muted">Date</span><br>{{ $payment->paid_at?->format('d/m/Y à H:i') ?? '—' }}</div>
<div class="row"><strong>Montant payé</strong><br><strong>{{ number_format($payment->amount,0,',',' ') }} XOF</strong></div>
<div class="row"><span class="muted">Statut</span><br>{{ $payment->status === 'refunded' ? 'Remboursé' : 'Paiement confirmé' }}</div></div>
</body></html>
