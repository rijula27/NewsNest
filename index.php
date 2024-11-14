<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>

<!-- html file -->


<!-- NAVIGATION BAR SECTION -->
<?php
include('header.php');
?>

    
    <div class="content">









    <!-- SLIDER SECTION -->
        <div class="section_2">
            <div class="mcarousel">
                <!-- <h1>Bulletin Board</h1> -->
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="Assets/image/weather report 3.png" class="d-block w-100 " alt="...">
                      </div>
                      <div class="carousel-item"  style="border:solid;">
                        <img src="Assets/image/New york weather report.png" class="d-block w-100 " alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="Assets/image/London weather report.png" class="d-block w-100 " alt="...">
                      </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="devider">









        <!-- TODAY'S NEWS -->
        <div class="flex section_3">
            <div class="news_highlight">
                <h3 class="underline">Today's News</h3>

                <?php 
                    $stmt = $conn->prepare('SELECT * FROM news WHERE DATE(published_date) = CURDATE() ORDER BY news_id DESC;');
                    $stmt->execute();
                    $info = $stmt->get_result();

                    $count = 0; 

                    while ($news_info = mysqli_fetch_assoc($info)) {
                        $count++; 

                        if ($count <= 5) {
                ?>

                <div class="flex sub_nh overflow">
                    <div class="nh_note">
                    <a href="inr_news.php#<?php echo $news_info['title']; ?>" class="a">
                                <h4><?php echo $news_info['title']; ?></h4>
                                                    </a>
                    </div>
                    <div class="nh_pc">
                        <img class="fit_img" src="Assets/image/<?php echo $news_info['image1']; ?>" alt="">
                    </div>
                </div>

                <?php
                        }
                    }
                ?>
                <!-- <div class="flex sub_nh">
                    <div class="nh_note">
                        <a href="" class="a"><h4>Highlights of the day: LS election counting on Jun 4 after 6 wks of voting</h4></a>
                    </div>
                    <div class="nh_pc">
                        <img class="fit_img" src="Assets/image/post-landscape-7.jpg" alt="">
                    </div>
                </div>
                <div class="flex sub_nh">
                    <div class="nh_note">
                        <a href="" class="a"><h4>18 Hindu refugees from Pakistan get citizenship during camp in Gujarat</h4></a>
                    </div>
                    <div class="nh_pc">
                        <img class="fit_img" src="Assets/image/post-slide-2.jpg" alt="">
                    </div>
                </div>
                <div class="flex sub_nh">
                    <div class="nh_note">
                        <a href="" class="a"><h4>Delhi govt develops portal for licensing cab aggregators, e-commerce cos</h4></a>
                    </div>
                    <div class="nh_pc">
                        <img class="fit_img" src="Assets/image/post-landscape-2.jpg" alt="">
                    </div>
                </div>
                <div class="flex sub_nh">
                    <div class="nh_note">
                        <a href="" class="a"><h4>Blast in spare parts factory in Haryana's Rewari, 40 people injured</h4></a>
                    </div>
                    <div class="nh_pc">
                        <img class="fit_img" src="Assets/image/post-slide-3.jpg" alt="">
                    </div>
                </div> -->

            </div>










            <!-- Bulletin Board -->
            <div class="bulletin_board">
                <div class="bb_heading">
                    <h1>Bulletin Board</h1>
                </div>

                <?php
                    $stmt = $conn->prepare('SELECT * FROM bulletin_board ORDER BY b_id DESC');
                    $stmt->execute();
                    $info = $stmt->get_result();

                    $count = 0; 

                    while ($bb_info = mysqli_fetch_assoc($info)) {
                        $count++; 

                        if ($count <= 5) {
                    ?>

                <hr>
                <div class="bb_body">
                    <h4><?php echo $bb_info['content'] ?></h4>
                </div>

                <hr>

                <!-- <div class="bb_body">
                    <h4>Delhi liquor policy case: 
                        ED arrests BRS MLC K Kavitha.</h4>
                </div>
                <hr>
                <div class="bb_body">
                    <h4>Why BJP needs all friends,
                         even foes, to achieve 'abki bar 400 paar'.</h4>
                </div>
                <hr>
                <div class="bb_body">
                    <h4>Paytm Payments Bank: FAQs on closing FASTag accounts.</h4>
                </div>
                <hr>
                <div class="bb_body">
                    <h4>After Centre alerted states on his fraud,
                         Donor No 1 went on electoral bonds buying spree</h4>
                </div>
                <hr>
                <div class="bb_body">
                    <h4>Electoral bonds Modi's extortion racket,
                         means to take 'hafta' from firms: Rahul Gandhi</h4>
                </div>
                <hr>

                <div class="bb_body">
                    <h4>Electoral bonds Modi's extortion racket,
                         means to take 'hafta' from firms: Rahul Gandhi</h4>
                </div> -->

                <?php
                    }}
                ?>

            </div>
        </div>










        <!-- ARTICLE SECTION -->
        <hr class="devider">
        <!-- PHP Done -->
        <div class="article_section">
            <h1 class="underline">Article</h1>
            <div class="flex as_1">
            <?php
                $stmt = $conn->prepare( 'SELECT * FROM article ORDER BY article_id DESC LIMIT 3' );
                $stmt->execute();
                $article_details = $stmt->get_result();

                // $count = 0;
                while( $row = mysqli_fetch_assoc( $article_details ) ) {
                    // $count++; 

                    // if ($count <= 3) {
            ?>
                <div class="as_1a">
                    <a href="article.php#<?php echo $row['title']; ?>">
                        <img class="fit_img" src="Assets/image/<?php echo $row['image1']; ?>" alt="img">
                        <div class="overlay">
                            <p><?php echo $row[ 'title' ] ?></p>
                        </div>
                    </a>
                </div>

            <?php
                // }
            }
            ?>
                <!-- <div class="as_1b">
                    <a href="">
                        <img class="fit_img" src="Assets/image/post-landscape-2.jpg" alt="img">
                        <div class="overlay">
                            <p>How to take care of Dog. Some special species of Dog</p>
                        </div>
                    </a>
                </div>
                <div class="as_1c">
                    <a href="">
                        <img class="fit_img" src="Assets/image/post-landscape-6.jpg" alt="img">
                        <div class="overlay">
                            <p>How to take care of Dog. Some special species of Dog</p>
                        </div>
                    </a>
                </div> -->
            </div>
            <!-- PHP done -->
            <div class="flex as_2">
            <?php
                $offset = 3;
                $stmt = $conn->prepare( 'SELECT * FROM article ORDER BY article_id DESC LIMIT 3 OFFSET ' . $offset );
                $stmt->execute();
                $article_details = $stmt->get_result();

                // $count = 0;
                while( $row = mysqli_fetch_assoc( $article_details ) ) {
                    // $count++; 

                    // if ($count <= 3) {
            ?>
                <div class="as_1a">
                    <a href="article.php#<?php echo $row['title']; ?>">
                        <img class="fit_img" src="Assets/image/<?php echo $row['image1']; ?>" alt="img">
                        <div class="overlay">
                            <p><?php echo $row[ 'title' ] ?></p>
                        </div>
                    </a>
                </div>

            <?php
                }
            // }
            ?>
            </div>
        </div>










        <!-- INTERNATIONAL SECTION -->
        <div class="flex section_4">
            <h1>International</h1>
            <a href="inr_news.php#international" class="a underline">See all news</a>
        </div>
        <hr class="devider">

        <div class="flex section_5">
            <div class="s5">
                <div class="flex s5_p1">
                    <?php
                        $count = 0; 
                
                        $stmt = $conn->prepare( 'SELECT * FROM news 
                        INNER JOIN content_type ON news.content_type_id = content_type.content_type_id 
                        WHERE content_type.content_type_name = "International"ORDER BY news_id DESC '  );
                        $stmt->execute();
                        $news_details = $stmt->get_result();
                        while( $row = mysqli_fetch_assoc( $news_details ) ) {
                            $count++; 

                            if ($count <= 1) {
                    ?>
                    <div class="s5_p1_pc">
                        <a href="inr_news.php#<?php $row['title']?>"><img class="fit_img" src="Assets/image/<?php echo $row['image1']; ?>" alt=""></a>
                    </div>
                    <div class="s5_p1_nt overflow">
                        <a class="a" href="inr_news.php#<?= $row['title']?>"><h3><?php echo $row[ 'title' ] ?></h3>
                        </a>
                        <p class=""><?php echo $row[ 'content' ] ?>
                          </p>
                    </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="flex s5_p2">
                    <div class="s5_p2_nt1">
                        <?php
                            $offset = 1;
                            // $count = 0; 
                        
                            $stmt = $conn->prepare( 'SELECT * FROM news 
                            INNER JOIN content_type ON news.content_type_id = content_type.content_type_id 
                            WHERE content_type.content_type_name = "International" ORDER BY news_id DESC LIMIT 1 OFFSET ' . $offset  );
                            $stmt->execute();
                            $news_details = $stmt->get_result();
                            while( $row = mysqli_fetch_assoc( $news_details ) ) {
                            // $count++; 

                            // if ($count <= 1) {
                        ?>
                        <div class="s5_p2_nt1a">
                            <a href="inr_news.php#<?= $row['title']?>"><img class="fit_img" src="Assets/image/<?php echo $row['image1']; ?>" alt=""></a>

                        </div>
                        <div class="s5_p2_nt1b overflow">
                            <a class="a" href="inr_news.php#<?= $row['title']?>"><h5><?php echo $row[ 'title' ] ?></h5></a>
                                 <p class=""><?php echo $row[ 'content' ] ?></p>
                        </div>
                        <?php
                            }
                        // }
                        ?>
                    </div>
                    <div class="s5_p2_pc">
                        <?php
                            $offset = 2;
                            // $count = 0; 
                        
                            $stmt = $conn->prepare( 'SELECT * FROM news 
                            INNER JOIN content_type ON news.content_type_id = content_type.content_type_id 
                            WHERE content_type.content_type_name = "International" ORDER BY news_id DESC LIMIT 1 OFFSET ' . $offset  );
                            $stmt->execute();
                            $news_details = $stmt->get_result();
                            while( $row = mysqli_fetch_assoc( $news_details ) ) {
                            // $count++; 

                            // if ($count <= 1) {
                        ?>

                        <a href="inr_news.php#<?= $row['title']?>"><img class="fit_img" src="Assets/image/<?php echo $row['image1']; ?>" alt=""></a>

                    </div>
                </div>
                <div class="flex s5_p3 overflow">

                    <div class="s5_p3_a">
                        <a class="a" href="inr_news.php#<?= $row['title']?>"><h5><?php echo $row[ 'title' ] ?></h5></a>
                    </div>
                    <div class="s5_p3_b">
                        <a class="a" href=""><h5><?php echo $row[ 'content' ] ?></h5></a>
                    </div>
                </div>
                <?php
                        }
                        ?>
            </div>

            <!-- PHP done -->
            <div class="s5_p4">
                <h4>Highlight</h4>
                <?php
                    $offset = 3; 
            
                    $stmt = $conn->prepare( 'SELECT * FROM news 
                    INNER JOIN content_type ON news.content_type_id = content_type.content_type_id 
                    WHERE content_type.content_type_name = "International" ORDER BY news_id DESC LIMIT 5 OFFSET ' . $offset  );
                    $stmt->execute();
                    $news_details = $stmt->get_result();
                    while( $row = mysqli_fetch_assoc( $news_details ) ) {
                        // $count++; 

                        // if ($count <= 10) {
                ?>
                <div>
                    <a href="inr_news.php#<?= $row['title']?>" class="a"><?php echo $row[ 'title' ] ?></a>
                </div>
                <hr>
                <?php
                      }
                    
                ?>
                <!-- <div>
                    <a href="" class="a">17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut</a>
                </div>
                <hr>
                <div>
                    <a href="" class="a">9 Half-up/half-down Hairstyles for Long and Medium Hair</a>
                </div>
                <hr>
                <div>
                    <a href="" class="a">Life Insurance And Pregnancy: A Working Mom’s Guide</a>
                </div>
                <hr>
                <div>
                    <a href="" class="a">The Best Homemade Masks for Face (keep the Pimples Away)</a>
                </div>
                <hr>
                <div>
                    <a href="" class="a">10 Life-Changing Hacks Every Working Mom Should Know</a>
                </div>
                <hr> -->
            </div>
        </div>










        <!-- NATIONAL SECTION -->
        <div class="flex section_4">
            <h1>National</h1>
            <a href="inr_news.php#national" class="a underline">See all news</a>
        </div>
        <hr class="devider">

         <div class="flex section_5">
            <div class="s5_p4">
                <h4>Highlight</h4>
                <?php
                    $offset = 3; 

                    $stmt = $conn->prepare( 'SELECT * FROM news 
                    INNER JOIN content_type ON news.content_type_id = content_type.content_type_id 
                    WHERE content_type.content_type_name = "National" ORDER BY news_id DESC LIMIT 5 OFFSET ' . $offset  );
                    $stmt->execute();
                    $news_details = $stmt->get_result();
                    while( $row = mysqli_fetch_assoc( $news_details ) ) {
                        // $count++; 

                        // if ($count <= 10) {
                ?>
                <div>
                    <a href="inr_news.php#<?= $row['title']?>" class="a overflow" ><?php echo $row[ 'title' ] ?></a>
                </div>
                <hr>
                <?php
                    // }
                }
                ?>
                
            </div>
            <div class="s5">
                <div class="flex s5_p1">
                <?php
                    $count = 0; 
            
                    $stmt = $conn->prepare( 'SELECT * FROM news 
                    INNER JOIN content_type ON news.content_type_id = content_type.content_type_id 
                    WHERE content_type.content_type_name = "National" ORDER BY news_id DESC'  );
                    $stmt->execute();
                    $news_details = $stmt->get_result();
                    while( $row = mysqli_fetch_assoc( $news_details ) ) {
                        $count++; 

                        if ($count <= 1) {
                ?>
                    <div class="s5_p1_pc">
                        <a href="inr_news.php#<?= $row['title']; ?>"><img class="fit_img" src="Assets/image/<?php echo $row['image1']; ?>" alt=""></a>
                    </div>
                    <div class="s5_p1_nt overflow">
                        <a class="a" href="inr_news.php#<?= $row['title']; ?>"><h3><?php echo $row[ 'title' ] ?></h3>
                        </a>
                        <p class=""><?php echo $row[ 'content' ] ?>
                          </p>
                    </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="flex s5_p2">
                    <div class="s5_p2_nt1">
                    <?php
                        $offset = 1;
                        // $count = 0; 
                    
                        $stmt = $conn->prepare( 'SELECT * FROM news 
                        INNER JOIN content_type ON news.content_type_id = content_type.content_type_id 
                        WHERE content_type.content_type_name = "National" ORDER BY news_id DESC LIMIT 1 OFFSET ' . $offset  );
                        $stmt->execute();
                        $news_details = $stmt->get_result();
                        while( $row = mysqli_fetch_assoc( $news_details ) ) {
                        // $count++; 

                        // if ($count <= 1) {
                    ?>
                        <div class="s5_p2_nt1a">
                            <a href="inr_news.php#<?= $row['title']?>"><img class="fit_img" src="Assets/image/<?php echo $row['image1']; ?>" alt=""></a>

                        </div>
                        <div class="s5_p2_nt1b overflow">
                            <a class="a" href="inr_news.php#<?= $row['title']?>"><h5><?php echo $row[ 'title' ] ?></h5></a>
                                 <p class=""><?php echo $row[ 'content' ] ?></p>
                        </div>
                        <?php
                            }
                        // }
                        ?>
                    </div>
                    <div class="s5_p2_pc">
                    <?php
                        $offset = 2;
                        // $count = 0; 
                    
                        $stmt = $conn->prepare( 'SELECT * FROM news 
                        INNER JOIN content_type ON news.content_type_id = content_type.content_type_id 
                        WHERE content_type.content_type_name = "Regional" ORDER BY news_id DESC LIMIT 1 OFFSET ' . $offset  );
                        $stmt->execute();
                        $news_details = $stmt->get_result();
                        while( $row = mysqli_fetch_assoc( $news_details ) ) {
                        // $count++; 

                        // if ($count <= 1) {
                    ?>

                        <a href="inr_news.php#<?= $row['title']?>"><img class="fit_img" src="Assets/image/<?php echo $row['image1']; ?>" alt=""></a>

                    </div>
                </div>
                <div class="flex s5_p3">
                    <div class="s5_p3_a overflow">
                        <a class="a" href="inr_news.php#<?= $row['title']?>"><h5><?php echo $row[ 'title' ] ?></h5></a>
                    </div>
                    <div class="s5_p3_b overflow">
                        <a class="a" href=""><h5><?php echo $row['content'] ?></h5></a>
                    </div>
                </div>
                <?php
                        }
                ?>
            </div>
        </div>








        <!-- REGIONAL SECTION -->

        <div class="flex section_4">
            <h1>Regional</h1>
            <a href="inr_news.php#regional" class="a underline">See all news</a>
        </div>
        <hr class="devider">


        <div class="flex section_5">
            <div class="s5">
                <div class="flex s5_p1">
                    <?php
                        $count = 0; 
                
                        $stmt = $conn->prepare( 'SELECT * FROM news 
                        INNER JOIN content_type ON news.content_type_id = content_type.content_type_id 
                        WHERE content_type.content_type_name = "Regional"ORDER BY news_id DESC '  );
                        $stmt->execute();
                        $news_details = $stmt->get_result();
                        while( $row = mysqli_fetch_assoc( $news_details ) ) {
                            $count++; 

                            if ($count <= 1) {
                    ?>
                    <div class="s5_p1_pc">
                        <a href="inr_news.php#<?= $row['title']?>"><img class="fit_img" src="Assets/image/<?php echo $row['image1']; ?>" alt=""></a>
                    </div>
                    <div class="s5_p1_nt overflow">
                        <a class="a" href="inr_news.php#<?= $row['title']?>"><h3><?php echo $row[ 'title' ] ?></h3>
                        </a>
                        <p class=""><?php echo $row[ 'content' ] ?>
                          </p>
                    </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="flex s5_p2">
                    <div class="s5_p2_nt1">
                    <?php
                            $offset = 1;
                            // $count = 0; 
                        
                            $stmt = $conn->prepare( 'SELECT * FROM news 
                            INNER JOIN content_type ON news.content_type_id = content_type.content_type_id 
                            WHERE content_type.content_type_name = "Regional" ORDER BY news_id DESC LIMIT 1 OFFSET ' . $offset  );
                            $stmt->execute();
                            $news_details = $stmt->get_result();
                            while( $row = mysqli_fetch_assoc( $news_details ) ) {
                            // $count++; 

                            // if ($count <= 1) {
                        ?>
                        <div class="s5_p2_nt1a">
                            <a href="inr_news.php#<?= $row['title']?>"><img class="fit_img" src="Assets/image/<?php echo $row['image1']; ?>" alt=""></a>

                        </div>
                        <div class="s5_p2_nt1b overflow">
                            <a class="a" href="inr_news.php#<?= $row['title']?>"><h5><?php echo $row[ 'title' ] ?></h5></a>
                                 <p class=""><?php echo $row[ 'content' ] ?></p>
                        </div>
                        <?php
                            }
                        // }
                        ?>
                    </div>
                    <div class="s5_p2_pc">
                        <?php
                            $offset = 2;
                            // $count = 0; 
                        
                            $stmt = $conn->prepare( 'SELECT * FROM news 
                            INNER JOIN content_type ON news.content_type_id = content_type.content_type_id 
                            WHERE content_type.content_type_name = "Regional" ORDER BY news_id DESC LIMIT 1 OFFSET ' . $offset  );
                            $stmt->execute();
                            $news_details = $stmt->get_result();
                            while( $row = mysqli_fetch_assoc( $news_details ) ) {
                            // $count++; 

                            // if ($count <= 1) {
                        ?>

                        <a href="inr_news.php#<?= $row['title']?>"><img class="fit_img" src="Assets/image/<?php echo $row['image1']; ?>" alt=""></a>


                    </div>
                </div>
                <div class="flex s5_p3 overflow">
                <div class="s5_p3_a">
                        <a class="a" href="inr_news.php#<?= $row['title']?>"><h5><?php echo $row[ 'title' ] ?></h5></a>
                    </div>
                    <div class="s5_p3_b">
                        <a class="a" href=""><h5><?php echo $row[ 'content' ] ?></h5></a>
                    </div>
                </div>
                <?php
                            }
                ?>
            </div>
            <div class="s5_p4">
                <h4>Highlight</h4>
                <?php

                    // $count = 0;
                    $offset = 3;
                    $stmt = $conn->prepare( 'SELECT * FROM news 
                    INNER JOIN content_type ON news.content_type_id = content_type.content_type_id 
                    WHERE content_type.content_type_name = "Regional"ORDER BY news_id DESC LIMIT 5 OFFSET ' . $offset );
                    $stmt->execute();
                    $news_details = $stmt->get_result();
                    while( $row = mysqli_fetch_assoc( $news_details ) ) {
                        // $count++; 

                        // if ($count <= 10) {
                ?>
                <div>
                    <a href="inr_news.php#<?= $row['title']?>" class="a"><?php echo $row[ 'title' ] ?></a>
                </div>
                <hr>
                <?php
                    // }
                }
                ?>
                                    <!-- <div>
                    <a href="" class="a">17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut</a>
                </div>
                <hr>
                <div>
                    <a href="" class="a">9 Half-up/half-down Hairstyles for Long and Medium Hair</a>
                </div>
                <hr>
                <div>
                    <a href="" class="a">Life Insurance And Pregnancy: A Working Mom’s Guide</a>
                </div>
                <hr>
                <div>
                    <a href="" class="a">The Best Homemade Masks for Face (keep the Pimples Away)</a>
                </div>
                <hr>
                <div>
                    <a href="" class="a">10 Life-Changing Hacks Every Working Mom Should Know</a>
                </div>
                <hr> -->
            </div>
        </div>






        <!-- main footer -->
        <?php
      include('main_footer.php');
    ?>



        <!-- sub footer -->
        <?php
      include('sub_footer.php');
    ?>


    </div>
</body>
</html>