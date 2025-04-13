<?php

namespace App\Http\Controllers;

use App\Models\PembayaranModel;
use App\Models\PenjualanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Pembayaran',
            'list' => ['Home', 'Pembayaran']
        ];

        $page = (object) [
            'title' => 'Daftar pembayaran yang terdaftar dalam sistem',
        ];

        $activeMenu = 'pembayaran';

        return view('pembayaran.index', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function list(Request $request)
    {
        $pembayaran = PembayaranModel::with('penjualan');

        return DataTables::of($pembayaran)
            ->addIndexColumn()
            ->addColumn('aksi', function ($pembayaran) {
                $btn = '<button onclick="modalAction(\'' . url('/pembayaran/' . $pembayaran->pembayaran_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/pembayaran/' . $pembayaran->pembayaran_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/pembayaran/' . $pembayaran->pembayaran_id . '/delete_ajax') . '\')"  class="btn btn-danger btn-sm">Hapus</button> ';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create_ajax()
    {
        $penjualan = PenjualanModel::select('penjualan_id', 'penjualan_kode')->get();

        return view('pembayaran.create_ajax')->with('penjualan', $penjualan);
    }

    public function store_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'penjualan_id' => 'required|integer|exists:t_penjualan,penjualan_id',
                'metode_pembayaran' => 'required|string|max:50',
                'jumlah_bayar' => 'required|numeric|min:0',
                'kembalian' => 'required|numeric|min:0',
                'status_bayar' => 'required|in:Lunas,Belum Lunas',
                'bayar_tanggal' => 'required|date',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors(),
                ]);
            }

            try {
                PembayaranModel::create([
                    'penjualan_id' => $request->penjualan_id,
                    'metode_pembayaran' => $request->metode_pembayaran,
                    'jumlah_bayar' => $request->jumlah_bayar,
                    'kembalian' => $request->kembalian,
                    'status_bayar' => $request->status_bayar,
                    'bayar_tanggal' => $request->bayar_tanggal,
                ]);

                return response()->json([
                    'status' => true,
                    'message' => 'Data pembayaran berhasil disimpan'
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => false,
                    'message' => 'Server Error: ' . $e->getMessage()
                ], 500);
            }
        }

        return response()->json([
            'status' => false,
            'message' => 'Invalid request type'
        ], 400);
    }

    public function show_ajax(string $id)
    {
        $pembayaran = PembayaranModel::find($id);

        return view('pembayaran.show_ajax', ['pembayaran' => $pembayaran]);
    }

    public function edit_ajax(string $id)
    {
        $pembayaran = PembayaranModel::find($id);

        $penjualan = PenjualanModel::select('penjualan_id', 'penjualan_kode')->get();

        return view('pembayaran.edit_ajax', compact('pembayaran', 'penjualan'));
    }

    public function update_ajax(Request $request, string $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'penjualan_id' => 'required|integer|exists:t_penjualan,penjualan_id',
                'metode_pembayaran' => 'required|string|max:50',
                'jumlah_bayar' => 'required|numeric|min:0',
                'kembalian' => 'required|numeric|min:0',
                'status_bayar' => 'required|in:Lunas,Belum Lunas',
                'bayar_tanggal' => 'required|date',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors(),
                ]);
            }

            $pembayaran = PembayaranModel::find($id);
            if ($pembayaran) {
                $pembayaran->update([
                    'penjualan_id' => $request->penjualan_id,
                    'metode_pembayaran' => $request->metode_pembayaran,
                    'jumlah_bayar' => $request->jumlah_bayar,
                    'kembalian' => $request->kembalian,
                    'status' => $request->status,
                    'bayar_tanggal' => $request->bayar_tanggal,
                ]);
                return response()->json([
                    'status' => true,
                    'message' => 'Data pembayaran berhasil diperbarui'
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }
    }

    public function confirm_ajax(string $id)
    {
        $pembayaran = PembayaranModel::find($id);

        return view('pembayaran.confirm_ajax', compact('pembayaran'));
    }

    public function delete_ajax(string $id)
    {
        $pembayaran = PembayaranModel::find($id);

        if ($pembayaran) {
            $pembayaran->delete();
            return response()->json([
                'status' => true,
                'message' => 'Data pembayaran berhasil dihapus'
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Data pembayaran tidak ditemukan'
        ]);
    }

    public function import_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                // validasi file harus xls atau xlsx, max 1MB
                'file_pembayaran' => ['required', 'mimes:xlsx', 'max:1024']
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors()
                ]);
            }
            $file = $request->file('file_pembayaran'); // ambil file dari request
            $reader = IOFactory::createReader('Xlsx'); // load reader file excel
            $reader->setReadDataOnly(true); // hanya membaca data
            $spreadsheet = $reader->load($file->getRealPath()); // load file excel
            $sheet = $spreadsheet->getActiveSheet(); // ambil sheet yang aktif
            $data = $sheet->toArray(null, false, true, true); // ambil data excel
            $insert = [];
            if (count($data) > 1) { // jika data lebih dari 1 baris
                foreach ($data as $baris => $value) {
                    if ($baris > 1) { // baris ke 1 adalah header, maka lewati
                        $excelDate = $value['F']; // Ambil data mentah dari Excel
                        $tanggalBayar = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($excelDate)->format('Y-m-d');
                        $insert[] = [
                            'penjualan_id' => $value['A'],
                            'metode_pembayaran' => $value['B'],
                            'jumlah_bayar' => $value['C'],
                            'kembalian' => $value['D'],
                            'status_bayar' => $value['E'],
                            'bayar_tanggal' => $tanggalBayar,
                            'created_at' => now(),
                        ];
                    }
                }
                if (count($insert) > 0) {
                    PembayaranModel::insertOrIgnore($insert);
                    return response()->json([
                        'status' => true,
                        'message' => 'Data berhasil diimport'
                    ]);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'Tidak ada data yang diimport'
                    ]);
                }
            }
            return redirect('/');
        }
    }

    public function export_excel()
    {
        // Ambil data pembayaran yang akan diexport
        $pembayaran = PembayaranModel::select('pembayaran_id', 'penjualan_id', 'metode_pembayaran', 'jumlah_bayar', 'kembalian', 'status_bayar', 'bayar_tanggal')
            ->orderBy('bayar_tanggal')
            ->with('penjualan')
            ->get();

        // Load library excel
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet(); // Ambil sheet yang aktif

        // Set header
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Id Pembayaran');
        $sheet->setCellValue('C1', 'Id Penjualan');
        $sheet->setCellValue('D1', 'Metode Pembayaran');
        $sheet->setCellValue('E1', 'Jumlah Pembayaran');
        $sheet->setCellValue('F1', 'Kembalian');
        $sheet->setCellValue('G1', 'Status');
        $sheet->setCellValue('H1', 'Tanggal Bayar');

        $sheet->getStyle('A1:H1')->getFont()->setBold(true);

        $no = 1; // Nomor data dimulai dari 1
        $baris = 2; // Baris data dimulai dari baris ke-2
        foreach ($pembayaran as $p) {
            // Menambahkan data pembayaran ke Excel
            $sheet->setCellValue('A' . $baris, $no); // Nomor urut
            $sheet->setCellValue('B' . $baris, $p->pembayaran_id);
            $sheet->setCellValue('C' . $baris, $p->penjualan_id);
            $sheet->setCellValue('D' . $baris, $p->metode_pembayaran);
            $sheet->setCellValue('E' . $baris, $p->jumlah_bayar);
            $sheet->setCellValue('F' . $baris, $p->kembalian);
            $sheet->setCellValue('G' . $baris, $p->status_bayar);
            $sheet->setCellValue('H' . $baris, $p->bayar_tanggal);

            // Increment baris dan nomor
            $baris++;
            $no++;
        }

        // Set auto size untuk kolom
        foreach (range('A', 'H') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Set title sheet
        $sheet->setTitle('Data Pembayaran');

        // Export ke Excel
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $filename = 'Data Pembayaran_' . date('Y-m-d H:i:s') . '.xlsx';

        // Output ke browser
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');

        // Menyimpan file dan mengirimkan ke output
        $writer->save('php://output');
        exit;
    }

    public function export_pdf()
    {
        set_time_limit(300);
        $pembayaran = PembayaranModel::select('pembayaran_id', 'penjualan_id', 'metode_pembayaran', 'jumlah_bayar', 'kembalian', 'status_bayar', 'bayar_tanggal')
            ->orderBy('bayar_tanggal')
            ->with('penjualan')
            ->get();

        $pdf = Pdf::loadView('pembayaran.export_pdf', ['pembayaran' => $pembayaran]);
        $pdf->setPaper('a4', 'portrait');
        $pdf->setOption("isRemoteEnabled", true);
        $pdf->render();

        return $pdf->stream('Data Pembayaran_' . date('Y-m-d H:i:s') . '.pdf');
    }
}