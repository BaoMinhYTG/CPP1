<?php 
//start: fix  Undefined index
if(!isset($_GET["CBHT"])){
	$_GET["CBHT"]='';
}
//end: fix  Undefined index
$TIEUDE="Sửa thông tin - Phần mềm Themis web";
include_once("dulieu/header.php");

if ( !$_SESSION['user_id'] )
{ 
	echo "Bạn chưa đăng nhập! <a href='login.php'>Nhấp vào đây để đăng nhập</a> hoặc <a href='register.php'>Nhấp vào đây để đăng ký</a>"; 
}
else
{ 
	//check xem co duoc edit hay ko?
	
	$sql_query = "SELECT * FROM caidat WHERE id='1'"; 
	$caidat1 = $conn->query($sql_query); 
	$caidat = $caidat1->fetch_assoc();
	
	$chophepedit = "{$caidat['editprofile']}";
	
	
	$user_id = intval($_SESSION['user_id']);
 
	$sql_query = "SELECT * FROM members WHERE id='{$user_id}'"; 
	$member1 = $conn->query($sql_query); 
	$member = $member1->fetch_assoc();
	
	if ($member['admin'] == "0"){
	if ($chophepedit == 0) 
		{
			echo "<font color='red'><b>Admin đã tắt chức năng thay đổi thông tin, vui lòng liên hệ admin để được trợ giúp!</b>";
			exit;
		}
	}
	
	//----Noi dung thong bao sau khi sua
	$thanhcong='Sửa thành công <a href="javascript:history.go(-1)">Quay lại</a>';
	$kothanh='Sửa không thành công';
	echo "<div class='panel panel-primary'><div class='panel-heading'><h3 class='panel-title'>Thay đổi thông tin: <b>{$member['username']}</b></h3></div><div class='panel-body'>"; 
		
		
		
	if (isset($_GET['do'])&&$_GET['do']=="sua") {//fix  Undefined index
		$ten = addslashes( $_POST['name'] );
		$pass = md5( addslashes( $_POST['pass'] ) );
		$sn = addslashes( $_POST['sn'] );
		$url = addslashes( $_POST['url'] );
		$email = addslashes( $_POST['email'] );
		$sql="
		UPDATE `members` SET
		`email` = '".$email."',
		`URLS` = '".$url."',
		`Name` = '".$ten."',
		`Birthday` = '".$sn."' WHERE `id` =$user_id LIMIT 1 ;";
		
		
		if ($sua=$conn->query($sql))
			echo $thanhcong;
		else
			echo $kothanh;
			
		if (isset($_POST['pass'])&&$_POST['pass']!="") {//fix  Undefined index
			$sqlx="UPDATE `members` SET `password` = '".$pass."' WHERE `id` = '$user_id' LIMIT 1 ;";
			$suapass=$conn->query($sqlx);
			if ($suapass) 
				echo "(Đã đổi pass) ";
			else
				echo "(Chưa đổi pass) ";
		}
	}
	else
		echo"
		<form method='POST' action='suathongtin.php?do=sua&CBHT=edit'>
			<table border='0' width='100%' id='table1' cellspacing='0' cellpadding='0' style='border-collapse: collapse' bordercolor='#C0C0C0'>
				<tr>
					<td>Tên:</td>
					<td><input class='form-control' type='text' value='{$member['Name']}' name='name' size='20'></td>
				</tr>
				<tr>
					<td>SĐT:</td>
					<td><input class='form-control' type='text' value='{$member['URLS']}' name='url' size='20'></td>
				</tr>
				<tr>
					<td>Sinh Nhật:</td>
					<td><input class='form-control' type='text' name='sn' value='{$member['Birthday']}' size='20'></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input class='form-control' type='text' name='email' value='{$member['email']}' size='20'></td>
				</tr>
				<tr>
					<td>Pass:</td>
					<td><input class='form-control' type='password' name='pass' size='20'></td>
				</tr>
			</table><br>
			<p align='center'><input class='btn btn-sm btn-primary' type='submit' value='Sửa'>     <input class='btn btn-sm btn-primary' type='reset' value='Khôi phục' name='B2'></p>
		</form>
		
                            
                            </div></div>";
} 

include_once("dulieu/footer.php");
?>