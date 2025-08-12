<x-layout>
    <x-slot:title>Tambah Produk</x-slot:title>

    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Kategori</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    @forelse ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @empty
                                        <option value="">Belum ada kategori</option>
                                    @endforelse
                                </select>
                            </div>
                            <x-text-input label="Nama" name="name" placeholder="Masukkan nama produk"
                                value="{{ old('name') }}"></x-text-input>
                            <x-text-input label="Harga" name="price" type="number"
                                placeholder="Masukkan harga produk" value="{{ old('price') }}"></x-text-input>
                            <div class="mb-3">
                                <label for="image" class="form-label">Gambar</label>
                                <input class="form-control" type="file" id="image" name="image"
                                    accept="image/jpeg,image/png">
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" role="switch" id="active"
                                    name="active" @checked(!old() || old('active') == 'on')>
                                <label class="form-check-label" for="active">Aktif</label>
                            </div>
                            <div class="mb-3 d-flex justify-content-between">
                                <a href="{{ route('products.index') }}"><button type="button"
                                        class="btn btn-danger">Batal</button></a>
                                <button class="btn btn-dark">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
