function getLaLongMarket() {
	 for(var i=0;i<market.length;i++){
		 market[i][11] = new google.maps.LatLng(market[i][0], market[i][1]);
	 }
	 getLocation();
}
function getLocation() {

    if (navigator.geolocation) {
        navigator.geolocation.watchPosition(CurrentPosition);
    } else {
	document.getElementById("demo").innerHTML = "Geolocation is not supported by this browser.";}
    }
function CurrentPosition(position) {
	p2 = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
	if(p1 == 0){
		showPosition();
	}
}
 function showPosition(){
 	p1 = 1;
	for(var j=0;j<market.length;j++){
		 market[j][12] = (google.maps.geometry.spherical.computeDistanceBetween(market[j][11], p2) / 1000).toFixed(2);
	 }
	 market.sort(function(a,b){
    	return a[12] - b[12];
	});
	//alert(market.length);
	if(<?php echo $type; ?>==1){
		showOnWeb()
	}else if(<?php echo $type; ?>==2){
		setOnWebFactor();

	}
}
	function showOnWeb(){
		
		for(var i=0;i<market.length;i++){
		var showV  = document.getElementById('showV');
		var div1 = document.createElement("div");
		div1.classList.add("col-md-4","text-center");
		var div2 = document.createElement("div");
		div2.classList.add("work-inner");
		var a1 = document.createElement("a");
		if(<?php echo $type; ?>==1){
			
			a1.href = "buy.php?&MarketId="+market[i][7];
			a1.classList.add("work-grid");
			a1.style.cssText = "background-image: url(uploads_product/"+market[i][3];
		}else{
			a1.href = "buy-farmer.php?&MarketId="+market[i][7];
			a1.classList.add("work-grid");
			a1.style.cssText = "background-image: url(uploads_product/"+market[i][3];
		}
		var div3 = document.createElement("div");
		div3.classList.add("desc");
		var h3 = document.createElement("h3");
		var a2 = document.createElement("a");
		a2.href = "buy.php?&MarketId="+market[i][7];
		var TnameVeget = document.createTextNode(market[i][2]);
		var pDisten = document.createElement("p");
		var TextDistan = document.createTextNode("ห่างจากคุณ "+market[i][12]+" กิโลเมตร");
		var pMarketName = document.createElement("p");
		var TextNameMket = document.createTextNode("วันที่เปิด "+market[i][4]);
		var pOpenAndClose = document.createElement("p");
		var TextOpenAndClose = document.createTextNode("เวลาเปิด "+market[i][5]+ " เวลาปิด "+market[i][6]);
		var pLink = document.createElement("p");
		var a3 = document.createElement("a");
		if(<?php echo $type; ?>==1){
			
			a3.href = "buy.php?&MarketId="+market[i][7];
			a3.classList.add("btn","btn-primary","btn-outline","with-arrow");
		}else{
			a3.href = "buy-farmer.php?&MarketId="+market[i][7];
			a3.classList.add("btn","btn-primary","btn-outline","with-arrow");
		}
		var TextLink = document.createTextNode("ดูรายละเอียด");
		var icon = document.createElement("i");
		icon.classList.add("icon-arrow-right");
		showV.appendChild(div1);
		div1.appendChild(div2);
		div2.appendChild(a1);
		div2.appendChild(div3);
		div3.appendChild(h3);
		h3.appendChild(a2);
		a2.appendChild(TnameVeget);
		div3.appendChild(pMarketName);
		pMarketName.appendChild(TextNameMket);
		div3.appendChild(pOpenAndClose);
		pOpenAndClose.appendChild(TextOpenAndClose);
		div3.appendChild(pDisten);
		pDisten.appendChild(TextDistan);
		div3.appendChild(pLink);
		pLink.appendChild(a3);
		a3.appendChild(TextLink);
		a3.appendChild(icon);
		}
	}
	function setOnWebFactor(){
		var showV  = document.getElementById('showV');
		var table1 = document.createElement("table");
		var thead1 = document.createElement("thead");
		var tr1 = document.createElement("tr");
		var td1 = document.createElement("th");
		var td2 = document.createElement("th");
		var td3 = document.createElement("th");
		var td4 = document.createElement("th");
		var td5 = document.createElement("th");
		var tbody1 = document.createElement("tbody");
		var TextThead1 = document.createTextNode("ชื่อตลาด");
		var TextThead2 = document.createTextNode("ที่อยู่");
		var TextThead3 = document.createTextNode("โทร");
		var TextThead4 = document.createTextNode("ประเภทปัจจัยการผลิต");
		var TextThead5 = document.createTextNode("เลือก");
		table1.classList.add("datatable","table","table-hover","table-bordered");
		table1.border = "1";
		table1.id = "datatable";
		table1.width = "100%";
		showV.appendChild(table1);
		table1.appendChild(thead1);	
		thead1.appendChild(tr1);
		tr1.appendChild(td1);
		tr1.appendChild(td2);
		tr1.appendChild(td3);
		tr1.appendChild(td4);
		tr1.appendChild(td5);
		td1.appendChild(TextThead1);	
		td2.appendChild(TextThead2);
		td3.appendChild(TextThead3);
		td4.appendChild(TextThead4);
		td5.appendChild(TextThead5);
		table1.appendChild(tbody1);
		for(var i=0;i<market.length;i++){
		var Marketname1 = document.createTextNode(market[i][2]);
		var Marketname2 = document.createTextNode(market[i][8]);
		var Marketname3 = document.createTextNode(market[i][9]);
		var Marketname4 = document.createTextNode(market[i][10]);
		var Marketname5 = document.createTextNode("เลือก");
		var tr2 = document.createElement("tr");
		var td6 = document.createElement("td");
		var td7 = document.createElement("td");
		var td8 = document.createElement("td");
		var td9 = document.createElement("td");
		var td10 = document.createElement("td");
		var a1 = document.createElement("a");
		a1.href = "buy-farmer.php?&MarketId="+market[i][7];
		tbody1.appendChild(tr2);
		tr2.appendChild(td6);
		tr2.appendChild(td7);
		tr2.appendChild(td8);
		tr2.appendChild(td9);
		tr2.appendChild(td10);
		td6.appendChild(Marketname1);
		td7.appendChild(Marketname2);
		td8.appendChild(Marketname3);
		td9.appendChild(Marketname4);
		td10.appendChild(a1);
		a1.appendChild(Marketname5);
		}


		var dataTable = $('#datatable').DataTable();
		}