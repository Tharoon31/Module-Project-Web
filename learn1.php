<?php
// Include the session.php file to enforce session-based authentication
include('session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Javaboi</title>
    <link rel="stylesheet" href="styles1.css">
</head>
<header>
    <h2 class="logo"><a href="#"></a><img src="p.png"style="
        height: 50px;"><img src="R.png"style="
        height: 50px;"></h2>
    <nav class="navigation">
        <a href="competency.php">Competency</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
        <a href="login.html" class="btnlogout">LOG OUT</a>
    </nav>
</header>
  <body>
    <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
<div>
<section class="video-section">
    <article id="player1"></article>
    <article id="player2"></article>
    <article id="player3"></article>
</section>
</div>

    <script>
      // 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');
      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. Variables to track the number of videos and watched videos
      var totalVideos = 3;
      var watchedVideos = 0;

      // 4. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      function onYouTubeIframeAPIReady() {
        // Video 1
        createPlayer('player1', 'ealk6KXYjaA');
        
        // Video 2
        createPlayer('player2', 'DT-7eRsaiIk');
        
        // Video 3
        createPlayer('player3', 'av0oBYKjazs');

       
      }

      function createPlayer(playerId, videoId) {
        window[playerId] = new YT.Player(playerId, {
          height: '215',
          width: '360',
          videoId: videoId,
          playerVars: {
            'playsinline': 1
          },
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      // 5. The API will call this function when each video player is ready.
      function onPlayerReady(event) {
        event.target.playVideo();
      }

      // 6. The API calls this function when the player's state changes.
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.ENDED) {
          console.log('Video has ended');
          watchedVideos++;

          // Check if all videos are watched
          if (watchedVideos === totalVideos) {
            console.log('All videos watched, enabling the Start Quiz button');
            document.getElementById('startQuizButton').removeAttribute('disabled');
          }
        } else if (event.data == YT.PlayerState.SEEKING) {
          console.log('User is seeking, disabling the Start Quiz button');
          document.getElementById('startQuizButton').setAttribute('disabled', true);
        }
      }
    </script>
    <div class="quizz-section">
      <a href="index1.php" class="quizz-button">
        <button id="startQuizButton" class="quizz" disabled>START QUIZZ</button>
      </a>
    </div>
  </body>
</html>