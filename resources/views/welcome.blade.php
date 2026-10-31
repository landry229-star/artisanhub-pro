@extends('layouts.app')
@section('title', 'Artisans qualifiés au Bénin')
@section('meta_description', "Trouvez un artisan qualifié près de chez vous au Bénin : poterie, menuiserie, couture, bijouterie. Devis gratuit, prix négocié, garantie satisfait ou repris sur ArtisanHub Pro.")

@push('head')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@type": "Organization",
    "name": "ArtisanHub Pro",
    "url": "{{ url('/') }}",
    "logo": "{{ asset('images/hero-artisans.png') }}",
    "description": "Plateforme de mise en relation entre particuliers et artisans qualifiés au Bénin.",
    "areaServed": {
        "@type": "Country",
        "name": "Bénin"
    }
}
</script>
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@type": "WebSite",
    "name": "ArtisanHub Pro",
    "url": "{{ url('/') }}",
    "potentialAction": {
        "@type": "SearchAction",
        "target": "{{ route('artisans.index') }}?q={search_term_string}",
        "query-input": "required name=search_term_string"
    }
}
</script>
@endpush

@push('styles')
<style>
    .trust-stats {
        align-items: stretch;
    }
    .trust-stat-card {
        display: flex;
        height: 100%;
        min-height: 132px;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 1rem .75rem;
        border: 1px solid rgba(255,255,255,.12);
        border-radius: 14px;
        background: rgba(255,255,255,.06);
    }
    .trust-stat-icon {
        margin-bottom: .35rem;
        color: #FF6B35;
        font-size: 1.15rem;
        line-height: 1;
    }
    .trust-stat-value {
        color: #fff;
        font-size: clamp(1.65rem, 3vw, 2rem);
        font-weight: 700;
        line-height: 1.15;
    }
    .trust-stat-label {
        margin-top: .35rem;
        color: #CBD5E1;
        font-size: .82rem;
        line-height: 1.35;
    }
    .presentation-video {
        display: block;
        width: 100%;
        border-radius: 16px;
        background: #0B2545;
        box-shadow: 0 16px 40px rgba(11,37,69,.18);
    }
    @media (max-width: 575.98px) {
        .trust-stat-card {
            min-height: 120px;
            padding: .8rem .55rem;
        }
        .trust-stat-label {
            font-size: .76rem;
        }
    }

    .hero-photo {
        position: relative;
        overflow: hidden;
        padding: 110px 0 88px;
        isolation: isolate;
    }
    .hero-photo-img {
        position: absolute;
        inset: 0;
        z-index: -2;
        width: 100%;
        height: 100%;
        object-fit: cover;
        animation: ah-kenburns 22s ease-in-out infinite alternate;
        will-change: transform;
    }
    @keyframes ah-kenburns {
        0%   { transform: scale(1) translate(0, 0); }
        100% { transform: scale(1.12) translate(-1.5%, 1%); }
    }

    /* Voile dégradé aux couleurs du site pour la lisibilité du texte */
    .hero-overlay {
        position: absolute;
        inset: 0;
        z-index: -1;
        background: linear-gradient(135deg, rgba(11,37,69,.82) 0%, rgba(92,61,30,.72) 55%, rgba(158,74,30,.62) 100%);
    }

    @media (prefers-reduced-motion: reduce) {
        .hero-photo-img { animation: none !important; transform: none !important; }
    }
</style>
@endpush

@section('content')
<div class="hero-photo">
    <img class="hero-photo-img" src="{{ asset('images/hero-artisans.png') }}" alt="Artisans béninois au travail — poterie, tissage, menuiserie">
    <div class="hero-overlay"></div>

    <div class="container text-center">
        <h1 style="font-family:'Playfair Display',serif;font-size:clamp(2rem,5vw,3.2rem);color:#fff;font-weight:800;line-height:1.15;max-width:680px;margin:0 auto 20px">
            L'artisanat béninois,<br><span style="color:#FF6B35">au bout des doigts.</span>
        </h1>
        <p style="color:#CBD5E1;font-size:1rem;max-width:480px;margin:0 auto 36px">
            Connectez-vous aux meilleurs artisans du Bénin. Commandez sur mesure, directement à la source.
        </p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="{{ route('artisans.index') }}" class="btn btn-clay px-4 py-2">
                <i class="bi bi-search me-2"></i>Trouver un artisan
            </a>
            <a href="{{ route('register') }}" class="btn btn-outline-light px-4 py-2">
                <i class="bi bi-person-plus me-2"></i>S'inscrire gratuitement
            </a>
        </div>
    </div>
</div>

<section class="py-5" style="background:#FFFFFF" aria-labelledby="presentation-title">
    <div class="container">
        <p class="text-center mb-1" style="color:#0B2545;font-size:.75rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase">
            DÉCOUVREZ ARTISANHUB PRO
        </p>
        <h2 id="presentation-title" class="text-center mb-2" style="font-family:'Playfair Display',serif;font-size:1.75rem">
            Le savoir-faire local, en confiance
        </h2>
        <p class="text-center text-muted mb-4">
            Découvrez comment trouver un artisan et concrétiser votre projet.
        </p>
        <div class="mx-auto" style="max-width:900px">
            <video class="presentation-video" controls playsinline preload="metadata"
                   poster="{{ asset('videos/presentation-artisanhub-pro-poster.jpg') }}?v=2"
                   aria-label="Vidéo de présentation d’ArtisanHub Pro">
                <source src="{{ asset('videos/presentation-artisanhub-pro.mp4') }}?v=2" type="video/mp4">
                Votre navigateur ne prend pas en charge la lecture vidéo.
                <a href="{{ asset('videos/presentation-artisanhub-pro.mp4') }}?v=2">Télécharger la vidéo de présentation</a>.
            </video>
        </div>
    </div>
