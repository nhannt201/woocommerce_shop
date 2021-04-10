<?php
class Init {
	private $hostname = "localhost";
    private $username = "phong123_log";
    private $password = "@kinhDoanh99";
    private $database = "phong123_blog";
	public function __construct() {
		if(!isset($this->db)){
			$t=time();
			$conn = mysqli_connect($this->hostname, $this->username, $this->password,$this->database);
			if (!$conn) {
				die("Database servers are having problems: " . mysqli_connect_error());
			} else {
				 $this->db = $conn;
			}
			
			if (!$conn->set_charset("utf8")) { }

			date_default_timezone_set('Asia/Ho_Chi_Minh');

			if (date_default_timezone_get()) {
			  //  echo 'date_default_timezone_set: ' . date_default_timezone_get() . '';
			}
		}
	}
	

}

class KyGui extends Init {
	public function GetMota($id) {
		$query = "SELECT * FROM kygui WHERE id='$id'";
		$check = $this->db->query($query);
		if ($check->num_rows >0) {
			$row = $check->fetch_assoc();
			echo $row['mota'];
		} else {
			echo "";
		}
	}
	
	public function GetThongtin($id) {
		$query = "SELECT * FROM kygui WHERE id='$id'";
		$check = $this->db->query($query);
		if ($check->num_rows >0) {
			$row = $check->fetch_assoc();
			//setlocale(LC_MONETARY, 'vi_VN');
        $tien =  number_format($row['price'])."vnd";//money_format('%i', $row['price']);
			echo "<h3>Giá tiền: ".$tien."</h3><h3>SĐT: ".$row['phone']."</h3>";
		} else {
			echo "";
		}
	}
	
	public function GetHoanTat($id) {
		$query = "UPDATE kygui SET status=1 WHERE id='$id'";
		$check = $this->db->query($query);
	}
	
	public function DelImage($id) {
		$query = "DELETE FROM hinhanh WHERE id='$id'";
		$check = $this->db->query($query);
	}
	
		public function getImages($id_kg) { 
		$query = "SELECT * FROM hinhanh WHERE kygui_id='$id_kg'";
		$check = $this->db->query($query);
		if ($check->num_rows >0) {
		    $congdon = "";
			while($row = $check->fetch_assoc()) {
			    $congdon .= '<div class="card" id="img_del_'.$row['id'].'">
                            <img class="card-img-top" src="'.$row['img_link'].'" style="width:100% height: 200px;">
                                <div class="card-body">
                                  <button class="btn btn-danger float-right" data-toggle="modal" data-target="#thongbao" onClick="DelNote('.$row['id'].')">Xoá ảnh</button>
                                </div>
                              </div>
                              <br>';
			}
			echo $congdon;
		} else {
			echo "(empty)";
		}
	}
}