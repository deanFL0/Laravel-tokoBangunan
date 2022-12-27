@extends('adminlte')


@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <title>Data Produk</title>
    </head>

    <body>
        <div class="container">
            <div class="alert alert-success text-center" role="alert">
                <h1>
                    Data Produk
                </h1>
            </div>
            <a href="{{ route('produk.create') }}" class="btn btn-primary mb-4">+ Tambah Produk</a>
            <table class="table table-hover table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produk as $item => $i)
                        <tr>
                            <td>{{ $item + 1 }}</td>
                            <td>{{ $i->produk }}</td>
                            <td>{{ $i->harga }}</td>
                            <td>{{ $i->stok }}</td>
                            <td>
                                <a href="{{ route('produk') }}/{{ $i->id }}/edit" class="btn btn-warning">Edit</a>
                                <form action="javascript:void(0)" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger" data-id="{{ $i->id }}">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"
            integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @if (session('status'))
            <script>
                Swal.fire({
                    width: 600,
                    text: "{{ session('status') }}",
                    button: "OK"
                });
            </script>
        @endif

        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('.btn-danger').click(function(e) {
                    e.preventDefault();
                    var data = $(this).data('id');
                    Swal.fire({
                        title: 'Apakah anda yakin akan menghapus data?',
                        text: "Data yang dihapus tidak dapat dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "DELETE",
                                url: "{{ url('produk') }}" + '/' + data + '/hapus',
                                success: function(data) {
                                    location.reload();
                                },
                                error: function(data) {
                                    location.reload();

                                }
                            });
                        }
                    })
                })
            });
        </script>
    </body>

    </html>
@stop
