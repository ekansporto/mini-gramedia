@extends('layout.app')

@section('content')
    <div class="container mt-3">
        @if (session('success'))
            <div class="alert alert-success my-3">
                {{ session('success') }}
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0">
                Data Buku yang akan dipilih untuk Paket Langganan:
                <span class="fw-bold">{{ $subscriptionPackage->name }}</span>
            </h3>
        </div>

        <form action="{{ route('admin.subscription-packages.store', $subscriptionPackage->id) }}" id="addBookForm"
            method="POST">
            @csrf
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span class="fw-bold">Daftar Buku</span>
                    <button type="submit" id="btnSubmitBooks" class="btn btn-primary d-none">
                        <i class="fas fa-plus me-1"></i> Tambahkan Ke Paket Langganan (<span id="selectedCount">0</span>)
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0 w-100" id="data-buku">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>#</th>
                                    <th>Sampul Buku</th>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Penerbit</th>
                                    <th>Kategori</th>
                                    <th>Bahasa</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
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
                ajax: "{{ route('admin.subscription-packages.books', $subscriptionPackage->id) }}",
                //isi td dari tablenya
                columns: [
                    //data dan name: nama kolom, searchable : bisa di search ga datanya, orderable: bisa di urutin ga datanya
                    {
                        data: 'id',
                        //yangdikirimkanketikaceklisbuku ituidnyakarnayan gdiperlukansubscriptionpackagebookitu idbuku
                        name: 'id',
                        orderable: false,
                        searchable: false,
                        //samakayaeditcolumn diserverside
                        render: function(data, type, row) {
                            if (row['checkAdded'] === 'Ya') {
                                return '';
                            }
                            return `<input type="checkbox" value="${row['id']}" name="book_ids[]" class="book-checkbox">`;
                        }
                    },
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
                    }
                ]
            });

            function updateButtonVisibility() {
                const checkedCount = $('.book-checkbox:checked').length;
                $('#selectedCount').text(checkedCount);
                if (checkedCount > 0) {
                    $('#btnSubmitBooks').removeClass('d-none');
                } else {
                    $('#btnSubmitBooks').addClass('d-none');
                }
            }
            $('#data-buku tbody').on('change', '.book-checkbox', function() {
                updateButtonVisibility();
            });

            $('#data-buku').on('draw.dt', function() {
                updateButtonVisibility();
            });
        })
    </script>
@endpush
