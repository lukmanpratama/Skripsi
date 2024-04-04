<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Proyek</h4>
            <ul class="breadcrumbs">
                <ul class="nav nav-line nav-color-secondary">
                    <li class="nav-item">
                        <a class="nav-link" href="/pemilik" wire:navigate>Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pemilik/proyek" wire:navigate>Proyek</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/pemilik/proyek/*" wire:navigate>Detil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pemilik/proyek/{{ $detilproyek->id }}/tim" wire:navigate>Tim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pemilik/proyek/{{ $detilproyek->id }}/tugas" wire:navigate>Tugas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pemilik/proyek/{{ $detilproyek->id }}/waktu" wire:navigate>Waktu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pemilik/proyek/{{ $detilproyek->id }}/biaya" wire:navigate>Biaya</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/pemilik/proyek" wire:navigate>Kalender</a>
                    </li>
                </ul>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Detil Proyek</h4>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h4><b>Nama Proyek</b></h4>
                                <h1>{{ $detilproyek->nama_proyek }}</h1>
                                <span></span>
                                <h4><b>Deskripsi Proyek</b></h4>
                                <p>{{ $detilproyek->deskripsi_proyek }}</p>
                                <div class="table-responsive">
                                    <table id="add-row" class="table table-hover">
                                        <thead>
                                            <tr>

                                                <th>Profile</th>
                                                <th>Nama</th>
                                                <th>Pekerjaan</th>
                                                <th>Keahlian</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tims as $tim)
                                                <tr wire:key="{{ $tim->id }}">
                                                    <td>
                                                        <div class="avatar-sm">
                                                            <img src="{{ asset('storage/foto/' . $tim->foto) }}"
                                                                alt="dashboard." class="avatar-img rounded-circle">
                                                        </div>
                                                    </td>
                                                    <td>{{ $tim->name }}</td>
                                                    <td>{{ $tim->email }}</td>
                                                    <td>{{ $tim->role }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h4><b>Jenis Proyek</b></h4>
                                <p>{{ $detilproyek->jenis_proyek }}</p>
                                <h4><b>Tahapan Proyek</b></h4>
                                <p>{{ $detilproyek->tahapan_proyek }}</p>
                                <h4><b>Progres Proyek</b></h4>
                                <div class="row">
                                    <div class="col-8">
                                        <div class="progress-card">
                                            <div class="progress-status">
                                            </div>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width:{{ $detilproyek->progres }}%"
                                                    aria-valuenow="{{ $detilproyek->progres }}" aria-valuemin="0"
                                                    aria-valuemax="100" data-toggle="tooltip" data-placement="top"
                                                    title="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <span>{{ $detilproyek->progres }}%</span>
                                    </div>
                                </div>
                                <h4><b>Status Proyek</b></h4>
                                <p>{{ $detilproyek->status_proyek }}</p>
                                <h4><b>Tanggal Mualai</b></h4>
                                <p>{{ $detilproyek->tgl_mulai }}</p>
                                <h4><b>Tanggal Selesai</b></h4>
                                <p>{{ $detilproyek->tgl_selesai }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
