@extends('layouts.admin')

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Supplier</h2>
                <p class="dashboard-subtitle">
                    Daftar Supplier
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('supplier.create') }}" class="btn btn-primary mb-3"> + Tambah Supplier
                                    Baru</a>
                                <div">
                                    <table
                                        class="table table-hover table-bordered table-striped"
                                        id="table1" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Nomor Telepon</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($suppliers as $supplier)
                                                <tr>
                                                    <td>{{ $supplier->name }}</td>
                                                    <td>{{ $supplier->address }}</td>
                                                    <td>{{ $supplier->phone }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <div class="dropdown">
                                                                <button class="btn btn-primay dropdown-toggle mr-1 mb-1"
                                                                    type="button" data-toggle="dropdown">
                                                                    Aksi
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a href="{{ route('supplier.edit', $supplier->id) }}"
                                                                        class="dropdown-item">
                                                                        Edit
                                                                    </a>
                                                                    <form
                                                                        action="{{ route('supplier.destroy', $supplier->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="submit"
                                                                            class="dropdown-item text-danger">
                                                                            Hapus
                                                                        </button>
                                                                     </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center">Tidak Ada Supplier</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-scripts')
    <script>
        $(document).ready( function () {
            $('#table1').DataTable();
        } );
    </script>
@endpush
