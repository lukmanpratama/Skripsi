<ul class="nav nav-primary">
    <li class="nav-item {{ request()->is('manajer') ? 'active' : '' }}">
        <a href="{{ url('manajer') }}">
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
    <li class="nav-item {{ request()->is('manajer/proyek') ? 'active' : '' }}">
        <a href="{{ url('manajer/proyek') }}">
            <i class="fas fa-layer-group"></i>
            <p>Proyek</p>
        </a>
    </li>
    <li class="nav-item {{ request()->is('manajer/konsultasi') ? 'active' : '' }}">
        <a href="{{ url('manajer/konsultasi') }}">
            <i class="fas fa-layer-group"></i>
            <p>Konsultasi</p>
        </a>
    </li>
    <li class="nav-item {{ request()->is('manajer/kontrak') ? 'active' : '' }}">
        <a href="{{ url('manajer/kontrak') }}">
            <i class="fas fa-layer-group"></i>
            <p>Konrak</p>
        </a>
    </li>
    <li class="nav-item {{ request()->is('manajer/tim') ? 'active' : '' }}">
        <a href="{{ url('manajer/tim') }}">
            <i class="fas fa-layer-group"></i>
            <p>Tim</p>
        </a>
    </li>
    <li class="nav-item {{ request()->is('manajer/tugas') ? 'active' : '' }}">
        <a href="{{ url('manajer/tugas') }}">
            <i class="fas fa-layer-group"></i>
            <p>Tugas</p>
        </a>
    </li>
    <li class="nav-item {{ request()->is('manajer/aktivitas') ? 'active' : '' }}">
        <a href="{{ url('manajer/aktivitas') }}">
            <i class="fas fa-layer-group"></i>
            <p>Aktivitas</p>
        </a>
    </li>
    <li class="nav-item {{ request()->is('manajer/biaya') ? 'active' : '' }}">
        <a href="{{ url('manajer/biaya') }}">
            <i class="fas fa-layer-group"></i>
            <p>Biaya</p>
        </a>
    </li>
    <li class="nav-item {{ request()->is('manajer/waktu') ? 'active' : '' }}">
        <a href="{{ url('manajer/waktu') }}">
            <i class="fas fa-layer-group"></i>
            <p>Waktu</p>
        </a>
    </li>

    <li class="nav-item {{ request()->is('manajer/estimasi') ? 'active' : '' }}">
        <a href="{{ url('manajer/estimasi') }}">
            <i class="fas fa-layer-group"></i>
            <p>Estimasi</p>
        </a>
    </li>
    <li class="nav-item {{ request()->is('manajer/jadwal') ? 'active' : '' }}">
        <a href="{{ url('manajer/jadwal') }}">
            <i class="fas fa-layer-group"></i>
            <p>Jadwal</p>
        </a>
    </li>
    <li class="nav-item {{ request()->is('manajer/dokumen') ? 'active' : '' }}">
        <a href="{{ url('manajer/dokumen') }}">
            <i class="fas fa-layer-group"></i>
            <p>Dokumen</p>
        </a>
    </li>
</ul>
