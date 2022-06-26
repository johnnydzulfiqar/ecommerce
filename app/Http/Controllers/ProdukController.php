<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProdukController extends Controller
{

    public function index(Request $request)
    {
        // $data['result'] = Produk::where('stok', '<', 20)->get(); filter untuk stok <20
        // $data['result'] = Produk::all();
        // $data['result'] = Produk::paginate(); buat page
        $q = $request->get('q');

        $data['result'] = Produk::where(function ($query) use ($q) {
            $query->where('kategori_produk', 'like', '%' . $q . '%');
            $query->orwhere('nama_produk', 'like', '%' . $q . '%');
            $query->orwhere('stok', 'like', '%' . $q . '%');
            $query->orwhere('harga_produk', 'like', '%' . $q . '%');
        })->paginate();

        $data['q'] = $q;
        return view('produk.list', $data);
    }
    public function create()
    {
        return view('produk.form');
    }


    public function store(Request $request)
    {
        $rules =
            [
                'kategori_produk' => 'required',
                'harga_produk' => 'required|numeric|min:100000',
                'nama_produk' => 'required|max:15',
            ];
        $this->validate($request, $rules);
        Produk::create($request->all());
        return redirect('/produk')->with('success', 'Data Berhasil Disimpan');
    }

    public function edit(Produk $produk)
    {
        return view('produk.form', compact(var_name: 'produk'));
    }

    public function update(Produk $produk, Request $request)
    {
        $rules =
            [
                'kategori_produk' => 'required',
                'harga_produk' => 'required|numeric|min:100000',
                'nama_produk' => 'required|max:15',
            ];
        $this->validate($request, $rules);
        $produk->update($request->all());
        return redirect(to: '/produk')->with('success', 'Data Berhasil Diupdate');
    }
    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk->delete();
        return redirect('/produk')->with('success', 'Data Berhasil Dihapus');
    }
}