</section>

<div class="py-5" style="background:#F8F9FA">
    <div class="container">
        <p style="color:#0B2545;font-size:.75rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase" class="text-center mb-1">EXPLORER</p>
        <h2 style="font-family:'Playfair Display',serif;font-size:1.6rem;text-align:center" class="mb-4">Toutes les spécialités</h2>
        <div class="row g-3">
            @foreach(config('artisanhub.categories') as $key => $cat)
                <div class="col-6 col-md-3">
                    <a href="{{ route('artisans.index', ['category'=>$key]) }}"
                       class="card p-3 text-center text-decoration-none h-100">
                        <div style="font-size:2rem">{{ $cat['icon'] }}</div>
                        <div class="fw-700 mt-1" style="color:#0B2545">{{ $cat['label'] }}</div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="py-5 text-center">
    <div class="container">
        <h2 style="font-family:'Playfair Display',serif;font-size:1.8rem" class="mb-3">Prêt à démarrer ?</h2>
        <p class="text-muted mb-4">Inscription gratuite. Aucune commission sur les 3 premières commandes.</p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="{{ route('register') }}" class="btn btn-clay px-4 py-2">
                <i class="bi bi-tools me-2"></i>Je suis artisan
            </a>
            <a href="{{ route('artisans.index') }}" class="btn btn-outline-clay px-4 py-2">
                <i class="bi bi-search me-2"></i>Je cherche un artisan
            </a>
        </div>
    </div>
</div>



{{-- ── CONFIANCE : paliers + fonds de garantie (notre vrai différenciateur) ── --}}
<div class="py-5" style="background:#0B2545">
    <div class="container">
        <p style="color:#FF6B35;font-size:.75rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase" class="text-center mb-1">POURQUOI ARTISANHUB PRO</p>
        <h2 style="font-family:'Playfair Display',serif;font-size:1.6rem;color:#fff;text-align:center" class="mb-4">
            Une confiance qui se mesure, pas qui se déclare
        </h2>

        <div class="row g-3 text-center mb-4 trust-stats">
            <div class="col-6 col-md-3">
                <div class="trust-stat-card">
                    <i class="bi bi-people-fill trust-stat-icon" aria-hidden="true"></i>
                    <div class="trust-stat-value">{{ $trust['artisans_actifs'] }}</div>
                    <div class="trust-stat-label">Artisans actifs</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="trust-stat-card">
                    <i class="bi bi-award-fill trust-stat-icon" aria-hidden="true"></i>
                    <div class="trust-stat-value">{{ $trust['artisans_experts'] }}</div>
                    <div class="trust-stat-label">Palier Expert</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="trust-stat-card">
                    <i class="bi bi-patch-check-fill trust-stat-icon" aria-hidden="true"></i>
                    <div class="trust-stat-value">{{ $trust['artisans_verifies'] }}</div>
                    <div class="trust-stat-label">Identités vérifiées</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="trust-stat-card">
                    <i class="bi bi-clipboard2-check-fill trust-stat-icon" aria-hidden="true"></i>
                    <div class="trust-stat-value">{{ $trust['garanties_traitees'] }}</div>
                    <div class="trust-stat-label">Réclamations traitées</div>
                </div>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-4">
                <div class="p-3 rounded-3 h-100" style="background:rgba(255,255,255,.06)">
                    <div style="font-size:1.5rem">🥉🥈🥇</div>
                    <h6 class="fw-700 mt-2 mb-1" style="color:#fff">Paliers de confiance</h6>
                    <p class="mb-0" style="font-size:.82rem;color:#CBD5E1">
                        Débutant → Confirmé → Expert, calculé à partir des commandes terminées,
                        de la note moyenne et du taux de litige — pas d'un simple badge acheté.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 rounded-3 h-100" style="background:rgba(255,255,255,.06)">
                    <div style="font-size:1.5rem">🛡️</div>
                    <h6 class="fw-700 mt-2 mb-1" style="color:#fff">Garantie satisfait ou repris</h6>
                    <p class="mb-0" style="font-size:.82rem;color:#CBD5E1">
                        Les artisans Expert vérifiés (pièce d'identité + téléphone confirmés)
                        cotisent à un fonds de garantie qui vous couvre en cas de litige.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 rounded-3 h-100" style="background:rgba(255,255,255,.06)">
                    <div style="font-size:1.5rem">💬</div>
                    <h6 class="fw-700 mt-2 mb-1" style="color:#fff">Prix négocié, pas imposé</h6>
                    <p class="mb-0" style="font-size:.82rem;color:#CBD5E1">
                        Faites une offre, l'artisan peut contre-proposer — comme dans la vraie vie,
                        avant tout engagement de paiement.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
