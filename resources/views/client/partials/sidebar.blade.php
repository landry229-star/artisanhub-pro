<div class="sidebar-section-title">Principal</div>
<a href="{{ route('client.dashboard') }}" class="sidebar-link {{ request()->routeIs('client.dashboard') ? 'active' : '' }}">
    <i class="bi bi-speedometer2"></i> Tableau de bord
</a>
<a href="{{ route('client.orders.index') }}" class="sidebar-link {{ request()->routeIs('client.orders.*') ? 'active' : '' }}">
    <i class="bi bi-bag"></i> Mes commandes
</a>
<a href="{{ route('client.wallet.index') }}" class="sidebar-link {{ request()->routeIs('client.wallet.*') ? 'active' : '' }}">
    <i class="bi bi-receipt"></i> Mes paiements
</a>
<a href="{{ route('contacts.index') }}" class="sidebar-link {{ request()->routeIs('contacts.*') ? 'active' : '' }}">
    <i class="bi bi-people"></i> Mes contacts
</a>

<div class="sidebar-section-title mt-2">Mon compte</div>
<a href="{{ route('client.profile.edit') }}" class="sidebar-link {{ request()->routeIs('client.profile.*') ? 'active' : '' }}">
    <i class="bi bi-person-gear"></i> Mon profil
</a>
<a href="{{ route('client.favorites.index') }}" class="sidebar-link {{ request()->routeIs('client.favorites.*', 'favorites.*') ? 'active' : '' }}">
    <i class="bi bi-heart"></i> Mes favoris
</a>
<a href="{{ route('client.support.index') }}" class="sidebar-link {{ request()->routeIs('client.support.*') ? 'active' : '' }}">
    <i class="bi bi-life-preserver"></i> Support
</a>

<div class="sidebar-section-title mt-2">Découvrir</div>
<a href="{{ route('artisans.index') }}" class="sidebar-link {{ request()->routeIs('artisans.*', 'category.*', 'city.*') ? 'active' : '' }}">
    <i class="bi bi-search"></i> Explorer les artisans
</a>
