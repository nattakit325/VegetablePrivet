<?php
	session_start();
	include "connect.php";

	$value=$_GET["value"];
	$type=$_GET["type"];



	$sql="SELECT p.name as name,p.picture as picture, s.username as SellerName, p.id 
	as Productid,m.market,m.latitude,m.longitude FROM selllist s inner join product p 
	on s.productid=p.id INNER JOIN profile f ON f.username=s.username INNER JOIN gmarket g 
	ON g.username=f.username INNER JOIN market m ON m.id = g.marketid 
	where p.category='$type' and p.name like '%$value%'";


    $query=mysqli_query($objCon,$sql);
    $queryC=mysqli_query($objCon,$sql);
    $queryB=mysqli_query($objCon,$sql);

?>


<script>

var x = document.getElementById("demo");
var p1 = 0;
let p2;
var market = [];

function setMarket(){
	
	 <?php while ($row = mysqli_fetch_array($queryB, MYSQLI_ASSOC)) {?>
		market.push(["<?php echo $row["SellerName"]; ?>",
		"<?php echo $row["picture"]; ?>","<?php echo $row["name"]; ?>",
		"<?php echo $row["Productid"]; ?>","<?php echo $row["marketname"]; ?>",
	 	"<?php echo $row["latitude"]; ?>","<?php echo $row["longitude"]; ?>",<?php echo $row["marketId"]; ?>]);
	 <?php }?>
	 getLaLongMarket();
}
function getLaLongMarket() {
	 for(var i=0;i<market.length;i++){
		 market[i][8] = new google.maps.LatLng(market[i][5], market[i][6]);
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
		 market[j][9] = (google.maps.geometry.spherical.computeDistanceBetween(market[j][8], p2) / 1000).toFixed(2);
	 }
	 market.sort(function(a,b){
    	return a[9] - b[9];
	});
	//alert(market.length);
	for(var i=0;i<market.length;i++){
		var k = i+1;
		for(k;k<market.length;k++){
			if(market[i][0]==market[k][0]&&market[i][3]==market[k][3]){
			   market.splice(k, 1);
			   k--;
			}
		}
		
	}	
	showOnWeb()

	
}
	function showOnWeb(){
		for(var i=0;i<market.length;i++){
		var showV  = document.getElementById('showV');
		var div1 = document.createElement("div");
		div1.classList.add("col-md-4","text-center");
		var div2 = document.createElement("div");
		div2.classList.add("work-inner");
		var a1 = document.createElement("a");
		a1.href = "ProductDetail.php?SellerName="+market[i][0]+"&Productid="+market[i][3]+"&MarketId="+market[i][7];
		a1.classList.add("work-grid");
		a1.style.cssText = "background-image: url(uploads_product/"+market[i][1];
		var div3 = document.createElement("div");
		div3.classList.add("desc");
		var h3 = document.createElement("h3");
		var a2 = document.createElement("a");
		a2.href = "ProductDetail.php?SellerName="+market[i][0]+"&Productid="+market[i][3]+"&MarketId="+market[i][7];
		var TnameVeget = document.createTextNode(market[i][2]);
		var pDisten = document.createElement("p");
		var TextDistan = document.createTextNode("ห่างจากคุณ "+market[i][9]+" กิโลเมตร");
		var pMarketName = document.createElement("p");
		var TextNameMket = document.createTextNode("สถานที่ "+market[i][4]);
		var pLink = document.createElement("p");
		var a3 = document.createElement("a");
		a3.href = "ProductDetail.php?SellerName="+market[i][0]+"&Productid="+market[i][3]+"&MarketId="+market[i][7];
		a3.classList.add("btn","btn-primary","btn-outline","with-arrow");
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
		div3.appendChild(pDisten);
		pDisten.appendChild(TextDistan);
		div3.appendChild(pLink);
		pLink.appendChild(a3);
		a3.appendChild(TextLink);
		a3.appendChild(icon);
		}
	}
</script>

           <div class="row">
				<div class="fh5co-heading">
					<?php if(mysqli_fetch_array($queryC,MYSQLI_ASSOC)<=0){?>
						<center><h2>ไม่มีรายการในประเภทสินค้าดังกล่าว</h2> </center>
					<?php }else{ ?>
					<h2>แนะนำ</h2> 
				<?php }?>
				</div>
            </div>
			<div class="row">
				<div class="col-md-12">
                    <div class="row" id="showV">
                    <button type="button" onclick="document.write(5 + 6)">Try it</button>
			        </div>
				</div>
			</div>
		
