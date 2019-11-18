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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Thư viện sách - Quản lý thư viện</title>
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
                <li><a href="index.php?controller=muon-sach&action=list">Danh sách</a></li>
                <li><a href="index.php?controller=thuvien-sach&action=addBook">Thêm sách</a></li>
                <li><a href="index.php?controller=muon-sach&action=logout">Đăng xuất</a></li>
            </ul>

            <!-- Search SÁch -->

            <!-- <form class="navbar-form navbar-right" role="search" action="" method="GET">
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
            </form> -->
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span>Hello <?php echo $_SESSION['user']; ?></a>
                </li>
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
            <div class="row">

                <h2>Thông tin sách</h2>
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <!-- <a href="/w3images/nature.jpg" target="_blank"> -->
                        <?php
                            $file_name = $dataBook['name'];
                            echo '<img src="../manage_Library/View/image/' . $file_name . '">';
                        ?>
                    </div>
                    <h3>Tên sách: <?php echo $dataBook['tensach']; ?></h3>
                    <h3>Mô tả</h3>
                    <p><?php echo $dataBook['description']; ?></p>
                </div>

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

