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
	    <section class="banner-area relative" id="home">
	        <div class="overlay overlay-bg"></div>
	        <div class="container">
	            <div class="row d-flex align-items-center justify-content-center">
	                <div class="about-content col-lg-12">
	                    <h1 class="text-white">
	                        Blog Area
	                    </h1>
	                    <p class="text-white link-nav"><a href="index.html">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="blog-home.html"> Blog Home</a></p>
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
	                    <?php
                        include('config/koneksi.php');
                        $blog = new Frontend();
                        foreach ($blog->blog() as $data) {
                            ?>
	                        <div class="single-post">
	                            <img class="img-fluid" src="/assets/robotics/img/blog/p1.jpg" alt="">
	                            <ul class="tags">
	                                <li><a href="#" class="btn btn-outline-dark btn-sm"><?php echo $data['nama_kategori'] ?></a></li>
	                            </ul>
	                            <a href="single-blog.php?slug=<?php echo $data['slug'] ?>">
	                                <h1>
	                                    <?php echo $data['judul'] ?>
	                                </h1>
	                            </a>
	                            <p>

	                            </p>
	                            <div class="bottom-meta">
	                                <div class="user-details row align-items-center">
	                                    <div class="comment-wrap col-lg-6">
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
	                        </div>
	                    <?php } ?>
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