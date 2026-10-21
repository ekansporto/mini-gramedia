@extends('layout.app')

@section('content')
    <div class="container mt-3">
        @if (session('success'))
            <div class="alert alert-success my-3">
                {{ session('success') }}
            </div>
        @endif
        <div class="d-flex justify-content-between">
            <h3>Data Buku</h3>
            <a href="{{ route('admin.books.create') }}"class="btn btn-success">Tambah Data Buku</a>
        </div>
        <table class="table table-bordered mt-3" id="data-buku">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Sampul Buku</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Kategori</th>
                    <th>Bahasa</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <div class="modal modal-blur fade" id="modal-detail" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <img src="" id="data-cover" class="img-fluid" alt="Sampul buku">
                        </div>
                        <div class="col-4">
                            <div>
                                <h3 class="text-primary" id="data-title"></h3>
                                <p class="badge badge-primary" id="data-category"></p>
                            </div>
                            <div>
                                <p>Harga <br> <span class="text-success" id="data-price"></span></p>
                                <p>Penerbit <br> <span id="data-publisher"></span></p>
                                <p>Tanggal Rilis <br> <span id="data-release-date"></span></p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div style="height: 50px"></div>
                            <div>
                                <p>Penulis <br> <span id="data-writer"></span></p>
                                <p>Bahasa <br> <span id="data-language"></span></p>
                                <p>Jumlah Halaman <br> <span id="data-page-of-book"></span></p>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="mt-3">
                        <p class="mb-1">Deskripsi Buku</p>
                        <div id="data-description" class="border rounded p-2"
                            style="max-height: 180px; overflow-y: auto; white-space: pre-wrap;"></div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $("#data-buku").DataTable({
                //menampilkan ikon load
                processing: true,
                //menggunakan serverside (data diproses di controller)
                serverSide: true,
                //routing yang memprosesdatabase
                ajax: "{{ route('admin.books.index') }}",
                //isi td dari tablenya
                columns: [
                    //data dan name: nama kolom, searchable : bisa di search ga datanya, orderable: bisa di urutin ga datanya
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'coverImg',
                        name: 'coverImg',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'title',
                        name: 'title',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'writer',
                        name: 'writer'
                    },
                    {
                        data: 'publisher',
                        name: 'publisher'
                    },
                    {
                        data: 'category',
                        name: 'bookCategory.name'
                    },
                    {
                        data: 'language',
                        name: 'language'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
            $("#data-buku").on('click', '#btn-detail', function() {
                const btn = $(this);
                let title = btn.data("title");
                let category = btn.data("category");
                let price = btn.data("price");
                let publisher = btn.data("publisher");
                let writer = btn.data("writer");
                let pageOfBook = btn.data("page-of-book");
                let language = btn.data('language');
                let releaseDate = btn.data("release-date");

                let description = btn.data('description');

                //simpan data ke span yang dikosongkan
                $("#data-title").text(title);
                $("#data-category")
                    .text(category);
                $("#data-price").text(price);
                $("#data-publisher").text(
                    publisher);
                $("#data-writer").text(
                    writer);
                $("#data-page-of-book").text(
                    pageOfBook);
                $("#data-release-date").text(releaseDate);
                $("#data-language").text(language);
                $("#data-description").html(description || 'Tidak ada deskripsi.');
                $("#modal-detail").modal("show");
                let
                    cover = btn.data('cover');
                $("#data-cover").attr("src", cover);
            });
        })
    </script>
@endpush
