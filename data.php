<?php



include("bancodedados.php");


$sql = "SELECT litros,data FROM dados";
$sth = mysql_query($sql, $conecta);


$rows = array();
$rows['name'] = 'litros';



while($r = mysql_fetch_assoc($sth)) {
    $rows['data'][] = $r['litros'];
}


$result = array();
array_push($result,$rows);



print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($conecta);
?>
