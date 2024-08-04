@extends('component.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h6 class="fw-bold py-1 mb-3"><span class="text-muted fw-light">Manajemen / Data Owner / </span>Tambah Owner</h6>
        <div class="alert alert-primary alert-dismissible" role="alert">
            Password terisi otomatis. Password default <code>owner123</code>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <form action="{{ route('manajemen-owner-store') }}" method="POST">
            @csrf <!-- Tambahkan ini untuk menyertakan token CSRF -->
            <div class="row">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Owner</h5>
                            <small class="text-muted float-end">Data Owner</small>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                        <i class='bx bx-envelope'></i>
                                    </span>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="nama_owner">Nama Owner</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                        <i class='bx bx-user' ></i>
                                    </span>
                                    <input type="text" class="form-control" id="nama_owner" name="nama_owner" value="{{ old('nama_owner') }}" required />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="no_telp">No Telepon</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                        <i class="bx bx-phone"></i>
                                    </span>
                                    <input type="number" class="form-control" id="no_telp" name="no_telp" value="{{ old('no_telp') }}" required />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Perusahaan</h5>
                            <small class="text-muted float-end">Data Owner</small>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="nama_perusahaan">Nama Perusahaan</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                        <i class="bx bx-buildings"></i>
                                    </span>
                                    <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="{{ old('nama_perusahaan') }}" required />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="alamat">Alamat</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                        <i class='bx bx-globe'></i>
                                    </span>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="card-text d-flex justify-content-end">
                        <a href="javascript:history.back()" class="btn btn-danger m-1">Batal</a>
                        <button type="submit" class="btn btn-primary m-1">Simpan</button>
                    </p>
                </div>
            </div>
        </form>
    </div>
@endsection
