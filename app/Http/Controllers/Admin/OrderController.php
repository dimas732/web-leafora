<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Order::query();

        if ($request->filled('q')) {
            $q = $request->q;

            $query->where(function ($sub) use ($q) {
                $sub->where('invoice', 'like', "%{$q}%")
                    ->orWhere('status', 'like', "%{$q}%")
                    ->orWhere('cust_name', 'like', "%{$q}%");
            });
        }

        $orders = $query->latest()->paginate(10)->withQueryString();

        return view('Admin.Order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('Admin.Order.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cust_name' => 'required',
            'cust_phone' => 'required',
            'pickup_time' => 'required|date',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.qty' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();
        try {

            // 1. Validasi stok cukup
            foreach ($request->products as $p) {
                $produk = Product::find($p['product_id']);
                if ($produk->stock < $p['qty']) {
                    return back()->with('error', "Stok produk {$produk->name} hanya {$produk->stock}");
                }
            }

            // 2. Simpan order
            $order = Order::create([
                'cust_name'     => $request->cust_name,
                'pickup_time'   => $request->pickup_time,
                'cust_phone'    => $request->cust_phone,
                'total_price'   => 0
            ]);

            $total = 0;

            // 3. Simpan detail + kurangi stok
            foreach ($request->products as $p) {

                $produk = Product::find($p['product_id']);

                $subtotal = $p['qty'] * $p['price'];
                $total += $subtotal;

                $order->details()->create([
                    'product_id' => $p['product_id'],
                    'qty'        => $p['qty'],
                    'price'      => $p['price'],
                    'subtotal'   => $subtotal
                ]);

                // Kurangi stok
                $produk->decrement('stock', $p['qty']);
            }

            // 4. Update total harga
            $order->update(['total_price' => $total]);

            DB::commit();
            return redirect()->route('admin.orders.index')->with('success', 'Order berhasil dibuat!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = Order::with(['details.product'])->find($id);
        $products = Product::all();
        return view('Admin.Order.show', compact('products', 'orders'), [
            'orders' => $orders
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
        $order = Order::with('details')->findOrFail($id);
        $products = Product::all(); // untuk select produk

        return view('Admin.Order.edit', compact('order', 'products'));
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
        $request->validate([
            'cust_name' => 'required',
            'cust_phone' => 'required',
            'pickup_time' => 'required|date',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.qty' => 'required|integer|min:1',
            'products.*.price' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();
        try {

            $order = Order::findOrFail($id);

            // Update data order utama
            $order->update([
                'cust_name'   => $request->cust_name,
                'cust_phone'   => $request->cust_phone,
                'pickup_time' => $request->pickup_time,
                'status' => $request->status
            ]);

            // Hapus detail lama
            $order->details()->delete();

            $total = 0;

            // Simpan detail baru
            foreach ($request->products as $product) {
                $subtotal = $product['qty'] * $product['price'];
                $total += $subtotal;

                $order->details()->create([
                    'product_id' => $product['product_id'],
                    'qty'        => $product['qty'],
                    'price'      => $product['price'],
                    'subtotal'   => $subtotal,
                ]);
            }

            // Update total
            $order->update(['total_price' => $total]);

            DB::commit();

            return redirect()->route('admin.orders.index')
                ->with('success', 'Order berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menyimpan order: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $orders = Order::with('details')->findOrFail($id);

            // Hapus semua detail orders
            foreach ($orders->details as $detail) {
                $detail->delete();
            }

            // Hapus orders utamanya
            $orders->delete();

            DB::commit();
            return back()->with('success', 'Order berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menghapus order: ' . $e->getMessage());
        }
    }
}
