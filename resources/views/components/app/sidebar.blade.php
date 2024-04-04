<div class="sidebar">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('storage/foto/' . Auth::user()->foto) }}" alt="..."
                        class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Auth::user()->name }}
                            <span class="user-level">{{ Auth::user()->jabatan }}</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            @if (auth()->user()->role=="admin")
            <x-app.menus.admin/>
            @endif
            @if (auth()->user()->role=="manajer")
            <x-app.menus.manajer/>
            @endif
            @if (auth()->user()->role=="pemilik")
            <x-app.menus.pemilik/>
            @endif
            @if (auth()->user()->role=="divisi")
            <x-app.menus.divisi/>
            @endif

        </div>
    </div>
</div>
{{-- <!-- Sidebar -->
<div class="sidebar sidebar-style-1">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('storage/foto/'.Auth::user()->foto) }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{Auth::user()->name}}
                            <span class="user-level">{{Auth::user()->role}}</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{ (request()->is('admin')) ? 'active' : '' }}">
                    <a data-toggle="collapse" href="/admin" wire:navigate class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu</h4>
                </li>
                <li class="nav-item {{ (request()->is('admin/user')) ? 'active' : '' }}">
                    <a data-toggle="collapse" href="/admin/user" wire:navigate>
                        <i class="fas fa-layer-group"></i>
                        <p>Pengguna</p>
                    </a>
                </li>
                <li class="nav-item {{ (request()->is('admin/proyek*')) ? 'active' : '' }}">
                    <a data-toggle="collapse" href="/admin/proyek" wire:navigate>
                        <i class="fas fa-layer-group"></i>
                        <p>Proyek</p>
                    </a>
                </li>

                <li class="nav-item {{ (request()->is('admin/pembayaran')) ? 'active' : '' }}">
                    <a data-toggle="collapse" href="/admin/pembayaran" wire:navigate>
                        <i class="fas fa-layer-group"></i>
                        <p>Pembayaran</p>
                    </a>
                </li>
                <li class="nav-item {{ (request()->is('admin/order')) ? 'active' : '' }}">
                    <a data-toggle="collapse" href="/admin/order" wire:navigate>
                        <i class="fas fa-layer-group"></i>
                        <p>Proyek</p>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</div>
<!-- End Sidebar -->
 --}}
