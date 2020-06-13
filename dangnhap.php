<?php 
	include ('AdminCP/modules/config.php');
	//session_start();
	//session_destroy();
	if(isset ($_POST['dangnhap']))
	{
		$taikhoan = $_POST['taikhoan'];
		$matkhau = $_POST['matkhau'];
			
		$sql="	SELECT *
				FROM admin
				WHERE taikhoan = '$taikhoan' and	 matkhau ='$matkhau'";
		$run=mysqli_query($conn, $sql);
	$data=mysqli_fetch_array($run);
		$dem = mysqli_num_rows($run);
		if($dem == 0)
		{	
			echo '<script>alert("Sai tài khoàn hoặc mật khẩu")</script>';
			header('location:index.php?xem=dangnhap');
			
		}else
		{
			$_SESSION['dangnhapadmin'] = $data['hoten'];
			//header('location:admincp/index.php');
			echo "<script type='text/javascript'>window.location.href = 'admincp/index.php'</script>";
		}
			
	}
?>
<p style="    margin-top: 9px;
    margin-bottom: 10px;
    font-size: 27px;
    border-bottom: 4px solid #3160F6;">Đăng nhập Admin</p>
    
    <div class="container">
			
		   <form action="" method="post" enctype="multipart/form-data">
			    <label>Tên đăng nhâp</label>
			    <input class="form-control" type="text" name="taikhoan" placeholder="Username..."  required>

			    <label>Mật khẩu</label>
			    <input class="form-control" type="password" name="matkhau" placeholder="Password..." required>

			    <button class="btn btn-primary mt-2" type="submit" name="dangnhap">Đăng nhập</button>
<!-- 			   <input type="submit" name="dangnhap" value="Đăng nhập"> -->
			</form>
		</div>