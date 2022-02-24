<nav class="nav-bar">
    <div class="header">
        <div class="logo">
            <img src="../image/logo/spiderman.png" alt="logo" style="width: 80px">
        </div>
        <div class="search-input">
            <input type="text" placeholder="Tìm kiếm tên phim và diễn viên">
            <i class="fa fa-search ps-abs"></i>
        </div>
        <?php
        session_start();
        if (isset($_SESSION['user-client'])) {
            $sql = 'SELECT * FROM khach_hang WHERE email = "' . $_SESSION['user-client'] . '"';

            $result = executeResult($sql);
            foreach ($result as $items) {
                $name = $items['ho_ten'];
            }
            echo '
                    <div class="login">
                        <i class="fa fa-user me-sm-1"></i>
                        <a href="./login.php">' . $name . '</a>
                        <a href="./logout.php">Đăng xuất</a>
                    </div>
                ';
        } else {
            echo '
                    <div class="login">
                        <i class="fa fa-user me-sm-1"></i>
                        <a href="./login.php">Đăng nhập</a>
                    </div>
                ';
        }
        ?>

    </div>
    <div class="menu">
        <ul>
            <li><a href="">Mua vé</a></li>
            <li><a href="">Phim</a></li>
            <li><a href="">Góc điện ảnh</a></li>
            <li><a href="">Sự kiện</a></li>
            <li><a href="">Rạp</a></li>
            <li><a href="">Giá vé</a></li>
            <li><a href="">Hỗ trợ</a></li>
            <li><a href="">Thành viên</a></li>
        </ul>
    </div>
</nav>