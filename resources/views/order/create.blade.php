<x-layout title="Orders">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-grid gap-4">
                    <form class="hstack gap-2" method="get">
                        <i class="bi bi-filter"></i>
                        <select name="category_id" id="category_id" class="form-control w-auto"
                            onchange="this.form.submit()">
                            <option value="">
                                Semua Kategori
                            </option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request()->category_id == $category->id ? 'selected' : '' }}>>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>

                        <div class="input-group">
                            <input type="text" placeholder="Cari product" class="form-control" name="search"
                                value="{{ request()->search }}">
                        </div>

                        <button type="submit" class="btn btn-dark">Cari</button>
                    </form>

                    <div class="row g-2">
                        @forelse ($products as $product)
                            <div class="col-3">
                                <a href="{{ route('orders.create.detail', ['product' => $product->id]) }}"
                                    class="text-decoration-none">
                                    <div class="card product-card">
                                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                                            class="card-img-top border-bottom">
                                        <div class="card-body">
                                            <div class="fw-bold">{{ $product->name }}</div>
                                            <div class="hstack">
                                                <small>{{ $product->category->name }}</small>
                                                <small class="ms-auto">
                                                    Rp{{ number_format($product->price) }}
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <div class="col text-center">Belum ada produk</div>
                        @endforelse

                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <form class="card" method="POST" action="{{ route('orders.checkout') }}">
                    @csrf
                    <div class="card-body border-bottom fw-bold">Transaksi</div>

                    <div class="card-body border-bottom">
                        <x-text-input name="customer" label="Kostumer"
                            value="{{ session('order')->customer }}"></x-text-input>
                    </div>

                    <div class="card-body bg-body-tertiary border-bottom">
                        <div class="vstack gap-2">
                            @php
                                $total = 0;
                            @endphp
                            @forelse (session('order')->details as $detail)
                                @php
                                    $total += $detail->qty * $detail->price;
                                @endphp
                                <a href="{{ route('orders.create.detail', ['product' => $detail->product_id]) }}"
                                    class="text-decoration-none">
                                    <div class="card product-card">
                                        <div class="card-body">
                                            <div>{{ $detail->product->name }}</div>
                                            <div class="d-flex justify-content-between">
                                                <div class="form-text">{{ $detail->qty }} x
                                                    {{ number_format($detail->price) }}</div>
                                                <div class="ms-auto form-text">
                                                    Rp{{ number_format($detail->qty * $detail->price) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <div class="text-center">Belum ada Produk</div>
                            @endforelse
                        </div>
                    </div>

                    <div class="card-body border-bottom d-grid gap-2">
                        <div class="d-flex justify-content-between">
                            <div>Total</div>
                            <h4 class="ms-auto mb-0 fw-bold">Rp{{ number_format($total) }}</h4>
                        </div>
                        <div>
                            <x-text-input name="payment" label="Pembayaran" type="number"></x-text-input>
                        </div>
                    </div>

                    <div class="card-body d-flex flex-row-reverse justify-content-between">
                        <button class="ms-auto btn btn-dark">Checkout</button>
                        <a href="{{ route('orders.index') }}"><button type="button"
                                class="btn btn-danger">Batal</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
