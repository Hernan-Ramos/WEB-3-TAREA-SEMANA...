<?php
$ci=$_GET["ci"];
$db=mysqli_connect('localhost','root','','sitio');
$resultado =mysqli_query($db,'delete FROM persona where ci='.$ci);
header("Location: index.php");
?>