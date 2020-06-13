
<script type="text/javascript" src="Bootstrap/js/jquery-3.4.1.min.js"></script>
<?php 
	include ('AdminCP/modules/config.php');
	if (isset($_POST['dangky']))
	{
		$hoten = $_POST['hoten'];
		$taikhoan = $_POST['taikhoan'];
		$matkhau = $_POST['matkhau'];
		$email = $_POST['email'];
		$sodienthoai = $_POST['sodienthoai'];
		$diachi = $_POST['diachi'];
		
		$sql="	INSERT INTO dangky (hoten, taikhoan, matkhau, email, sodienthoai, diachi)
				VALUES ('$hoten', '$taikhoan', '$matkhau', '$email', '$sodienthoai', '$diachi')";
		$run=mysqli_query($conn, $sql);

				echo '<script>alert("Bạn đã đăng ký tài khoản thành công, mời đăng nhập.")</script>';
	}
?>



<script>
    $(document).ready(function(){
      $("#txtTaiKhoan").blur(function(){
      var user = document.getElementById("txtTaiKhoan").value;
      $.ajax({
        url:"xuly_kiemtrataikhoan.php",
        method:"POST",
        data: {user:user},
        success: function(kq){
         if (kq ==1) {
         	 $('#nhacloi').html ( 'Tài khoản đã có người sử dụng !!!');
         	  $("#nhacloi").css("color", "red");
         }else{
         	$('#nhacloi').html ( 'Tài khoản hợp lệ.');
         	  $("#nhacloi").css("color", "green");
        }
        }
      });
      });
    });
</script>
<p id="motasanpham">Đăng ký thành viên	</p>

<form action="" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-5">
		    <label>Họ tên</label>
			<input class="form-control" type="text" name="hoten" placeholder="Họ tên..." required>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		    <label class="mt-2">Tên tài khoản</label>
			<input class="form-control" type="text" name="taikhoan" id="txtTaiKhoan" placeholder="Tên tài khoản..." required>
			<div id="nhacloi"></div>
		</div>
		<div class="col-md-2">
		    <label class="mt-2">Mật khẩu</label>
			<input class="form-control" type="password" name="matkhau" placeholder="Mật khẩu..." required>
		</div>
	</div>


	<div class="row">
		<div class="col-md-3">
		    <label class="mt-2">Email</label>
			<input class="form-control" type="text" name="email" placeholder="BookStore@gmail.com" required>
		</div>
		<div class="col-md-2">
		    <label class="mt-2">Số điện thoại</label>
				<input class="form-control" type="text" name="sodienthoai" placeholder="(+84)" required>
		</div>
	</div>
	<div class="row">
		<div class="col-md-5">
		    <label class="mt-2">Địa chỉ</label>
			<input class="form-control" type="text" name="diachi" placeholder="Địa chỉ..." required>
		</div>
	</div>
	<button class="btn btn-danger mt-2" type="submit" name="dangky" id="btnDangKy">Đăng ký</button>
</form>


