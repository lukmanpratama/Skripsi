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
                        <a class="nav-link" href="/pemilik/proyek/{{ $biayaproyek->id }}" wire:navigate>Detil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pemilik/proyek/{{ $biayaproyek->id }}/tim" wire:navigate>Tim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pemilik/proyek/{{ $biayaproyek->id }}/tugas" wire:navigate>Tugas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pemilik/proyek/{{ $biayaproyek->id }}/waktu" wire:navigate>Waktu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/pemilik/proyek/*/biaya" wire:navigate>Biaya</a>
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
                            <h4 class="card-title">Biaya</h4>

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
                                                {{ $biayaId ? 'Edit Tugas' : 'Buat Tugas' }}
                                            </h5>
                                            <svg wire:click="closeModal" xmlns="http://www.w3.org/2000/svg"
                                                width="32" height="32" fill="currentColor" class="bi bi-x"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        </div>
                                        <div class="modal-body">

                                            <form wire:submit.prevent="{{ $biayaId ? 'update' : 'store' }}">

                                                        <div class="form-group">
                                                            <label for="title">Biaya Gaji</label>
                                                            <input type="number" wire:model="biaya_gaji"
                                                                class="form-control" id="nama_tugas"
                                                                pattern="^\Rp\d{1,3}(,\d{3})*(\.\d+)?Rp"
                                                                placeholder="1.000.000">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="title">Biaya Lain-Lain</label>
                                                            <input type="number" wire:model="biaya_lain"
                                                                class="form-control" id="nama_tugas"
                                                                placeholder="Enter post title">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="title">Jumlah Biaya</label>
                                                            <input type="text" wire:model="jml_biaya"
                                                                class="form-control" id="progres_tugas"
                                                                placeholder="Enter post title">
                                                        </div>


                                                <button type="submit" class="btn btn-primary mt-4">
                                                    {{ $biayaId ? 'Update' : 'Buat' }}
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
                                        <th>Durasi</th>
                                        <th width="10%">Biaya Gaji</th>
                                        <th width="10%">Biaya Lain-Lain</th>
                                        <th width="10%">Jumlah Biaya</th>

                                        <th width="10%">Created At</th>
                                        <th width="5%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($biayas as $biaya)
                                        <tr wire:key="{{ $biaya->id }}">

                                            <td>{{ $loop->index + $biayas->firstItem() }}</a></td>
                                            <td>{{ $biaya->nama_tugas }}</a></td>
                                            <td>{{ $biaya->durasi }}</td>
                                            <td>{{ $biaya->biaya_gaji }}</td>
                                            <td>{{ $biaya->biaya_lain }}</td>
                                            <td>{{ $biaya->jml_biaya}}</td>

                                            <td>{{ $biaya->created_at->format('d F, Y') }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button wire:click="edit({{ $biaya->id }})" type="button"
                                                        data-toggle="tooltip" title=""
                                                        class="btn btn-link btn-primary btn-lg"
                                                        data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </button>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <x-app.pagination :items="$biayas" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
