<?php


    // Recebimento de dados via serial
    $porta  = fopen('/dev/ttyACM2', 'r+');

    if($porta)
    {         
//---------------------------------------------------------------------------------------------
                //Dados da serial
                $serial = fgets($porta);
                $dados = $serial;
                echo "$dados";
}


//esquema de assinatura mensal
/*

include("bancodedados.php");
$query = "INSERT INTO dados (litros) VALUES ('$dados')";
$inserir = mysql_query($query) or die(mysql_error());

if($inserir){
		echo "Deu certo!";
		echo "<script>window.location.href='index.php';</script>";
}else{

}

mysql_close($connect);
*/
?>


<!DOCTYPE html>
<html>
<head>
 <META HTTP-EQUIV="refresh" CONTENT="10">
	<title></title>
</head>
<body>
<?echo "dados $dados";?>
</body>
</html>