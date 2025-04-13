@empty($pembayaran)
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kesalahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
                    Data pembayaran tidak ditemukan.
                </div>
                <a href="{{ url('/pembayaran') }}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
@else
    <form action="{{ url('/pembayaran/' . $pembayaran->pembayaran_id . '/delete_ajax') }}" method="POST" id="form-delete">
        @csrf
        @method('DELETE')
        <div id="modal-master" class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <h5><i class="icon fas fa-exclamation-triangle"></i> Konfirmasi !!!</h5>
                        Apakah Anda yakin ingin menghapus data pembayaran berikut?
                    </div>
                    <table class="table table-sm table-bordered table-striped">
                        <tr>
                            <th class="text-right col-4">ID Pembayaran:</th>
                            <td class="col-8">{{ $pembayaran->pembayaran_id }}</td>
                        </tr>
                        <tr>
                            <th class="text-right col-4">ID Penjualan:</th>
                            <td class="col-8">{{ $pembayaran->penjualan_id }}</td>
                        </tr>
                        <tr>
                            <th class="text-right col-4">Metode Pembayaran:</th>
                            <td class="col-8">{{ $pembayaran->metode_pembayaran }}</td>
                        </tr>
                        <tr>
                            <th class="text-right col-4">Jumlah Bayar:</th>
                            <td class="col-8">{{ number_format($pembayaran->jumlah_bayar, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th class="text-right col-4">Kembalian:</th>
                            <td class="col-8">{{ number_format($pembayaran->kembalian, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th class="text-right col-4">Status:</th>
                            <td class="col-8">{{ $pembayaran->status_bayar }}</td>
                        </tr>
                        <tr>
                            <th class="text-right col-4">Tanggal Bayar:</th>
                            <td class="col-8">{{ $pembayaran->bayar_tanggal }}</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function () {
            $("#form-delete").validate({
                rules: {},
                submitHandler: function (form) {
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: $(form).serialize(),
                        success: function (response) {
                            if (response.status) {
                                $('#myModal').modal('hide');
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message
                                });
                                tablePembayaran.ajax.reload();
                            } else {
                                $('.error-text').text('');
                                $.each(response.msgField, function (prefix, val) {
                                    $('#error-' + prefix).text(val[0]);
                                });
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Terjadi Kesalahan',
                                    text: response.message
                                });
                            }
                        }
                    });
                    return false;
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endempty