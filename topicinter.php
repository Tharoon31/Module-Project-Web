<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html"); // Redirect to the login page if not logged in
    exit();
}

// Assuming you have already connected to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "javaboi";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the user's progress
$user_id = $_SESSION['user_id']; // Replace with the actual user ID
$query = "SELECT * FROM user_info WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);

$userProgress = [];

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

    // Populate the user progress array with relevant data from the user_info table
    $userProgress['level_1_points'] = $row['int_level1'];
    $userProgress['level_2_points'] = $row['int_level2'];
    $userProgress['level_3_points'] = $row['int_level3'];
    $userProgress['level_4_points'] = $row['int_level4'];
} else {
    // Handle the case when the user's progress record is not found
    echo "User progress not found.";
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/gsap@3.9.0/dist/gsap.min.js"></script>
    <title>Javaboi</title>
    <style>
        *{
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: 'Poppins', sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-size: cover;
    background-position: center;
    box-sizing: border-box;
    background-color: #99e9e9;
}

header {

position: fixed;
top: 0;
left: 0; width: 100%;
padding: 20px 100px; background:#35ded8;
display: flex;
justify-content: space-between;
align-items: center;
z-index: 99;
}
.logo {
    font-size: 2em;
    color:#fff;
    user-select: none;

}
.navigation a{
    position: relative;
    font-size: 1.1em;
    color:#fff;
    text-decoration: none;
    font-weight: 500;
    margin-left: 40px;
}

.navigation a::after {
    content:'';
    position: absolute;
    left: 0;
    bottom: -6px;
    width: 100%;
    height: 3px;
    background: #fff;
    border-radius: 5px;
    transform: scaleX(0);
    transform-origin: right;
    transition: transform .5s; 
}
.navigation a:hover::after {
    transform-origin: left;
    transform: scaleX(1);
}
.navigation .btnlogin-popup {
    width: 130px;
    height: 50px;
    background: transparent;
    border: 2px solid #fff;
    outline: none;
    cursor: pointer;
    font-size: 1.1em;
    color:#fff;
    font-weight: 500;
    margin-left: 40px;
}
.navigation .btnlogin-popup:hover {
    background:  #fff;
    color: #162938
}



/* Add the following CSS to style the logout button */

.btnlogout {
    display: inline-block;
    padding: 10px 20px;
    background-color: #35ded8;
    color: white;
    text-decoration: none;
    border: 2px #fff;
    border-radius: 5px;
    margin: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btnlogout:hover {
    background-color: #fff;
    color: #162938;
}

/*******competency page ebd here*****/

/******* TOPIC LEVEL PAGE ******/
  .grass1 {
    
    
    width: 214px;
    height: 226px;
    position: absolute;
    right: 1263px;
    top: 174px;

}
.grass2 {
    width: 214px;
    height: 226px;
    position: absolute;
    left: 329px;
     top: 300px;
}
.grass3 {
    width: 214px;
    height: 226px;
    position: absolute;
    left: 669px;
    top: 160px;
}
.grass4{
    width: 214px;
    height: 226px;
    position: absolute;
    left: 1090px;
    top: 300px;
}

.moveleft {
    margin: -64px;
    margin-top: 360px;
    width: 69px;
    height: 64px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #376076;
    color: #fff;
    cursor: pointer;
    margin-left: -94px;
    font-size: 24px;
}
.moveright {
    margin: -2px;
    margin-top: -5px;
    width: 69px;
    height: 64px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #376076;
    color: #fff;
    cursor: pointer;
    margin-left: 99px;
    position: absolute;
    font-size: 24px;
}
.bird {
    width: 191px;
    height: 168px;
    position: absolute;
    right: 1286px;
    top: 132px;
    transform: scaleX(1);
}
.level1 {
    position: absolute;
    margin-right: 10px;
    top: 450px;
    left: 115px;
    font-size: 20px;
}
.level2 {
    position: absolute;
    margin-right: 10px;
    top: 560px;
    left: 406px;
    font-size: 20px;
}
.level3 {
    position: absolute;
    margin-right: 10px;
    top: 428px;
    left: 748px;
    font-size: 20px;
}
.level4 {
    position: absolute;
    margin-right: 10px;
    top: 560px;
    left: 1164px;
    font-size: 20px;
}
.go {
    margin: -160px;
    margin-top: -51px;
    width: 66px;
    height: 62px;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #35ded8;
    color: #fff;
    cursor: pointer;
    margin-left: 4px;
    text-decoration: none;
}
h3 {
    font-size: 36px; /* Adjust the font size as needed */
    color: black;
    text-align: center;
  }
    </style>
</head>
    <header>
        <h2 class="logo"><a href="#"></a><img src="p.png"style="
        height: 50px;"><img src="R.png"style="
        height: 50px;"></h2>
        <nav class="navigation">
        <a href="competency.php">Competency</a>
            <a href="#">About</a>
            <a href="profile.php">Profile</a>
            <a href="login.html" class="btnlogout">LOG OUT</a>
        </nav>
    </header>

    <div class="level-container">
        <img class="grass1" src="bucket.png" alt="steps">
        <img class="grass2" src="bucket.png" alt="steps">
        <img class="grass3" src="bucket.png" alt="steps">
        <img class="grass4" src="bucket.png" alt="steps">
          <!-- Level 1 -->
          <div class="level1" id="level1">
           LEVEL 1
        </div>

        <!-- Level 2 -->
        <div class="level2" id="level2">
           LEVEL 2
        </div>

        <!-- Level 3 -->
        <div class="level3" id="level3">
           LEVEL 3
        </div>

        <!-- Level 4 -->
        <div class="level4" id="level4">
           LEVEL 4
        </div>
        <img class="bird" id="bird" src="ducks.gif" alt="bird" width="500" height="300">
        <div>  
        <button class="moveleft" onclick="moveLeft()">⬅</button>

        <button class="moveright" onclick="moveRight()">➡</button>
       
        <a class="go" id="goLink" href="learnint.php">GO</a>
        </div>
    </div>
    
   <!-- ... (your existing HTML code) ... -->

<script>
    const levels = [
        { top: 132, left: 65 },
        { top: 330, left: 379 },
        { top: 180, left: 785 },
        { top: 345, left: 1174 }
        // Add more levels as needed
    ];

    let currentLevel = 0;
    const level1Points = <?php echo $userProgress['level_1_points']; ?>;
    const level2Points = <?php echo $userProgress['level_2_points']; ?>;
    const level3Points = <?php echo $userProgress['level_3_points']; ?>;

    function moveLeft() {
       
       const disableLeftPoint = { top: 132, left: 65 };
   
       // Check if the bird is at the point where moveLeft should be disabled
       const isDisableLeftPoint = (
           parseFloat(bird.style.top) === disableLeftPoint.top &&
           parseFloat(bird.style.left) === disableLeftPoint.left
       );
   
       if (isDisableLeftPoint) {
           alert("You can't move left from this point.");
           return;
       }
   
       currentLevel = (currentLevel - 1 + levels.length) % levels.length;
       moveToCurrentLevel();
       flipBird(-1); // Flip the bird to face left
       updateGoLink();
   
       // Enable the left button if the bird is not at the specific point
       const moveLeftButton = document.querySelector('.moveleft');
       moveLeftButton.disabled = (
           parseFloat(bird.style.top) === disableLeftPoint.top &&
           parseFloat(bird.style.left) === disableLeftPoint.left
       );
   }

    function moveRight() {
        // Check if the user has enough points to unlock the next level
        switch (currentLevel) {
            case 0:
                if (level1Points < 10) {
                    alert("You need more points to unlock the next level.");
                    return;
                }
                break;
            case 1:
                if (level2Points < 10) {
                    alert("You need more points to unlock the next level.");
                    return;
                }
                break;
            case 2:
                if (level3Points < 10) {
                    alert("You need more points to unlock the next level.");
                    return;
                }
                break;
            // Add more cases as needed
        }

        currentLevel = (currentLevel + 1) % levels.length;
        moveToCurrentLevel();
        flipBird(1); // Flip the bird to face right
        updateGoLink();
    }

    function flipBird(direction) {
        const bird = document.getElementById('bird');
        gsap.to(bird, { scaleX: direction, duration: 0 }); // Flip the bird
    }

    function moveToCurrentLevel() {
        const target = levels[currentLevel];
        const bird = document.getElementById('bird');
        gsap.to(bird, { top: target.top, left: target.left, duration: 2, onComplete: checkAndFlip });
    }

    function checkAndFlip() {
        if (currentLevel === 0) {
            // If the bird is at grass1, flip it to face right
            flipBird(1);
        }
    }

    gsap.to('.grass1', { y: '+=50', yoyo: true, repeat: -1, duration: 2 });
    gsap.to('.grass2', { y: '+=50', yoyo: true, repeat: -1, duration: 2 });
    gsap.to('.grass3', { y: '+=50', yoyo: true, repeat: -1, duration: 2 });
    gsap.to('.grass4', { y: '+=50', yoyo: true, repeat: -1, duration: 2 });

    // Function to update the 'GO' button link based on the bird's position
    function updateGoLink() {
        const goLink = document.getElementById('goLink');
        switch (currentLevel) {
            case 0:
                goLink.href = 'learnint.php'; // Change this to the desired destination
                break;
            case 1:
                goLink.href = 'learnint1.php'; // Change this to the desired destination
                break;
            case 2:
                goLink.href = 'learnint2.php'; // Change this to the desired destination
                break;
            case 3:
                goLink.href = 'index_int3.php'; // Change this to the desired destination
                break;
            default:
                goLink.href = 'learnint.php'; // Default link
        }
    }
</script>

<!-- ... (your existing HTML code) ... -->

</body>
</html>
