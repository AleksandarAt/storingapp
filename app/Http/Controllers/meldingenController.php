<?php

$action = $_POST['action'];

if ($action == 'create'){

//Variabelen vullen
$attractie = $_POST['attractie'];
$capaciteit = $_POST['capaciteit'];
$melder = $_POST['melder'];
$type = $_POST["type"];
$overig = $_POST["overig"];



if(isset($_POST['prioriteit'])){
    $prioriteit = 1;
}
else{
    $prioriteit = 0;
}

//1. Verbinding
require_once '../../../config/conn.php';

//2. Query
$query= "INSERT INTO meldingen (attractie, type, melder, capaciteit, prioriteit, overige_info)
 VALUES(:attractie,:type ,:melder, :capaciteit , :prioriteit, :overig)";

//3. Prepare
$statement=$conn->prepare($query);

//4. Execute
$statement->execute([
    ":attractie"=>$attractie,
    ":type"=>$type,
    ":melder" => $melder,
    ":capaciteit" => $capaciteit,
    ":prioriteit" => $prioriteit,
    ":overig" => $overig
]);
header(header:"Location:../../../resources/views/meldingen/index.php?msg=Meldingopgeslagen");
}

if($action=='update'){
    //voer deze code uit als action update is
}

if($action== 'delete'){
    //voer deze code uit als action delete is
}