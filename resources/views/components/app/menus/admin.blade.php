<ul class="nav nav-primary">
    <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
        <a href="{{ url('admin') }}">
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
    <li class="nav-item {{ request()->is('admin/pegawai') ? 'active' : '' }}">
        <a href="{{ url('admin/pegawai') }}">
            <i class="fas fa-layer-group"></i>
            <p>Pegawai</p>
        </a>
    </li>
    <li class="nav-item {{ request()->is('admin/proyek*') ? 'active' : '' }}">
        <a href="{{ url('admin/proyek') }}">
            <i class="fas fa-layer-group"></i>
            <p>Proyek</p>
        </a>
    </li>
    <li class="nav-item {{ request()->is('admin/kontrak') ? 'active' : '' }}">
        <a href="{{ url('admin/kontrak') }}">
            <i class="fas fa-layer-group"></i>
            <p>Kontrak Kerja</p>
        </a>
    </li>
    <li class="nav-item {{ request()->is('admin/tagihan') ? 'active' : '' }}">
        <a href="{{ url('admin/tagihan') }}">
            <i class="fas fa-layer-group"></i>
            <p>Tagihan</p>
        </a>
    </li>
    <li class="nav-item {{ request()->is('admin/dokumen') ? 'active' : '' }}">
        <a href="{{ url('admin/dokumen') }}">
            <i class="fas fa-layer-group"></i>
            <p>Dokumen</p>
        </a>
    </li>
</ul>
