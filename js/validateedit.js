function validateForm(stok) {
    var a = document.forms["editstok"]["n_stok"].value;
    if (a == null || a == "") {
        alert("Jumlah update harus diisi");
        return false;
    }
    if (a < 0) {
        alert("Jumlah update tidak boleh negatif");
        return false;
    }
}