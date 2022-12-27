<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <a href="{{ route('penjualan') }}" class="btn btn-primary mb-4">Kembali</a>
        <form action="{{ route('penjualan.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="tgl" class="form-label">tgl</label>
                <input type="datetime-local" class="form-control" id="tgl" name="tgl" required>
            </div>
            <div class="mb-3">
                <label for="karyawan_id" class="form-label">Karyawan</label>
                <select type="text" class="form-control" id="karyawan_id" name="karyawan_id" required>
                    <option value="" selected disabled hidden>Pilih Karyawan</option>
                    @foreach ($karyawan as $item => $i)
                        <option value="{{ $i->id }}">{{ $i->nama }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
