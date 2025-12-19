<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('error', 'Keranjang masih kosong');
        }

        $total = collect($cart)->sum('subtotal');
        return view('checkout', compact('cart', 'total'));
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
        $request->validate([
            'cust_name' => 'required',
            'cust_phone' => 'required',
            'pickup_time' => 'required',
        ]);

        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('error', 'Keranjang masih kosong');
        }

        $total = collect($cart)->sum('subtotal');

        $order = null; // inisialisasi agar aman untuk reference

        try {
            DB::transaction(function () use ($request, $cart, $total, &$order) {

                // Buat order
                $order = Order::create([
                    'invoice' => 'INV-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6)),
                    'cust_name' => $request->cust_name,
                    'cust_phone' => $request->cust_phone,
                    'pickup_time' => $request->pickup_time,
                    'total_price' => $total,
                    'status' => 'pending',
                ]);

                // Simpan order detail dan kurangi stok
                foreach ($cart as $item) {
                    $product = Product::findOrFail($item['id']);

                    if ($product->stock < $item['qty']) {
                        throw new \Exception("Stok produk {$product->name} tidak mencukupi.");
                    }

                    OrderDetail::create([
                        'order_id' => $order->id,
                        'product_id' => $item['id'],
                        'price' => $item['price'],
                        'qty' => $item['qty'],
                        'subtotal' => $item['subtotal'],
                    ]);

                    $product->decrement('stock', $item['qty']);
                }

                // Kosongkan cart
                session()->forget('cart');
            });
        } catch (\Exception $e) {
            return redirect()->route('cart.index')
                ->with('error', $e->getMessage());
        }

        // Pastikan $order tidak null
        if (!$order) {
            return redirect()->route('cart.index')
                ->with('error', 'Terjadi kesalahan saat membuat order.');
        }

        // Redirect ke halaman success / invoice
        return redirect()->route('checkout.success', $order->invoice);
    }

    public function success($invoice)
    {
        $order = Order::where('invoice', $invoice)
            ->with('details.product')
            ->firstOrFail();

        return view('checkout-success', compact('order'));
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
}
