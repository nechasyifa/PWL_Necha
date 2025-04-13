@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Pembayaran</h3>
            <div class="card-tools">
                <button onclick="modalAction('{{ url('/pembayaran/import') }}')" class="btn btn-info">Import Pembayaran</button>
                <a href="{{ url('/pembayaran/export_excel') }}" class="btn btn-primary"><i class="fa fa-fileexcel"></i> Export Pembayaran (Excel)</a>
                <a href="{{ url('/pembayaran/export_pdf') }}" class="btn btn-warning"><i class="fa fa-filepdf"></i> Export Pembayaran (PDF)</a>
                <button onclick="modalAction('{{ url('pembayaran/create_ajax') }}')" class="btn btn-success">Tambah Data Ajax</button>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table table-bordered table-striped table-hover table-sm" id="table_pembayaran">
                <thead>
                    <tr>
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">Id Pembayaran</th>
                        <th style="text-align: center;">Id Penjualan</th>
                        <th style="text-align: center;">Metode Bayar</th>
                        <th style="text-align: center;">Jumlah</th>
                        <th style="text-align: center;">Kembalian</th>
                        <th style="text-align: center;">Status</th>
                        <th style="text-align: center;">Tanggal Bayar</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static"
        data-keyboard="false" data-width="75%" aria-hidden="true"></div>
@endsection

@push('js')
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function () {
                $('#myModal').modal('show');
            });
        }

        var tablePembayaran;
        $(document).ready(function () {
            tablePembayaran = $('#table_pembayaran').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('/pembayaran/list') }}",
                    type: "POST",
                    dataType: "json",
                },
                columns: [
                    {
                        data: "DT_RowIndex",
                        className: "text-center",
                        width: "5%",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "pembayaran_id",
                        className: "text-center",
                        width: "10%",
                        orderable: true,
                        searchable: false
                    },
                    {
                        data: "penjualan_id",
                        className: "text-center",
                        width: "10%",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "metode_pembayaran",
                        className: "text-center",
                        width: "10%",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "jumlah_bayar",
                        className: "text-center",
                        width: "10%",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "kembalian",
                        className: "text-center",
                        width: "10%",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "status_bayar",
                        className: "text-center",
                        width: "10%",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "bayar_tanggal",
                        className: "text-center",
                        width: "15%",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "aksi",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endpush