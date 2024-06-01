<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entry Your Parking</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/entryParking.css">
</head>
<body>
    <header>
        <a href="#" class="logo"><img src="img/logo.png" alt="Logo Icon"></a>
        <div class=" bx bx-menu" id="menu-icon"></div>
        <ul class="navbar">
        <?php
        require ('php/config.php');
        if (strcasecmp($_SESSION["username"], "admin") == 0) {
            $url = "php/AdminIndex.php";
        } else {
            $url = "php/index.php";
        }
        ?>
        <a href="<?php echo $url; ?>">
            <button>Return to Website</button>
        </a>
        </ul>
    </header>
        
    
    <div id="containerParking">
        <form action="php/CreateParking.php" id="entry" method="POST">
            <h1 id="entryP">Entry your Parking Position</h1>
            <div class="form-control">
                <label for="area"><i class='bx bx-user'></i> Area</label>
                <select id="area" name="area">
                    <option>Select Area</option>
                    <option>Evosmos</option>
                    <option>Thessaloniki</option>
                    <option>Kalamaria</option>
                </select>
                
            </div>
            <div class="form-control">
                <label for="street"><i class='bx bx-envelope'></i> street</label>
                <input type="text" name="street" id="street" placeholder="Enter your street">
            </div>
            <div class="form-control">
                <label for="description"><i class='bx bx-lock-alt' ></i> description</label>
                <textarea name="description" id="description" placeholder="Write your description"  rows="3"></textarea>
            </div>
               <div class="form-control">
                <label for="image"><i class='bx bx-lock-alt' ></i> image</label>
                <input type="file" name="img" id="img" accept=".jpg .jpeg .png" value="">
            </div>  
 
            <div class="form-control-others">
                <div class="submit" id="submit">
                    <button>submit</button>
                </div>
            </div>
            
          
        </form>
    </div>
 
    <script src=""></script>
</body>
</html>