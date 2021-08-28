<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\ProductOut;
use App\Models\Product;
use App\Http\Requests\ProductOutRequest;
use Illuminate\Http\Request;
use PDF;

class ProductOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_outs = ProductOut::with(['product.supplier'])->get();

        return view('pages.product-out.index', compact('product_outs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $customers = Customer::all();

        return view('pages.product-out.create', compact('products', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductOutRequest $request)
    {
        $data = $request->all();

        ProductOut::create($data);

        $product = Product::findOrFail($request->products_id);
        $product->stock -= $request->quantity;
        $product->save();

        return redirect()->route('product-out.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cetak_pdf()
    {
        $product_outs = ProductOut::with(['product', 'customer'])->get();

        $pdf = PDF::loadview('pages.product-out.product_out_pdf',['product_outs'=>$product_outs])->setOptions(['defaultFont' => 'sans-serif']);
    	return $pdf->download('laporan-produk-masuk-pdf');
    }

    public function exportInvoice($id)
    {
        $product_out = ProductOut::with(['product', 'customer'])->findOrFail($id);

        $pdf = PDF::loadview('pages.product-out.invoice_pdf',['product_out'=>$product_out])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download($product_out->id.'invoice_product_out');
    }
}
