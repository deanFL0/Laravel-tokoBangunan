<script>
    function total()
    {
        var sel = document.getElementById('produk_id');
        var text= sel.options[sel.selectedIndex].text;
        var harga = text.split('|')[1].split('Rp.')[1];

        var qty = document.getElementById('qty').value;
        var total = qty * harga;
        document.getElementById('harga').value = total;
    }
    function max()
    {
        var sel = document.getElementById('produk_id');
        var text= sel.options[sel.selectedIndex].text;
        var stok = text.split('|')[2].split('Stok: ')[1];

        document.getElementById('qty').max = stok;
    }
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Penjualan Has Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <a href="{{ route('penjualanHasProduk') }}" class="btn btn-primary mb-4">Kembali</a>
        <form action="{{ route('penjualanHasProduk.store') }}" method="POST">
            @csrf
            <input type="text" class="form-control" id="id" name="id"
                value="{{ $penjualanHasProduk->id }}" hidden>
                <div class="mb-3">
                    <label for="produk_id" class="form-label">Produk</label>
                    <select type="text" class="form-control" id="produk_id" name="produk_id" onchange="total(); max()" required>
                        <option value="" selected disabled hidden>Pilih produk</option>
                        @foreach ($produk as $item => $i)
                            <option value="{{ $i->id }}">{{ $i->produk }} | Rp.{{ $i->harga }} | Stok: {{ $i->stok }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="penjualan_id" class="form-label">Penjualan</label>
                    <select type="text" class="form-control" id="penjualan_id" name="penjualan_id" required>
                        <option value="" selected disabled hidden>Pilih penjualan</option>
                        @foreach ($penjualan as $item => $i)
                            <option value="{{ $i->id }}">{{ $i->tgl }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="qty" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="qty" name="qty" onchange="total()" required>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga Total</label>
                    <input type="text" class="form-control" id="harga" name="harga" readonly>
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
