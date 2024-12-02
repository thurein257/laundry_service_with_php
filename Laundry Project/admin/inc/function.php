<?php
function delService()
{
    global $connection;
    $orderid=$_GET['oid']; 
    $query="Delete from order_detail where orderid='$orderid'";
    $go_query=mysqli_query($connection,$query);
    
}

function adminlogin(){
    session_start();
    if(!(isset($_SESSION['adminlogin']) && $_SESSION['adminlogin'] ==true)){
        echo"<script>
            window.location.href='index.php';
        </script>";
    }
    session_regenerate_id(true);
}


?>