<x-layout>
    <x-slot:title>User</x-slot:title>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="d-flex mb-2 justify-content-between">
            <form action="" class="d-flex gap-2" method="GET">
                <input type="text" class="form-control w-auto" placeholder="Cari User" name="search"
                    value="{{ request()->search }}">
                <button type="submit" class="btn btn-dark">Cari</button>
            </form>
            <div class="col-4 d-flex mb-2 justify-content-end">
                <a href="/users/create" class="btn btn-dark">Tambah</a>
            </div>
        </div>
        <div class="card overflow-hidden">
            <table class="table m-0">
                <thead class="table-info">
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="d-flex justify-content-start gap-2">
                                <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                    class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post">
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
