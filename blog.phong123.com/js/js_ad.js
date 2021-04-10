var tambo = 0;
function getReturn(url_get, idget="", start="", end="") {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		
	  if (this.readyState == 4 && this.status == 200) {	
			if (idget.length > 0) {
				if (document.getElementById(idget)) { // Check xem ID co ton tai khong
					document.getElementById(idget).innerHTML =  start + this.responseText + end;
				}		else {
					//Khi ma check khong thay cai ID ton tai, lam gi do o day
				}
			} else {
			    
			}
	  }
	};
	xhttp.open("GET", url_get, true);
	xhttp.send();
}
function getViewContent(id_content) {
    reset();
    document.getElementById("change_text").innerHTML = '<div class="text-center">Đang xử lý...</div>';
    document.getElementById("ThongBaoC").innerHTML = 'Mô tả';
    getReturn("/gethtml.php?num=0&id=" + id_content, "change_text");
}
function getViewImages(id_content) {
    reset();
    document.getElementById("change_text").innerHTML = '<div class="text-center">Đang xử lý...</div>';
    document.getElementById("ThongBaoC").innerHTML = 'Hình ảnh';
    document.getElementById("ma_chen").innerHTML = "<hr><label>Chèn Slide ảnh vào bài viết: &nbsp;</label><input type='text' id='saochepne'  onclick='saochep()' onmouseout='outFunc()' readonly value='[run slide_id=\""+id_content+"\"]'/>";
    getReturn("/gethtml.php?num=1&id=" + id_content, "change_text");
}
function getThongtin(id_content) {
     reset();
     document.getElementById("change_text").innerHTML = '<div class="text-center">Đang xử lý...</div>';
    document.getElementById("ThongBaoC").innerHTML = 'Thông tin';
    getReturn("/gethtml.php?num=2&id=" + id_content, "change_text", "", "<button class='btn btn-primary float-right'  onClick='getXong(\""+id_content+"\");'>Hoàn tất</button>");
}
function getXong(id_content) {
        reset();
      getReturn("/gethtml.php?num=3&id=" + id_content);
      document.getElementById("new_com_" + id_content).innerHTML = 'Hoàn tất';
      
}
function DelNote(id_img) {
   
    document.getElementById("ThongBaoC").innerHTML = 'Thông báo';
     document.getElementById("xuly_xoa").innerHTML = "<button type='button' class='btn btn-secondary' data-dismiss='modal' onClick='DelImage(\""+id_img+"\");'>Chắc chắn</button>";
      document.getElementById("change_text22").innerHTML = 'Bạn có muốn xoá ảnh đang chọn?';
}
function DelImage(id_img) {
      getReturn("/gethtml.php?num=4&id=" + id_img);
      document.getElementById("img_del_" + id_img).style.display = "none";
}
function getDetails(id_content) {
    if (tambo == 0) {
        
    } else {
         document.getElementById("select_" + tambo).innerHTML = "<b>"+tambo+"</b>";
    }
         document.getElementById("select_" + id_content).innerHTML = "<mark><b>Đang chọn</b></mark>";
         tambo = id_content;
        reset();
        document.getElementById("showchitiet").innerHTML = "Đang nạp...";
      //  setTimeout(function(){  
             document.getElementById("showchitiet").innerHTML = "<button class='btn btn-primary' onClick='getViewImages(\""+id_content+"\");'>Ảnh</button>\
             <button class='btn btn-primary' onClick='getViewContent(\""+id_content+"\");'>Mô tả</button>\
             <button class='btn btn-primary' onClick='getThongtin(\""+id_content+"\");'>Thông tin</button>\
             ";
       // }, 1000);
    
}
function reset() {
         document.getElementById("change_text").innerHTML = '';
    document.getElementById("ThongBaoC").innerHTML = '';
      document.getElementById("ma_chen").innerHTML = '';
}
function saochep() {
  /* Get the text field */
  var copyText = document.getElementById("saochepne");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Đã sao chép: " + copyText.value);
}
function outFunc() {
  var tooltip = document.getElementById("myTooltip");
  tooltip.innerHTML = "Sao chép vào bộ nhớ tạm";
}