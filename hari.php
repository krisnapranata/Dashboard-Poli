<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

function hari_ini($hari){
	switch($hari){
		case 'Sun':
                        $hari_ini = "MINGGU";
		break;
 
		case 'Mon':			
                        $hari_ini = "SENIN";
		break;
 
		case 'Tue':
			$hari_ini = "SELASA";
		break;
 
		case 'Wed':
			$hari_ini = "RABU";
		break;
 
		case 'Thu':
			$hari_ini = "KAMIS";
		break;
 
		case 'Fri':
			$hari_ini = "JUMAT";
		break;
 
		case 'Sat':
			$hari_ini = "SABTU";
		break;
		
		default:
			$hari_ini = "Tidak di ketahui";		
		break;
	}
 
	return $hari_ini;
 
}