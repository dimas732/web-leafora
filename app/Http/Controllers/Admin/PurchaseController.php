<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\PurchaseDetail;
use App\Models\Purchasing;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchasing = Purchasing::with('supplier')
            ->get();

        return view('Admin.Purchasing.index', compact('purchasing'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $products  = Product::all();

        return view('Admin.Purchasing.create', compact('suppliers', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd('MASUK CONTROLLER', $request->all());
        // $request->validate([
        //     'sup_id' => 'required',
        //     'items.*.product_id' => 'required',
        //     'items.*.qty' => 'required|numeric|min:1',
        //     'items.*.cost' => 'required|numeric|min:0'
        // ]);

        $request->validate([
            'sup_id'             => 'required|exists:suppliers,id',
            'purchase_date'           => 'required|date',
            'items'                => 'required|array|min:1',
            'items.*.product_id'   => 'required|exists:items,id',
            'items.*.qty'          => 'required|integer|min:1',
            'items.*.price'        => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();

        try {

            // 1️⃣ SIMPAN PURCHASING (HEADER)
            $purchase = Purchasing::create([
                'sup_id'  => $request->sup_id,
                'purchase_date' => $request->purchase_date,
                'total_price'  => 0,
                'status' => 'Pending'
            ]);

            $total = 0;

            // 2️⃣ DETAIL + UPDATE STOCK & COST
            foreach ($request->products as $p) {

                $product = Product::lockForUpdate()
                    ->find($p['product_id']);

                $qty   = $p['qty'];
                $price = $p['price']; // harga beli
                $subtotal = $qty * $price;

                // Data lama
                $oldStock = $product->stock;
                $oldCost  = $product->cost;

                // 🧮 AVERAGE COST
                if ($oldStock == 0) {
                    $newCost = $price;
                } else {
                    $newCost = (
                        ($oldStock * $oldCost) + ($qty * $price)
                    ) / ($oldStock + $qty);
                }

                // ➕ Update product
                $product->update([
                    'stock' => $oldStock + $qty,
                    'cost'  => $newCost,
                ]);

                // 💾 Simpan detail
                $purchase->details()->create([
                    'product_id' => $product->id,
                    'qty'        => $qty,
                    'price'      => $price,
                    'subtotal'   => $subtotal,
                ]);

                $total += $subtotal;
            }

            // 3️⃣ UPDATE TOTAL
            $purchase->update([
                'total_price' => $total,
            ]);

            DB::commit();

            return redirect()
                ->route('admin.purchasing.index')
                ->with('success', 'Purchasing berhasil disimpan');
        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
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
