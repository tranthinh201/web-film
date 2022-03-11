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
                    <li class="nav-item nav-item-arrow-down nav-hover-show-sub">
                        <a class="nav-link" href="#" data-role="nav-toggler">Pages</a>
                        <div class="nav-arrow"><i class="fas fa-chevron-down"></i></div>
                        <ul class="collapse nav">
                            <li class="nav-item nav-item-arrow-down nav-hover-show-sub">
                                <a class="nav-link" href="#" data-role="nav-toggler">Movies</a>
                                <div class="nav-arrow"><i class="fas fa-chevron-down"></i></div>
                                <ul class="collapse nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="movies-blocks.html">Blocks - No Sidebar</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="movies-blocks-sidebar-right.html">Blocks - Sidebar right</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="movies-posters.html">Posters - No Sidebar</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="movies-posters-sidebar-right.html">Posters - Sidebar right</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="movies-list.html">List - No Sidebar</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="movie-info-sidebar-right.html">Movie info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="gallery.html">Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="news-blocks-sidebar-right.html">News</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="article-sidebar-right.html">Article</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about-us.html">About us</a>
                            </li>
                            <li class="nav-item nav-item-arrow-down nav-hover-show-sub">
                                <a class="nav-link" href="#" data-role="nav-toggler">User pages</a>
                                <div class="nav-arrow"><i class="fas fa-chevron-down"></i></div>
                                <ul class="collapse nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="sign-in.html">Sign in</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="sign-up.html">Sign up</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item nav-item-arrow-down nav-hover-show-sub">
                                <a class="nav-link" href="#" data-role="nav-toggler">Status pages</a>
                                <div class="nav-arrow"><i class="fas fa-chevron-down"></i></div>
                                <ul class="collapse nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="under-construction.html">Under construction</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="coming-soon.html">Coming soon</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="404-1.html">404 - 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="404-2.html">404 - 2</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="movies-blocks.html">Movies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact-us.html">Contact us</a>
                    </li>
                </ul>
                <div class="navbar-extra">
                    <?php
                    if (isset($_SESSION['user-client'])) {
                        $sql = 'SELECT * FROM khach_hang where email = "' . $_SESSION['user-client'] . '"';
                        $result = executeResult($sql);
                        foreach ($result as $row) {
                            echo '<a href="javascript:void(0)"><i class="fas fa-user"></i>&nbsp;&nbsp' . $row['ho_ten'] . '&nbsp;&nbsp/&nbsp;&nbsp<a href="./logout.php">Đăng xuất</a></a>';
                        }
                    } else {
                        echo '<a href="./login.php"><i class="fas fa-user"></i>&nbsp;&nbspĐăng nhập';
                    }
                    ?>
                    </a>
                </div>
                <div class="navbar-extra">
                    <a class="btn-theme btn" href="#"><i class="fas fa-ticket-alt"></i>&nbsp;&nbsp;Mua vé</a>
                </div>
            </div>
        </nav>
    </div>
</header>