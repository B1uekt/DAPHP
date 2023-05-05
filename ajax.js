function UpdateForm1(button){
    const ID = button.value;
    let requestProductInfo = new XMLHttpRequest();
    requestProductInfo.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        //console.log(this.response);
    const product = JSON.parse(this.response);  
    document.getElementById("name").value = product["TenSP"];
    if( product["MaLoai"] == "xe 2 chỗ"){
        var mySelect = document.getElementById("cate");
        var option = mySelect.querySelector("option[value='xe 2 chỗ']");
        option.selected = true;
    }
    else{
        var mySelect = document.getElementById("cate");
        var option = mySelect.querySelector("option[value='xe 4 chỗ']");
        option.selected = true;
    }
    var mySelect = document.getElementById("name-producer");
    var option = mySelect.querySelector("option[value='"+product["MaTH"]+"']");
    option.selected = true;
    document.getElementById("year").value = product["NamSX"];
    document.getElementById("descr").value = product["MoTa"];
    document.getElementById("price").value = product["GiaBan"];
    document.getElementById("quantity").value = product["SoLuong"];
    document.getElementById("id").value = product["MaSP"];
    }
}
requestProductInfo.open("POST", "i4-car.php?MaSP=" + ID);
requestProductInfo.send();
}
function UpdateForm2(button){
const ID = button.value;
let requestProductInfo = new XMLHttpRequest();
requestProductInfo.onreadystatechange = function () {
if (this.readyState == 4 && this.status == 200) {
console.log(this.response);
const product = JSON.parse(this.response);  
document.getElementById("name").value = product["TenPK"];
var mySelect = document.getElementById("name-producer");
var option = mySelect.querySelector("option[value='"+product["MaTH"]+"']");
option.selected = true;
document.getElementById("quantity").value = product["SoLuong"];
document.getElementById("price").value = product["Gia"];
document.getElementById("descr").value = product["MoTa"];
document.getElementById("id").value = product["MaPK"];
}
}
requestProductInfo.open("GET", "i4-accessory.php?MaPK=" + ID);
requestProductInfo.send();
}

function UpdateForm3(button){
const ID = button.value;
let requestProductInfo = new XMLHttpRequest();
requestProductInfo.onreadystatechange = function () {
if (this.readyState == 4 && this.status == 200) {
    //console.log(this.responseText);
    const product = JSON.parse(this.response);  
    var mySelect = document.getElementById("status");
    var option = mySelect.querySelector("option[value='"+product["TrangThaiDH"]+"']");
    option.selected = true;
    document.getElementById("price").value = product["Gia"];
    document.getElementById("pro-number").value = product["MaSP"];
    document.getElementById("cus-number").value = product["MaKH"];
    document.getElementById("id").value = product["MaDH"];
}
}
requestProductInfo.open("GET", "i4-order.php?MaDH=" + ID);
requestProductInfo.send();
}

