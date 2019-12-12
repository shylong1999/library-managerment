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
            <!--            <div class="header-section" id="search-headerbox">-->
            <!--                <input type="text" name="search" id="search" placeholder="Search...">-->
            <!--                <i class="fa fa-search search" id="search-icon" aria-hidden="true"></i>-->
            <!--                <div class="header-separator"></div>-->
            <!--            </div>-->
            <div class="header-section" id="user-headerbox">
                <div class="user-header-wrap">
                    <div class="user-photo">
                        <?php
                            if ($dataStudents['pathOfAvatar'] == '') {
                                $file_name = 'avatar_user.jpg';
                            } else {
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
                            <li class="active-item"><a href="index.php?controller=thuvien-sach&action=listSach"><i
                                            class="fa fa-home" aria-hidden="true"></i><span>Home</span></a></li>
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
                                        <?php } else { ?>
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

                            <?php if (isset($_SESSION['level'])) {
                                if ($_SESSION['level'] == 1) {
                                    ?>
                                    <li><a href="index.php?controller=accounts&action=listAccount"><i class="fa fa-user"
                                                                                                      aria-hidden="true"></i><span>Danh sách người dùng</span></a>
                                    </li>
                                <?php }
                            } ?>
                            <!--WIDGETS-->
                            <!--                            <li class="has-child-item close-item">-->
                            <!--                                <a><i class="fa fa-paper-plane" aria-hidden="true"></i><span>Widgets</span></a>-->
                            <!--                                <ul class="nav child-nav level-1">-->
                            <!--                                    <li><a href="widgets_boxes.html">Boxes</a></li>-->
                            <!--                                    <li><a href="widgets_lists.html">Lists</a></li>-->
                            <!--                                    <li><a href="widgets_posts.html">Posts</a></li>-->
                            <!--                                    <li><a href="widgets_timelines.html">Timelines</a></li>-->
                            <!--                                </ul>-->
                            <!--                            </li>-->

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
                        <li><i class="fa fa-paper-plane" aria-hidden="true"></i><a href="#">Thư viện sách</a></li>
                        <li><a>Danh sách</a></li>
                    </ul>
                </div>
            </div>
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            <div class="row animated fadeInUp">

                <!--SEARCH-->
<!--                <div class="row">-->
<!--                    <div class="col-sm-12">-->
<!--                        <div class="panel">-->
<!--                            <div class="panel-content">-->
<!--                                <form class="">-->
<!--                                    <div class="row pt-md">-->
<!--                                        <div class="form-group col-sm-9 col-lg-10">-->
<!--                                                <span class="input-with-icon">-->
<!--                                            <input type="text" class="form-control" id="lefticon" placeholder="Search">-->
<!--                                            <i class="fa fa-search"></i>-->
<!--                                        </span>-->
<!--                                        </div>-->
<!--                                        <div class="form-group col-sm-3  col-lg-2 ">-->
<!--                                            <button type="submit" class="btn btn-primary btn-block">Search</button>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </form>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <!--RESULTS-->
                <div class="col-sm-12">
                    <div class="panel">
                        <div class="panel-content">
                            <!--                                <h4>Results for <span class="highlight">"Dashboard Admin Template"</span></h4>-->
                            <!--                                <h6>Total search results <b>147</b></h6>-->
                            <div class="search-results-grid">

                                <div class="row">
                                    <?php foreach ($data_Sach as $value) { ?>
                                        <div class="col-sm-6 col-md-3">
                                            <!--                                            <a href="#"><img alt="photo" src="images/helsinki.jpg"-->
                                            <!--                                                             class="img-responsive"></a>-->
                                            <?php
                                                $pathToBook = $value['name'];
                                                //                            echo '<img style="height: 300px;" alt="post photo" src="../manage_Library/View/image/' . $pathToBook . '" />';
                                                echo '<a  href="../manage_Library/View/image/' . $pathToBook . '">
                                <img style="height: 300px;" alt="photo" src="../manage_Library/View/image/' . $pathToBook . '" class="img-responsive">
                            </a>'
                                            ?>
                                            <div class="search-item-content">
                                                <h4 style="text-align: center"><a
                                                            href="index.php?controller=thuvien-sach&action=infoBook&id=<?php echo $value['id']; ?>"><?php echo $value['tensach']; ?></a>
                                                </h4>
                                                <h4 class="color-muted" style="text-align: center">
                                                    <a><?php echo $value['tacgia']; ?></a></h4>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <!--WIDGET POST TYPE 1-->
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