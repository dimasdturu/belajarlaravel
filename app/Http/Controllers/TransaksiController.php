<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Models\Users;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $judul = 'Transaksi';
    protected $menu = 'transaksi';
    protected $sub_menu = '';
    protected $direktori = 'admin.transaksi';

    public function index()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $data['transaksi'] = Transaksi::with(['users'])
            ->orderBy('created_at', 'DESC')->get();

        return view($this->direktori.'.main', $data);
    }

    public function create()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;

        $data['users'] = Users::where('level_user', 'Pengguna')->get();
        $data['produk'] = Produk::with(['kategori_produk'])->get();

        return view($this->direktori.'.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = $request->user_id;
        $produk_id = $request->produk_id;
        $tanggal_transaksi = $request->tanggal_transaksi;
        $ekspedisi = $request->ekspedisi;
        $catatan_pembeli = $request->catatan_pembeli;

        if (empty($user_id)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom Pembeli Harus Diisi');
        }
        if (empty($produk_id)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom Produk Harus Diisi');
        }
        if (empty($tanggal_transaksi)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom Tanggal Transaksi Harus Diisi');
        }
        if (empty($ekspedisi)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom Ekspedisi Harus Diisi');
        }
        if (empty($catatan_pembeli)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom Catatan Pembeli Harus Diisi');
        }

        $users = Users::where('id', $user_id)->first();
        $transaksi = Transaksi::orderBy('id_transaksi', 'DESC')->first();
        if ($transaksi) {
            $kode_transaksi = 'TR-000' . ((int)substr($transaksi->kode_transaksi, 6) + 1);
        } else {
            $kode_transaksi = 'TR-0001'; 
        }

        // Simpan

        $transaksi = new Transaksi();
        $transaksi->kode_transaksi = $kode_transaksi;
        $transaksi->kode_invoice = '-';

        $transaksi->user_id = $user_id;
        $transaksi->tanggal_transaksi = date('Y-m-d', strtotime($tanggal_transaksi));
        $transaksi->status_transaksi = 'Selesai';

        $transaksi->provinsi_id = $users->provinsi_id;
        $transaksi->kabupaten_id = $users->kabupaten_id;
        $transaksi->kode_pos = $users->kode_pos;
        $transaksi->alamat_lengkap = $users->alamat_lengkap;

        $transaksi->ekspedisi = $ekspedisi;
        $transaksi->catatan_pembeli = $catatan_pembeli;
        $transaksi->save();

        if ($transaksi) {
            $transaksi = Transaksi::where('id_transaksi', $transaksi->id_transaksi)->first();
            $transaksi->kode_invoice = date('dmY') . '' . $transaksi->id_transaksi;
            $transaksi->save();

            $transaksi_detail = new TransaksiDetail();
            $transaksi_detail->transaksi_id = $transaksi->id_transaksi;
            $transaksi_detail->produk_id = $produk_id;
            $transaksi_detail->qty = 1;
            $transaksi_detail->save();

            if ($transaksi_detail) {
                $produk = Produk::where('id_produk', $produk_id)->first();
                $produk->stok_produk = ($produk->stok_produk - 1);
                $produk->save();
            }
        }

        if ($transaksi) {
            return redirect()->route('transaksi')->with('status', 'success')->with('message', 'Berhasil Menyimpan Data');
        } else {
            return back()->withInput()->with('status', 'error')->with('message', 'Gagal Menyimpan Data');
        }
    }

    public function show($id)
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;

        $data['transaksi'] = Transaksi::with([
            'users',
            'provinsi',
            'kabupaten',
            'transaksi_detail' => function ($td) {
                $td->with(['produk']);
            }
        ])
            ->where('id_transaksi', $id)
            ->first();

        $data['total_jumlah_transaksi'] = Transaksi::selectRaw("SUM(p.harga_produk*td.qty) as jumlah")
            ->join('transaksi_detail as td', 'td.transaksi_id', 'transaksi.id_transaksi')
            ->join('produk as p', 'p.id_produk', 'td.produk_id')
            ->where('id_transaksi', $id)
            ->first()->jumlah;

        return view($this->direktori.'.show', $data);
    }

    public function tolak($id) 
    {
        $transaksi = Transaksi::where('id_transaksi', $id)->first();
        if (!empty($transaksi)) {
            if ($transaksi->status_transaksi == 'Pending' || $transaksi->status_transaksi == 'Selesai') {
                $transaksi->status_transaksi = 'Tolak';
                $transaksi->save();
                
                if ($transaksi) {
                    $transaksi_detail = TransaksiDetail::where('transaksi_id', $transaksi->id_transaksi)->get();
                    
                    foreach ($transaksi_detail as $key => $td) {
                        $produk = Produk::where('id_produk', $td->produk_id)->first();
                        $produk->stok_produk = ($produk->stok_produk - $td->qty);
                        $produk->save();
                    }
                    return redirect()->route('transaksi')->with('status', 'success')->with('message', 'Berhasil Menolak Transaksi');
                } else {
                    return redirect()->route('transaksi')->with('status', 'error')->with('message', 'Gagal Menolak Transaksi');
                }
            } else {
                return redirect()->route('transaksi')->with('status', 'error')->with('message', 'Status Transaksi Tidak Sesuai');
            }
        } else {
            return redirect()->route('transaksi')->with('status', 'error')->with('message', 'Gagal Menolak Transaksi');
        }
    }

    public function proses($id) 
    {
        $transaksi = Transaksi::where('id_transaksi', $id)->first();
        if (!empty($transaksi)) {
            if ($transaksi->status_transaksi == 'Pending') {
                $transaksi->status_transaksi = 'Proses Admin';
                $transaksi->kode_invoice = date('dmY') . '' . $transaksi->id_transaksi;
                $transaksi->save();
                
                if ($transaksi) {
                    return redirect()->route('transaksi')->with('status', 'success')->with('message', 'Berhasil Memproses Transaksi');
                } else {
                    return redirect()->route('transaksi')->with('status', 'error')->with('message', 'Gagal Memproses Transaksi');
                }
            } else {
                return redirect()->route('transaksi')->with('status', 'error')->with('message', 'Status Transaksi Tidak Sesuai');
            }
        } else {
            return redirect()->route('transaksi')->with('status', 'error')->with('message', 'Gagal Memproses Transaksi');
        }
    }

    public function kirim($id) 
    {
        $transaksi = Transaksi::where('id_transaksi', $id)->first();
        if (!empty($transaksi)) {
            if ($transaksi->status_transaksi == 'Proses Admin') {
                $transaksi->status_transaksi = 'Pengiriman';
                $transaksi->save();
                
                if ($transaksi) {
                    return redirect()->route('transaksi')->with('status', 'success')->with('message', 'Berhasil Mengirim Transaksi');
                } else {
                    return redirect()->route('transaksi')->with('status', 'error')->with('message', 'Gagal Mengirim Transaksi');
                }
            } else {
                return redirect()->route('transaksi')->with('status', 'error')->with('message', 'Status Transaksi Tidak Sesuai');
            }
        } else {
            return redirect()->route('transaksi')->with('status', 'error')->with('message', 'Gagal Mengirim Transaksi');
        }
    }

    public function selesai($id) 
    {
        $transaksi = Transaksi::where('id_transaksi', $id)->first();
        if (!empty($transaksi)) {
            if ($transaksi->status_transaksi == 'Pengiriman') {
                $transaksi->status_transaksi = 'Selesai';
                $transaksi->save();
                
                if ($transaksi) {
                    return redirect()->route('transaksi')->with('status', 'success')->with('message', 'Berhasil Menyelesaikan Transaksi');
                } else {
                    return redirect()->route('transaksi')->with('status', 'error')->with('message', 'Gagal Menyelesaikan Transaksi');
                }
            } else {
                return redirect()->route('transaksi')->with('status', 'error')->with('message', 'Status Transaksi Tidak Sesuai');
            }
        } else {
            return redirect()->route('transaksi')->with('status', 'error')->with('message', 'Gagal Menyelesaikan Transaksi');
        }
    }
    
    
}
