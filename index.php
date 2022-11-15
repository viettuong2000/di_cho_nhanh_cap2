<?php
//  die(__DIR__);
	$path_file = 'C:\xampp\htdocs\di_cho_nhanh\\';
	require $path_file.'Model/Database.php'; 
	$db = new Database();
	$db->connect();

	/*xử lý các request*/
	require $path_file.'View/client/layouts/header.php'; /*giao diện header*/

	if (isset($_GET['controller'])) {
		require $path_file.'Route/admin/web.php'; /*xử lý các request trong Route/web.php*/
	} else {
		require $path_file.'View/client/pages/home.php'; /*require giao diện trang chủ*/
	}

	require $path_file.'View/client/layouts/footer.php'; /*giao diện footer*/

	$db->closeDatabase();