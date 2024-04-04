<header class="ud-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="/" wire:navigate>
                        <img src="{{ asset('landingpage/images/logo/logoyk2.png') }}" alt="Logo" />
                    </a>
                    <button class="navbar-toggler">
                        <span class="toggler-icon"> </span>
                        <span class="toggler-icon"> </span>
                        <span class="toggler-icon"> </span>
                    </button>

                    <div class="navbar-collapse">
                        <ul id="nav" class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a href="/" wire:navigate
                                    class="nav-link {{ request()->is('') ? 'active' : '' }}">Beranda</a>
                            </li>
                            <li class="nav-item nav-item-has-children">
                                <a href="javascript:void(0)"> Layanan </a>
                                <ul class="ud-submenu">
                                    <li class="ud-submenu-item">
                                        <a href="/company_profile" wire:navigate class="ud-submenu-link">
                                            Company Profile
                                        </a>
                                    </li>
                                    <li class="ud-submenu-item">
                                        <a href="/toko_online" wire:navigate class="ud-submenu-link">
                                            Toko Online
                                        </a>
                                    </li>
                                    <li class="ud-submenu-item">
                                        <a href="/custom_website" wire:navigate class="ud-submenu-link">
                                            Custom Website
                                        </a>
                                    </li>
                                    <li class="ud-submenu-item">
                                        <a href="/custom_aplikasi" wire:navigate class="ud-submenu-link">
                                            Custom Aplikasi
                                        </a>
                                    </li>
                                    <li class="ud-submenu-item">
                                        <a href="/skripsi_tesis" wire:navigate class="ud-submenu-link">
                                            Skripsi atau Tesis
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="/harga" wire:navigate
                                    class="nav-link {{ request()->is('harga') ? 'active' : '' }} ">Harga</a>
                            </li>
                            <li class="nav-item">
                                <a href="/portofolio" wire:navigate
                                    class="nav-link {{ request()->is('portofolio') ? 'active' : '' }} ">Portofolio</a>
                            </li>
                            <li class="nav-item">
                                <a href="/tentang" wire:navigate
                                    class="nav-link {{ request()->is('tentang') ? 'active' : '' }}">Tentang</a>
                            </li>
                            <li class="nav-item">
                                <a href="/kontak" wire:navigate
                                class="nav-link {{ request()->is('kontak') ? 'active' : '' }}">Kontak</a>
                            </li>
                        </ul>
                    </div>

                    <div class="navbar-btn d-none d-sm-inline-block">
                        <a href="/login" wire:navigate
                            class="ud-main-btn {{ request()->is('login') ? 'ud-white-btn' : 'ud-login-btn' }} ">
                            Sign In
                        </a>
                        <a href="/registrasi" wire:navigate
                            class="ud-main-btn {{ request()->is('registrasi*') ? 'ud-white-btn' : 'ud-login-btn' }} ">
                            Sign Up
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
