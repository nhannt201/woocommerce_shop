<?php
require_once("init.php");
if (isset($_GET['num'])) {
	$num = $_GET['num'];
	$kygui = new KyGui();
	switch ($num) {
		case "0": //Lay Mota
			if (isset($_GET['id'])) {
				$id_kg = $_GET['id'];
				$kygui->GetMota($id_kg);
			}
		break;
		case "1": //Lay Images
			if (isset($_GET['id'])) {
				$id_kg = $_GET['id'];
				$kygui->getImages($id_kg);
			}
		break;
		case "2": //Lay Info
			if (isset($_GET['id'])) {
				$id_kg = $_GET['id'];
				$kygui->GetThongtin($id_kg);
			}
		break;
		case "3": 
			if (isset($_GET['id'])) {
				$id_kg = $_GET['id'];
				$kygui->GetHoanTat($id_kg);
			}
		break;
		case "4": 
			if (isset($_GET['id'])) {
				$id_kg = $_GET['id'];
				$kygui->DelImage($id_kg);
			}
		break;
	}
}