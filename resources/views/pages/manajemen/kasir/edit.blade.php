@extends('component.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h6 class="fw-bold py-1 mb-3"><span class="text-muted fw-light">Manajemen / Data Kasir / </span>Edit Kasir</h6>
        <form action="{{ route('manajemen-kasir-update', $kasir->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Ubah metode menjadi PUT -->
            <div class="row">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Kasir</h5>
                            <small class="text-muted float-end">Data Kasir</small>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                        <i class='bx bx-envelope'></i>
                                    </span>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ old('email', $kasir->email) }}" required />
                                </div>
                                @if ($errors->has('email'))
                                    <div class="text-danger">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="nama_kasir">Nama Kasir</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                        <i class='bx bx-user'></i>
                                    </span>
                                    <input type="text" class="form-control" id="nama_kasir" name="nama_kasir"
                                        value="{{ old('nama_kasir', $kasir->kasir->nama) }}" required />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="no_telp">No Telepon</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                        <i class="bx bx-phone"></i>
                                    </span>
                                    <input type="number" class="form-control" id="no_telp" name="no_telp"
                                        value="{{ old('no_telp', $kasir->kasir->no_telp) }}" required />
                                </div>
                            </div>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" id="reset_password" name="reset_password" />
                                <label class="form-check-label" for="reset_password"> Reset Password </label>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="card-text d-flex justify-content-end">
                    <a href="javascript:history.back()" class="btn btn-danger m-1">Batal</a>
                    <button type="submit" class="btn btn-primary m-1">Simpan</button>
                </p>
            </div>
        </form>
    </div>
@endsection
