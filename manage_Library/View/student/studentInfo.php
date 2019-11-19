<!doctype html>
<?php
    //tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
    //nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
    if (!isset($_SESSION['user'])) {
        header('Location: index.php?controller=muon-sach&action=login');
    }
?>
<html lang="en" class="fixed left-sidebar-top">
<head>

</head>

<body>
<div class="wrap">
    <!-- page HEADER -->
    <!-- ========================================================= -->
    <div class="page-header">
        <!-- LEFTSIDE header -->
        <div class="leftside-header">
            <div class="logo">
                <a href="index.html" class="on-click">
                    <img alt="logo" src="View/images/header-logo.png"/>
                </a>
            </div>
            <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open"
                 data-target="html">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>
        <!-- RIGHTSIDE header -->
        <div class="rightside-header">
            <div class="header-middle"></div>
            <!--SEARCH HEADERBOX-->
            <div class="header-section" id="search-headerbox">
                <input type="text" name="search" id="search" placeholder="Search...">
                <i class="fa fa-search search" id="search-icon" aria-hidden="true"></i>
                <div class="header-separator"></div>
            </div>
            <div class="header-section" id="user-headerbox">
                <div class="user-header-wrap">
                    <div class="user-photo">
                        <?php
                            if ($dataStudents['pathOfAvatar'] == ''){
                                $file_name = 'avatar_user.jpg';
                            }
                            else{
                                $file_name = $dataStudents['pathOfAvatar'];
                            }
                            echo '<img alt="profile photo" src="View/images/avatar/' . $file_name . '" />';
                        ?>
                    </div>
                    <div class="user-info">
                        <span class="user-name"><?php echo $_SESSION['user']; ?></span>
                        <?php if ($_SESSION['level'] == 1) { ?>
                            <span class="user-profile">Admin</span>
                        <?php } else { ?>
                            <span class="user-profile">User</span>
                        <?php } ?>
                    </div>
                    <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                    <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                </div>
                <div class="user-options dropdown-box">
                    <div class="drop-content basic">
                        <ul>
                            <li><a href="index.php?controller=students&action=studentInfo"><i class="fa fa-user"
                                                                                              aria-hidden="true"></i>
                                    Profile</a></li>
                            <li><a href="index.php?controller=muon-sach&action=changepass"><i class="fa fa-cog"
                                                                                              aria-hidden="true"></i>Đổi
                                    mật khẩu</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="header-separator"></div>
            <!--Log out -->
            <div class="header-section">
                <a href="index.php?controller=muon-sach&action=logout" data-toggle="tooltip" data-placement="left"
                   title="Logout"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body">
        <!-- LEFT SIDEBAR -->
        <!-- ========================================================= -->
        <div class="left-sidebar">
            <!-- left sidebar HEADER -->
            <div class="left-sidebar-header">
                <div class="left-sidebar-title">Navigation</div>
                <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs"
                     data-toggle-class="left-sidebar-collapsed" data-target="html">
                    <span></span>
                </div>
            </div>
            <!-- NAVIGATION -->
            <!-- ========================================================= -->
            <div id="left-nav" class="nano">
                <div class="nano-content">
                    <nav>
                        <ul class="nav nav-left-lines" id="main-nav">
                            <!--HOME-->
                            <li class="active-item"><a href="index.php?controller=muon-sach&action=list"><i
                                            class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
                            <!--UI ELEMENTENTS-->

                            <li class="has-child-item close-item">

                                <a><i class="fa fa-book" aria-hidden="true"></i><span>Mượn sách</span></a>
                                <ul class="nav child-nav level-1">
                                    <?php if (isset($_SESSION['level'])) {
                                        if ($_SESSION['level'] == 1) {
                                            ?>
                                            <li><a href="index.php?controller=muon-sach&action=add">Đăng kí mượn
                                                    sách</a></li>
                                            <li><a href="index.php?controller=muon-sach&action=list">Danh sách mượn
                                                    sách</a>
                                            </li>
                                        <?php } else{ ?>
                                            <li><a href="index.php?controller=students&action=studentBorrowBook">
                                                    Sách đã mượn</a>
                                            </li>
                                        <?php }
                                    } ?>
                                </ul>
                            </li>

                            <li class="has-child-item close-item">
                                <a><i class="fa fa-columns" aria-hidden="true"></i><span>Thư viện sách</span></a>
                                <ul class="nav child-nav level-1">
                                    <li><a href="index.php?controller=thuvien-sach&action=listSach">Danh sách</a></li>
                                    <?php if (isset($_SESSION['level'])) {
                                        if ($_SESSION['level'] == 1) {
                                            ?>
                                            <li><a href="index.php?controller=thuvien-sach&action=addBook">Thêm sách</a>
                                            </li>
                                        <?php }
                                    } ?>
                                </ul>
                            </li>
                            <?php if (isset($_SESSION['level'])) {
                                if ($_SESSION['level'] == 1) {
                                    ?>
                                    <li><a href="index.php?controller=accounts&action=listAccount"><i class="fa fa-user"
                                                                                                      aria-hidden="true"></i><span>Danh sách người dùng</span></a>
                                    </li>
                                <?php }
                            } ?>
                            <!--TABLES-->
                            <li class="has-child-item close-item">
                                <a><i class="fa fa-table" aria-hidden="true"></i><span>Yêu cầu mượn sách</span></a>
                                <ul class="nav child-nav level-1">
                                    <?php if (isset($_SESSION['level'])) {
                                        if ($_SESSION['level'] == 1) {
                                            ?>
                                            <li><a href="index.php?controller=requests&action=view-request">Xem yêu
                                                    cầu</a></li>
                                        <?php } else { ?>
                                            <li><a href="index.php?controller=requests&action=send-request">Yêu cầu mượn
                                                    sách</a></li>
                                        <?php }
                                    } ?>

                                </ul>
                            </li>

                            <!--WIDGETS-->
                            <li class="has-child-item close-item">
                                <a><i class="fa fa-paper-plane" aria-hidden="true"></i><span>Widgets</span></a>
                                <ul class="nav child-nav level-1">
                                    <li><a href="widgets_boxes.html">Boxes</a></li>
                                    <li><a href="widgets_lists.html">Lists</a></li>
                                    <li><a href="widgets_posts.html">Posts</a></li>
                                    <li><a href="widgets_timelines.html">Timelines</a></li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- CONTENT-->
        <div class="content">
            <!-- content HEADER -->
            <!-- ========================================================= -->
            <div class="content-header">
                <!-- leftside content header -->
                <div class="leftside-content-header">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-user" aria-hidden="true"></i><a>Trang cá nhân</a></li>
                        <!--                        <li><a>User profile</a></li>-->
                    </ul>
                </div>
            </div>
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                    <!--PROFILE-->
                    <div>
                        <div class="profile-photo">
                            <?php
                               if ($dataStudents['pathOfAvatar'] == ''){
                                   $pathToAvatar = 'avatar_user.jpg';
                               }
                               else{
                                   $pathToAvatar = $dataStudents['pathOfAvatar'];
                               }
