@extends('component.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h6 class="fw-bold py-1 mb-3"><span class="text-muted fw-light">Manajemen /</span> Data Owner</h6>

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('manajemen-owner-create') }}"><i
                                class='bx bxs-user-plus'></i> Tambah Owner</a>
                    </li>
                </ul>
                <div class="card mb-4">
                    <h5 class="card-header">Data Owner</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-borderless" id="myTable">
                                <thead>
                                    <tr class="text-nowrap">
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Toko</th>
                                        <th class="text-center">Nama Pemilik</th>
                                        <th class="text-center">Email Pemilik</th>
                                        <th class="text-center">No Telp</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($owners as $owner)
                                        <tr>
                                            <th class="text-center">{{ $loop->iteration }}</th>
                                            <td class="text-center">{{ $owner->tokos->nama }}</td>
                                            <td class="text-center">{{ $owner->owner->nama }}</td>
                                            <td class="text-center">{{ $owner->email }}</td>
                                            <td class="text-center">{{ $owner->owner->no_telp }}</td>
                                            <td class="text-center">
                                                <form method="POST"
                                                    action="{{ route('manajemen-owner-delete', $owner->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('manajemen-owner-edit', $owner->id) }}"
                                                        class="badge bg-label-warning me-1">Edit</a>
                                                    <button type="submit" class="badge bg-label-danger me-1"
                                                        style="border: 0ch">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
