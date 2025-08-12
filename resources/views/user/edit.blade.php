<x-layout>
    <x-slot:title>Edit User</x-slot:title>

    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="post">
                            @csrf
                            @method('put')
                            <x-text-input label="Nama" name="name" placeholder="Masukkan Nama User"
                                value="{{ old('name', $user->name) }}"></x-text-input>

                            <x-text-input label="Email" name="email" type="email" placeholder="Masukkan Email User"
                                value="{{ old('email', $user->email) }}"></x-text-input>

                            <x-text-input label="Password" name="password" type="password"
                                placeholder="Masukkan Password User" value="{{ old('password') }}"></x-text-input>

                            <x-text-input label="Konfirmasi Password" name="password_confirmation" type="password"
                                placeholder="Ulangi Password User" value="{{ old('password') }}"></x-text-input>

                            <div class="mb-3
                                d-flex justify-content-between">
                                <a href="{{ route('users.index') }}"><button type="button"
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
