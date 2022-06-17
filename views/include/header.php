<header class="header header-horizontal header-view-pannel">
    <div class="container">
        <nav class="navbar">
            <a class="navbar-brand" href="./">
                <span class="logo-element">
                    <span class="logo-tape">
                        <span class="svg-content svg-fill-theme" data-svg="./images/svg/logo-part.svg"></span>
                    </span>
                    <span class="logo-text text-uppercase">
                        <span>M</span>Phim Việt</span>
                </span>
            </a>
            <button class="navbar-toggler" type="button">
                <span class="th-dots-active-close th-dots th-bars">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </button>
            <div class="navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item nav-item-arrow-down nav-hover-show-sub">
                        <a class="nav-link" href="./index.php">Trang chủ</a>
                        <div class="nav-arrow"><i class="fas fa-chevron-down"></i></div>
                    </li>
                    <li class="nav-item nav-hover-show-sub">
                        <a class="nav-link" href="./lich-chieu.php">Lịch chiếu phim</a>
                    </li>                    
                    <li class="nav-item nav-hover-show-sub">
                        <a class="nav-link" href="./movies-list.php">Phim</a>
                    </li>
                    <li class="nav-item nav-hover-show-sub">
                        <a class="nav-link" href="./ticket-price.php">Giá vé</a>
                    </li>
                    <li class="nav-item nav-hover-show-sub">
                        <a class="nav-link" href="./contact-us.php">Giới thiệu</a>
                    </li>
                </ul>
                <div class="navbar-extra">
                    <?php
                    if (isset($_SESSION['user-client'])) {
                        $sql = 'SELECT * FROM khach_hang where email = "' . $_SESSION['user-client'] . '"';
                        $result = executeResult($sql);
                        foreach ($result as $row) {
                            echo '<a href="./my-account.php"><i class="fas fa-user"></i>&nbsp;&nbsp' . $row['ho_ten'] . '&nbsp;&nbsp/&nbsp;&nbsp<a href="./logout.php">Đăng xuất</a></a>';
                        }
                    } else {
                        echo '<a href="./login.php"><i class="fas fa-user"></i>&nbsp;&nbspĐăng nhập';
                    }
                    ?>
                    </a>
                </div>
                <div class="navbar-extra">
                    <a class="btn-theme btn" href="./movies-list.php"><i class="fas fa-ticket-alt"></i>&nbsp;&nbsp;Mua vé</a>
                </div>
            </div>
        </nav>
    </div>
</header>