//                                echo  '<img alt="User photo" src="View/images/avatar/'.$pathToAvatar.'" />';
                                echo '<a  href="../manage_Library/View/images/avatar/' . $pathToAvatar . '">
                                <img alt="User photo" src="View/images/avatar/'.$pathToAvatar.'" />
                            </a>'
                            ?>

                        </div>
                        <div class="user-header-info">
                            <h2 class="user-name"> <?php echo htmlentities($dataStudents['name']); ?></h2>
                            <?php if ($_SESSION['level'] != 1){ ?>
                            <h5 class="user-position"> <?php echo htmlentities($dataStudents['studentID']); ?></h5>
                            <?php } else{ ?>
                            <h5 class="user-position"> Admin</h5>
                            <?php }?>
                            <!--                            <div class="user-social-media">-->
                            <!--                                <span class="text-lg"><a href="#" class="fa fa-twitter-square"></a> <a href="#" class="fa fa-facebook-square"></a> <a href="#" class="fa fa-linkedin-square"></a> <a href="#" class="fa fa-google-plus-square"></a></span>-->
                            <!--                            </div>-->
                        </div>
                    </div>
                    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                    <!--CONTACT INFO-->
                    <div class="panel bg-scale-0 b-primary bt-sm mt-xl">
                        <div class="panel-content">
                            <h4 class=""><b>Thông tin liên hệ</b> <a href="index.php?controller=students&action=studentUpdate"><i class="color-primary mr-sm fa fa-edit"></i></a></h4>


                            <ul class="user-contact-info ph-sm">
                                <li><b><i class="color-primary mr-sm fa fa-group"></i></b> <?php echo htmlentities($dataStudents['class']); ?></li>
                                <li><b><i class="color-primary mr-sm fa fa-birthday-cake"></i></b> <?php echo htmlentities($dataStudents['dateOfBirth']); ?></li>
                                <li><b><i class="color-primary mr-sm fa fa-envelope"></i></b> <?php echo htmlentities($dataStudents['email']); ?></li>
                                <li><b><i class="color-primary mr-sm fa fa-phone"></i></b> <?php echo "0".htmlentities($dataStudents['phoneNumber']); ?></li>
                                <li><b><i class="color-primary mr-sm fa fa-globe"></i></b> <?php echo htmlentities($dataStudents['address']); ?></li>
                                <!--                                <li class="mt-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum dolorem error itaque maxime minus saepe similique voluptatibus. Beatae cumque dolore doloribus impedit omnis porro tempore tenetur. Aperiam dolorum odio quo?</li>-->
                            </ul>
                        </div>
                    </div>
                    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                    <!--LIST-->
                    <div class="panel  b-primary bt-sm ">
                        <div class="panel-content">
                            <div class="widget-list list-sm list-left-element ">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <div class="left-element"><i class="fa fa-check color-success"></i></div>
                                            <div class="text">
                                                <span class="title">95 Jobs</span>
                                                <span class="subtitle">Completed</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="left-element"><i class="fa fa-clock-o color-warning"></i></div>
                                            <div class="text">
                                                <span class="title">3 Proyects</span>
                                                <span class="subtitle">working on</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="left-element"><i class="fa fa-envelope color-primary"></i></div>
                                            <div class="text">
                                                <span class="title">Leave a Menssage</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-8">
                    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                    <!--TIMELINE-->
                    <div class="timeline animated fadeInUp">
                        <div class="timeline-box">
                            <div class="timeline-icon bg-primary">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="timeline-content">
                                <h4 class="tl-title">Ello impedit iusto</h4> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur distinctio illo impedit iusto minima nisi quo tempora ut!
                            </div>
                            <div class="timeline-footer">
                                <span>Today. 14:25</span>
                            </div>
                        </div>
                        <div class="timeline-box">
                            <div class="timeline-icon bg-primary">
                                <i class="fa fa-tasks"></i>
                            </div>
                            <div class="timeline-content">
                                <h4 class="tl-title">consectetur adipisicing </h4> Lorem ipsum dolor sit amet. Consequatur distinctio illo impedit iusto minima nisi quo tempora ut!
                            </div>
                            <div class="timeline-footer">
                                <span>Today. 10:55</span>
                            </div>
                        </div>
                        <div class="timeline-box">
                            <div class="timeline-icon bg-primary">
                                <i class="fa fa-file"></i>
                            </div>
                            <div class="timeline-content">
                                <h4 class="tl-title">Impedit iusto minima nisi</h4> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur distinctio illo impedit iusto minima nisi quo tempora ut!
                            </div>
                            <div class="timeline-footer">
                                <span>Today. 9:20</span>
                            </div>
                        </div>
                        <div class="timeline-box">
                            <div class="timeline-icon bg-primary">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="timeline-content">
                                <h4 class="tl-title">Lorem ipsum dolor sit</h4> Lorem ipsum dolor sit amet Consequatur distinctio illo impedit iusto minima nisi quo tempora ut!
                            </div>
                            <div class="timeline-footer">
                                <span>Yesteday. 16:30</span>
                            </div>
                        </div>
                    </div>
                    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                    <!--GALLERY-->
                    <div class=" gallery-wrap">
                        <div class="row">
                            <div class="col-xs-6 col-md-3">
                                <a href="View/images/helsinki-lg.jpg" title="By <?php echo $dataStudents['name']?>">
                                    <img alt="first photo" src="View/images/helsinki.jpg" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <a href="View/images/helsinki-lg.jpg" title="By <?php echo $dataStudents['name']?>">
                                    <img alt="second photo" src="View/images/helsinki.jpg" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <a href="View/images/helsinki-lg.jpg" title="By <?php echo $dataStudents['name']?>">
                                    <img alt="third photo" src="View/images/helsinki.jpg" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <a href="View/images/helsinki-lg.jpg" title="By <?php echo $dataStudents['name']?>">
                                    <img alt="fourth photo" src="View/images/helsinki.jpg" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <a href="View/images/helsinki-lg.jpg" title="By <?php echo $dataStudents['name']?>">
                                    <img alt="fifth photo" src="View/images/helsinki.jpg" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <a href="View/images/helsinki-lg.jpg" title="By <?php echo $dataStudents['name']?>">
                                    <img alt="sixth photo" src="View/images/helsinki.jpg" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <a href="View/images/helsinki-lg.jpg" title="By <?php echo $dataStudents['name']?>">
                                    <img alt="seventh photo" src="View/images/helsinki.jpg" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <a href="View/images/helsinki-lg.jpg" title="By <?php echo $dataStudents['name']?>">
                                    <img alt="eighth photo" src="View/images/helsinki.jpg" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        </div>
        <!-- RIGHT SIDEBAR -->
        <!-- ========================================================= -->
        <div class="right-sidebar">
            <div class="right-sidebar-toggle" data-toggle-class="right-sidebar-opened" data-target="html">
                <i class="fa fa-cog fa-spin" aria-hidden="true"></i>
            </div>
            <div id="right-nav" class="nano">
                <div class="nano-content">
                    <div class="template-settings">
                        <h4 class="text-center">Template Settings</h4>
                        <ul class="toggle-settings pv-xlg">
                            <li>
                                <h6 class="text">Header fixed</h6>
                                <label class="switch">
                                    <input id="header-fixed" type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                            </li>
                            <li>
                                <h6 class="text">Content header fixed</h6>
                                <label class="switch">
                                    <input id="content-header-fixed" type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                            </li>
                            <li>
                                <h6 class="text">Left sidebar collapsed</h6>
                                <label class="switch">
                                    <input id="left-sidebar-collapsed" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </li>
                            <li>
                                <h6 class="text">Left sidebar Top</h6>
                                <label class="switch">
                                    <input id="left-sidebar-top" type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                            </li>
                            <li>
                                <h6 class="text">Left sidebar fixed</h6>
                                <label class="switch">
                                    <input id="left-sidebar-fixed" type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                            </li>
                            <li>
                                <h6 class="text">Left sidebar over</h6>
                                <label class="switch">
                                    <input id="left-sidebar-over" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </li>
                            <li>
                                <h6 class="text">Left sidebar nav left-lines</h6>
                                <label class="switch">
                                    <input id="left-sidebar-left-lines" type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                            </li>
                        </ul>
                        <h4 class="text-center">Template Colors</h4>

                        <div class="row toggle-colors">
                            <div class="col-xs-6">
                                <a href="index.html" class="on-click"> <img alt="Helsinki-green"
                                                                            src="View/images/theme/dark_green.png"/></a>
                            </div>
                            <div class="col-xs-6">
                                <a href="http://myiideveloper.com/helsinki/last-version/helsinki_green-light/src/index.html"
                                   class="on-click"> <img alt="Helsinki-green" src="View/images/theme/white_green.png"/></a>
                            </div>
                        </div>
                        <div class="row toggle-colors">
                            <div class="col-xs-6">
                                <a href="http://myiideveloper.com/helsinki/last-version/helsinki_dark/src/index.html"
                                   class="on-click"> <img alt="Helsinki-green" src="View/images/theme/dark_white.png"/></a>
                            </div>
                            <div class="col-xs-6">
                                <a href="http://myiideveloper.com/helsinki/last-version/helsinki_light/src/index.html"
                                   class="on-click"> <img alt="Helsinki-green" src="View/images/theme/white_dark.png"/></a>
                            </div>
                        </div>
                        <div class="row toggle-colors">
                            <div class="col-xs-6">
                                <a href="http://myiideveloper.com/helsinki/last-version/helsinki_blue-dark/src/index.html"
                                   class="on-click"> <img alt="Helsinki-green"
                                                          src="View/images/theme/dark_blue.png"/></a>
                            </div>
                            <div class="col-xs-6">
                                <a href="http://myiideveloper.com/helsinki/last-version/helsinki_blue-light/src/index.html"
                                   class="on-click"> <img alt="Helsinki-green" src="View/images/theme/white_blue.png"/></a>
                            </div>
                        </div>
                        <div class="row mt-lg">
                            <div class="col-sm-12 text-center">
                                <a target="_blank"
                                   href="http://myiideveloper.com/helsinki/last-version/documentation/index.html"><h5><i
                                                class="fa fa-book mr-sm"></i>Online Documentation</h5></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--        scroll to top-->
        <a href="#" class="scroll-to-top"><i class="fa fa-angle-double-up"></i></a>
    </div>
</div>


</body>

</html>