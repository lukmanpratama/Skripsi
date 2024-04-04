<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Proyek</h4>
            <ul class="breadcrumbs">
                <ul class="nav nav-line nav-color-secondary">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin" wire:navigate>Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/proyek" wire:navigate>Proyek</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/admin/proyek/{{ $timproyek->id }}" wire:navigate>Detil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/admin/proyek/*/tim" wire:navigate>Tim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/proyek/{{ $timproyek->id }}/tugas" wire:navigate>Tugas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/proyek/{{ $timproyek->id }}/waktu" wire:navigate>Waktu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/proyek/{{ $timproyek->id }}/biaya" wire:navigate>Biaya</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/proyek/{{ $timproyek->id }}/estimasi" wire:navigate>Estimasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/proyek" wire:navigate>Kalender</a>
                    </li>
                </ul>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Daftar Pegawai</h4>

                        </div>
                    </div>
                    <div class="card-body">
                        <button wire:click="create" class="btn btn-primary btn-round ml-auto">
                            <i class="fa fa-plus"></i>
                            Add Row
                        </button>
                        <!-- Modal -->
                        @if ($isOpen)
                            <div class="modal show" id="exampleModalLong" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="display: block;">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content text-bg-dark">

                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                {{ $timId ? 'Edit Tim' : 'Create Tim' }}
                                            </h5>
                                            <svg wire:click="closeModal" xmlns="http://www.w3.org/2000/svg"
                                                width="32" height="32" fill="currentColor" class="bi bi-x"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        </div>
                                        <div class="modal-body">

                                            <form wire:submit.prevent="{{ $timId ? 'update' : 'store' }}">
                                                <?php
                                                $idk = $timproyek->id;
                                                $tim1s = DB::table('tims')->where('proyek_id', '=', 1)->get();
                                                $users = DB::table('users')->get();

                                                $result = DB::table('users')
                                                    ->whereRaw("users.id NOT IN (SELECT user_id FROM tims WHERE proyek_id='$idk')")
                                                    ->get();

                                                ?>
                                                <div class="form-group">
                                                    <select wire:model="userId" class="custom-select">
                                                        @foreach ($result as $user)
                                                            <option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }} -
                                                                {{ $user->role }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>



                                                <button type="submit" class="btn btn-primary mt-4">
                                                    {{ $timId ? 'Update' : 'Create' }}
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
                                        <th>Profile</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Pekerjaan</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tims as $tim)
                                        <tr wire:key="{{ $tim->id }}">
                                            <td>{{ $loop->index + $tims->firstItem() }}</td>
                                            <td>
                                                <div class="avatar-sm">
                                                    <img src="{{ asset('storage/foto/' . $tim->foto) }}"
                                                        alt="dashboard." class="avatar-img rounded-circle">
                                                </div>
                                            </td>
                                            <td>{{ $tim->name }}</td>
                                            <td>{{ $tim->email }}</td>
                                            <td>{{ $tim->jabatan }}</td>
                                            <td>
                                                <div class="form-button-action">

                                                    <button
                                                        onclick="return confirm('Are you sure you want to delete this item?') || event.stopImmediatePropagation()"
                                                        wire:click="delete({{ $tim->id }})" type="button"
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
                            <x-app.pagination :items="$tims" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
