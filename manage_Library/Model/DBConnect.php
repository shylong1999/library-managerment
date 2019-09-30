<?php 
	class Database{
		private $hostname = 'localhost';
		private $username = 'root';
		private $password = '';
		private $dbname = 'library';
		private $conn = NULL;
		private $result = NULL;

		public function connect(){
			$this->conn = new mysqli($this->hostname, $this->username,$this->password, $this->dbname);
			if (!$this->conn) {
				echo "Kết nối thất bại";
				exit();
			}
			else{
				mysqli_set_charset($this->conn, 'utf8');
			}

			return $this->conn;
		}


		public function execute($sql)
		{
			$this->result = $this->conn->query($sql);
			return $this->result;
		}

		public function getData(){
			if ($this->result) {
					$data = mysqli_fetch_array($this->result);
				}
			else{
				$data = 0;
			}	
			return $data;
		}

		public function getDataID($table,$id)
		{
			$sql = "SELECT * FROM $table WHERE id = '$id'";
			$this->execute($sql);

			if ($this->num_rows() != 0) {
					$data = mysqli_fetch_array($this->result);
				}
			else{
				$data = 0;
			}	
			return $data;

		}

		public function getAllData($table){
			$sql = "SELECT * FROM $table";
			$this->execute($sql);
		 	if ($this->num_rows() == 0) {
		 		$data = 0;
		 	}
		 	else{
		 		while ($datas = $this->getData()) {
		 			$data[] = $datas; 
		 		}
		 	}
		 	return $data;
		} 
		public function num_rows()
		{
			if ($this->result) {
				$num = mysqli_num_rows($this->result);
			}
			else{
				$num = 0;
			}
			return $num;
		}

		public function insertData($hoten,$mssv,$tensach,$ngaymuon){
			$sql = "INSERT INTO muonsach(id,hoten,mssv,tensach,ngaymuon) VALUES (null,'$hoten','$mssv','$tensach','$ngaymuon')";
			return $this->execute($sql);
		}
		public function updateData($id,$hoten,$mssv,$tensach,$ngaymuon){
			$sql = "UPDATE muonsach SET hoten = '$hoten' , mssv = '$mssv', tensach = '$tensach', ngaymuon = '$ngaymuon' WHERE id = '$id'";
			return $this->execute($sql);
		}
		public function deleteData($table,$id)
		{
			$sql = "DELETE FROM $table WHERE id = '$id'";
			return $this->execute($sql);
		}

		public function searchData($table,$key){
			$sql = "SELECT * FROM $table WHERE hoten REGEXP '$key' ORDER BY id DESC";
			$this->execute($sql);
		 	if ($this->num_rows() == 0) {
		 		$data = 0;
		 	}
		 	else{
		 		while ($datas = $this->getData()) {
		 			$data[] = $datas; 
		 		}
		 	}
		 	return $data;
		} 
		public function testUser($table,$user,$pass)
		{
			$sql = "SELECT * FROM $table WHERE user = '$user' and pass = '$pass' LIMIT 1";
			$this->execute($sql);
			if ($this->num_rows() == 0) {
		 		$data = 0;
		 	}
		 	else{
		 		while ($datas = $this->getData()) {
		 			$data[] = $datas; 
		 		}
		 	}
		 	return $data;
		}

		public function insertAcc($username,$password){
			$sql = "INSERT INTO thanhvien(idadmin,user,pass) VALUES (null,'$username','$password')";
			return $this->execute($sql);
		}

		public function testUserAcc($table,$username){
			$sql = "SELECT * FROM $table WHERE user ='$username'";
			$this->execute($sql);
			if ($this->num_rows() == 0) {
		 		$data = 0;
		 	}
		 	else{
		 		while ($datas = $this->getData()) {
		 			$data[] = $datas; 
		 		}
		 	}
		 	return $data;
		}

		public function insertImg($name_book,$author,$file_name,$file_type,$file_size){
			$sql = "INSERT INTO sach(masach,tensach,tacgia,name,type,size) VALUES (null,'$name_book','$author','$file_name','$file_type','$file_size')";
			return $this->execute($sql);
		}
		public function searchImg($table,$file_name){
			$sql = "SELECT * FROM $table WHERE name = '$file_name'";
			return $this->execute($sql);
		}
	}

 ?>