<!DOCTYPE html>
<?php
    //tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
    //nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
    if (!isset($_SESSION['user'])) {
        header('Location: index.php?controller=muon-sach&action=login');
    }
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
    <!-- <style>
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
      width: 1180px;
    }
      </style> -->
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
                <li><a href="index.php?controller=muon-sach&action=add">Đăng kí mượn sách</a></li>
                <li><a href="index.php?controller=requests&action=view-request">Xem yêu cầu</a></li>
                <li><a href="index.php?controller=accounts&action=listAccount">List tài khoản</a></li>
                <li><a href="index.php?controller=muon-sach&action=logout">Đăng xuất</a></li>
                <li><a href="index.php?controller=muon-sach&action=changepass">Đổi mật khẩu</a></li>
            </ul>
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
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php?controller=students&action=studentInfo"><span
                                class="glyphicon glyphicon-user"></span> Hello <?php echo $_SESSION['user']; ?></a></li>
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
                        <th class="text-center">STT</th>
                        <th class="text-center">Họ và Tên</th>
                        <th class="text-center">MSSV</th>
                        <th class="text-center">Tên sách</th>
                        <th class="text-center">Ngày mượn</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                        $Num = 1;
                        foreach ($data as $value) {
                            ?>
                            <tr>
                                <td><?php echo $Num; ?></td>
                                <td style="text-align: left; text-indent: 30px;"><?php echo $value['hoten']; ?></td>
                                <td><?php echo $value['mssv']; ?></td>
                                <td><?php echo $value['tensach']; ?></td>
                                <td><?php echo $value['ngaymuon']; ?></td>
                                <td>
                                    <a href="index.php?controller=muon-sach&action=edit&id=<?php echo $value['id']; ?>"
                                       title="Cập nhật"><button class="btn btn-primary">Edit <i class="glyphicon glyphicon-edit"></i></button></a><br>
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"
                                       href="index.php?controller=muon-sach&action=delete&id=<?php echo $value['id']; ?>"
                                       title="Xóa"><button class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                            <?php
                            $Num++;
                        }
                    ?>
                    </tbody>
                </table> <br>

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