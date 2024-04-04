<ul class="nav nav-primary">
    <li class="nav-item {{ request()->is('divisi') ? 'active' : '' }}">
        <a href="{{ url('divisi') }}">
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
    <li class="nav-item {{ request()->is('divisi/proyek') ? 'active' : '' }}">
        <a href="{{ url('divisi/proyek') }}">
            <i class="fas fa-layer-group"></i>
            <p>Proyek</p>
        </a>
    </li>

    <li class="nav-item {{ request()->is('divisi/tugas') ? 'active' : '' }}">
        <a href="{{ url('divisi/tugas') }}">
            <i class="fas fa-layer-group"></i>
            <p>Tugas</p>
        </a>
    </li>
    <li class="nav-item {{ request()->is('divisi/aktivitas') ? 'active' : '' }}">
        <a href="{{ url('divisi/aktivitas') }}">
            <i class="fas fa-layer-group"></i>
            <p>Aktivitas</p>
        </a>
    </li>

    <li class="nav-item {{ request()->is('divisi/dokumen') ? 'active' : '' }}">
        <a href="{{ url('divisi/dokumen') }}">
            <i class="fas fa-layer-group"></i>
            <p>Dokumen</p>
        </a>
    </li>
</ul>
