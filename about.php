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
<div class="actual-content">
    <div class="a-heading">
      <h1>About Us</h1>
    </div>

    <div class="flex box">
      <div class="image">
        <img src="Assets/image/company history.png" alt="It's an image" />
      </div>
      <div class="body">
        <h5>ABOUT US</h5>
        <div class="sub-heading">
          <h1>Company History</h1>
        </div>
        <p>
        The News Nest is a dynamic and innovative news portal and bulletin
         board website, conceived as a semester project for the MCA 2nd semester.
          The project was initiated in January 2024 by Rijul Ali and Kaustav Jyoti
           Das, under the expert guidance of Miss Chandrani Borah and Mr. Abhinash Borah.

          From its inception, The News Nest aimed to provide comprehensive news 
          coverage across various categories, including International, National,
           Regional, Sports, and Business. The platform also includes a feature for
            user-generated content, allowing approved users to contribute articles, 
            thereby fostering a collaborative and engaging news community.

            Rijul and Kaustav's vision, combined with the invaluable mentorship
             of Miss Chandrani Borah and Mr. Abhinash Borah, has led to the development 
             of a robust and user-friendly platform that stands as a testament to their 
             hard work and dedication in the field of web development and journalism.
        </p>
      </div>
    </div>

    <div class="flex box">
      <div class="body">
        <h5>MISSION & VISION</h5>
        <div class="sub-heading">
          <h1>Mission & Vision</h1>
        </div>
        <p>
        *The News Nest* aims to be a trusted and dynamic source of 
        information, providing timely, accurate, and comprehensive 
        news across international, national, and regional landscapes. 
        We strive to empower our readers with in-depth analysis, diverse 
        perspectives, and engaging stories that inspire informed discussions
         and foster a well-informed community.


        Our vision at *The News Nest* is to become the leading news platform 
        known for its integrity, innovation, and commitment to excellence in 
        journalism. We aspire to bridge the gap between global and local news,
         offering a platform where voices from all walks of life can be heard, 
         stories can be shared, and communities can connect. Through continuous
          growth and adaptation to the digital age, we aim to shape the future
           of news dissemination and uphold the highest standards of media integrity.
        </p>
      </div>
      <div class="image">
        <img src="Assets/image/mission-vision.jpg" alt="It's an image" />
      </div>
    </div>

    <div class="box" style="height: auto">
      <div class="main">
        <div class="our-team">
          <h1>Our Team</h1>
        </div>
        <p>
        Our team of Mentors and our developers has worked tirelessly 
        in making this project successful. The goal that we once had was
         accomplished with the combined effort of the whole team.
        </p>
      </div>

      <div class="flex">
        <div class="i-card">
          <div class="image">
            <img src="Assets/image/Chandrani Maam.jpg" alt="" />
          </div>
          <div class="name">
            <h2 style="">Miss. Chandrani Bora</h2>
            <h4 style="font-family: 'Times New Roman', Times, serif; ; margin-top:0;">Mentor</h4>
          </div>
          <div class="details">
            <p>
            Miss Chandrani Borah, has been instrumental in guiding the
             development of The News Nest. Her guidance has been pivotal 
             in shaping the project, providing insightful feedback and fostering 
             a collaborative learning environment durnig the development of our project.
            </p>
          </div>
        </div>

        <div class="i-card">
          <div class="image">
            <img src="Assets/image/Abinash bora.jpg" alt="" />
          </div>
          <div class="name">
            <h1>Mr Abhinash Bora</h1>
            <h4 style="font-family: 'Times New Roman', Times, serif; ; margin-top:0;">Mentor</h4>
          </div>
          <div class="details">
            <p>
            Mr. Abhinash Borah has provided invaluable guidance and support
             throughout the project. His expertise in the field, combined with a
              practical approach to problem-solving, has helped shape the vision and 
              execution of The News Nest
            </p>
          </div>
        </div>

        <div class="i-card">
          <div class="image">
            <img src="Assets/image/Ra.jpg" alt="" />
          </div>
          <div class="name">
            <h1>Rijul Ali</h1>
            
            <h4 style="font-family: 'Times New Roman', Times, serif; ; margin-top:0;">Developer</h4>
          </div>
          <div class="details">
            <p>
            Rijul Ali, the developer and main coder of The News Nest,
             has been the driving force behind the project's technical 
             
             execution. With a strong foundation in web development and a 
             keen eye for detail, Rijul has meticulously crafted the website's 
             architecture and functionality.
            </p>
          </div>
        </div>
        
      </div>
      <div class="flex" style = "justify-content: space-around;">
        <div class="i-card">
          <div class="image">
            <img src="Assets/image/Kaustav dp.jpg" alt="" />
          </div>
          <div class="name">
            <h1>Kaustav Jyoti Das</h1>
            
            <h4 style="font-family: 'Times New Roman', Times, serif; ; margin-top:0;">Developer</h4>
          </div>
          <div class="details">
            <p>
            Kaustav Jyoti Das, serving as the developer, designer, and planner for The News Nest,
             has been instrumental in shaping the project's vision and user experience. His meticulous 
             
             planning and strategic approach have guided the project from inception to execution, making 
             The News Nest a comprehensive and dynamic news portal. Kaustav's multifaceted skills and 
             dedication have been key to the project's overall success.
            </p>
          </div>
        </div>

        <!-- <div class="i-card">
          <div class="image">
            <img src="Assets/image/my profile.jpg" alt="" />
          </div>
          <div class="name">
            <h1>Rijul Ali</h1>
          </div>
          <div class="details">
            <p>
              Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
              cupidatat non proident, sunt in culpa qui officia deserunt mollit
              anim id est laborum.
            </p>
          </div>
        </div> -->
        
      </div>
    </div>
    </div>
    <?php
include('main_footer.php');
include('sub_footer.php');
?>
    
  </body>

  <style>
    /* Temp */
    /* .flex {
      display: flex;
      justify-content: space-between;
      align-items: center;
    } */

    /* End of temp */
    .actual-content{
      margin-top: 130px;
    }

    .box {
      width: 75vw;
      height: 55vh;
      margin: auto;
      margin-bottom: 100px;
      overflow: hidden;
    }

    .image {
      height: 100%;
      width: 47%;
    }

    .image img {
      width: 100%;
      height: 100%;
    }

    .box .body {
      height: 100%;
      width: 47%;
    }

    .box .body h5 {
      font-family: Arial, Helvetica, sans-serif;
      color: grey;
    }

    .box .body .sub-heading,
    .main {
      font-size: 1.8rem;
    }
    .box .body .sub-heading h1,
    .our-team h1 {
      color: rgba(0, 0, 0, 0.825);
      font-weight: 100;
    }

    .our-team {
      text-align: center;
      
    }

    .our-team h1 {
      margin-bottom: 0;
      font-size: 2em;
    }

    .main p {
      font-size: 1rem;
      width: 50%;
      text-align: center;
      margin: auto;
    }

    .i-card {
      align-items: center;
      width: 27%;
      margin-top: 50px;
    }

    .i-card .image {
      margin: 0 auto;
      width: 150px;
      height: 150px;
      border-radius: 50%;
    }

    .i-card .image img {
      border-radius: 50%;
    }

    .i-card .name {
      text-align: center;
    }

    .i-card .name h1 {
      color: rgba(0, 0, 0, 0.825);
      margin-top: 5px;
    }

    .details {
      text-align: center;
    }

    .a-heading h1{
      text-align: center;
      font-size: 70px;
    }
  </style>
</html>
