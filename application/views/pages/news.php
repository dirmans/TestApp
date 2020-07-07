
<!------ Include the above in your HEAD tag ---------->

<!--Container-->
</div>    
<!--Start code-->
<div class="row">
    <div class="col-12 pb-5">
        <!--SECTION START-->
        <section class="row">
            <!--Start slider news-->
            <div class="col-12 col-md-6 pb-0 pb-md-3 pt-2 pr-md-1">
                <div id="featured" class="carousel slide carousel" data-ride="carousel">
                    <!--dots navigate-->
                    <ol class="carousel-indicators top-indicator">
                        <li data-target="#featured" data-slide-to="0" class="active"></li>
                        <li data-target="#featured" data-slide-to="1"></li>
                        <li data-target="#featured" data-slide-to="2"></li>
                        <li data-target="#featured" data-slide-to="3"></li>
                    </ol>

                    <!--carousel inner-->
                    <div class="carousel-inner">
                        <!--Item slider-->
                        <div class="carousel-item active">
                            <div class="card border-0 rounded-0 text-light overflow zoom">
                                <div class="position-relative">
                                    <!--thumbnail img-->
                                    <div class="ratio_left-cover-1 image-wrapper">
                                        <a href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/">
                                            <img class="img-fluid w-100"
                                            src="https://bootstrap.news/source/img1.jpg"
                                            alt="Bootstrap news template">
                                        </a>
                                    </div>
                                    <div class="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">
                                        <!--title-->
                                        <a href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/">
                                            <h2 class="h3 post-title text-white my-1">Bootstrap 4 template news portal magazine perfect for news site</h2>
                                        </a>
                                        <!-- meta title -->
                                        <div class="news-meta">
                                            <span class="news-author">by <a class="text-white font-weight-bold" href="../category/author.html">Jennifer</a></span>
                                            <span class="news-date">Oct 22, 2019</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Item slider-->
                    
                        <!--Item slider-->
                       
                        <!--Item slider-->
                        
                        <!--end item slider-->
                    </div>
                    <!--end carousel inner-->
                </div>

                <!--navigation-->
                <a class="carousel-control-prev" href="#featured" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#featured" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!--End slider news-->

            <!--Start box news-->
            <div class="col-12 col-md-6 pt-2 pl-md-1 mb-3 mb-lg-4">
                <div class="row">
                    <!--news box-->
                    <?php 
                    foreach ($news as $row) : 
                        ?>
                        <div class="col-6 pb-1 pt-0 pr-1">
                            <div class="card border-0 rounded-0 text-white overflow zoom">
                                <div class="position-relative">
                                    <!--thumbnail img-->
                                    <div class="ratio_right-cover-2 image-wrapper">
                                        <a href="<?= base_url('indexi/readmore/').$row['id_news'] ?>">
                                            <img class="gambar"
                                            src="<?= base_url('assets/img/news/').$row['image'] ?>"
                                            alt="simple blog template bootstrap">
                                        </a>
                                    </div>
                                    <div class="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">
                                        <!-- category -->
                                        <a class="p-1 badge badge-primary rounded-0" href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/">Highlight</a>

                                        <!--title-->
                                        <a href="https://bootstrap.news/bootstrap-4-template-news-portal-magazine/">
                                            <h2 class="h5 text-white my-1"><?= $row['title']?></h2>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>

                    <!--news box-->

                    <!--news box-->

                    <!--news box-->

                    <!--end news box-->
                </div>
            </div>
            <!--End box news-->
        </section>
        <!--END SECTION-->
    </div>
</div>

<!--end code-->
