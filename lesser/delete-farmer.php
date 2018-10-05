<?php
    session_start();
    include "connect.php";
    $id = $_GET["id"];

    $sql"DELETE FROM profile,selllist,product,login,news,gmarket,market 
         WHERE profile.username = selllist.username 
         AND selllist.productid = product.id
         AND profile.username = login.username 
         AND login.username = news.username AND login.username = gmarket.username 
         AND gmarket.marketid = market.id
         AND marketid = '16' AND productid = '65' AND username = 'test'";
    $query = mysqli_query($ObjCon,$sql);

    $sql1"DELETE FROM profile,selllist,product,login,news,gmarket,market 
         WHERE profile.username = selllist.username 
         AND selllist.productid = product.id
         AND profile.username = login.username 
         AND login.username = news.username AND login.username = gmarket.username 
         AND gmarket.marketid = market.id
         AND marketid = '16' AND productid = '65' AND username = 'test'";
    $query1 = mysqli_query($ObjCon,$sql1);

    ?>