<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Query Produk Terlaris
        $topProducts = DB::table('det_orders')
            ->join('products', 'det_orders.product_id', '=', 'products.id')
            ->select(
                'products.id',
                'products.name',
                'products.stock',
                DB::raw('SUM(det_orders.qty) as total_sold'),
                DB::raw('SUM(det_orders.subtotal) as total_revenue')
            )
            ->groupBy(
                'products.id',
                'products.name',
                'products.stock'
            )
            ->orderByDesc('total_sold')
            ->limit(5)
            ->get();

        // CARD 1: Pendapatan Hari Ini
        $todayRevenue = DB::table('orders')
            ->whereDate('created_at', Carbon::today())
            ->sum('total_price');

        // CARD 2: Total Order
        $totalOrders = DB::table('orders')->count();

        // CARD 3: Produk Tersedia (stock > 0)
        $availableProducts = DB::table('products')
            ->where('stock', '>', 0)
            ->count();

        // CARD 4: Produk Habis (stock = 0)
        $outOfStock = DB::table('products')
            ->where('stock', '=', 0)
            ->count();

        // === LINE CHART: TOTAL PENJUALAN PER BULAN ===
        $monthlySales = DB::table('orders')
            ->select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(total_price) as total')
            )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $salesMonths = $monthlySales->pluck('month');
        $salesValues = $monthlySales->pluck('total');

        // === BAR CHART : ORDER 7 HARI TERAKHIR ===
        $weeklyOrders = DB::table('orders')
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as total')
            )
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $orderDates = $weeklyOrders->pluck('date');
        $orderValues = $weeklyOrders->pluck('total');


        return view('Admin.Dashboard.index', compact(
            'topProducts',
            'todayRevenue',
            'totalOrders',
            'availableProducts',
            'outOfStock',
            'salesMonths',
            'salesValues',
            'orderDates',
            'orderValues'
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
}
