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
    <title>Yêu cầu mượn sách</title>
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
<div class="container">
    <div class="row">
        <div class="col-sm-3 well text-center">
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
            <h2>Request</h2>
            <p>Hãy yêu cầu mượn sách tại đây</p>
            <form action="" method="post">
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea class="form-control" rows="5" id="message" name="message"></textarea>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-success" type="submit" name="request">Send Request</button>
                </div>
            </form>
            <?php
                if (isset($success) && in_array('send_success', $success)) {
                    echo " <div class='alert alert-success'>
 					<strong>Gửi yêu cầu thành công!</strong> 
				</div>";
                }

            ?>
        </div>

        <div class="col-sm-2 well text-center">
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