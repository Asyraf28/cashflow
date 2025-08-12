<x-layout>
    <x-slot:title>Kategori</x-slot:title>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="d-flex mb-2 justify-content-between">
            <form action="" class="d-flex gap-2" method="GET">
                <input type="text" class="form-control w-auto" placeholder="Cari Kategori" name="search"
                    value="{{ request()->search }}">
                <button type="submit" class="btn btn-dark">Cari</button>
            </form>
            <a href="/categories/create" class="btn btn-dark">Tambah</a>
        </div>
        <div class="card overflow-hidden">
            <table class="table m-0">
                <thead class="table-info">
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                @if ($category->active)
                                    <span class="badge text-bg-primary">Aktif</span>
                                @else
                                    <span class="badge text-bg-danger">Tidak Aktif</span>
                                @endif
                            </td>
                            <td class="d-flex justify-content-start gap-2">
                                <a href="{{ route('categories.edit', ['category' => $category->id]) }}"
                                    class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('categories.destroy', ['category' => $category->id]) }}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Belum ada Kategori</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
