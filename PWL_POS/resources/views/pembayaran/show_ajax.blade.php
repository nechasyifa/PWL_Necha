@empty($pembayaran)
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kesalahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
                    Data yang anda cari tidak ditemukan
                </div>
                <a href="{{ url('/pembayaran') }}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
@else
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Data Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped table-hover table-sm">
                    <tr>
                        <th>ID Pembayaran</th>
                        <td>{{ $pembayaran->pembayaran_id }}</td>
                    </tr>
                    <tr>
                        <th>ID Penjualan</th>
                        <td>{{ $pembayaran->penjualan_id }}</td>
                    </tr>
                    <tr>
                        <th>Metode Pembayaran</th>
                        <td>{{ $pembayaran->metode_pembayaran }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Pembayaran</th>
                        <td>{{ $pembayaran->jumlah_bayar }}</td>
                    </tr>
                    <tr>
                        <th>Kembalian</th>
                        <td>{{ $pembayaran->kembalian }}</td>
                    </tr>
                    <tr>
                        <th>Status Pembayaran</th>
                        <td>{{ $pembayaran->status_bayar }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Bayar</th>
                        <td>{{ $pembayaran->bayar_tanggal }}</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
            </div>
        </div>
    </div>
@endempty