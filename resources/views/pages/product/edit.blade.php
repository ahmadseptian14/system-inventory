@extends('layouts.admin')

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
    <div class="dashboard-heading">
        <h2 class="dashboard-title">Product</h2>
        <p class="dashboard-subtitle">
            Edit Data Product
        </p>
    </div>
    <div class="dashboard-content">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>   
            @endif
                <div class="card">
                    <div class="card-body">
                       <form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                        @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Supplier</label>
                                        <select name="suppliers_id" id="suppliers_id" class="form-control select2">
                                            <option value="{{$product->supplier->id}}">Dipilih {{$product->supplier->name}}</option>
                                            @foreach ($suppliers as $supplier)
                                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select name="categories_id" id="categories_id" class="form-control select2">
                                            <option value="{{$product->category->id}}">Dipilih {{$product->category->name}}</option>
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Produk</label>
                                        <input type="text" name="name" class="form-control" required value="{{$product->name}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="number" name="price" class="form-control" required value="{{$product->price}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Gambar</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Stok</label>
                                        <input type="number" name="stock" class="form-control" required value="{{$product->stock}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea name="keterangan" cols="10" rows="5" class="form-control">{{$product->keterangan}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-right">
                                    <button type="submit" class="btn btn-success px-5">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('addon-scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
            theme: "classic"
        });
    </script>
@endpush