 <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
				
                    <li <?php if (($_GET["CBHT"])==""){echo 'class="active"';} ?>>
                        <a href="./"><i class="fa fa-fw fa-dashboard"></i> Trang chủ</a>
                    </li>
                    <li <?php if (($_GET["CBHT"])=="rank"){echo 'class="active"';} ?>>
                        <a href="./?CBHT=rank"><i class="fa fa-fw fa-bar-chart-o"></i> Bảng xếp hạng</a>
                    </li>
                    <li <?php if (($_GET["CBHT"])=="tacgia"){echo 'class="active"';} ?>>
                        <a href="./?CBHT=tacgia"><i class="fa fa-fw fa-table"></i> Tác giả</a>
                    </li>
					<!--
                    <li>
                        <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
                    </li>
                    <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                    </li>
                    <li>
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
                    <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                    </li>
				-->
                



<?php 
if (!isset($_SESSION['user_id']) || !$_SESSION['user_id'] )//fix  Undefined index
{
	echo "<li "; if (($_GET["CBHT"])=="login"){echo 'class="active"';}
	echo"><a href='./login.php?CBHT=login'><i class='fa fa-user'></i> Đăng Nhập</a></li>   <li "; 
	if (($_GET["CBHT"])=="register"){echo 'class="active"';}
	echo"><a href='./register.php?CBHT=register'><i class='fa fa-user'></i> Đăng ký</a></li>"; 
}
else
{
	$user_id = intval($_SESSION['user_id']); 
	$sql_query = "SELECT * FROM members WHERE id='{$user_id}'"; 
	$member1 = $conn->query($sql_query); 
	$member = $member1->fetch_assoc();
	
	
	echo "<li "; if (($_GET["CBHT"])=="edit"){echo 'class="active"';} echo"><a href='./suathongtin.php?CBHT=edit'><i class='fa fa-fw fa-wrench'></i> Sửa thông tin</a></li>";
	
	if ($_SESSION['user_admin'] == 1) 
		{
			echo "<li "; if (($_GET["CBHT"])=="register"){echo 'class="active"';} echo"><a href='./register.php?CBHT=register'><i class='fa fa-user'></i> Add User</a></li>";
		
			echo "<li "; if (($_GET["CBHT"])=="admincp"){echo 'class="active"';} echo"><a href='./admincp.php?CBHT=admincp'><i class='fa fa-fw fa-wrench'></i> AdminCP</a></li>";
			
		}
	
	
	echo "<li "; if (($_GET["CBHT"])=="submit"){echo 'class="active"';} echo"><a href='./submit.php?CBHT=submit'><i class='fa fa-fw fa-desktop'></i> Nộp bài</a></li>";
	echo "<li><a href='./?CBHT=thoat'>Thoát ra</a></li>";
	
}
?></ul>
            </div>