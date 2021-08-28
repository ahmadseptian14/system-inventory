<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductIn;
use App\Http\Requests\ProductInRequest;
use Illuminate\Http\Request;
use PDF;

class ProductInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_ins = ProductIn::with(['product.supplier'])->get();

        return view('pages.product-in.index', compact('product_ins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();

        return view('pages.product-in.create', compact('products'));
    }

    /**

     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductInRequest $request)
    {
        $data = $request->all();

        ProductIn::create($data);

        $product = Product::findOrFail($request->products_id);
        $product->stock += $request->quantity;
        $product->save();

        return redirect()->route('product-in.index');
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
        // $product_in = ProductIn::with(['product.supplier'])->findOrFail($id);

        // $products = Product::all();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $product_in = ProductIn::findOrFail($id);
        $product_in->update($data);

        $product = Product::findOrFail($request->products_id);
        $product->stock += $request->quantity;
        $product->update();

        return redirect()->route('product-in.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_in = ProductIn::findOrFail($id);

        $product_in->delete();

        return redirect()->back();
    }

    public function exportProductInAll()
    {
        $product_ins = ProductIn::with(['product.supplier'])->get();

        $pdf = PDF::loadview('pages.product-in.product_in_pdf',['product_ins'=>$product_ins])->setOptions(['defaultFont' => 'sans-serif']);
    	return $pdf->download('laporan-produk-masuk-pdf');
    }

    public function exportInvoice($id)
    {
        $product_in = ProductIn::with(['product.supplier'])->findOrFail($id);

        $pdf = PDF::loadview('pages.product-in.invoice_pdf', ['product_in'=>$product_in])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download($product_in->id.'invoice_product_in');
    }
}
