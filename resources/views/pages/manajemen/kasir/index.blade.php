@extends('component.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h6 class="fw-bold py-1 mb-3"><span class="text-muted fw-light">Manajemen /</span> Data Kasir</h6>

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('manajemen-kasir-create') }}"><i
                                class='bx bxs-user-plus'></i> Tambah Kasir</a>
                    </li>
                </ul>
                <div class="card mb-4">
                    <h5 class="card-header">Data Kasir</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-borderless" id="myTable">
                                <thead>
                                    <tr class="text-nowrap">
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama kasir</th>
                                        <th class="text-center">Email Kasir</th>
                                        <th class="text-center">No Telp</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kasirs as $kasir)
                                        <tr>
                                            <th class="text-center">{{ $loop->iteration }}</th>
                                            <td class="text-center">{{ $kasir->kasir->nama }}</td>
                                            <td class="text-center">{{ $kasir->email }}</td>
                                            <td class="text-center">{{ $kasir->kasir->no_telp }}</td>
                                            <td class="text-center">
                                                <form method="POST"
                                                    action="{{ route('manajemen-kasir-delete', $kasir->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('manajemen-kasir-edit', $kasir->id) }}"
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
