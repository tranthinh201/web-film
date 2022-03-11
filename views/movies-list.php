<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Memico - Cinema Bootstrap HTML5 Template</title>
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Animate.css -->
    <link href="../animate.css/animate.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome iconic font -->
    <link href="../fontawesome/css/fontawesome-all.css" rel="stylesheet" type="text/css" />
    <!-- Magnific Popup -->
    <link href="../magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
    <!-- Slick carousel -->
    <link href="../slick/slick.css" rel="stylesheet" type="text/css" />
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Oswald:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <!-- Theme styles -->
    <link href="../css/dot-icons.css" rel="stylesheet" type="text/css">
    <link href="../css/theme.css" rel="stylesheet" type="text/css">
</head>

<body class="body">
    <?php include './include/header.php' ?>
    <section class="after-head d-flex section-text-white position-relative">
        <div class="d-background" data-image-src="http://via.placeholder.com/1920x1080" data-parallax="scroll"></div>
        <div class="d-background bg-black-80"></div>
        <div class="top-block top-inner container">
            <div class="top-block-content">
                <h1 class="section-title">Movies list</h1>
                <div class="page-breadcrumbs">
                    <a class="content-link" href="#">Home</a>
                    <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                    <span>Movies</span>
                </div>
            </div>
        </div>
    </section>
    <section class="section-long">
        <div class="container">
            <div class="section-pannel">
                <div class="grid row">
                    <div class="col-md-10">
                        <form autocomplete="off">
                            <div class="row form-grid">
                                <div class="col-sm-6 col-lg-3">
                                    <div class="input-view-flat input-group">
                                        <select class="form-control" name="genre">
                                            <option selected="true">genre</option>
                                            <option>action</option>
                                            <option>adventure</option>
                                            <option>comedy</option>
                                            <option>crime</option>
                                            <option>detective</option>
                                            <option>drama</option>
                                            <option>fantasy</option>
                                            <option>melodrama</option>
                                            <option>romance</option>
                                            <option>superhero</option>
                                            <option>supernatural</option>
                                            <option>thriller</option>
                                            <option>sport</option>
                                            <option>historical</option>
                                            <option>horror</option>
                                            <option>musical</option>
                                            <option>sci-fi</option>
                                            <option>war</option>
                                            <option>western</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="input-view-flat date input-group" data-toggle="datetimepicker" data-target="#release-year-field">
                                        <input class="datetimepicker-input form-control" id="release-year-field" name="releaseYear" type="text" placeholder="release year" data-target="#release-year-field" data-date-format="Y" />
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="input-view-flat input-group">
                                        <select class="form-control" name="sortBy">
                                            <option selected="true">sort by</option>
                                            <option>name</option>
                                            <option>release year</option>
                                            <option>rating</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2 my-md-auto d-flex">
                        <span class="info-title d-md-none mr-3">Select view:</span>
                        <ul class="ml-md-auto h5 list-inline">
                            <li class="list-inline-item">
                                <a class="content-link transparent-link" href="movies-blocks.html"><i class="fas fa-th"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a class="content-link transparent-link active" href="movies-list.html"><i class="fas fa-th-list"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <article class="movie-line-entity">
                <div class="entity-poster" data-role="hover-wrap">
                    <div class="embed-responsive embed-responsive-poster">
                        <img class="embed-responsive-item" src="http://via.placeholder.com/340x510" alt="" />
                    </div>
                    <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                        <div class="entity-play">
                            <a class="action-icon-theme action-icon-bordered rounded-circle" href="https://www.youtube.com/watch?v=d96cjJhvlMA" data-magnific-popup="iframe">
                                <span class="icon-content"><i class="fas fa-play"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="entity-content">
                    <h4 class="entity-title">
                        <a class="content-link" href="movie-info-sidebar-right.html">Blick</a>
                    </h4>
                    <div class="entity-category">
                        <a class="content-link" href="movies-blocks.html">comedy</a>,
                        <a class="content-link" href="movies-blocks.html">detective</a>
                    </div>
                    <div class="entity-info">
                        <div class="info-lines">
                            <div class="info info-short">
                                <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                                <span class="info-text">8,7</span>
                                <span class="info-rest">/10</span>
                            </div>
                            <div class="info info-short">
                                <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                <span class="info-text">130</span>
                                <span class="info-rest">&nbsp;min</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-short entity-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consectetur ultrices justo a pellentesque. Praesent venenatis dolor nec tempus lacinia. Donec ac condimentum dolor. Nullam sit amet nisl hendrerit, pharetra nulla convallis, malesuada diam. Donec ornare nisl eu lectus rhoncus, at malesuada metus rutrum. Aliquam a nisl vulputate, sodales ipsum aliquam, tempus purus. Suspendisse convallis, lectus nec vehicula sollicitudin, lorem sapien rhoncus dolor, vel lacinia urna velit ullamcorper nisi. Phasellus pellentesque, magna nec gravida feugiat, est magna suscipit ligula, vel porttitor nunc enim at nibh. Sed varius sit amet leo vitae consequat.
                    </p>
                </div>
                <div class="entity-extra">
                    <div class="text-uppercase entity-extra-title">Showtime</div>
                    <div class="entity-showtime">
                        <div class="showtime-wrap">
                            <div class="showtime-item">
                                <span class="disabled btn-time btn" aria-disabled="true">11 : 30</span>
                            </div>
                            <div class="showtime-item">
                                <a class="btn-time btn" aria-disabled="false" href="#">13 : 25</a>
                            </div>
                            <div class="showtime-item">
                                <a class="btn-time btn" aria-disabled="false" href="#">16 : 07</a>
                            </div>
                            <div class="showtime-item">
                                <a class="btn-time btn" aria-disabled="false" href="#">19 : 45</a>
                            </div>
                            <div class="showtime-item">
                                <a class="btn-time btn" aria-disabled="false" href="#">21 : 30</a>
                            </div>
                            <div class="showtime-item">
                                <a class="btn-time btn" aria-disabled="false" href="#">23 : 10</a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            <article class="movie-line-entity">
                <div class="entity-poster" data-role="hover-wrap">
                    <div class="embed-responsive embed-responsive-poster">
                        <img class="embed-responsive-item" src="http://via.placeholder.com/340x510" alt="" />
                    </div>
                    <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                        <div class="entity-play">
                            <a class="action-icon-theme action-icon-bordered rounded-circle" href="https://www.youtube.com/watch?v=d96cjJhvlMA" data-magnific-popup="iframe">
                                <span class="icon-content"><i class="fas fa-play"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="entity-content">
                    <h4 class="entity-title">
                        <a class="content-link" href="movie-info-sidebar-right.html">Watchers</a>
                    </h4>
                    <div class="entity-category">
                        <a class="content-link" href="movies-blocks.html">fantasy</a>,
                        <a class="content-link" href="movies-blocks.html">historical</a>
                    </div>
                    <div class="entity-info">
                        <div class="info-lines">
                            <div class="info info-short">
                                <span class="text-theme info-icon"><i class="fas fa-calendar-alt"></i></span>
                                <span class="info-text">29 mar 2018</span>
                            </div>
                            <div class="info info-short">
                                <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                <span class="info-text">110</span>
                                <span class="info-rest">&nbsp;min</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-short entity-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consectetur ultrices justo a pellentesque. Praesent venenatis dolor nec tempus lacinia. Donec ac condimentum dolor. Nullam sit amet nisl hendrerit, pharetra nulla convallis, malesuada diam. Donec ornare nisl eu lectus rhoncus, at malesuada metus rutrum. Aliquam a nisl vulputate, sodales ipsum aliquam, tempus purus. Suspendisse convallis, lectus nec vehicula sollicitudin, lorem sapien rhoncus dolor, vel lacinia urna velit ullamcorper nisi. Phasellus pellentesque, magna nec gravida feugiat, est magna suscipit ligula, vel porttitor nunc enim at nibh. Sed varius sit amet leo vitae consequat.
                    </p>
                </div>
                <div class="entity-extra">
                    <div class="text-uppercase entity-extra-title">Comming soon</div>
                    <div></div>
                </div>
            </article>
            <article class="movie-line-entity">
                <div class="entity-poster" data-role="hover-wrap">
                    <div class="embed-responsive embed-responsive-poster">
                        <img class="embed-responsive-item" src="http://via.placeholder.com/340x510" alt="" />
                    </div>
                    <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                        <div class="entity-play">
                            <a class="action-icon-theme action-icon-bordered rounded-circle" href="https://www.youtube.com/watch?v=d96cjJhvlMA" data-magnific-popup="iframe">
                                <span class="icon-content"><i class="fas fa-play"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="entity-content">
                    <h4 class="entity-title">
                        <a class="content-link" href="movie-info-sidebar-right.html">In to the deep</a>
                    </h4>
                    <div class="entity-category">
                        <a class="content-link" href="movies-blocks.html">historical</a>,
                        <a class="content-link" href="movies-blocks.html">adventure</a>
                    </div>
                    <div class="entity-info">
                        <div class="info-lines">
                            <div class="info info-short">
                                <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                                <span class="info-text">9,8</span>
                                <span class="info-rest">/10</span>
                            </div>
                            <div class="info info-short">
                                <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                <span class="info-text">169</span>
                                <span class="info-rest">&nbsp;min</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-short entity-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consectetur ultrices justo a pellentesque. Praesent venenatis dolor nec tempus lacinia. Donec ac condimentum dolor. Nullam sit amet nisl hendrerit, pharetra nulla convallis, malesuada diam. Donec ornare nisl eu lectus rhoncus, at malesuada metus rutrum. Aliquam a nisl vulputate, sodales ipsum aliquam, tempus purus. Suspendisse convallis, lectus nec vehicula sollicitudin, lorem sapien rhoncus dolor, vel lacinia urna velit ullamcorper nisi. Phasellus pellentesque, magna nec gravida feugiat, est magna suscipit ligula, vel porttitor nunc enim at nibh. Sed varius sit amet leo vitae consequat.
                    </p>
                </div>
                <div class="entity-extra">
                    <div class="text-uppercase entity-extra-title">In archive</div>
                    <div></div>
                </div>
            </article>
            <article class="movie-line-entity">
                <div class="entity-poster" data-role="hover-wrap">
                    <div class="embed-responsive embed-responsive-poster">
                        <img class="embed-responsive-item" src="http://via.placeholder.com/340x510" alt="" />
                    </div>
                    <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                        <div class="entity-play">
                            <a class="action-icon-theme action-icon-bordered rounded-circle" href="https://www.youtube.com/watch?v=d96cjJhvlMA" data-magnific-popup="iframe">
                                <span class="icon-content"><i class="fas fa-play"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="entity-content">
                    <h4 class="entity-title">
                        <a class="content-link" href="movie-info-sidebar-right.html">Iron planet</a>
                    </h4>
                    <div class="entity-category">
                        <a class="content-link" href="movies-blocks.html">western</a>
                    </div>
                    <div class="entity-info">
                        <div class="info-lines">
                            <div class="info info-short">
                                <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                                <span class="info-text">7,8</span>
                                <span class="info-rest">/10</span>
                            </div>
                            <div class="info info-short">
                                <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                <span class="info-text">96</span>
                                <span class="info-rest">&nbsp;min</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-short entity-text">Vivamus dolor ex, viverra ut facilisis et, euismod et quam. Aliquam sit amet mattis velit, ullamcorper venenatis magna. Aenean ac maximus magna. Proin pharetra venenatis tortor, ac suscipit est ultrices vitae. Mauris vulputate, nisl in lacinia dignissim, libero justo vehicula arcu, a porttitor quam erat ac dui. Suspendisse potenti. Maecenas sit amet interdum sem. Vestibulum sit amet volutpat mauris, ut gravida velit. Donec ultricies, eros ut finibus volutpat, enim ligula tempus enim, non bibendum libero tellus at velit. Aenean placerat egestas ullamcorper.
                    </p>
                </div>
                <div class="entity-extra">
                    <div class="text-uppercase entity-extra-title">In archive</div>
                    <div></div>
                </div>
            </article>
            <article class="movie-line-entity">
                <div class="entity-poster" data-role="hover-wrap">
                    <div class="embed-responsive embed-responsive-poster">
                        <img class="embed-responsive-item" src="http://via.placeholder.com/340x510" alt="" />
                    </div>
                    <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                        <div class="entity-play">
                            <a class="action-icon-theme action-icon-bordered rounded-circle" href="https://www.youtube.com/watch?v=d96cjJhvlMA" data-magnific-popup="iframe">
                                <span class="icon-content"><i class="fas fa-play"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="entity-content">
                    <h4 class="entity-title">
                        <a class="content-link" href="movie-info-sidebar-right.html">Monday invasion</a>
                    </h4>
                    <div class="entity-category">
                        <a class="content-link" href="movies-blocks.html">sport</a>
                    </div>
                    <div class="entity-info">
                        <div class="info-lines">
                            <div class="info info-short">
                                <span class="text-theme info-icon"><i class="fas fa-calendar-alt"></i></span>
                                <span class="info-text">25 jul 2017</span>
                            </div>
                            <div class="info info-short">
                                <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                <span class="info-text">130</span>
                                <span class="info-rest">&nbsp;min</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-short entity-text">Aenean molestie turpis eu aliquam bibendum. Nulla facilisi. Vestibulum quis risus in lorem suscipit tempor. Morbi consectetur enim vitae justo finibus consectetur. Mauris volutpat nunc dui, quis condimentum dolor efficitur et. Phasellus rhoncus porta nunc eu fermentum. Nullam vitae erat hendrerit, tempor arcu eget, eleifend tortor.
                    </p>
                </div>
                <div class="entity-extra">
                    <div class="text-uppercase entity-extra-title">Comming soon</div>
                    <div></div>
                </div>
            </article>
            <article class="movie-line-entity">
                <div class="entity-poster" data-role="hover-wrap">
                    <div class="embed-responsive embed-responsive-poster">
                        <img class="embed-responsive-item" src="http://via.placeholder.com/340x510" alt="" />
                    </div>
                    <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                        <div class="entity-play">
                            <a class="action-icon-theme action-icon-bordered rounded-circle" href="https://www.youtube.com/watch?v=d96cjJhvlMA" data-magnific-popup="iframe">
                                <span class="icon-content"><i class="fas fa-play"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="entity-content">
                    <h4 class="entity-title">
                        <a class="content-link" href="movie-info-sidebar-right.html">Cloud 10</a>
                    </h4>
                    <div class="entity-category">
                        <a class="content-link" href="movies-blocks.html">drama</a>,
                        <a class="content-link" href="movies-blocks.html">superhero</a>
                    </div>
                    <div class="entity-info">
                        <div class="info-lines">
                            <div class="info info-short">
                                <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                                <span class="info-text">7,1</span>
                                <span class="info-rest">/10</span>
                            </div>
                            <div class="info info-short">
                                <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                <span class="info-text">110</span>
                                <span class="info-rest">&nbsp;min</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-short entity-text">Vivamus dolor ex, viverra ut facilisis et, euismod et quam. Aliquam sit amet mattis velit, ullamcorper venenatis magna. Aenean ac maximus magna. Proin pharetra venenatis tortor, ac suscipit est ultrices vitae. Mauris vulputate, nisl in lacinia dignissim, libero justo vehicula arcu, a porttitor quam erat ac dui. Suspendisse potenti. Maecenas sit amet interdum sem. Vestibulum sit amet volutpat mauris, ut gravida velit. Donec ultricies, eros ut finibus volutpat, enim ligula tempus enim, non bibendum libero tellus at velit. Aenean placerat egestas ullamcorper.
                    </p>
                </div>
                <div class="entity-extra">
                    <div class="text-uppercase entity-extra-title">In archive</div>
                    <div></div>
                </div>
            </article>
            <article class="movie-line-entity">
                <div class="entity-poster" data-role="hover-wrap">
                    <div class="embed-responsive embed-responsive-poster">
                        <img class="embed-responsive-item" src="http://via.placeholder.com/340x510" alt="" />
                    </div>
                    <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                        <div class="entity-play">
                            <a class="action-icon-theme action-icon-bordered rounded-circle" href="https://www.youtube.com/watch?v=d96cjJhvlMA" data-magnific-popup="iframe">
                                <span class="icon-content"><i class="fas fa-play"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="entity-content">
                    <h4 class="entity-title">
                        <a class="content-link" href="movie-info-sidebar-right.html">Dady is back</a>
                    </h4>
                    <div class="entity-category">
                        <a class="content-link" href="movies-blocks.html">drama</a>,
                        <a class="content-link" href="movies-blocks.html">comedy</a>
                    </div>
                    <div class="entity-info">
                        <div class="info-lines">
                            <div class="info info-short">
                                <span class="text-theme info-icon"><i class="fas fa-calendar-alt"></i></span>
                                <span class="info-text">12 jan 2017</span>
                            </div>
                            <div class="info info-short">
                                <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                <span class="info-text">140</span>
                                <span class="info-rest">&nbsp;min</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-short entity-text">In luctus ac nisi vel vulputate. Sed blandit augue ut ex eleifend, ac posuere dolor sollicitudin. Mauris tempus euismod mauris id semper. Vestibulum ut vulputate elit, id ultricies libero. Aenean laoreet mi augue, at iaculis nisi aliquam eu. Quisque nec ipsum vehicula diam egestas porttitor eu vitae ex. Curabitur auctor tortor elementum leo faucibus, sit amet imperdiet ante maximus. Nulla viverra tortor dignissim purus placerat dapibus nec ut orci. Quisque efficitur nulla quis pulvinar dapibus. Phasellus sodales tortor sit amet sagittis condimentum. Donec ac ultricies ex. In odio leo, rhoncus aliquam bibendum sit amet, varius sit amet nisl.
                    </p>
                </div>
                <div class="entity-extra">
                    <div class="text-uppercase entity-extra-title">Comming soon</div>
                    <div></div>
                </div>
            </article>
            <article class="movie-line-entity">
                <div class="entity-poster" data-role="hover-wrap">
                    <div class="embed-responsive embed-responsive-poster">
                        <img class="embed-responsive-item" src="http://via.placeholder.com/340x510" alt="" />
                    </div>
                    <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                        <div class="entity-play">
                            <a class="action-icon-theme action-icon-bordered rounded-circle" href="https://www.youtube.com/watch?v=d96cjJhvlMA" data-magnific-popup="iframe">
                                <span class="icon-content"><i class="fas fa-play"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="entity-content">
                    <h4 class="entity-title">
                        <a class="content-link" href="movie-info-sidebar-right.html">Deadman skull</a>
                    </h4>
                    <div class="entity-category">
                        <a class="content-link" href="movies-blocks.html">musical</a>,
                        <a class="content-link" href="movies-blocks.html">melodrama</a>
                    </div>
                    <div class="entity-info">
                        <div class="info-lines">
                            <div class="info info-short">
                                <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                                <span class="info-text">7,2</span>
                                <span class="info-rest">/10</span>
                            </div>
                            <div class="info info-short">
                                <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                <span class="info-text">100</span>
                                <span class="info-rest">&nbsp;min</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-short entity-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consectetur ultrices justo a pellentesque. Praesent venenatis dolor nec tempus lacinia. Donec ac condimentum dolor. Nullam sit amet nisl hendrerit, pharetra nulla convallis, malesuada diam. Donec ornare nisl eu lectus rhoncus, at malesuada metus rutrum. Aliquam a nisl vulputate, sodales ipsum aliquam, tempus purus. Suspendisse convallis, lectus nec vehicula sollicitudin, lorem sapien rhoncus dolor, vel lacinia urna velit ullamcorper nisi. Phasellus pellentesque, magna nec gravida feugiat, est magna suscipit ligula, vel porttitor nunc enim at nibh. Sed varius sit amet leo vitae consequat.
                    </p>
                </div>
                <div class="entity-extra">
                    <div class="text-uppercase entity-extra-title">In archive</div>
                    <div></div>
                </div>
            </article>
            <article class="movie-line-entity">
                <div class="entity-poster" data-role="hover-wrap">
                    <div class="embed-responsive embed-responsive-poster">
                        <img class="embed-responsive-item" src="http://via.placeholder.com/340x510" alt="" />
                    </div>
                    <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                        <div class="entity-play">
                            <a class="action-icon-theme action-icon-bordered rounded-circle" href="https://www.youtube.com/watch?v=d96cjJhvlMA" data-magnific-popup="iframe">
                                <span class="icon-content"><i class="fas fa-play"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="entity-content">
                    <h4 class="entity-title">
                        <a class="content-link" href="movie-info-sidebar-right.html">Fall</a>
                    </h4>
                    <div class="entity-category">
                        <a class="content-link" href="movies-blocks.html">drama</a>,
                        <a class="content-link" href="movies-blocks.html">melodrama</a>
                    </div>
                    <div class="entity-info">
                        <div class="info-lines">
                            <div class="info info-short">
                                <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                                <span class="info-text">6,8</span>
                                <span class="info-rest">/10</span>
                            </div>
                            <div class="info info-short">
                                <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                <span class="info-text">122</span>
                                <span class="info-rest">&nbsp;min</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-short entity-text">In luctus ac nisi vel vulputate. Sed blandit augue ut ex eleifend, ac posuere dolor sollicitudin. Mauris tempus euismod mauris id semper. Vestibulum ut vulputate elit, id ultricies libero. Aenean laoreet mi augue, at iaculis nisi aliquam eu. Quisque nec ipsum vehicula diam egestas porttitor eu vitae ex. Curabitur auctor tortor elementum leo faucibus, sit amet imperdiet ante maximus. Nulla viverra tortor dignissim purus placerat dapibus nec ut orci. Quisque efficitur nulla quis pulvinar dapibus. Phasellus sodales tortor sit amet sagittis condimentum. Donec ac ultricies ex. In odio leo, rhoncus aliquam bibendum sit amet, varius sit amet nisl.
                    </p>
                </div>
                <div class="entity-extra">
                    <div class="text-uppercase entity-extra-title">Showtime</div>
                    <div class="entity-showtime">
                        <div class="showtime-wrap">
                            <div class="showtime-item">
                                <span class="disabled btn-time btn" aria-disabled="true">11 : 30</span>
                            </div>
                            <div class="showtime-item">
                                <a class="btn-time btn" aria-disabled="false" href="#">13 : 25</a>
                            </div>
                            <div class="showtime-item">
                                <a class="btn-time btn" aria-disabled="false" href="#">16 : 07</a>
                            </div>
                            <div class="showtime-item">
                                <a class="btn-time btn" aria-disabled="false" href="#">19 : 45</a>
                            </div>
                            <div class="showtime-item">
                                <a class="btn-time btn" aria-disabled="false" href="#">21 : 30</a>
                            </div>
                            <div class="showtime-item">
                                <a class="btn-time btn" aria-disabled="false" href="#">23 : 10</a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            <article class="movie-line-entity">
                <div class="entity-poster" data-role="hover-wrap">
                    <div class="embed-responsive embed-responsive-poster">
                        <img class="embed-responsive-item" src="http://via.placeholder.com/340x510" alt="" />
                    </div>
                    <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                        <div class="entity-play">
                            <a class="action-icon-theme action-icon-bordered rounded-circle" href="https://www.youtube.com/watch?v=d96cjJhvlMA" data-magnific-popup="iframe">
                                <span class="icon-content"><i class="fas fa-play"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="entity-content">
                    <h4 class="entity-title">
                        <a class="content-link" href="movie-info-sidebar-right.html">High castle</a>
                    </h4>
                    <div class="entity-category">
                        <a class="content-link" href="movies-blocks.html">horror</a>,
                        <a class="content-link" href="movies-blocks.html">sci-fi</a>
                    </div>
                    <div class="entity-info">
                        <div class="info-lines">
                            <div class="info info-short">
                                <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                                <span class="info-text">7,9</span>
                                <span class="info-rest">/10</span>
                            </div>
                            <div class="info info-short">
                                <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                <span class="info-text">141</span>
                                <span class="info-rest">&nbsp;min</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-short entity-text">Aenean molestie turpis eu aliquam bibendum. Nulla facilisi. Vestibulum quis risus in lorem suscipit tempor. Morbi consectetur enim vitae justo finibus consectetur. Mauris volutpat nunc dui, quis condimentum dolor efficitur et. Phasellus rhoncus porta nunc eu fermentum. Nullam vitae erat hendrerit, tempor arcu eget, eleifend tortor.
                    </p>
                </div>
                <div class="entity-extra">
                    <div class="text-uppercase entity-extra-title">In archive</div>
                    <div></div>
                </div>
            </article>
            <article class="movie-line-entity">
                <div class="entity-poster" data-role="hover-wrap">
                    <div class="embed-responsive embed-responsive-poster">
                        <img class="embed-responsive-item" src="http://via.placeholder.com/340x510" alt="" />
                    </div>
                    <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                        <div class="entity-play">
                            <a class="action-icon-theme action-icon-bordered rounded-circle" href="https://www.youtube.com/watch?v=d96cjJhvlMA" data-magnific-popup="iframe">
                                <span class="icon-content"><i class="fas fa-play"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="entity-content">
                    <h4 class="entity-title">
                        <a class="content-link" href="movie-info-sidebar-right.html">Music town</a>
                    </h4>
                    <div class="entity-category">
                        <a class="content-link" href="movies-blocks.html">adventure</a>
                    </div>
                    <div class="entity-info">
                        <div class="info-lines">
                            <div class="info info-short">
                                <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                                <span class="info-text">8,8</span>
                                <span class="info-rest">/10</span>
                            </div>
                            <div class="info info-short">
                                <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                <span class="info-text">124</span>
                                <span class="info-rest">&nbsp;min</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-short entity-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consectetur ultrices justo a pellentesque. Praesent venenatis dolor nec tempus lacinia. Donec ac condimentum dolor. Nullam sit amet nisl hendrerit, pharetra nulla convallis, malesuada diam. Donec ornare nisl eu lectus rhoncus, at malesuada metus rutrum. Aliquam a nisl vulputate, sodales ipsum aliquam, tempus purus. Suspendisse convallis, lectus nec vehicula sollicitudin, lorem sapien rhoncus dolor, vel lacinia urna velit ullamcorper nisi. Phasellus pellentesque, magna nec gravida feugiat, est magna suscipit ligula, vel porttitor nunc enim at nibh. Sed varius sit amet leo vitae consequat.
                    </p>
                </div>
                <div class="entity-extra">
                    <div class="text-uppercase entity-extra-title">In archive</div>
                    <div></div>
                </div>
            </article>
            <div class="section-bottom">
                <div class="paginator">
                    <a class="paginator-item" href="#"><i class="fas fa-chevron-left"></i></a>
                    <a class="paginator-item" href="#">1</a>
                    <span class="active paginator-item">2</span>
                    <a class="paginator-item" href="#">3</a>
                    <span class="paginator-item">...</span>
                    <a class="paginator-item" href="#">10</a>
                    <a class="paginator-item" href="#"><i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <a class="scroll-top disabled" href="#"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
    <?php include './include/footer.php' ?>
    <!-- jQuery library -->
    <script src="../js/jquery-3.3.1.js"></script>
    <!-- Bootstrap -->
    <script src="../bootstrap/js/bootstrap.js"></script>
    <!-- Paralax.js -->
    <script src="../parallax.js/parallax.js"></script>
    <!-- Waypoints -->
    <script src="../waypoints/jquery.waypoints.min.js"></script>
    <!-- Slick carousel -->
    <script src="../slick/slick.min.js"></script>
    <!-- Magnific Popup -->
    <script src="../magnific-popup/jquery.magnific-popup.min.js"></script>
    <!-- Inits product scripts -->
    <script src="../js/script.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJ4Qy67ZAILavdLyYV2ZwlShd0VAqzRXA&callback=initMap"></script>
    <script async defer src="https://ia.media-imdb.com/images/G/01/imdb/plugins/rating/js/rating.js"></script>
</body>

</html>