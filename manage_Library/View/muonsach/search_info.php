<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<title>Danh sách thành viên</title>
	
</head>
<body>
	<nav class="navbar navbar-inverse">
  		<div class="container-fluid">
    		<div class="navbar-header">
      			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>                        
      			</button>
      			<a class="navbar-brand" href="#">Logo</a>
    		</div>
    		<div class="collapse navbar-collapse" id="myNavbar">
      			<ul class="nav navbar-nav">
        			<li class="active"><a href="#">Home</a></li>
        			<li><a href="index.php?controller=thuvien-sach&action=listSach">Listsach</a></li>
        			<li><a href="index.php?controller=muon-sach&action=list">List mượn sách</a></li>
        			<li><a href="index.php?controller=muon-sach&action=add">Đăng kí mượn sách</a></li>
		      		<li><a href="abc.php">Đăng xuất</a></li>
      			</ul>
      			<!-- <div class="search"> -->
			      	<form class="navbar-form navbar-right" role="search" action="" method="GET">
			       		<div class="form-group input-group">
			       			<input type="hidden" name="controller" value="muon-sach">	
			          		<input type="text" class="form-control" name="key" placeholder="Search..">
			          		<span class="input-group-btn">
				            	<button class="btn btn-default" type="submit">
				              		<span class="glyphicon glyphicon-search"></span>
				            	</button>
			          		</span>
			        	</div>
			        	<input type="hidden" name="action" value="search">        
			      	</form>
		      <!-- 	</div> -->
	      		<ul class="nav navbar-nav navbar-right">
	        		<li><a href="#"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
	      		</ul>
    		</div>
  		</div>
	</nav>
	<div class="container text-center">    
		<div class="row">
			    <div class="col-sm-3 well">
			      	<div class="well">
			        	<p><a href="#">My Profile</a></p>
			        	<img src="bird.jpg" class="img-circle" height="65" width="65" alt="Avatar">
			      	</div>
			      	<div class="well">
			        	<p><a href="#">Interests</a></p>
			        	<p>
				          <span class="label label-default">News</span>
				          <span class="label label-primary">W3Schools</span>
				          <span class="label label-success">Labels</span>
				          <span class="label label-info">Football</span>
				          <span class="label label-warning">Gaming</span>
				          <span class="label label-danger">Friends</span>
				        </p>
			      	</div>
			      	<div class="alert alert-success fade in">
				        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
				        <p><strong>Ey!</strong></p>
				        People are looking at your profile. Find out who.
				    </div>
				    <p><a href="#">Link</a></p>
				    <p><a href="#">Link</a></p>
				    <p><a href="#">Link</a></p>
		   		</div>
		   	
		<!-- <div class="list"> -->
		<div class="col-sm-7">
			<div class="list">
				<h3 style="height: 40px;
							text-align: center;
							background: #009688;
							color: white;
							padding: 5px;
							font-size: 30px;">Danh sách mượn sách</h3>
				<table border="1px">
					<thead>
						<tr>
							<th style="text-align: center;">STT</th>
							<th style="text-align: center;">Họ và Tên</th>
							<th style="text-align: center;">MSSV</th>
							<th style="text-align: center;">Tên sách</th>
							<th style="text-align: center;">Ngày mượn</th>
							<th style="text-align: center;">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$Num = 1;
							foreach ($data_Search as $value) {
						 ?>
						 <tr>
						 	<td><?php echo $Num; ?></td>
						 	<td style="text-align: left; text-indent: 30px;"><?php echo $value['hoten']; ?></td>
						 	<td><?php echo $value['mssv']; ?></td>
						 	<td><?php echo $value['tensach']; ?></td>
						 	<td><?php echo $value['ngaymuon']; ?></td>
						 	<td>
						 		<a href="index.php?controller=muon-sach&action=edit&id=<?php echo $value['id']; ?>" title="Cập nhật" >Edit</a><br>
						 		<a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="index.php?controller=muon-sach&action=delete&id=<?php echo $value['id']; ?>" title="Xóa">Delete</a>
						 	</td>
						 </tr>
						 <?php
						 	$Num++;
						 	}
						  ?>
					</tbody>
				</table>
			</div>
		</div>

		<div class="col-sm-2 well">
		    <div class="thumbnail">
		        <p>Upcoming Events:</p>
		        <img src="paris.jpg" alt="Paris" width="400" height="300">
		        <p><strong>Paris</strong></p>
		        <p>Fri. 27 November 2015</p>
		        <button class="btn btn-primary">Info</button>
		    </div>      
		    <div class="well">
		    	<p>ADS</p>
		    </div>
		    <div class="well">
		    	<p>ADS</p>
		    </div>
		    </div>
	  	</div>
	</div>
	
	<footer class="container-fluid text-center">
		<p>Footer Text</p>
	</footer>
	
</body>
</html>