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
                       <form action="{{route('product-in.update', $product_in->id)}}" method="POST" enctype="multipart/form-data">
                        @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Produk</label>
                                        <select name="products_id" id="products_id" class="form-control select2" >
                                            <option value="{{$product_in->product->id}}">Dipilih {{$product_in->product->name}}</option>
                                            @foreach ($products as $product)
                                            <option value="{{$product->id}}">{{$product->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <input type="number" name="quantity" class="form-control" required value="{{$product_in->quantity}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                       <input type="date"  class="form-control datetimepicker" id="date" name="date" required value="{{$product_in->date}}">
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