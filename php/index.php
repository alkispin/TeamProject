<?php
$conn = mysqli_connect("localhost","root","","airparking");

echo "connected";

  if (!$conn) {
    echo("Connection failed: " . mysqli_connect_error());
  }

if(!empty($_SESSION["user_id"])){
    $user_id = $_SESSION["user_id"];
    $result = mysqli_query($conn,"SELECT * FROM users WHERE user_id = $user_id");
    $row = mysqli_fetch_array($result);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Link to CSS-->
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    

     <!--Box icons-->
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Parking</title>
</head>
<body>

    <!--Navbar-->
    <header>
        <a href="#" class="logo"><img src="../img/logo.png" alt="Logo Icon"></a>
        <div class=" bx bx-menu" id="menu-icon"></div>
        <ul class="navbar">
            <li><a href="#home">Home</a></li>
            <li><a href="#howto">How to </a></li>
            <li><a href="#about">About us</a></li>
            <li><a href="../form.php">Create a Parking</a></li>
            <li><a href="viewPark.php">View Available Spots</a></li>
            <!--<li><a href="#">Select5</a></li>-->
        </ul>
        <div class="header-btn">
            <a href="logout.php" class="signIn">Logout</a>
        </div>
    </header>
    <!--Login-->
            <div class="sign-container" id="sign-container"> 
                <div class="sign-content" id="sign-content">
                    <i class='bx bx-x' id="closeform"></i>
                    <form action="php/logout.php" id="logout" method="POST">
                        <h1 id="h1signin">Sign In</h1>          
                        <div class="form-control-others">
                            <div class="sign-Btn" id="signIn-Btn">
                                <input type="submit" value="Logout">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
      

      <!--Search-->
    <section class="home" id="home">
        <h1 id="text"><span>Looking</span> for a <br>Parking Spot?</h1>
        <div class="form-container">
            <form action="searchSpotUser.php" id="searchSpot" method="POST">
                <div class="input-box">
                    <span>Area</span>
                        <select id="area" name="area" required>
                            <option value=""disabled selected>Select An Area</option>
                            <option value="Evosmos">Evosmos</option>
                            <option value="Thessaloniki">Thessaloniki</option>
                            <option value="Kalamaria">Kalamaria</option></select><br>
                    </select>
                   
                </div>
                <div class="input-box">
                    <span>Parking Time</span>
                    <input type="datetime-local" name="" id="time1">
                </div>
                <div class="input-box">
                    <span>Leaving Time</span>
                    <input type="datetime-local" name="" id="time2">
                </div>
                <input type="submit" name="" id="" class="btn" value="Search">
            </form>
        </div>
    </section>

    <!--How to-->
    <section class="howto" id="howto"> 
        <div class="heading">
            <span>How Its Works</span>
            <h1> Find Parking With 3 Easy Steps</h1>
        </div>
        <div class="howto-container">
            <div class="box">
                <i class='bx bxs-map'></i>
                <h2>Choose a location</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam dolor eius ducimus nostrum similique dolore, enim mollitia magni recusandae nobis deleniti harum at maxime omnis repudiandae minima quasi unde obcaecati!</p>
            </div>
            <div class="box">
                <i class='bx bxs-calendar-check'></i>
                <h2>Pick up Date</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam dolor eius ducimus nostrum similique dolore, enim mollitia magni recusandae nobis deleniti harum at maxime omnis repudiandae minima quasi unde obcaecati!</p>
            </div>
            <div class="box">
                <i class='bx bxs-calendar-star'></i>
                <h2>Park you Car</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam dolor eius ducimus nostrum similique dolore, enim mollitia magni recusandae nobis deleniti harum at maxime omnis repudiandae minima quasi unde obcaecati!</p>
            </div>
        </div>
    </section>

    <!--ΑBout-->
    <section class="about" id="about">
        <div class="heading">
            <span>About Us</span>
            <h1> Best Customer Experience</h1>
        </div>
        <div class="about-container">
            <div class="about-img">
                    <img src="../img/aboutUs.jpg" alt="aboutusimg">
            </div>
            <div class="about-text">
                <span>About us</span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, voluptates voluptatem possimus, sint optio ipsam nihil ducimus nisi sed dolore quia corporis omnis facere culpa veniam. Est adipisci tempore aut?</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur itaque facere, blanditiis id quasi repellat. Suscipit nemo itaque, quos, numquam odio soluta unde doloremque repellendus, quia totam hic placeat. Vel!</p>
                <a href="#" class="btn">Learn More</a>
            </div>
        </div>
    </section>
<!--Copyright-->
<footer class="copyright" id="copyright">
    <div class="Copyright-container">
        <p>Copyright &#169; 2024 Stairway to Heavens. All Rights Reserved</p>
    </div>
</footer>

    <!--Link to Js-->
    <script src="js/index.js"></script>
</body>
</html>






