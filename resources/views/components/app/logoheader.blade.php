<div class="logo-header" data-background-color="blue">

    @if (auth()->user()->role=="admin")
    <a href="/admin" wire:navigate class="logo">
        <img src="{{ asset('dashboard/assets/img/logoyk3.png') }}" alt="navbar brand" class="navbar-brand">
    </a>
    @endif
    @if (auth()->user()->role=="pemilik")
    <a href="/pemilik" wire:navigate class="logo">
        <img src="{{ asset('dashboard/assets/img/logoyk3.png') }}" alt="navbar brand" class="navbar-brand">
    </a>
    @endif
    @if (auth()->user()->role=="manajer")
    <a href="/manajer" wire:navigate class="logo">
        <img src="{{ asset('dashboard/assets/img/logoyk3.png') }}" alt="navbar brand" class="navbar-brand">
    </a>
    @endif
    @if (auth()->user()->role=="divisi")
    <a href="/divisi" wire:navigate class="logo">
        <img src="{{ asset('dashboard/assets/img/logoyk3.png') }}" alt="navbar brand" class="navbar-brand">
    </a>
    @endif
    <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
            <i class="icon-menu"></i>
        </span>
    </button>
    <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
    <div class="nav-toggle">
        <button class="btn btn-toggle toggle-sidebar">
            <i class="icon-menu"></i>
        </button>
    </div>
</div>
