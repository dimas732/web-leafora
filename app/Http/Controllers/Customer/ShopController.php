<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Query dasar
        $query = Product::with('categories');

        // 🔍 SEARCH NAMA PRODUK
        if ($request->filled('q')) {
            $query->where('name', 'LIKE', '%' . $request->q . '%');
        }

        // 💰 FILTER HARGA
        if ($request->filled('min_price') && $request->filled('max_price')) {
            $query->whereBetween('price', [
                $request->min_price,
                $request->max_price
            ]);
        }

        // 📦 PAGINATION
        $products = $query->paginate(12);

        // 🆕 PRODUK TERBARU
        $latestProducts = Product::latest()->take(6)->get();

        // 📂 KATEGORI
        $categories = Categories::all();

        return view('Customer.Shop.index', compact(
            'products',
            'categories',
            'latestProducts'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
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

    public function category($slug)
    {
        $category = Categories::where('slug', $slug)->firstOrFail();

        // Ambil semua produk berdasarkan kategori
        $products = Product::where('category_id', $category->id)->get();

        // Hitung jumlah product
        $count = $products->count();

        return view('Customer.Shop.index', compact('products', 'category', 'count'));
    }
}
