<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Pegawai</h4>
            <ul class="breadcrumbs">
                <ul class="nav nav-line nav-color-secondary">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin" wire:navigate>Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/admin/pegawai" wire:navigate>Pegawai</a>
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
                            <div class="modal show" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"
                                style="display: block;">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content text-bg-dark">

                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                {{ $pegawaiId ? 'Edit Pegawai' : 'Buat Pegawai' }}
                                            </h5>
                                            <svg wire:click="closeModal" xmlns="http://www.w3.org/2000/svg"
                                                width="32" height="32" fill="currentColor" class="bi bi-x"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        </div>
                                        <div class="modal-body">

                                            <form wire:submit.prevent="{{ $pegawaiId ? 'update' : 'store' }}">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="title">Nama</label>
                                                            <input type="text" wire:model="nama" class="form-control"
                                                                id="nama" placeholder="Username">
                                                            @error('nama')
                                                                <small class="d-block mt-1 danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="title">Email</label>
                                                            <input type="email" wire:model="email" class="form-control"
                                                                id="email" placeholder="email@email.com">
                                                            @error('email')
                                                                <small class="d-block mt-1 danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="title">Password</label>
                                                            <input type="password" wire:model="password" class="form-control"
                                                                id="password" placeholder="*******">
                                                            @error('password')
                                                                <small class="d-block mt-1 danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="title">Alamat</label>
                                                            <textarea type="text" wire:model="alamat" class="form-control"
                                                                id="nama" placeholder="Jalan, No Rumah, Ds, Kec, Kab"></textarea>
                                                            @error('alamat')
                                                                <small class="d-block mt-1 danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="title">No Hp</label>
                                                            <input type="tel" wire:model="nohp" class="form-control"
                                                                id="nama" placeholder="8888-8888-8888">
                                                            @error('nohp')
                                                                <small class="d-block mt-1 danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="title">Role Akses</label>
                                                            <select wire:model="role" class="form-control">
                                                                <option value="" selected>Pilih Role</option>
                                                                <option value="admin">Admin</option>
                                                                <option value="manajer">Manajer</option>
                                                                <option value="divisi">Divisi</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="title">Jabatan Pekerjaan</label>
                                                            <select wire:model="jabatan" class="form-control">
                                                                <option value="" selected>Pilih Pekerjaan</option>
                                                                <option value="Administrasi">Admin</option>
                                                                <option value="Manajer Proyek">Manajer Proyek</option>
                                                                <option value="Systems Analyst">Systems Analyst</option>
                                                                <option value="Database Analyst">Database Analyst</option>
                                                                <option value="Database Engineer">Database Engineer</option>
                                                                <option value="UI/UX Designer">UI/UX Designer</option>
                                                                <option value="Front-end Developer">Front-end Developer</option>
                                                                <option value="Back-end Developer">Back-end Developer</option>
                                                                <option value="Full-stack Developer">Full-stack Developer</option>
                                                                <option value="Mobile-app Developer">Mobile-app Developer</option>
                                                                <option value="DevOps Engineer">DevOps Engineer</option>
                                                                <option value="Quality Assurance">Quality Assurance</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="title">Keahlian Menguasai</label>
                                                            <textarea type="text" wire:model="keahlian" class="form-control"
                                                                id="nama" placeholder="Contoh: Git, JavaScript, Figma dll"></textarea>
                                                            @error('alamat')
                                                                <small class="d-block mt-1 danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="title">Biografi</label>
                                                            <textarea type="text" wire:model="deskripsi" class="form-control"
                                                                id="nama" placeholder="Hii! Saya adalah seorang develpper"></textarea>
                                                            @error('alamat')
                                                                <small class="d-block mt-1 danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>


                                                <button type="submit" class="btn btn-primary mt-4">
                                                    {{ $pegawaiId ? 'Update' : 'Create' }}
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
                                        <th>Nama</th>
                                        <th>Pekerjaan</th>
                                        <th>Keahlian</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pegawais as $pegawai)
                                        <tr wire:key="{{ $pegawai->id }}">
                                            <td>{{ $loop->index + $pegawais->firstItem() }}</a></td>
                                            <td>{{ $pegawai->name }}</td>
                                            <td>{{ $pegawai->jabatan}}</td>
                                            <td>{{ $pegawai->pegawai->keahlian}}</td>
                                            <td>{{ $pegawai->created_at->format('d F, Y') }}</td>
                                            <td>
                                                <div class="form-button-action">

                                                    <button
                                                        onclick="return confirm('Are you sure you want to delete this item?') || event.stopImmediatePropagation()"
                                                        wire:click="delete({{ $pegawai->id }})" type="button"
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
                            <x-app.pagination :items="$pegawais" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
