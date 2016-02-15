/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// autogenerate input pada halaman pertama dari menu pemakaian ATK
fields = 0;

function addInput(){
    var amount=document.getElementById();
    var pd=document.getElementById();
    var br = document.createElement();
    if (fields !== 10){
        var input1 = document.createElement('input');
        input1.setAttribute('id','pdgen' + fields);
        input1.value = pd;
        var input2 = document.createElement('input');
        input2.setAttribute('id','amtgen' + fields);
        input2.value = amount;
        
        document.getElementById('text').appendChild(input1);
        document.getElementById('text').appendChild(input2);
        document.getElementById('text').appendChild(br);
        
        fields++;
    }
    else {
        //document.getElementById('text').innerHTML() += '<br />daftar penuh!';
        document.form.add.disabled-true;
    }
}

/* Insert new row pada table */
function addBarang(){
// mencari sebuah tabel yang memiliki elemen "tabel_pemakaian"
var newRow = document.all("lines").insertRow;


}

/* autoincrement form */
function autoIncrement(){
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('number').value = value;
}

/* update table */
function updateTable(){
    if (!document.getElementsByTagName) return;
    tabBody = document.getElementsByTagName("tbody").item(0);
    row=document.createElement("tr");
    cell1 = document.createElement("td");
    textnode1=document.forms['led'].elements[3].value;
    cell1.appendChild(textnode1);
    row.appendChild(cell1);
    tabBody.appendChild(row);
}

/* validasi form */
function validate(){
    var x = document.forms["user-record"]["fname"].value;
    if(x === null || x === ""){
        alert("Nama/ID/Kategori tidak boleh kosong!");
        return false;
    }        
}

/* confirm button??? */
function confirm(){
    var item_id = $(this).attr('item_id');
    var item = $(this).parent();
    
    $.ajax({
       type: 'POST',
       url: "",
       data: {},
       success: function(){
           
       }
    });
}


