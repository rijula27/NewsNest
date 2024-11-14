<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include('header.php');
?>




    
    <div class="content">
    <div id="article" class="article " >
            <div class="actual-content">
                <?php
                $stmt = $conn->prepare( 'SELECT * FROM article ORDER BY article_id DESC' );
                $stmt->execute();
                $article_details = $stmt->get_result();
                while( $row = mysqli_fetch_assoc( $article_details ) ) {
                    $author_stmt = $conn->prepare('SELECT user_name FROM user_account WHERE user_id = ?');
                    $author_stmt->bind_param('i', $row['user_id3']);
                    $author_stmt->execute();
                    $author_result = $author_stmt->get_result();
                    $author_row = $author_result->fetch_assoc();

                ?>
            <div class="card" id = "<?php echo $row['title']; ?>">
                <h3><?php echo $row['title']; ?></h3>
                <div class="image">
                <img src="Assets/image/<?php echo $row['image1']; ?>" alt="">
                </div>
                <p class="caption"> <?php echo $row['content']; ?></p>
                <div class="flex card-footer">
                    <p class="date">Date : <?php echo $row['published_date']; ?></p>
                    <p class = "author"> Author : <?php echo $author_row['user_name']; ?></p>
                    </div>
            </div>
            <?php
                }
            ?>
        </div>
            

            

        </div>
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



        



       .card{
        padding: 15px;
        max-width: 700px;
        flex: 1 1 550px;
        text-align: center;
        height: auto;
        border-width: 1px;
        margin: 20px;
        overflow:hidden;
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
        border-radius: 0;
       }

       .card h3{
        text-align: left;
        font-weight: 600;
       }

       .image{
        
        margin-bottom: 20px;
        border:1.5px  solid #eaecef;
        width: 50%;
       }

       .image img{
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* border:solid; */

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

       .date, .author{
        /* text-align: left; */
        font-size: 1.25rem;
        font-weight:900;
       }


       .card{
        align-items: center;
       }
       

       .card-footer{
        width: 90%;
       }


</style>
</html>