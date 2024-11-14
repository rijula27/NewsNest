<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
  <?php
include('header.php');
?>
    
<div class="content">

    <div class="">
        <div id="business" class="business " >
            <h1 class="heading">Business News</h1>
            <div class="actual-content">
                <?php
                $stmt = $conn->prepare( 'SELECT * FROM news 
                INNER JOIN news_category ON news.category_id = news_category.category_id 
                WHERE news_category.category_name = "Business" ORDER BY news_id DESC' );
                $stmt->execute();
                $news_details = $stmt->get_result();
                while( $row = mysqli_fetch_assoc( $news_details ) ) {
                ?>
            <div class="card">
                <h3><?php echo $row['title']; ?></h3>
                <img src="Assets/image/<?php echo $row['image1']; ?>" alt="">
                <p class="caption"> <?php echo $row['content']; ?></p>
                    <p class="date">Date : <?php echo $row['published_date']; ?></p>
            </div>
            <?php
                }
            ?>
        </div>
        
        </div>

        <hr>

        <div class="technology " id="technology">
            <h1 class="heading"> Technology News</h1>

            <div class="actual-content">
            <?php
                $stmt = $conn->prepare( 'SELECT * FROM news 
                INNER JOIN news_category ON news.category_id = news_category.category_id 
                WHERE news_category.category_name = "Technology" ORDER BY news_id DESC' );
                $stmt->execute();
                $news_details = $stmt->get_result();
                while( $row = mysqli_fetch_assoc( $news_details ) ) {
                ?>
            <div class="card">
            <h3><?php echo $row['title']; ?></h3>
                <img src="Assets/image/<?php echo $row['image1']; ?>" alt="">
                <p class="caption"> <?php echo $row['content']; ?></p>
                    <p class="date">Date : <?php echo $row['published_date']; ?></p>
            </div>

            <?php
                }
            ?>
            
        </div>
        </div>

        <hr>

        <div class="sports " id="sports">
            <h1 class="heading">Sports News</h1>
            <div class="actual-content">

            <?php
                $stmt = $conn->prepare( 'SELECT * FROM news 
                INNER JOIN news_category ON news.category_id = news_category.category_id 
                WHERE news_category.category_name = "Sports" ORDER BY news_id DESC');
                $stmt->execute();
                $news_details = $stmt->get_result();
                while( $row = mysqli_fetch_assoc( $news_details ) ) {
                ?>
            <div class="card">
            <h3><?php echo $row['title']; ?></h3>
                <img src="Assets/image/<?php echo $row['image1']; ?>" alt="">
                <p class="caption"> <?php echo $row['content']; ?></p>
                    <p class="date">Date : <?php echo $row['published_date']; ?></p>
            </div>
            <?php
                }
            ?>
            
        </div>
        
        </div>

        <hr>

        <div class="sports " id="sports">
            <h1 class="heading">Sports News</h1>
            <div class="actual-content">

            <?php
                $stmt = $conn->prepare( 'SELECT * FROM news 
                INNER JOIN news_category ON news.category_id = news_category.category_id 
                WHERE news_category.category_name = "Sports" ORDER BY news_id DESC');
                $stmt->execute();
                $news_details = $stmt->get_result();
                while( $row = mysqli_fetch_assoc( $news_details ) ) {
                ?>
            <div class="card">
            <h3><?php echo $row['title']; ?></h3>
                <img src="Assets/image/<?php echo $row['image1']; ?>" alt="">
                <p class="caption"> <?php echo $row['content']; ?></p>
                    <p class="date">Date : <?php echo $row['published_date']; ?></p>
            </div>
            <?php
                }
            ?>
            
        </div>
        
    </div>

</div>

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



<style>
        .actual-content{
            max-width:1500px;
            width:95%;
            /* margin: 30px auto; */
            margin: 70px auto auto 100px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: auto;

        }


        .heading{
            text-align: center;
            font-size: 2.5rem;
            font-weight: 900;
            font-family: Arial, Helvetica, sans-serif;
            margin: 40px auto;
        }

        hr{
            border:2.5px solid rgb(0, 0, 0);
        }



       .card{
        padding: 15px;
        max-width: 550px;
        flex: 1 1 350px;
        text-align: center;
        height: auto;
        border-width: 1px;
        margin: 20px;
        overflow:hidden;
        /* box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5); */
        border-radius: 0;
       }

       .card h3{
        text-align: left;
        font-weight: 600;
       }

       .image{
        height: 75%;
        margin-bottom: 20px;
       }

       .image img{
        width: 100%;
        height: 100%;
        object-fit: cover;

       }

       .caption{
        /* padding-left: 1em; */
        margin-top:7px;
        text-align: left;
        /* line-height: 3em; */
        font-size: 1.25rem;
        font-weight:400;
       }

       /* .caption p{
        font-size: 2.5rem;
       } */

       .date{
        text-align: left;
        font-size: 1.25rem;
        font-weight:900;
       }
</style>
  </body>
</html>
