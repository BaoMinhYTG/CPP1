<?php
//start: fix  Undefined index
if(!isset($_GET["CBHT"])){
	$_GET["CBHT"]='';
}
//end: fix  Undefined index
switch($_GET["CBHT"])
{
	default:
	{
	$TIEUDE="Phần mềm Themis web";
	include_once("dulieu/header.php");
	include_once("dulieu/home.php");
	include_once("dulieu/footer.php");
	break;
	}	
	case "tacgia":
	{
	$TIEUDE="Tác giả - Phần mềm Themis web";
	include_once("dulieu/header.php");
	include_once("dulieu/tacgia.php");
	include_once("dulieu/footer.php");
	break;
	}
	case "rank":
	{
	$TIEUDE="Xếp hạng - Phần mềm Themis web";
	include_once("dulieu/header.php");
	include_once("rank.php");
	include_once("dulieu/footer.php");
	break;
	}
	case "admin":
	{
	$TIEUDE="Trang quản lí admin - Phần mềm Themis web";
	include_once("dulieu/header.php");
	include_once("admin.php");
	include_once("dulieu/footer.php");
	break;
	}
	case "thoat":
	{
	$TIEUDE="Đăng xuất - Phần mềm Themis web";
	include_once("dulieu/header.php");
	include_once("thoat.php");
	include_once("dulieu/footer.php");
	break;
	}
	case "nop":
	{
	$TIEUDE="Nộp bài - Phần mềm Themis web";
	include_once("dulieu/header.php");
	include_once("nop.php");
	include_once("dulieu/footer.php");
	break;
	}
	case "logs":
	{
	$TIEUDE="File logs - Phần mềm Themis web";
	include_once("dulieu/header.php");
	include_once("logs.php");
	include_once("dulieu/footer.php");
	break;
	}
}

				?>