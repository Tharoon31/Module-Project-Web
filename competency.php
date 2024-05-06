<?php
// Include the session.php file to enforce session-based authentication
include('session.php');
?>
<DOCTYPE html> 
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" <meta name="viewport" content="width=device-width,initial-scale=1.0"> 
    <title>javaboi</title>
    <link rel="stylesheet" href="style.css">
    </head>
    <style>
  /* Center the content */
  body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }

  /* Style the h3 element */
  h3 {
    font-size: 25px; /* Adjust the font size as needed */
    color: black;
    text-align: center;
    margin-left: 32px;
  }
</style>
    <body>
       <header>
           <h2 class="logo"><a href="#"></a><img src="p.png"style="
        height: 50px;"><img src="R.png"style="
        height: 50px;"></h2>
               <nav class="navigation"> <a href="#">Home</a>
                     <a href="#">About</a>                
                     <a href="profile.php">Profile</a>
                     <a href="login.html" class="btnlogout">LOG OUT</a>
                </nav>
      </header>
      <div class="parrot">
    <img src="h.png" alt="parrot"style="
    height: 300px;
    position: relative;
    left: 60px;
    top:35px;
" />
 <h3 style="
    position:relative;
    bottom: -25px;">Choose your competency</h3>
    </div>
      <div class="competency_box">
        <nav class="difficulty"style="
    position: relative;
    top: 30px;
"> <a href="topic.php" class="btn">BEGINNER</a>
              <a href="topicinter.php" class="btn">INTERMEDIATE</a>
              <a href="topicexpert.php" class="btn">EXPERT</a>
        </nav>
      </div>
    </body>