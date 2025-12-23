@extends('layout')

@php
    $preTitle = 'Data';
    $title = 'Edit - Order';
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card mb-3 p-3">
                    <h5>Data Order</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="form-label">Nama Pelanggan</label>
                            <input type="text" name="cust_name" class="form-control" value="{{ $order->cust_name }}"
                                required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="form-label">No. Telpon</label>
                            <input type="text" name="cust_phone" class="form-control" value="{{ $order->cust_phone }}"
                                required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="form-label">Waktu Ambil</label>
                            <input type="datetime-local" name="pickup_time" value="{{ $order->pickup_time }}"
                                class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="form-label">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="{{ $order->status }}">{{ $order->status }}</option>
                                <option value="Pending">Pending</option>
                                <option value="Completed">Completed</option>
                                <option value="Canceled">Canceled</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card p-3">
                    <h5>Detail Produk</h5>
                    <table id="detail-body">
                        <tbody>
                            @foreach ($order->details as $i => $detail)
                                <tr>
                                    <td>
                                        <select name="products[{{ $i }}][product_id]" class="form-select">
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}" data-price="{{ $product->price }}"
                                                    {{ $product->id == $detail->product_id ? 'selected' : '' }}>
                                                    {{ $product->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="products[{{ $i }}][qty]"
                                            class="form-control qty" value="{{ $detail->qty }}">
                                    </td>
                                    <td>
                                        <input type="number" name="products[{{ $i }}][price]"
                                            class="form-control price" value="{{ $detail->price }}" readonly>
                                    </td>
                                    <td>
                                        <input type="number" name="products[{{ $i }}][subtotal]"
                                            class="form-control subtotal" value="{{ $detail->subtotal }}" readonly>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger remove-row">X</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="button" id="add-row" class="btn btn-success mt-3">+ Tambah Produk</button>
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
