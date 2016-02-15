function validateUsage() {
    var a = document.forms["usage_form"]["user_name"].value;
    var b = document.forms["usage_form"]["amount"].value;
    var c = document.forms["usage_form"]["desc"].value;
    var d = document.forms["usage_form"]["atk_name"].value;
    
    if (a == null || a == "") {
        alert("Nama user harus diisi");
        return false;
    }
    if (d == null || d == "") {
        alert("Nama barang harus diisi");
        return false;
    }
    if (b == null || b == "") {
        alert("Jumlah pemakaian harus diisi");
        return false;
    }
    if (b <= 0) {
        alert("Jumlah pemakaian tidak boleh negatif atau nol");
        return false;
    }
    if (c == null || c == "") {
        alert("Deskripsi harus diisi");
        return false;
    }
}