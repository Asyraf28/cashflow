<x-layout>
    <x-slot:title>Produk</x-slot:title>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="d-flex mb-2 justify-content-between">
            <form action="" class="d-flex gap-2 align-items-center" method="GET">
                <i class="bi bi-xl bi-filter"></i>
                <select name="category_id" id="category_id" class="form-control w-auto" onchange="this.form.submit()">
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

                <input type="text" class="form-control w-auto" placeholder="Cari Produk" name="search"
                    value="{{ request()->search }}">
                <button type="submit" class="btn btn-dark">Cari</button>
            </form>
            <a href="/products/create" class="btn btn-dark">Tambah</a>
        </div>
        <div class="card overflow-hidden mb-2">
            <table class="table m-0">
                <thead class="table-info">
                    <tr>
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @forelse ($products as $product)
                        <tr>
                            <td>
                                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                                    class="w-thumbnail img-thumbnail">
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ number_format($product->price) }}</td>
                            <td>
                                @if ($product->active)
                                    <span class="badge text-bg-primary">Aktif</span>
                                @else
                                    <span class="badge text-bg-danger">Tidak Aktif</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-start gap-2">
                                    <a href="{{ route('products.edit', ['product' => $product->id]) }}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('products.destroy', ['product' => $product->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada Produk</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $products->links() }}
    </div>
</x-layout>
