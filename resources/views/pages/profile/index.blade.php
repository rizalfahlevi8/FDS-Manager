@extends('component.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h6 class="fw-bold py-1 mb-3"><span class="text-muted fw-light">Account Settings /</span> Account</h6>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt="user-avatar" class="d-block rounded" height="100"
                                width="100" id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="account-file-input" hidden
                                        accept="image/png, image/jpeg" />
                                </label>
                                <p class="text-muted mb-0">Allowed JPG or PNG</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        @can('superadmin')
                        <form action="{{ route('profile-update', $myData->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="email">Email</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                                <i class='bx bx-envelope'></i>
                                            </span>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ old('email', $myData->email) }}" required />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="nama_perusahaan">Nama Perusahaan</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                                <i class="bx bx-buildings"></i>
                                            </span>
                                            <input type="text" class="form-control" id="nama_perusahaan"
                                                name="nama_perusahaan" value="{{ old('nama_perusahaan', $myData->tokos->nama) }}" required />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="alamat">Alamat</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                                <i class='bx bx-globe'></i>
                                            </span>
                                            <input type="text" class="form-control" id="alamat" name="alamat"
                                                value="{{ old('alamat', $myData->tokos->alamat) }}" required />
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                                        <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                    </div>
                            </form>
                        </div>
                        @endcan
                        @can('owner')
                        <form action="{{ route('profile-update', $myData->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="nama_owner">Nama Owner</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                                <i class='bx bx-user'></i>
                                            </span>
                                            <input type="text" class="form-control" id="nama_owner" name="nama_owner"
                                                value="{{ old('nama_owner', $myData->owner->nama) }}" required />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="email">Email</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                                <i class='bx bx-envelope'></i>
                                            </span>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ old('email', $myData->email) }}" required />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="nama_perusahaan">Nama Perusahaan</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                                <i class="bx bx-buildings"></i>
                                            </span>
                                            <input type="text" class="form-control" id="nama_perusahaan"
                                                name="nama_perusahaan" value="{{ old('nama_perusahaan', $myData->tokos->nama) }}" required />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="alamat">Alamat</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                                <i class='bx bx-globe'></i>
                                            </span>
                                            <input type="text" class="form-control" id="alamat" name="alamat"
                                                value="{{ old('alamat', $myData->tokos->alamat) }}" required />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label" for="no_telp">No Telepon</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                                <i class="bx bx-phone"></i>
                                            </span>
                                            <input type="number" class="form-control" id="no_telp" name="no_telp"
                                                value="{{ old('no_telp', $myData->owner->no_telp) }}" required />
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                                        <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                    </div>
                            </form>
                        </div>
                        @endcan
                        <!-- /Account -->
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">Ganti Password</h5>
                    <div class="card-body">
                
                        <form action="{{ route('profile-changePassword') }}" method="POST">
                            @csrf
                            <div class="mb-4 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password-sekarang">Password Saat Ini</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password-sekarang" class="form-control @error('password-sekarang') is-invalid @enderror" name="password-sekarang" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                @error('password-sekarang')
                                    <div class="text-danger small">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                
                            <div class="mb-4 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password-baru">Password Baru</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password-baru" class="form-control @error('password-baru') is-invalid @enderror" name="password-baru" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                @error('password-baru')
                                    <div class="text-danger small">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                
                            <div class="mb-4 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password-konfirmasi">Konfirmasi Password Baru</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password-konfirmasi" class="form-control @error('password-baru_confirmation') is-invalid @enderror" name="password-baru_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                @error('password-baru_confirmation')
                                    <div class="text-danger small">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                
                            <button type="submit" class="btn btn-danger deactivate-account">Ubah Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endsection
