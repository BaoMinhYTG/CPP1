<?php
//start: fix  Undefined index
if(!isset($_GET["CBHT"])){
	$_GET["CBHT"]='';
}
//end: fix  Undefined index
$TIEUDE="Đăng nhập - Phần mềm Themis web";
include_once("dulieu/header.php");

// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);
// Check connection
if ($conn->connect_error) { die("không thể kết nối: " . $conn->connect_error); }



if (isset($_GET['act']) && $_GET['act'] == "do" )
{
	// Dùng hàm addslashes() để tránh SQL injection, dùng hàm md5() để mã hóa password
	$username = addslashes( $_POST['username'] );
	$password = md5( addslashes( $_POST['password'] ) );
	// Lấy thông tin của username đã nhập trong table members
	
	$sql_query = "SELECT id, username, admin, password FROM members WHERE username='{$username}'";
	
	// Nếu username này không tồn tại thì....
	$member1 = $conn->query($sql_query); 
	
	$member = $member1->fetch_assoc();
	
	
	if ( $member1->num_rows <= 0 )
	{
		print "Tên truy nhập không tồn tại. <a href='javascript:history.go(-1)'>Nhấp vào đây để quay trở lại</a>"; include_once("dulieu/footer.php");
		exit;
	}
	// Nếu username này tồn tại thì tiếp tục kiểm tra mật khẩu
	if ( $password != $member['password'] )
	{
		print "Nhập sai mật khẩu. <a href='javascript:history.go(-1)'>Nhấp vào đây để quay trở lại</a>"; include_once("dulieu/footer.php");
		exit;
	}
	// Khởi động phiên làm việc (session)
	$_SESSION['user_id'] = $member['id'];
	$_SESSION['user_admin'] = $member['admin'];
	// Thông báo đăng nhập thành công
	print "<SCRIPT LANGUAGE='JavaScript'>alert('Bạn đã đăng nhập thành công');</script>";
	print "<meta http-equiv='refresh' content='0; index.php'>";
	print "Bạn đã đăng nhập với tài khoản {$member['username']} thành công. <a href='index.php'>Nhấp vào đây để vào trang chủ</a>";
}
else
{
// Form đăng nhập
	if (!isset($_SESSION['user_id'] ))//fix  Undefined index
{
print <<<EOF
<form action="login.php?act=do&CBHT=login" method="post">
Tên truy nhập: <input type="text" name="username" value="">
Mật khẩu: <input type="password" name="password" value="">
<input type="submit" name="submit" value="Đăng nhập">
</form>
EOF;
}
else
{
	echo "Bạn đã đăng nhập vào tài khoản với tên {$member['username']}";
}
}

include_once("dulieu/footer.php");

?> 

