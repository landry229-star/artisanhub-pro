<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: DejaVu Sans, sans-serif; color: #0B2545; font-size: 11px; }
        h1 { color: #0B2545; margin-bottom: 4px; }
        .muted { color: #765F51; }
        table { width: 100%; border-collapse: collapse; margin-top: 22px; }
        th, td { border-bottom: 1px solid #DDE3EA; padding: 8px 5px; text-align: left; }
        th { background: #F8F9FA; }
        .right { text-align: right; }
    </style>
</head>
<body>
    <img src="{{ public_path('images/artisanhub-pro-logo.jpg') }}" alt="ArtisanHub Pro" style="width:112px;height:112px;object-fit:cover;border-radius:12px">
    <h2>Relevé financier</h2>
    <p class="muted">{{ $artisan->name }} · édité le {{ now()->format('d/m/Y à H:i') }}</p>
    <table>
        <thead><tr><th>Date</th><th>Commande</th><th>Statut</th><th class="right">Brut</th><th class="right">Commission</th><th class="right">Net</th><th>Reversement</th></tr></thead>
        <tbody>
        @forelse($payments as $payment)
            <tr>
                <td>{{ $payment->paid_at?->format('d/m/Y') ?? '—' }}</td>
                <td>{{ $payment->order->title }}</td>
                <td>{{ $payment->status === 'refunded' ? 'Remboursé' : 'Payé' }}</td>
                <td class="right">{{ number_format($payment->amount, 0, ',', ' ') }} XOF</td>
                <td class="right">{{ number_format($payment->commission, 0, ',', ' ') }} XOF</td>
                <td class="right">{{ number_format($payment->net_amount, 0, ',', ' ') }} XOF</td>
                <td>{{ $payment->reversed_at?->format('d/m/Y') ?? 'En attente' }}</td>
            </tr>
        @empty
            <tr><td colspan="7">Aucun paiement enregistré.</td></tr>
        @endforelse
        </tbody>
    </table>
</body>
</html>
