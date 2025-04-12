@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Barang</h3>
            <div class="card-tools">
                @php
                    $role = Auth::user()->getRole();
                @endphp

                @if ($role != 'CUS')
                <button onclick="modalAction('{{ url('/barang/import') }}')" class="btn btn-info">Import Barang</button>
                <a href="{{ url('/barang/export_excel') }}" class="btn btn-primary"><i class="fa fa-fileexcel"></i>Export Barang (Excel)</a>
                <a href="{{ url('/barang/export_pdf') }}" class="btn btn-warning"><i class="fa fa-filepdf"></i> Export Barang (PDF)</a>
                <button onclick="modalAction('{{ url('barang/create_ajax') }}')" class="btn btn-success">Tambah Data Ajax</button>
                @endif
            </div>
        </div>
        <div class="card-body">
            <div id="filter" class="form-horizontal filter-date p-2 border-bottom mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-sm row text-sm mb-0">
                            <label for="filter_date" class="col-md-1 col-form-label">Filter</label>
                            <div class="col-md-3">
                                <select name="filter_kategori" class="form-control form-control-sm filter_kategori">
                                    <option value="">- Semua -</option>
                                    @foreach($kategori as $l)
                                        <option value="{{ $l->kategori_id }}">{{ $l->kategori_nama }}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Kategori Barang</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table table-bordered table-sm table-striped table-hover" id="table_barang">
                <thead>
                    <tr>
                        <th style="text-align: center;"> No</th>
                        @if ($role != 'CUS')
                        <th style="text-align: center;"> Id Barang</th>
                        @endif
                        <th style="text-align: center;"> Kode Barang</th>
                        <th style="text-align: center;"> Nama Barang</th>
                        <th style="text-align: center;"> Kategori</th>
                        @if ($role != 'CUS')
                        <th style="text-align: center;"> Harga Beli</th>
                        @endif
                        <th style="text-align: center;"> Harga Jual</th>
                        @if ($role != 'CUS')
                            <th style="text-align: center;">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <div id="myModal" class="modal fade animate shake" tabindex="-1" data-backdrop="static" data-keyboard="false"
        data-width="75%"></div>
@endsection

@push('js')
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function () {
                $('#myModal').modal('show');
            });
        }

        var tableBarang;
        $(document).ready(function () {
            tableBarang = $('#table_barang').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url()->current() }}/list",
                    dataType: "json",
                    type: "POST",
                    data: function (d) {
                        d.filter_kategori = $('.filter_kategori').val();
                    }
                },
                columns: [
                    { data: "DT_RowIndex", className: "text-center", width: "4%", orderable: false, searchable: false },
                    @if ($role != 'CUS')
                    { data: "barang_id", className: "text-center", width: "7%" },
                    @endif
                    { data: "barang_kode", className: "text-center", width: "10%" },
                    { data: "barang_nama", width: "30%" },
                    { data: "kategori.kategori_nama", width: "14%" },
                    @if ($role != 'CUS')
                    { data: "harga_beli", width: "10%", render: data => new Intl.NumberFormat('id-ID').format(data) },
                    @endif
                    { data: "harga_jual", width: "10%", render: data => new Intl.NumberFormat('id-ID').format(data) },
                    @if ($role != 'CUS')
                    {data: "aksi", orderable: false, searchable: false}
                    @endif
                    ]
            });

            $('#table-barang_filter input').unbind().bind().on('keyup', function (e) {
                if (e.keyCode == 13) tableBarang.search(this.value).draw();
            });

            $('.filter_kategori').change(function () {
                tableBarang.draw();
            });
        });
    </script>
@endpush