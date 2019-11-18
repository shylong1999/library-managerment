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


		public function getDataStudents($table,$username)
		{
			$sql = "SELECT * FROM $table WHERE username = '$username'";
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
			$sql = "SELECT * FROM $table WHERE user = '".$user."' and pass = '".$pass."' LIMIT 1";
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
			$sql = "INSERT INTO thanhvien(idadmin,user,pass) VALUES (null,'".$username."','".$password."')";
			return $this->execute($sql);
		}

        public function insertStudent($table,$studentID,$name,$phoneNumber,$username){
            $sql = "INSERT INTO $table(studentID,name,username,phoneNumber) VALUES ('".$studentID."','".$name."','".$username."','".$phoneNumber."')";
            return $this->execute($sql);
        }
		public function testUserAcc($table,$username){
			$sql = "SELECT * FROM $table WHERE user ='".$username."'";
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

		public function insertImg($name_book,$author,$description,$file_name,$file_type,$file_size){
			$sql = "INSERT INTO sach(id,tensach,tacgia,description,name,type,size) VALUES (null,'$name_book','$author','$description','$file_name','$file_type','$file_size')";
			return $this->execute($sql);
		}
		public function searchImg($table,$file_name){
			$sql = "SELECT * FROM $table WHERE name = '$file_name'";
			return $this->execute($sql);
		}

		public function getCountAcc($table,$user,$oldpass)
		{
			$sql = "SELECT * FROM $table WHERE user ='".$user."' AND pass = '".$oldpass."'";
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
		public function updatePassword($table,$user,$newpass)
		{

			$sql = "UPDATE $table SET pass = '".$newpass."' WHERE user = '".$user."'";
			return $this->execute($sql);
		}

		public function insertRequest($table, $username,$message){
		    $sql = "INSERT INTO $table(requestID,username,message,logs) VALUES (null,'".$username."','".$message."',now())";
		    return $this->execute($sql);
        }

		public function getDataRequests($table1,$table2){
		    $sql = "SELECT T1.name, T2.message, T2.logs, T2.requestID FROM $table1 T1 INNER JOIN $table2 T2 ON T1.username = T2.username";
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
        public function deleteRequest($table,$requestID)
        {
            $sql = "DELETE FROM $table WHERE requestID = '$requestID'";
            return $this->execute($sql);
        }
        public function getDataBorrowBook($table1,$table2,$username){
		    $sql = "SELECT T1.name, T1.studentID, T2.tensach, T2.ngaymuon FROM $table1 T1 INNER JOIN $table2 T2 ON T1.studentID = T2.mssv WHERE T1.username = '".$username."'";
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
        public function getDataAccounts($table1,$table2){
		    $sql = "SELECT T1.studentID, T1.name, T1.class, T1.username, T1.phoneNumber FROM $table1 T1  INNER JOIN $table2 T2 ON T1.username = T2.user";
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

        public function getTotalRequest($table){
		    $sql = "SELECT COUNT(*) as totalRequest FROM $table";
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
        public function getTotalAccount($table){
            $sql = "SELECT COUNT(*) as totalAccount FROM $table";
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

	}

 ?>