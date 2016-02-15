function validateTambahForm() {
    var a = document.forms["tambah_atk"]["kode_barang"].value;
	var b = document.forms["tambah_atk"]["nama_barang"].value;
	var c = document.forms["tambah_atk"]["stok"].value;
    if (a == null || a == "") {
        alert("Kode barang harus diisi");
        return false;
    }
	if (b == null || b == "") {
        alert("Nama barang harus diisi");
        return false;
    }
	if (c == null || c == "") {
        alert("Stok harus diisi");
        return false;
    }
}