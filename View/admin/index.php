<?php
	$path_file = 'C:\xampp\htdocs\di_cho_nhanh\\';
	session_start(); /*đăng ký phiên làm việc*/
        ob_start();
	require $path_file. 'Config/config.php';
	require $path_file.'Model/Database.php';
	$db = new Database();

	/**
     * Nếu tồn tại session và giá trị level = 1 thì có quyền truy cập trang quản trị viên
     * Ngược lại thì chuyển hướng về trang chủ
     * @var array
     */

	if (!empty($_SESSION['useradmin']) && $_SESSION['useradmin']['level'] == admin) {
		require $path_file.('View/admin/layouts/header.php');

		if (isset($_GET['controller'])) {
			require $path_file.'Route/admin/web.php'; /*xử lý các request trong Route/web.php*/
		} else {
			require $path_file.('View/admin/pages/home.php');
		}

		require $path_file. ('View/admin/layouts/footer.php');
	} else {
		header('Location: ../../');
	}

 $db->closeDatabase();

