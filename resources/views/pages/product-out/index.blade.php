@extends('layouts.admin')

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Produk Keluar</h2>
            <p class="dashboard-subtitle">
                Daftar Produk Keluar
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('product-out.create') }}" class="btn btn-primary mb-3"> + Tambah Produk Keluar
                                Baru</a>
                            <div>
                                <table
                                    class="table table-hover scroll-horizontal-vertical w-100 table-bordered table-striped"
                                    id="table1">
                                    <thead>
                                        <tr>
                                            <th>Produk</th>
                                            <th>Supplier</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal Pembelian</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($product_outs as $product_out)
                                            <tr>
                                                <td>{{ $product_out->product->name }}</td>
                                                <td>{{ $product_out->product->supplier->name }}</td>
                                                <td>{{ $product_out->quantity }}</td>
                                                <td>{{$product_out->date}}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <div class="dropdown">
                                                            <button class="btn btn-primay dropdown-toggle mr-1 mb-1"
                                                                type="button" data-toggle="dropdown">
                                                                Aksi
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                {{-- <a href="{{ route('product-in.edit', $product_out->id) }}"
                                                                    class="dropdown-item">
                                                                    Edit
                                                                </a> --}}
                                                                <form
                                                                    action="{{ route('product-in.destroy', $product_out->id) }}"
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
                                                <td colspan="7" class="text-center">Tidak Ada Product</td>
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