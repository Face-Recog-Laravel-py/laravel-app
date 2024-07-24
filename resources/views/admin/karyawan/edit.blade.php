@extends('admin.partials.main')

@section('container')
    <div class="row mb-5">
        <div class="col d-flex">
            <a href="/datakaryawan"><button type="button" class="btn btn-primary me-2 d-inline"><i
                        class="bi bi-arrow-left h-4"></i></button></a>
            <h5 class="pt-1">Ubah Data Karyawan</h5>
        </div>
    </div>
    <div class="row">
        <form action="/datakaryawan/editkaryawan" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap"
                    value="{{ $karyawan->nama_lengkap }}" required>
                <label for="nama_lengkap">Nama Lengkap</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="email" value="{{ $karyawan->email }}"
                    required>
                <label for="email">Email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="password" required>
                <label for="password">New Password</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" name="role" id="role" aria-label="Floating label select example">
                    @if ($karyawan->role == 1)
                        <option value="1" selected>Admin</option>
                    @else
                        <option value="2" selected>User</option>
                    @endif
                </select>
                <label for="role">Role akun</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" name="divisi" id="divisi" aria-label="Floating label select example"
                    required>
                    <option selected>Pilih divisi</option>
                    @foreach ($divisions as $divisi)
                        <option value="{{ $divisi->kode_divisi }}">{{ $divisi->nama_divisi }}</option>
                    @endforeach
                </select>
                <label for="divisi">Divisi</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $karyawan->alamat }}">
                <label for="alamat">Alamat</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="no_hp" id="no_hp" value="{{ $karyawan->no_hp }}">
                <label for="no_hp">Telepon</label>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto Diri</label>
                @if ($karyawan->foto)
                    <img src="{{ asset('storage/' . $karyawan->foto) }}" class="img-preview img-fluid mb-2 col-sm-5">
                @else
                    <img class="img-preview img-fluid mb-2 col-sm-5">
                @endif
                <input class="form-control" type="file" name="foto" id="foto" onchange="previewImage()">
            </div>
            <input type="hidden" name="oldFoto" id="oldFoto" value="{{ $karyawan->foto }}">
            <input type="hidden" name="idKaryawan" id="idKaryawan" value="{{ $karyawan->id }}">
            <button type="submit" class="btn btn-warning d-block"><i class="bi bi-plus me-2"></i>Ubah Data
                Karyawan</button>
        </form>
    </div>
@endsection

@push('myscript')
    <script>
        function previewImage() {
            const image = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(foto.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endpush
