<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
include './hari.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$hari = hari_ini(date("D"));
$conn = new mysqli("192.168.1.253", "sik", "00", "sik");
$sql = "SELECT dokter.nm_dokter, dokter.kd_dokter, poliklinik.nm_poli FROM jadwal INNER JOIN dokter ON jadwal.kd_dokter=dokter.kd_dokter 
INNER JOIN poliklinik ON jadwal.kd_poli=poliklinik.kd_poli 
WHERE hari_kerja='$hari' LIMIT 6";
//WHERE hari_kerja='$hari' LIMIT 6";
$result = $conn->query($sql);

$outp = "";
while ($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {
        $outp .= ",";
    }
    $outp .= '{"nm_poli":"'  . $rs["nm_poli"] . '",';
    $outp .= '"kd_dokter":"'  . $rs["kd_dokter"] . '",';
    $outp .= '"nm_dokter":"' . $rs["nm_dokter"] . '"}';
}
$outp = '{"records":[' . $outp . ']}';
$conn->close();
echo($outp);
