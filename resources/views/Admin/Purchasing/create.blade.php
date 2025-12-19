@extends('layout')

@php
    $preTitle = 'Data';
    $title = 'Create - Purchasing';
@endphp

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.purchasing.store') }}" method="POST">
                @csrf

                {{-- DATA PURCHASING --}}
                <div class="card mb-3 p-3">
                    <h5>Data Purchasing</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Supplier</label>
                            <select name="supplier_id" class="form-select" required>
                                <option value="">-- Pilih Supplier --</option>
                                @foreach ($suppliers as $sup)
                                    <option value="{{ $sup->id }}">
                                        {{ $sup->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Tanggal Pembelian</label>
                            <input type="date" name="purchase_date" class="form-control" value="{{ date('Y-m-d') }}"
                                required>
                        </div>
                    </div>
                </div>

                {{-- DETAIL PRODUK --}}
                <div class="card p-3">
                    <h5>Detail Produk</h5>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th width="120">Qty</th>
                                <th width="150">Harga Beli</th>
                                <th width="150">Subtotal</th>
                                <th width="80">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="detail-body">
                            <tr>
                                <td>
                                    <select name="products[0][product_id]" class="form-select product-select" required>
                                        <option value="">-- Pilih Produk --</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}" data-cost="{{ $product->cost }}">
                                                {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="products[0][qty]" class="form-control qty" value="1"
                                        min="1">
                                </td>
                                <td>
                                    <input type="number" name="products[0][price]" class="form-control price"
                                        min="0">
                                </td>
                                <td>
                                    <input type="number" class="form-control subtotal" readonly>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger remove-row">X</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <button type="button" id="add-row" class="btn btn-success">+ Tambah Produk</button>
                </div>

                <div class="text-end mt-3">
                    <a href="{{ route('admin.purchasing.index') }}" class="btn btn-secondary float-start">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Purchasing</button>
                </div>

            </form>
        </div>
    </div>

    <script>
        let row = 1;

        // Tambah baris
        document.getElementById('add-row').addEventListener('click', () => {
            const tbody = document.getElementById('detail-body');

            tbody.insertAdjacentHTML('beforeend', `
        <tr>
            <td>
                <select name="products[${row}][product_id]"
                    class="form-select product-select" required>
                    <option value="">-- Pilih Produk --</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}"
                            data-cost="{{ $product->cost }}">
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>
            </td>
            <td>
                <input type="number"
                    name="products[${row}][qty]"
                    class="form-control qty" value="1" min="1">
            </td>
            <td>
                <input type="number"
                    name="products[${row}][price]"
                    class="form-control price" min="0">
            </td>
            <td>
                <input type="number"
                    class="form-control subtotal" readonly>
            </td>
            <td>
                <button type="button"
                    class="btn btn-danger remove-row">X</button>
            </td>
        </tr>
    `);

            row++;
        });

        // Hapus baris
        document.addEventListener('click', e => {
            if (e.target.classList.contains('remove-row')) {
                e.target.closest('tr').remove();
            }
        });

        // Auto isi harga dari cost terakhir (opsional)
        document.addEventListener('change', e => {
            if (e.target.classList.contains('product-select')) {
                const tr = e.target.closest('tr');
                const cost = e.target.selectedOptions[0].dataset.cost || 0;
                tr.querySelector('.price').value = cost;
                hitung(tr);
            }
        });

        // Hitung subtotal
        document.addEventListener('input', e => {
            if (e.target.classList.contains('qty') ||
                e.target.classList.contains('price')) {
                hitung(e.target.closest('tr'));
            }
        });

        function hitung(tr) {
            const qty = tr.querySelector('.qty').value || 0;
            const price = tr.querySelector('.price').value || 0;
            tr.querySelector('.subtotal').value = qty * price;
        }
    </script>
@endsection
