@extends('layout')

@php
    $preTitle = 'Data';
    $title = 'Create - Order';
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.orders.store') }}" method="POST">
                @csrf

                <div class="card mb-3 p-3">
                    <h5>Data Order</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="form-label">Nama Pelanggan</label>
                            <input type="text" name="cust_name" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="form-label">No. Telpon</label>
                            <input type="text" name="cust_phone" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="form-label">Waktu Ambil</label>
                            <input type="datetime-local" name="pickup_time" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="card p-3">
                    <h5>Detail Produk</h5>
                    <table class="table" id="detail-table">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="detail-body">
                            <tr>
                                <td>
                                    <select name="products[0][product_id]" class="form-select" required>
                                        <option value="">-- Pilih Produk --</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}" data-price="{{ $product->price }}"
                                                {{ $product->stock <= 0 ? 'disabled' : '' }}>
                                                {{ $product->name }} (Stok: {{ $product->stock }})
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="number" name="products[0][qty]" class="form-control qty" value="1">
                                </td>
                                <td><input type="number" name="products[0][price]" class="form-control price" readonly>
                                </td>
                                <td><input type="number" name="products[0][subtotal]" class="form-control subtotal"
                                        readonly></td>
                                <td><button type="button" class="btn btn-danger remove-row">x</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" id="add-row" class="btn btn-success">+ Tambah Produk</button>
                </div>

                <div class="text-end mt-3">
                    <a href="{{ route('admin.orders.index') }}" class="btn float-start">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Order</button>
                </div>
            </form>

            <script>
                let row = 1;
                document.getElementById('add-row').addEventListener('click', function() {
                    const tbody = document.getElementById('detail-body');
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                    <td>
                        <select name="products[${row}][product_id]" class="form-select" required>
                            <option value="">-- Pilih Produk --</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="number" name="products[${row}][qty]" class="form-control qty" value="1"></td>
                    <td><input type="number" name="products[${row}][price]" class="form-control price" readonly></td>
                    <td><input type="number" name="products[${row}][subtotal]" class="form-control subtotal" readonly></td>
                    <td><button type="button" class="btn btn-danger remove-row">X</button></td>
                `;
                    tbody.appendChild(tr);
                    row++;
                });

                // Hapus baris
                document.addEventListener('click', function(e) {
                    if (e.target.classList.contains('remove-row')) {
                        e.target.closest('tr').remove();
                    }
                });

                // Update harga & subtotal otomatis
                document.addEventListener('change', function(e) {
                    if (e.target.matches('select[name*="[product_id]"]')) {
                        const price = e.target.selectedOptions[0].getAttribute('data-price');
                        const tr = e.target.closest('tr');
                        tr.querySelector('.price').value = price;
                        const qty = tr.querySelector('.qty').value;
                        tr.querySelector('.subtotal').value = price * qty;
                    }
                });
                document.addEventListener('input', function(e) {
                    if (e.target.classList.contains('qty')) {
                        const tr = e.target.closest('tr');
                        const qty = e.target.value;
                        const price = tr.querySelector('.price').value;
                        tr.querySelector('.subtotal').value = price * qty;
                    }
                });
            </script>

        </div>
    </div>
@endsection
