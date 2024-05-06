<?php
// Include the session.php file to enforce session-based authentication
include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Javaboi</title>
  <link rel="stylesheet" href="style4.css">
  <style>
    #question{
      padding: 20px 31px;
       border: 1px solid #000000;
       border-radius: 53px;
    }
    #answer-buttons{
      display:flex;
      flex-wrap: wrap;
    }
  </style>
</head>
<header>
  <h2 class="logo"><a href="#"></a><img src="p.png"style="
        height: 50px;"><img src="R.png"style="
        height: 50px;"></h2>
      <nav class="navigation"> <a href="competency.php">Competency</a>
            <a href="topic.php">Levels</a>                
            <a href="scoreboard.php">Scoreboard</a>
            <a href="login.html" class="btnlogout">LOG OUT</a>

       </nav>
</header>
<style>
    /* Style for the overlay background */
    .overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      align-items: center;
      justify-content: center;
    }

    /* Style for the pop-up box */
    .popup-box {
      display: none; /* Initially hide the pop-up box */
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
  </style>
<body>
  <div class="app">
    <h1>Quiz</h1>
    <div class="quiz">
      <h2 id="question">Question goes here</h2>
      <div id="answer-buttons">
        <button class="btn">Answer 1</button>
        <button class="btn">Answer 2</button>
        <button class="btn">Answer 3</button>
        <button class="btn">Answer 4</button>
      </div>
      <button id="next-btn">Next</button>
      <button id="submit-btn" class="custom-btn">Submit</button>
      <button id="playagain-btn" class="custom-btn">Play again</button>
    </div>
  </div>
  <script src="script_int.js"></script>
</body>
</html>
