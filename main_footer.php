
        <!-- main footer -->
        <div class=" main_footer">
            <div class="flex mf">
                <div class="mf_1">
                    <div class="mf_1_heading">
                        <h4>About The News Nest</h4>
                    </div>
                    <div class="mf_1_note">
                        <p>The News Nest is your ultimate destination 
                            for staying informed and engaged with the 
                            world around you. Our portal offers a wide 
                            array of news categories to cater to every
                             interest, including International, National,
                              Regional, Sports, Business, and Technology. 
                              Whether you're looking to catch up on global events,
                               delve into local happenings, stay updated on the latest 
                               sports scores, or track business trends and technological 
                               advancements, The News Nest has you covered.</p>
                    </div>
                    <div class="mf_1_link">
                        <a href="about.php" class="a underline" style="color: rgba(255, 255, 255, 0.536);">Learn More <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="mf_2">
                    <div class="mf_2_heading">
                        <h4>Navigation</h4>
                    </div>
                    <div class="mf_2_list">
                        <div><a href="index.php"class="a ab"><i class="fa-solid fa-chevron-right"></i> Home</a></div>
                        <div><a href="article.php"class="a ab"> <i class="fa-solid fa-chevron-right"></i> Article</a></div>
                        <div><a href="category_news.php"class="a ab"><i class="fa-solid fa-chevron-right"></i> Categories</a></div>
                        <div><a href="about.php"class="a ab"><i class="fa-solid fa-chevron-right"></i> About</a></div>
                        <div><a href="contact.php"class="a ab"><i class="fa-solid fa-chevron-right"></i> Contact Us</a></div>
                    </div>

                </div>
                <div class="mf_3">
                    <div class="mf_3_heading">
                        <h4>Categories</h4>
                    </div>
                    <div class="mf_3_list">
                        <div><a href="inr_news.php#international"class="a ab"><i class="fa-solid fa-chevron-right"></i> International</a></div>
                        <div><a href="inr_news.php#national"class="a ab"><i class="fa-solid fa-chevron-right"></i> National</a></div>
                        <div><a href="inr_news.php#regional"class="a ab"><i class="fa-solid fa-chevron-right"></i> Regional</a></div>
                        <div><a href="category_news.php#sports"class="a ab"><i class="fa-solid fa-chevron-right"></i> Sports</a></div>
                        <div><a href="category_news.php#business"class="a ab"><i class="fa-solid fa-chevron-right"></i> Business</a></div>
                        <div><a href="category_news.php#technology"class="a ab"><i class="fa-solid fa-chevron-right"></i> Technology</a></div>
                    </div>
                </div>
                <div class="mf_4">
                    <div class="mf_4_heading">
                        <h4>Recent Posts</h4>
                    </div>
                    <div class="mf_4_list">
                        <?php
                            $stmt = $conn->prepare( 'SELECT * FROM news ORDER BY news_id DESC' );
                            $stmt->execute();
                            $news_details = $stmt->get_result();
                            while( $row = mysqli_fetch_assoc( $news_details ) ) {
                        ?>
                        <div class="flex mf_4_list_1">
                            <div class="mf_4_list_1_img">
                            <img src="Assets/image/<?php echo $row['image1']; ?>" alt="imgsjflksdfkl">
                            <a class="a ab" href="inr_news.php#<?php echo $row['title'] ?>"><?php echo $row[ 'title' ]; ?></a>

                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>

        </div>







        <!-- sub footer -->
        
    </div>
</body>
</html>