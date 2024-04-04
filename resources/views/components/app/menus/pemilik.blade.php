<ul class="nav nav-primary">
    <li class="nav-item {{ request()->is('pemilik') ? 'active' : '' }}">
        <a href="{{ url('pemilik') }}">
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
    <li class="nav-item {{ request()->is('pemilik/proyek*') ? 'active' : '' }}">
        <a href="{{ url('pemilik/proyek') }}">
            <i class="fas fa-layer-group"></i>
            <p>Proyek</p>
        </a>
    </li>
    <li class="nav-item {{ request()->is('pemilik/konsultasi') ? 'active' : '' }}">
        <a href="{{ url('pemilik/konsultasi') }}">
            <i class="fas fa-layer-group"></i>
            <p>Konsultasi</p>
        </a>
    </li>
    <li class="nav-item {{ request()->is('pemilik/kontrak') ? 'active' : '' }}">
        <a href="{{ url('pemilik/kontrak') }}">
            <i class="fas fa-layer-group"></i>
            <p>Konrak</p>
        </a>
    </li>

    <li class="nav-item {{ request()->is('pemilik/aktivitas') ? 'active' : '' }}">
        <a href="{{ url('pemilik/aktivitas') }}">
            <i class="fas fa-layer-group"></i>
            <p>Aktivitas</p>
        </a>
    </li>

    <li class="nav-item {{ request()->is('pemilik/pembayaran') ? 'active' : '' }}">
        <a href="{{ url('pemilik/pembayaran') }}">
            <i class="fas fa-layer-group"></i>
            <p>Pembayaran</p>
        </a>
    </li>

    <li class="nav-item {{ request()->is('pemilik/dokumen') ? 'active' : '' }}">
        <a href="{{ url('pemilik/dokumen') }}">
            <i class="fas fa-layer-group"></i>
            <p>Dokumen</p>
        </a>
    </li>
</ul>
