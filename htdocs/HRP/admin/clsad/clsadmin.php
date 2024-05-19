<?php 
require_once '../cls/mycls.php';
    class Admin extends HR
    { 
        public function loadnv($sql)
        {
           

           echo '<div style="overflow-x: auto;">
           <table class="table table-bordered">
               <thead>
                   <tr>
                       <th>STT</th>      
                       <th>Tên sản phẩm</th>      
                       <th>Mã sản phẩm</th>
                       <th>QR code</th>
                       <th>Trạng thái</th> 
                       <th>Hành động</th> 
       
                   </tr>
               </thead>
       
               <tbody>';
      
            $link = $this->connect();
            $ketqua= mysqli_query($link,$sql);
			$i=mysqli_num_rows($ketqua);
			if($i>0)
			{
                while($row = mysqli_fetch_array($ketqua))
                {
                    $id = $row['id'];
                    $username = $row['username'];   
                    $ten = $row['ten'] ;
                    $chucvu = $row['id_role'];
                    $avatar = $row['Avatar'];
                    $qr = $row['qr'];
                echo '  <tr>
                <td style="text-align: center">'.$username.'</td>
                <td style="text-align: center">'.$ten.'</td>
                <td style="text-align: center">'.$chucvu.'</td>
                <td style="text-align: center"><img src="'.$avatar.'" alt="avatar" style="width:50px;height:50px"></td>
                <td style="text-align: center"><img src="../qrcode/'.$qr.'" alt="qr code" style="width:100px;height:100px"></td>
                <td style="text-align: center">
                            <a href="detail.php?id=' . $id . '" class="btn btn-sm btn-success">Chi tiết</a>
                            <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="confirmDelete(\''.$id.'\')">Xóa</a>
                           
                        </td>
              </tr>';         
                }
            }
            else
            {
                echo 'khong co du lieu';
            }


            echo '</tbody>
            </table>'; 
        }
        public function getTotalRows($table) {
            $table='employees';
            $link = $this->connect();
            $sql_count = "SELECT COUNT(*) AS total FROM $table";
            $result_count = mysqli_query($link,$sql_count);
            if ($result_count->num_rows > 0) {
                $row = $result_count->fetch_assoc();
                $total_rows = $row['total'];
                return $total_rows;
            } else {
                $total_rows = 0;
            }
  
            return $total_rows;
        }
    
        public function getTotalPages($table, $limit) {
            $total_rows = $this->getTotalRows($table);
            $total_pages = ceil($total_rows / $limit);
            return $total_pages;
        }
        public function load_de()
        {
            $sql = "Select * from department";
            $link = $this->connect();
            $result = mysqli_query($link,$sql);
                        // Tạo dropdown select
                echo '<select name="department" id="inputField"class="form-control">';
                echo '<option value="">Chọn phòng ban</option> '; // Option mặc định
                if ($result->num_rows > 0) {
                    // Hiển thị các phòng ban từ cơ sở dữ liệu
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row["id_de"] . '">' . $row["name_de"] . '</option>';
                    }
                } else {
                    echo "Không có dữ liệu phòng ban";
                }
                echo '</select>';

                // Đóng kết nối
                $link->close();
        }
        public function load_role()
        {
            $sql = "Select * from e_role";
            $link = $this->connect();
            $result = mysqli_query($link,$sql);
                        // Tạo dropdown select
                echo '<select name="role" id="inputField"class="form-control">';
                echo '<option value="">Chọn vai trò</option> '; // Option mặc định
                if ($result->num_rows > 0) {
                    // Hiển thị các phòng ban từ cơ sở dữ liệu
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row["id_role"] . '">' . $row["role_name"] . '</option>';
                    }
                } else {
                    echo "Không có dữ liệu phòng ban";
                }
                echo '</select>';

                // Đóng kết nối
                $link->close();
        }
        
      
    }

    
    ?>  
