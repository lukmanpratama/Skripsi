<div>
    <li class="nav-item {{ request()->is('admin/user') ? 'active' : '' }}">
        <a href="{{ url('admin/user') }}">
            <i class="fas fa-layer-group"></i>
            <p>Pengguna</p>
        </a>
    </li>
</div>
