<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Exports\ProductExport;
use App\Imports\ProductImport;
use App\Models\PurchaseDetail;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Product.index', [
            'products' => Product::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view('Admin.Product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $picture = null;

        if($request->hasFile('picture'))
        {
            $picture = $request->file('picture')->store('pictures');
        }

        $products = new Product();

        $products->name = $request->name;
        $products->category_id = $request->category_id;
        $products->price = $request->price;
        $products->cost = $request->cost;
        $products->stock = $request->stock;
        $products->unit = $request->unit;
        $products->description = $request->description;
        $products->picture = $picture;

        $products->save();
        return redirect()->route('admin.product.index')->with('success', 'Data berhasil ditambahakan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::find($id);
        $categories = Categories::all();
        return view('Admin.Product.show', compact('categories'), [
            'products' => $products
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);
        $categories = Categories::all();
        return view('Admin.Product.edit', compact('categories'), [
            'products' => $products
        ]);
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
        $products = Product::findOrFail($id);

        // Simpan nama gambar lama jika tidak ada upload baru
        $picture = $products->picture;

        if ($request->hasFile('picture')) {

            // Hapus gambar lama (jika ada)
            if (!empty($products->picture) && Storage::exists('public/' . $products->picture)) {
                Storage::delete('public/' . $products->picture);
            }

            // Upload gambar baru
            $picture = $request->file('picture')->store('products', 'public');
        }

        // Update field lainnya
        $products->name = $request->name;
        $products->category_id = $request->category_id;
        $products->price = $request->price;
        $products->cost = $request->cost;
        $products->stock = $request->stock;
        $products->unit = $request->unit;
        $products->description = $request->description;
        $products->picture = $picture;

        $products->save();

        return redirect()->route('admin.product.index')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        $products->delete();

        return redirect()->route('admin.product.index')->with('success', 'Data berhasil dihapus!');
    }

    public function export()
    {
        return Excel::download(new ProductExport, 'products.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new ProductImport, $request->file('file'));

        return redirect()->back()->with('success', 'Import berhasil!');
    }

    // Ambil harga beli terakhir
    public function getLastPurchasePrice($id)
    {
        $last = PurchaseDetail::where('product_id', $id)
            ->latest()
            ->first();

        return response()->json([
            'price' => $last ? $last->price : 0
        ]);
    }

    // Simpan produk baru via AJAX
    public function storeAjax(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'nullable|integer|min:0'
        ]);

        $product = Product::firstOrCreate(
            ['name' => $request->name],
            [
                'price' => $request->price,
                'stock' => $request->stock ?? 0
            ]
        );

        return response()->json($product);
    }
}
