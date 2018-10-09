<?php
    session_start();
    include "connect.php";
    $id = $_GET["id"];

    $sql="DELETE FROM profile,selllist 
         WHERE selllist.username = profile.username
         AND profile.username = 'test'";
    $query = mysqli_query($objCon,$sql);

    $sql1 = "DELETE FROM selllist,product 
            WHERE selllist.productid = product.id
            AND selllist.productid = '65'";
    $query1 = mysqli_query($objCon,$sql1);

    $sql2 = "DELETE FROM profile,login 
            WHERE profile.username = login.username
            AND profile.username = 'test'";
    $query2 = mysqli_query($objCon,$sql2);

    $sql3 = "DELETE FROM login ,news
            WHERE login.username = news.username
            AND login.username = 'test'";
    $query3 = mysqli_query($objCon,$sql3);

    $sql4 = "DELETE FROM login ,gmarket
            WHERE login.username = gmarket.username
            AND login.username = 'test'";
    $query4 = mysqli_query($objCon,$sql4);

    $sql5 = "DELETE FROM gmarket ,market
            WHERE gmarket.marketid = market.id
            AND gmarket.marketid = '16'";
    $query5 = mysqli_query($objCon,$sql5);

    



    // $test"DELETE FROM profile,selllist,product,login,news,gmarket,market 
    //      WHERE profile.username = selllist.username 
    //      AND selllist.productid = product.id
    //      AND profile.username = login.username 
    //      AND login.username = news.username AND login.username = gmarket.username 
    //      AND gmarket.marketid = market.id
    //      AND marketid = '16' AND productid = '65' AND username = 'test'";
    // $qtest = mysqli_query($ObjCon,$test);

    ?>