function UpdateForm1(button){
        const ID = button.value;
        let requestProductInfo = new XMLHttpRequest();
        requestProductInfo.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //console.log(this.response);
        const product = JSON.parse(this.response);  
        document.getElementById("name").value = product["TenSP"];
        document.getElementById("name-producer").value = product["MaTH"];
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
        document.getElementById("year").value = product["NamSX"];
        document.getElementById("descr").value = product["MoTa"];
        document.getElementById("price").value = product["GiaBan"];
        document.getElementById("id").value = product["MaSP"];
        document.getElementById("quantity").value = product["SoLuong"];
        
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
    document.getElementById("name-producer").value = product["MaTH"];
    document.getElementById("quantity").value = product["SoLuong"];
    document.getElementById("price").value = product["Gia"];
    document.getElementById("descr").value = product["MoTa"];
    document.getElementById("id").value = product["MaPK"];
    }
}
requestProductInfo.open("GET", "i4-accessory.php?MaPK=" + ID);
requestProductInfo.send();
}


