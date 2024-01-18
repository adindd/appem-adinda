<?php

function hapus($ProdukID){
    DB::table('produk')->where('ProdukID', '=', $ProdukID)->delete();
    return redirect()->back();
}

function deleteproduk($id){
    $delete = DB::table('produk')->where('ProdukID', $id)->delete();
    if ($deleted){
        return redirect()->back();
    }
}

function update($ProdukID){
    $produk = DB::table('produk')->where('ProdukID', '=', $ProdukID)->first();
    return view('updateproduk', ['produk'=> $produk]);
}

function updateproduk($id){
    $produk = DB::table('produk')->where('ProdukID', $id)->first();
    return view ('updateproduk', ['produk' => $produk]);
}

function proses_update(Request $request, $ProdukID){
    $NamaProduk = $request->NamaProduk;
    $Harga = $request->Harga;
    $Stok = $request->Stok;

    DB::table('produk')->where('ProdukID, $ProdukID') -> update([
        'NamaProduk' => $NamaProduk,
        'Harga' => $Harga,
        'Stok' => $Stok,
        ]);
        return redirect('/dataproduk');
}


function prosesproduk(){
    $isi = "tambah produk";
    return view ('tambahproduk', ['isi' => $isi]);
}

function tambahproduk(Request $request){
    $tambahproduk = $request->nama_produk;
    $tambahharga = $request->harga;
    $tambahstok = $request->stok;

    DB::table('produk')->insert([
        'NamaProduk' => $tambahproduk,
        'Harga' => $tambahharga,
        'Stok' => $tambahstok,
    ]);
    return redirect('/dataproduk');
}


?>
