
<?php

//start: fix  Undefined index
if(!isset($_GET["CBHT"])){
	$_GET["CBHT"]='';
}
//end: fix  Undefined index

$TIEUDE="AdminCP - Phần mềm Themis web";
include_once("dulieu/header.php");
?>
<?php 
if ( !$_SESSION['user_id'] )
{ 
	echo "Bạn chưa đăng nhập! <a href='login.php'>Nhấp vào đây để đăng nhập</a> hoặc <a href='register.php'>Nhấp vào đây để đăng ký</a>"; 
}
else
{ 
	$user_id = intval($_SESSION['user_id']);
	$sql_query = "SELECT * FROM members WHERE id='{$user_id}'";
	$member1 = $conn->query($sql_query); 
	$member = $member1->fetch_assoc();
	
	if ($member['admin']!="1")  
		echo "<b>{$member['username']}</b>, bạn không có thẩm quyền để truy cập trang này, vui lòng đăng nhập lại với tài khoản admin";
	else
	{
		//Noi dung cac ham, cac lenh va code danh cho admin
	//	echo "Chức năng đang được xây dựng...";



/*
echo '<select>';
$tempholder = array();
$rs = mysql_query("SELECT * FROM members");
$nr = mysql_num_rows($rs);
for ($i=0; $i<$nr; $i++){
    $r = mysql_fetch_array($rs);
    if (!in_array($r['username'], $tempholder)){
        $tempholder[$i] = $r['username'];
        echo "<option>".$r["username"]."</option>";//<option$selected>...
    }
}
unset($tempholder);
echo '</select>';
*/

	$sql_query = "SELECT * FROM caidat WHERE id='1'";
	$caidat1 = $conn->query($sql_query); 
	$caidat = $caidat1->fetch_assoc();

	$thanhcong = '<font color="green"><b>Bạn đã thiết lập thành công</font></b> <a href="admincp.php?CBHT=admincp">Bấm vào đây để quay lại</a>';
	$kothanh = 'Thiết lập thất bại';
	if (isset($_GET['do'])&&$_GET['do']=="sua") 
	{
		//fix  Undefined index		
		$submit = addslashes( $_POST['submiton'] );
		$register = addslashes( $_POST['registeron'] );
		$rank = addslashes( $_POST['viewrank'] );
		$profile = addslashes( $_POST['editprofile'] );
		
		
		$sql="
		UPDATE `caidat` SET
		`submiton` = '".$submit."',
		`registeron` = '".$register."',
		`viewrank` = '".$rank."',
		`editprofile` = '".$profile."' WHERE `id` = 1 ;";
		
		
		if ($sua=$conn->query($sql))
			echo $thanhcong;
		else
			echo $kothanh;
	}
else
//echo $data;

	echo "
		<form method='POST' action='admincp.php?do=sua&CBHT=admincp'>
			<table border='0' width='100%' id='table1' cellspacing='0' cellpadding='0' style='border-collapse: collapse' bordercolor='#C0C0C0'>
				<tr>
					<td>Cho phép submit: ( 0 = off ; 1 = on )</td>
					<td><input class='form-control' type='text' value='{$caidat['submiton']}' name='submiton' size='20'></td>
				</tr>
				<tr>
					<td>Cho phép đăng ký: ( 0 = off ; 1 = on )</td>
					<td><input class='form-control' type='text' value='{$caidat['registeron']}' name='registeron' size='20'></td>
				</tr>
				<tr>
					<td>Cho phép xem rank: ( 0 = off ; 1 = on )</td>
					<td><input class='form-control' type='text' value='{$caidat['viewrank']}' name='viewrank' size='20'></td>
				</tr>
				<tr>
					<td>Cho phép chỉnh sửa thông tin: ( 0 = off ; 1 = on )</td>
					<td><input class='form-control' type='text' name='editprofile' value='{$caidat['editprofile']}' size='20'></td>
				</tr>		
			</table><br>
			<p align='center'><input class='btn btn-sm btn-primary' type='submit' value='Sửa'>     <input class='btn btn-sm btn-primary' type='reset' value='Khôi phục' name='B2'></p>
		</form>
		
                            
                            </div></div>";





















	}

} 


?>

<?php
include_once("dulieu/footer.php");
?>