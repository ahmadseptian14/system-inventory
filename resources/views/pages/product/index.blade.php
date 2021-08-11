@extends('layouts.admin')

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Product</h2>
                <p class="dashboard-subtitle">
                    Daftar Product
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('product.create') }}" class="btn btn-primary mb-3"> + Tambah Product
                                    Baru</a>
                                <div>
                                    <table
                                        class="table table-hover scroll-horizontal-vertical w-100 table-bordered table-striped"
                                        id="table1">
                                        <thead>
                                            <tr>
                                                <th>Nama Produk</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                                <th>Kategori</th>
                                                <th>Supplier</th>
                                                <th>Gambar</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($products as $product)
                                                <tr>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->price }}</td>
                                                    <td>{{ $product->stock }}</td>
                                                    <td>{{$product->category->name}}</td>
                                                    <td>{{ $product->supplier->name }}</td>
                                                    <td> 
                                                        <img src="{{ Storage::url($product->image) }}"  width="50" height="50" class="rounded-square">
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <div class="dropdown">
                                                                <button class="btn btn-primay dropdown-toggle mr-1 mb-1"
                                                                    type="button" data-toggle="dropdown">
                                                                    Aksi
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a href="{{ route('product.edit', $product->id) }}"
                                                                        class="dropdown-item">
                                                                        Edit
                                                                    </a>
                                                                    <form
                                                                        action="{{ route('product.destroy', $product->id) }}"
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