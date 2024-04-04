<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Proyek</h4>
            <ul class="breadcrumbs">
                <ul class="nav nav-line nav-color-secondary">
                    <li class="nav-item">
                        <a class="nav-link" href="/manajer" wire:navigate>Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/manajer/proyek" wire:navigate>Proyek</a>
                    </li>
                </ul>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Daftar proyek</h4>

                        </div>
                    </div>
                    <div class="card-body">
                        <button wire:click="create" class="btn btn-primary btn-round ml-auto">
                            <i class="fa fa-plus"></i>
                            Add Row
                        </button>
                        <!-- Modal -->
                        @if ($isOpen)
                            <div class="modal show" tabindex="-1" role="dialog" style="display: block;">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content text-bg-dark">

                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                {{ $proyekId ? 'Edit Proyek' : 'Create Proyek' }}
                                            </h5>
                                            <svg wire:click="closeModal" xmlns="http://www.w3.org/2000/svg"
                                                width="32" height="32" fill="currentColor" class="bi bi-x"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        </div>
                                        <div class="modal-body">

                                            <form wire:submit.prevent="{{ $proyekId ? 'update' : 'store' }}">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="title">Nama Proyek</label>
                                                            <input type="text" wire:model="nama_proyek"
                                                                class="form-control" id="nama_proyek"
                                                                placeholder="Enter post title">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="title">Jenis Proyek</label>
                                                            <select wire:model="jenis_proyek" class="form-control">
                                                                <option value="" selected>Pilih Jenis Proyek
                                                                </option>
                                                                <option value="Company Profile">Company Profile</option>
                                                                <option value="Toko Online">Toko Online</option>
                                                                <option value="">Layanan Dinas
                                                                    Pemerintahan</option>
                                                                <option value="Layanan Pendidikan">Layanan Pendidikan
                                                                </option>
                                                                <option value="Layanan Kesehatan">Layanan Kesehatan
                                                                </option>
                                                                <option value="Website Pribadi">Website Pribadi</option>
                                                                <option value="Website Tugas Kuliah">Website Tugas
                                                                    Kuliah</option>
                                                                <option value="Mobile Application">Mobile Application
                                                                </option>
                                                                <option value="Maintenance Website">Maintenance Website
                                                                </option>

                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="title">Progres (%)</label>
                                                            <input type="number" wire:model="progres"
                                                                class="form-control" id="tgl_mulai"
                                                                placeholder="0 - 100 ">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="body">Deskripsi</label>
                                                            <textarea wire:model="deskripsi_proyek" class="form-control" id="deskripsi_proyek" rows="4"
                                                                placeholder="Enter post body"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col">

                                                        <div class="form-group">
                                                            <label for="title">Status Proyek</label>
                                                            <select wire:model="status_proyek" class="form-control">
                                                                <option value="" selected>Pilih Status Proyek
                                                                </option>
                                                                <option value="To Do ">To Do</option>
                                                                <option value="In Progres">In Progres</option>
                                                                <option value="Done">Done</option>
                                                                <option value="Revisi">Revisi
                                                                </option>
                                                                <option value="Pending">Pending</option>

                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="title">Tahapan Proyek</label>
                                                            <select wire:model="tahapan_proyek" class="form-control">
                                                                <option value="" selected>
                                                                    Pilih Tahapan Proyek
                                                                </option>
                                                                <option value="Pengajuan">Pengajuan</option>
                                                                <option value="Konsultasi">Konsultasi</option>
                                                                <option value="Inisiasi">Inisiasi</option>
                                                                <option value="Perencanaan">
                                                                    Perencanaan
                                                                </option>
                                                                <option value="Eksekusi">
                                                                    Eksekusi
                                                                </option>
                                                                <option value="Penutupan">Penutupan</option>

                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="title">Tanggal Mulai</label>
                                                            <input type="date" wire:model="tgl_mulai"
                                                                class="form-control" id="tgl_mulai"
                                                                placeholder="Enter post title">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="title">Tanggal Selesai</label>
                                                            <input type="date" wire:model="tgl_selesai"
                                                                class="form-control" id="tgl_selesai"
                                                                placeholder="Enter post title">
                                                        </div>

                                                    </div>

                                                </div>

                                                <button type="submit" class="btn btn-primary mt-4">
                                                    {{ $proyekId ? 'Update' : 'Create' }}
                                                </button>
                                                <button type="button" wire:click="closeModal"
                                                    class="btn btn-secondary mt-4">Close</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-backdrop fade show"></div>
                        @endif
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="control-label col-sm-2">Show</label>
                                    <div class="col-md-4">
                                        <select wire:model.live="limit" class="form-control select"
                                            aria-label="Default select example">
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="75">75</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                    <label class="control-label col-sm-2">Entries</label>
                                </div>

                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <input type="search" wire:model.live.debounce.50ms="search" class="form-control"
                                    placeholder="Search..." id="search">
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="add-row" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="20%">Name proyek</th>
                                        <th width="35%">Tim</th>
                                        <th width="20%">Progres</th>
                                        <th width="10%">Created At</th>
                                        <th width="5%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proyeks as $proyek)
                                        <tr wire:key="{{ $proyek->id }}">
                                            <td>{{ $loop->index + $proyeks->firstItem() }}</a></td>
                                            <td>
                                                <a href="/manajer/proyek/{{ $proyek->id }}" wire:navigate
                                                    class="badge badge-info"
                                                    title="Detil Proyek, Tugas, Aktivitas">+</a>
                                                <a href="/manajer/proyek/{{ $proyek->id }}"
                                                    title="Detil Proyek, Tugas, Aktivitas"
                                                    wire:navigate>{{ $proyek->nama_proyek }}</a>

                                            </td>
                                            <td>
                                                <a href="/manajer/proyek/{{ $proyek->id }}/tim" wire:navigate
                                                    class="badge badge-warning" title="Tambah Anggota Tim">+</a>
                                                <div class="avatar-group">
                                                    @foreach ($proyek->user as $user)
                                                        <div class="avatar">
                                                            <img src="{{ asset('storage/foto/' . $user->foto) }}"
                                                                alt="dashboard."
                                                                class="avatar-img rounded-circle border border-white"
                                                                title="{{ $user->name }}">
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <div class="progress-card">
                                                            <div class="progress-status">
                                                            </div>
                                                            <div class="progress" style="height: 6px;">
                                                                <div class="progress-bar bg-success"
                                                                    role="progressbar"
                                                                    style="width:{{ $proyek->progres }}%"
                                                                    aria-valuenow="{{ $proyek->progres }}"
                                                                    aria-valuemin="0" aria-valuemax="100"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <span>{{ $proyek->progres }}%</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $proyek->created_at->format('d F, Y') }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button wire:click="edit({{ $proyek->id }})" type="button"
                                                        data-toggle="tooltip" data-terget="#modalEdit" title=""
                                                        class="btn btn-link btn-primary btn-lg"
                                                        data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button
                                                        onclick="return confirm('Are you sure you want to delete this item?') || event.stopImmediatePropagation()"
                                                        wire:click="delete({{ $proyek->id }})" type="button"
                                                        data-toggle="tooltip" title=""
                                                        class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <x-app.pagination :items="$proyeks" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
