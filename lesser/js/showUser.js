function showUser(str,password) {

  if(str.length==0){
  	alert('กรุณาป้อน Username ก่อน');
     document.login_form.usr.focus();

	}
if(password.length==0){
  	alert('กรุณาป้อน Password ก่อน');
     document.login_form.usr.focus();

	}

  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
      if(this.responseText == "admin"){
        document.location.href = "admin.php";

      }
      if(this.responseText == ""){
      document.location.href = "index.php";
  }
      this.responseText = "";
    }
  }
  xmlhttp.open("GET","result_login.php?q="+str+"&password="+password,true);
  xmlhttp.send();
}