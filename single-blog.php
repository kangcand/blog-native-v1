	<!-- head -->
	<?php
    include('layouts/inc-front/head.php');
    ?>
	<!-- End Head -->

	<body>
	    <!-- nav -->
	    <?php
        include('layouts/inc-front/nav.php');
        ?>
	    <!-- end nav -->
	    <!-- Content -->
	    <!-- start banner Area -->
	    <section class="banner-area" id="home">
	        <div class="container">
	            <div class="row fullscreen d-flex align-items-center justify-content-center">
	                <div class="banner-content col-lg-6 col-md-6">
	                    <h1>
	                        Improved <br>
	                        Production level <br>
	                        with Robotics
	                    </h1>
	                    <p class="text-white text-uppercase">
	                        Everyone wants the innovation through robotics
	                    </p>
	                    <a href="#" class="primary-btn header-btn text-uppercase">View Details</a>
	                </div>
	                <div class="banner-img col-lg-6 col-md-6">
	                    <img class="img-fluid" src="/assets/robotics/img/banner-img.png" alt="">
	                </div>
	            </div>
	        </div>
	    </section>
	    <!-- End banner Area -->


	    <!-- Start blog-posts Area -->
	    <section class="blog-posts-area section-gap">
	        <div class="container">
	            <div class="row">
	                <div class="col-lg-8 post-list blog-post-list">
	                    <?php include('config/koneksi.php');
                        $blog = new Frontend();
                        $data = mysqli_fetch_array($blog->single_blog($_GET['slug']));
                        // var_dump($data);
                        ?>
	                    <div class="single-post">
	                        <img class="img-fluid" src="/admin/artikel/img/<?php echo $data['foto'] ?>" alt="">
	                        <ul class="tags">
	                            <li><a href="#" class="btn btn-sm btn-outline-dark"><?php echo $data['nama_kategori'] ?></a></li>
	                        </ul>
	                        <a href="#">
	                            <h1>
	                                <?php echo $data['judul'] ?>
	                            </h1>
	                        </a>
	                        <div class="content-wrap">
	                            <p>
	                                <?php echo $data['konten'] ?>
	                            </p>
	                        </div>
	                        <div class="bottom-meta">
	                            <div class="user-details row align-items-center">
	                                <div class="comment-wrap col-lg-6 col-sm-6">
	                                    <ul>
	                                        <li><a href="#"><span class="lnr lnr-heart"></span> 4 likes</a></li>
	                                        <li><a href="#"><span class="lnr lnr-bubble"></span> 06 Comments</a></li>
	                                    </ul>
	                                </div>
	                                <div class="social-wrap col-lg-6">
	                                    <ul>
	                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
	                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
	                                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
	                                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
	                                    </ul>

	                                </div>
	                            </div>
	                        </div>

	                        <!-- Start comment-sec Area -->
	                        <div id="disqus_thread"></div>
	                        <!-- End comment-sec Area -->


	                    </div>
	                </div>
	                <div class="col-lg-4 sidebar">
	                    <div class="single-widget search-widget">
	                        <form class="example" action="#" style="margin:auto;max-width:300px">
	                            <input type="text" placeholder="Search Posts" name="search2">
	                            <button type="submit"><i class="fa fa-search"></i></button>
	                        </form>
	                    </div>

	                    <div class="single-widget protfolio-widget">
	                        <img src="/assets/admin-template/img/logo-custom.png" alt="" style="width: 250px; height:200px;">
	                        <a href="#">
	                            <h4>SMK ASSALAAM</h4>
	                        </a>
	                        <p>
	                            MCSE boot camps have its supporters and
	                            its detractors. Some people do not understand why you should have to spend money
	                            on boot camp when you can get.
	                        </p>
	                        <ul>
	                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
	                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
	                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
	                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
	                        </ul>
	                    </div>

	                    <div class="single-widget category-widget">
	                        <h4 class="title">Post Categories</h4>
	                        <ul>
	                            <?php
                                $blog = new Frontend();
                                foreach ($blog->get_kategori() as $data) {
                                    ?>
	                                <li><a href="#" class="justify-content-between align-items-center d-flex">
	                                        <h6><?php echo $data['nama'] ?></h6>
	                                    </a>
	                                </li>
	                            <?php } ?>
	                        </ul>
	                    </div>

	                </div>
	            </div>
	        </div>
	    </section>
	    <!-- End blog-posts Area -->
	    <!-- End blog Area -->
	    <!-- End Content -->

	    <!--  footer Area -->
	    <?php
        include('layouts/inc-front/footer.php');
        ?>
	    <!--  footer Area -->

	    <!-- Scripts -->
	    <?php
        include('layouts/inc-front/scripts.php');
        ?>
	    <!-- End Scripts -->
	</body>

	</html>