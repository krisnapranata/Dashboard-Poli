<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
include './hari.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$hari = hari_ini(date("D"));
//$conn = new mysqli("localhost", "root", "", "sikbaru");
//$sql = "SELECT dokter.kd_dokter, poliklinik.kd_poli FROM jadwal 
//INNER JOIN dokter ON jadwal.kd_dokter=dokter.kd_dokter 
//INNER JOIN poliklinik ON jadwal.kd_poli=poliklinik.kd_poli 
//WHERE hari_kerja='$hari'";
//$result = $conn->query($sql);
//
//$outp = "";
//while ($rs = $result->fetch_array(MYSQLI_ASSOC)) {
//    $kd_dokter = $rs['kd_dokter'];
//    $kd_poli = $rs['kd_poli'];
//    $tgl_registrasi = date("Y-m-d");
//    $periksa = "SELECT reg_periksa.no_reg, reg_periksa.kd_dokter, pasien.nm_pasien FROM reg_periksa "
//            . "INNER JOIN pasien ON reg_periksa.no_rkm_medis=pasien.no_rkm_medis "
//            . "WHERE reg_periksa.kd_poli='$kd_poli' "
//            . "AND reg_periksa.kd_dokter='$kd_dokter' "
//            . "AND reg_periksa.tgl_registrasi='$tgl_registrasi' "
//            . "AND reg_periksa.stts='Belum'"
//            . "ORDER BY reg_periksa.no_reg ASC";
//    $res = $conn->query($periksa);
//    while ($r = $res->fetch_array(MYSQLI_ASSOC)) {
//        if ($outp != "") {
//            $outp .= ",";
//        }
//        $outp .= '{"no_reg":"' . $r["no_reg"] . '",';
//        $outp .= '"kd_dokter":"' . $r["kd_dokter"] . '",';
//        $outp .= '"nm_pasien":"' . $r["nm_pasien"] . '"}';
//    }
//}
//$outp = '{"records":[' . $outp . ']}';
//$conn->close();

$conn = mysqli_connect("192.168.1.253", "sik", "00", "sik");
$sql = "SELECT dokter.kd_dokter, poliklinik.kd_poli FROM jadwal 
    INNER JOIN dokter ON jadwal.kd_dokter=dokter.kd_dokter 
    INNER JOIN poliklinik ON jadwal.kd_poli=poliklinik.kd_poli 
    WHERE hari_kerja='$hari'";
$result = $conn->query($sql);

$outp = "";
while ($rs = mysqli_fetch_array($result)) {
    $kd_dokter = $rs['kd_dokter'];
    $kd_poli = $rs['kd_poli'];
    $tgl_registrasi = date("Y-m-d");
    $periksa = "SELECT reg_periksa.no_reg, reg_periksa.kd_dokter, pasien.nm_pasien FROM reg_periksa "
            . "INNER JOIN pasien ON reg_periksa.no_rkm_medis=pasien.no_rkm_medis "
            . "WHERE reg_periksa.kd_poli='$kd_poli' "
            . "AND reg_periksa.kd_dokter='$kd_dokter' "
            . "AND reg_periksa.tgl_registrasi='$tgl_registrasi' "
            . "AND reg_periksa.stts!='Sudah' AND reg_periksa.stts!='Batal'"
            . "ORDER BY reg_periksa.no_reg ASC LIMIT 10";
    $res = $conn->query($periksa);
    while ($r = mysqli_fetch_array($res)) {
        if ($outp != "") {
            $outp .= ",";
        }
        $outp .= '{"no_reg":"' . $r["no_reg"] . '",';
        $outp .= '"kd_dokter":"' . $r["kd_dokter"] . '",';
        $outp .= '"nm_pasien":"' . $r["nm_pasien"] . '"}';
    }
}
mysqli_close($conn);
$outp = '{"records":[' . $outp . ']}';
echo($outp);
