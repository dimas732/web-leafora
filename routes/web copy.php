<?php

use App\Http\Controllers\Admin\BatchController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\category\FruitController;
use App\Http\Controllers\Customer\category\HerbController;
use App\Http\Controllers\Customer\category\OthersController;
use App\Http\Controllers\Customer\category\ProteinController;
use App\Http\Controllers\Customer\category\SayurController;
use App\Http\Controllers\Customer\CheckoutController;
use App\Http\Controllers\Customer\DashboardController as CustomerDashboard;
use App\Http\Controllers\Customer\InvoiceController;
use App\Http\Controllers\Customer\ShopController;
use Illuminate\Support\Facades\Route;







/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/landing-page', [CustomerDashboard::class, 'index'])->name('landing-page');
Route::get('/category/{slug}', [ShopController::class, 'category'])->name('category.show');

Route::get('/shopping-page', [ShopController::class, 'index'])->name('shop-grid');



Route::get('/', [DashboardController::class, 'index']);

Route::prefix('category-page')->name('category-page.')->group(
    function () {
        Route::get('/fruit', [FruitController::class, 'index'])->name('fruit.index');
        Route::get('/vagetables', [SayurController::class, 'index'])->name('vegetables.index');
        Route::get('/protein', [ProteinController::class, 'index'])->name('protein.index');
        Route::get('/herbs', [HerbController::class, 'index'])->name('herbs.index');
        Route::get('/others', [OthersController::class, 'index'])->name('others.index');
        Route::get('/staples', [OthersController::class, 'index'])->name('staples.index');
    }
);

Route::get('/product/{id}', [ProductController::class, 'detail'])->name('product.detail');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/about-us', function() {
    return view('about-us');
})->name('about-us');

Route::get('/checkout', [CheckoutController::class, 'index'])
    ->name('checkout.index');

Route::post('/checkout', [CheckoutController::class, 'store'])
    ->name('checkout.store');

Route::get('/checkout/success/{invoice}', [CheckoutController::class, 'success'])
    ->name('checkout.success');

Route::get('/invoice/{invoice}/pdf', [InvoiceController::class, 'pdf'])
    ->name('invoice.pdf');

// User
Route::prefix('admin')->name('admin.')->group(
    function () {
        // Helpdesk Front Office - Ticket Management
        Route::prefix('user')->name('user.')->controller(UserController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}', 'show')->name('show');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        // customers
        Route::prefix('customer')->name('customer.')->controller(CustomerController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}', 'show')->name('show');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        // suppliers
        Route::prefix('supplier')->name('supplier.')->controller(SupplierController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/export', 'export')->name('export');
            Route::post('/import', 'import')->name('import');
            Route::get('/{id}', 'show')->name('show');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        // categories
        Route::prefix('categories')->name('categories.')->controller(CategoriesController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/export', 'export')->name('export');
            Route::post('/import', 'import')->name('import');
            Route::get('/{id}', 'show')->name('show');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        // product
        Route::prefix('product')->name('product.')->controller(ProductController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/export', 'export')->name('export');
            Route::post('/import', 'import')->name('import');
            Route::get('/{id}', 'show')->name('show');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        // orders
        Route::prefix('orders')->name('orders.')->controller(OrderController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}', 'show')->name('show');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        // dashboard
        Route::prefix('dashboard')->name('dashboard.')->controller(DashboardController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}', 'show')->name('show');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        // batch
        Route::prefix('batch')->name('batch.')->controller(BatchController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/export', 'export')->name('export');
            Route::post('/import', 'import')->name('import');
            Route::get('/{id}', 'show')->name('show');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });
    }
);
