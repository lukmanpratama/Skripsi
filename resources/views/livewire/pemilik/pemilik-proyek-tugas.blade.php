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
                        <a class="nav-link" href="/pemilik/proyek/{{ $tugasproyek->id }}" wire:navigate>Detil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pemilik/proyek/{{ $tugasproyek->id }}/tim" wire:navigate>Tim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/pemilik/proyek/*/tugas" wire:navigate>Tugas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pemilik/proyek/{{ $tugasproyek->id }}/waktu" wire:navigate>Waktu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pemilik/proyek/{{ $tugasproyek->id }}/biaya" wire:navigate>Biaya</a>
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
                            <h4 class="card-title">Tugas</h4>

                        </div>
                    </div>
                    <div class="card-body">

                        <!-- Modal -->
                        @if ($isOpen)
                            <div class="modal show" tabindex="-1" role="dialog" style="display: block;">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content text-bg-dark">

                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                {{ $tugasId ? 'Edit Tugas' : 'Buat Tugas' }}
                                            </h5>
                                            <svg wire:click="closeModal" xmlns="http://www.w3.org/2000/svg"
                                                width="32" height="32" fill="currentColor" class="bi bi-x"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        </div>
                                        <div class="modal-body">

                                            <form wire:submit.prevent="{{ $tugasId ? 'update' : 'store' }}">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="title">Nama Tugas</label>
                                                            <input type="text" wire:model="nama_tugas"
                                                                class="form-control" id="nama_tugas"
                                                                placeholder="Enter post title">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="body">Deskripsi</label>
                                                            <textarea wire:model="deskripsi_tugas" class="form-control" id="deskripsi_tugas" rows="4"
                                                                placeholder="Enter post body"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="title">Tahapan Tugas</label>
                                                            <input type="text" wire:model="tahapan_tugas"
                                                                class="form-control" id="progres_tugas"
                                                                placeholder="Enter post title">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="title">Status Tugas</label>
                                                            <select wire:model="status_tugas" class="form-control">
                                                                <option value="" selected>Pilih Status Tugas
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
                                                            <label for="title">Progres (%)</label>
                                                            <input type="number" wire:model="progres_tugas"
                                                                class="form-control" id="progres_tugas"
                                                                placeholder="Enter post title">
                                                        </div>
                                                        @php
                                                            $users = App\Models\Proyek::find($this->proyekId)->user()->get();
                                                        @endphp
                                                         <div class="form-group">
                                                            <label for="title">Ditugaskan Kepada</label>
                                                            <select wire:model="userId" class="custom-select">
                                                                @foreach($users as $user)
                                                                    <option value="{{$user->id}}">{{$user->name}} - {{ $user->role}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary mt-4">
                                                    {{ $tugasId ? 'Update' : 'Buat' }}
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
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Tugas</th>
                                        <th>Aktivitas</th>
                                        <th width="10%">Ditugaskan Kepada</th>
                                        <th>Tahapan</th>
                                        <th width="20%">Progres</th>
                                        <th width="10%">Created At</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tugass as $tugas)
                                        <tr wire:key="{{ $tugas->id }}">
                                            <td>{{ $loop->index + $tugass->firstItem() }}</a></td>
                                            <td>{{ $tugas->nama_tugas }}</td>
                                            <td>
                                                <a href="/pemilik/proyek/{{ $tugas->proyek_id }}/tugas/{{ $tugas->id }}/aktivitas" wire:navigate
                                                    class="badge badge-warning" title="Tambah Aktivitas">+</a>
                                            </td>
                                            <td>
                                                <div class="avatar-group">
                                                    @foreach ($tugas->user as $user)
                                                        <div class="avatar">
                                                            <img src="{{ asset('storage/foto/' . $user->foto) }}"
                                                                alt="dashboard."
                                                                class="avatar-img rounded-circle border border-white"
                                                                title="{{ $user->name }}">
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </td>
                                            <td>{{ $tugas->tahapan_tugas }}</td>
                                            <td class="text-right">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <div class="progress-card">
                                                            <div class="progress-status">
                                                            </div>
                                                            <div class="progress" style="height: 6px;">
                                                                <div class="progress-bar bg-success"
                                                                    role="progressbar"
                                                                    style="width:{{ $tugas->progres_tugas }}%"
                                                                    aria-valuenow="{{ $tugas->progres_tugas }}"
                                                                    aria-valuemin="0" aria-valuemax="100"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <span>{{ $tugas->progres_tugas }}%</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $tugas->created_at->format('d F, Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <x-app.pagination :items="$tugass" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
