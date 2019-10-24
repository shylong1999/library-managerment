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
                <li class="dropdown"><a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Hello <?php echo $_SESSION['user']; ?>
                    </a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?controller=thuvien-sach&action=listSach">Add
                                Category</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?controller=thuvien-sach&action=listSach">Manage
                                Categories</a></li>
                    </ul>
                </li>

                <li class="dropdown"><a class="dropdown-toggle" href="index.php?controller=students&action=studentBorrowBook">Sách đã mượn<span class="caret"></span></a>
                </li>
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

            <div class="row">

                <div class="col-md-9 col-md-offset-1">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            My Profile
                        </div>
                        <div class="panel-body">
                            <form name="" method="post">
                                <div class="thumbnail" style="width: 200px;">

                                    <?php
                                        // $file_name = $dataStudents['pathOfAvatar'];
                                        $file_name = 'Screenshot (15).png';
                                        echo '<img src="../manage_Library/image/' . $file_name . '">';
                                    ?>
                                </div>

                                <div class="form-group">
                                    <label>Student ID : </label>
                                    <?php echo htmlentities($dataStudents['studentID']); ?>

                                </div>
                                <div class="form-group">
                                    <label>FullName: </label>
                                    <?php echo htmlentities($dataStudents['name']); ?>
                                </div>
                                <div class="form-group">
                                    <label>Class: </label>
                                    <?php echo htmlentities($dataStudents['class']); ?>
                                </div>

                                <div class="form-group">
                                    <label>Birthday: </label>
                                    <?php echo htmlentities($dataStudents['dateOfBirth']); ?>
                                </div>
                                <div class="form-group">
                                    <label>Profile Status : </label>

                                    <span style="color: green">Active</span>


                                </div>

                                <div class="form-group">
                                    <label>phoneNumber: </label>
                                    <?php echo htmlentities($dataStudents['phoneNumber']); ?>
                                </div>
                                <div class="form-group">
                                    <label>Email: </label>
                                    <?php echo htmlentities($dataStudents['email']); ?>
                                </div>
                                <div class="form-group">
                                    <label>Address: </label>
                                    <?php echo htmlentities($dataStudents['address']); ?>
                                </div>


                                <a href="index.php?controller=students&action=studentUpdate"><button class="btn btn-primary" type="button"> Update Now </button></a>


                            </form>
                        </div>
                    </div>
                </div>

            </div>


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