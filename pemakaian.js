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
        document.getElementById('text').innerHTML() += '<br />daftar penuh!';
        document.form.add.disabled-true;
        
    }
}

