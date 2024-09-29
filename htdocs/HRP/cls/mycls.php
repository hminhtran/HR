<?php
class HR 
{ 	
	public function connect()
	{
		$con = mysqli_connect("localhost","root","","hr_db");
		if(!$con)
		{
		echo 'connect fail';
		}
		else
		{
			mysqli_set_charset($con,"utf8");
			return $con;
		}	
	}
	public function uploadhinh ($name,$folder,$tmp_name)
		{
			if($name!= '' & $folder != '' && $tmp_name !='')
			{
				$newname = $folder ."/".$name;
				if(move_uploaded_file($tmp_name,$newname))
				{
					return 1;
				}
				else
				{
					return 0;	
				}
			}
			else 
			{
				return 0;	
			}
		}
		public function get_info($sql)
		{
         $link= $this->connect();
		 $result = mysqli_query($link, $sql);
		 if ($result && mysqli_num_rows($result) > 0) {
			$employee_data = mysqli_fetch_assoc($result);
			return $employee_data;
		} else {
			echo "Không thể lấy thông tin của nhân viên.";
			exit;
		}

		}
		public function sql($sql)
		{
				$link = $this->connect();
				if (mysqli_query($link,$sql))
				{
					return 1;
				}
				else
				{
					return 0;	
				}
				
				
		}
		public function load_detail($sql)
		{
			$link = $this->connect();
			$result = mysqli_query($link,$sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
              

                echo '<div style="overflow-x: auto;">
                <table class="table table-bordered">
                <img src="img/'.$row['Avatar'].'" alt="Avatar" style="width:150px;height:150px;align:center">
                    <thead>
                        <tr>
                            <th style="text-align: center">Thông tin</th>      
                            <th style="text-align: center">Chi tiết</th>      
                        </tr>
                    </thead>
            
                    <tbody>
                    <tr>
                        <td style="text-align: center" >Username</td>
                        <td style="text-align: center" >'.$row["username"].'</td>
                    </tr>
                    <tr>
                        <td style="text-align: center" >Họ đệm</td>
                        <td style="text-align: center" >'.$row["hoDem"].'</td>
                    </tr>
                    <tr>
                        <td style="text-align: center" >Tên</td>
                        <td style="text-align: center" >'.$row["ten"].'</td>
                    </tr>
                    <tr>
                        <td style="text-align: center" >Ngày sinh</td>
                        <td style="text-align: center" >'.$row["ngaySinh"].'</td>
                    </tr>
                    <tr>
                        <td style="text-align: center" >Giới tính</td>
                        <td style="text-align: center" >'.$row["gioiTinh"].'</td>
                    </tr>
                    <tr>
                        <td style="text-align: center" >Số điện thoại</td>
                        <td style="text-align: center" >'.$row["soDienThoai"].'</td>
                    </tr>
                    <tr>
                        <td style="text-align: center" >Email</td>
                        <td style="text-align: center" >'.$row["email"].'</td>
                    </tr>
                    <tr>
                        <td style="text-align: center" >Phòng ban</td>
                        <td style="text-align: center" >'.$row["name_de"].'</td>
                    </tr>
                    <tr>
                        <td style="text-align: center" >Vai trò</td>
                        <td style="text-align: center" >'.$row["role_name"].'</td>
                    </tr>
                    
                    <tr>
                        <td style="text-align: center" >Ngày vào làm</td>
                        <td style="text-align: center" >'.$row["ngayVaoLam"].'</td>
                    </tr>
                    <tr>
                        <td style="text-align: center" >QR ngân hàng</td>
                        <td style="text-align: center" >'.$row["qr_banking"].'</td>
                    </tr>
                    ';
                    
             
            } else {
                echo "Không tìm thấy nhân viên với ID này";

                
            }
		}
		public function load_user()
		{
		$link = $this->connect();
		$sql = "SELECT MAX(id) AS max_id FROM employees";
		$result = mysqli_query($link,$sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); // Lấy một hàng kết quả dưới dạng mảng kết hợp
    $max_id = $row["max_id"]; // Lấy giá trị của cột max_id từ hàng kết quả
 
	return $max_id+1;
} else {
    echo "Không có dữ liệu";
}
		}
	
		public function attend($sql)
		{

		
		}
		function login($data)
		{
			$link = $this->connect();
			$username = $data["username"];
			$password = md5($data['password']);
		$stmt = $link->prepare("SELECT id, username, id_role FROM employees WHERE username = ? AND password = ?");
		$stmt->bind_param("ss", $username, $password);
		$stmt->execute();
		$stmt->store_result();

		if ($stmt->num_rows > 0) {
			$stmt->bind_result($id, $username, $role);
			$stmt->fetch();
			
			// Đặt thông tin người dùng vào phiên
			$_SESSION['username'] = $username;
			$_SESSION['role'] = $role;
			$_SESSION['id'] = $id;

			$login_cookie_name = "login";
			$login_cookie_value = $id;
			setcookie($login_cookie_name, $login_cookie_value, time() + (86400 * 30), "/"); // Cookie tồn tại trong 30 ngày

			// Chuyển hướng dựa trên vai trò
			if ($role == 1) {
				header("Location: admin/");
			} else {
				header("Location: index.php");
			}
			exit;
		} else {
			echo ' <script>
					alert("Thất bại")
					</script>';
		}

		$stmt->close();
		$link->close();
		}
		
		public function attend_button($sql)
			{
				$link = $this->connect();
				$result = mysqli_query($link, $sql);
				if ($result->num_rows > 0) 
				{
					$row = $result->fetch_assoc();
					if ($row['checkout_time'] == '')
					{
						echo 'Chấm công ra';
					} 
					else
					{
						echo 'đã chấm công đủ hôm nay';
					}
				}
				else
				{
					echo "Chấm công vào";
				}
			}
		public function get_avatar ($sql)
		{
			$link = $this->connect();	
			$result = mysqli_query($link,$sql);
			if ($result->num_rows > 0) 
			{
				$row = $result->fetch_assoc();
				$name = $row["Avatar"];
				echo $name;
			}
			else
			{
				echo 'sai';
			}

		}
		
			
		
		
}

 
?> 
