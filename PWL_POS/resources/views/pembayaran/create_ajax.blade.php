<form action="{{ url('/pembayaran/ajax') }}" method="POST" id="form-tambah-pembayaran">
    @csrf
    <div id="modal-pembayaran" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Id Penjualan</label>
                    <select name="penjualan_id" id="penjualan_id" class="form-control" required>
                        <option value="">- Pilih Id Penjualan -</option>
                        @foreach ($penjualan as $p)
                            <option value="{{ $p->penjualan_id }}">{{ $p->penjualan_kode }} - {{ $p->tanggal_penjualan }}
                            </option>
                        @endforeach
                    </select>
                    <small id="error-penjualan_id" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Metode Pembayaran</label>
                    <select name="metode_pembayaran" id="metode_pembayaran" class="form-control" required>
                        <option value="">- Pilih Metode Pembayaran -</option>
                        <option value="Transfer">Transfer</option>
                        <option value="Cash">Cash</option>
                    </select>
                    <small id="error-metode_pembayaran" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Jumlah Pembayaran</label>
                    <input value="" type="number" name="jumlah_bayar" id="jumlah_bayar" class="form-control" required>
                    <small id="error-jumlah_bayar" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Kembalian</label>
                    <input value="" type="number" name="kembalian" id="kembalian" class="form-control" required>
                    <small id="error-kembalian" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Status Pembayaran</label>
                    <select name="status_bayar" id="status_bayar" class="form-control" required>
                        <option value="">- Pilih Status Pembayaran -</option>
                        <option value="Lunas">Lunas</option>
                        <option value="Belum Lunas">Belum Lunas</option>
                    </select>
                    <small id="error-status_bayar" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Tanggal Bayar</label>
                    <input value="" type="date" name="bayar_tanggal" id="bayar_tanggal" class="form-control" required>
                    <small id="error-bayar_tanggal" class="error-text form-text text-danger"></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</form>
<script>
    $(document).ready(function () {
        $("#form-tambah-pembayaran").validate({
            rules: {
                penjualan_id: {
                    required: true,
                    number: true
                },
                metode_pembayaran: {
                    required: true
                },
                jumlah_bayar: {
                    required: true,
                    number: true
                },
                kembalian: {
                    required: true,
                    number: true
                },
                status_bayar: {
                    required: true
                },
                bayar_tanggal: {
                    required: true,
                    date: true
                },
            },
            submitHandler: function (form) {
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    success: function (response) {
                        if (response.status) {
                            $('#modal-pembayaran').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message
                            });
                            if (typeof dataPembayaran !== 'undefined') {
                                dataPembayaran.ajax.reload();
                            }
                        } else {
                            $('.error-text').text('');
                            $.each(response.msgField, function (prefix, val) {
                                $('#error-' + prefix).text(val[0]);
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: response.message
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log('AJAX Error:', xhr.responseText);
                        Swal.fire({
                            icon: 'error',
                            title: 'Server Error',
                            text: 'Terjadi kesalahan di server. Silakan cek console.'
                        });
                    }
                });
                return false;
            },

            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>