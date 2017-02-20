<!--Popular-->

<section id="popular" class="block background-color-white">
    <div class="container">
        <header><h2>Latest Blogs</h2></header>
        <div class="owl-carousel wide carousel">

            <?php foreach ( $blogs as $blog): //debug($blog); ?>
            <div class="slide">
                <div class="inner">
                    <div class="image">

                        <img src="<?php echo $blog['homepage_image_url'] ?>"> <!-- blog feature image -->

                    </div>
                    <div class="wrapper">
                        <a href="#"><h3><?php echo $blog['seo_title'] ?></h3></a>

                        <div class="info">

                            <div class="type">
                                <!-- <i><img src="/assets/icons/restaurants-bars/restaurants/restaurant.png"></i> -->
                                <span><b><?php echo implode(',' , $blog['categories']) ?></b></span>
                            </div>
                        </div>
                        <!--/.info-->
                        <?php echo $blog['homepage_text'] ?>
                        <a href="#" class="read-more icon">Read More</a>
                    </div>
                    <!--/.wrapper-->
                </div>
                <!--/.inner-->
            </div>
            <?php endforeach; ?>
            <!--/.slide-->
            <!-- -->

        <!--/.owl-carousel-->
    </div>
    <!--/.container-->
</section>
<!--end Popular-->
