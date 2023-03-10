<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <a href="{{ route('karyawan') }}" class="btn btn-primary mb-4">Kembali</a>
        <form action="{{ route('karyawan.store') }}" method="POST">
            @csrf
            <input type="text" class="form-control" id="id" name="id" value="{{ $karyawan->id }}" hidden>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $karyawan->nama }}" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select type="text" class="form-control" id="gender" name="gender" required>
                    <option value="" selected disabled hidden>Pilih Gender</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="sandi" class="form-label">Sandi</label>
                <input type="text" class="form-control" id="sandi" name="sandi" value="{{ $karyawan->sandi }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
