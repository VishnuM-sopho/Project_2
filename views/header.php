<?php require("../views/title.php"); ?>
<!DOCTYPE html>

<html>

    <head>

        <link href="../public_html/css/style.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title><?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>OLX CLONE</title>
        <?php endif ?>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <script src="../public_html/js/scripts.js"></script>

    </head>

    <body>
        
        <style>
         @import url(http://fonts.googleapis.com/css?family=Raleway);

nav {
   font-family: Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif;
	margin-top: 40px;
  padding: 20px;
  
  text-align: center;
  box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
}
#nav-1 {
  background: #5175C0;
  opacity : 0.85;
}

.link-1 {
  transition: 0.3s ease;
  background: #5175C0;
  color: #ffffff;
  font-size: 24px;
  text-decoration: none;
  border-top: 4px solid #5175C0;
  border-bottom: 4px solid #5175C0;
  padding: 16px 0;
  margin: 0 20px;
}
.link-1:hover {
  border-top: 4px solid #ffffff;
  border-bottom: 4px solid #ffffff;
  padding: 6px 0; 
}

h1 { color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 80px; font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center; }
h4 { color: #111; font-family: 'Helvetica Neue', sans-serif; font-size:20px; font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center; }

p{ color: #7a7c7f; font-size: 29px; font-family: "Libre Baskerville", serif; line-height: 45px; text-align: center; text-shadow: 0 1px 1px #fff; padding-top: 20px; }
        </style>
       <div class="container">

            <div id="top">
                <div>
                   
                         <?php if (empty($_SESSION["id"])): ?>
                           <nav id="nav-1">
                                <a class="link-1" href="../public_html/login_form.php">Go back to Login</a>&nbsp;&nbsp;
                            <a class="link-1" href="../public_html/register_form.php">Go back to Register</a>&nbsp;&nbsp;
                            </nav>
                        <?php endif ?>
                        
                       <?php if (!empty($_SESSION["id"])): ?>
                           <nav id="nav-1">
                                <a class="link-1" href="../public_html/postad.php?id=<?php echo $_SESSION['id'];?>">Sell item</a>&nbsp;&nbsp;
                            <a class="link-1" href="../public_html/password_form.php">  Change Password</a>
                            <a class="link-1" href="../public_html/store.php">Store</a>
                            <a class="link-1" href="../models/logout.php">Logout</a>
                                                    </nav>
                        <?php endif ?>
                    
                </div>
                
                <?php if (!empty($_SESSION["id"])): ?>
                    <h4>Hey, <?= $user_name ?> :)</h4>
                <?php endif ?>
                
                <?php if (!empty($_SESSION["id"]) && (basename($_SERVER["SCRIPT_FILENAME"]) == "index.php" || basename($_SERVER["SCRIPT_FILENAME"]) == "store.php")): ?>
                
                <nav class="navbar navbar-inverse">
                    <ul class="nav navbar-nav">
                        <?php
                            if(basename($_SERVER["SCRIPT_FILENAME"]) == "index.php")
                                $current = "";
                            else
                                $current = basename($_SERVER["SCRIPT_FILENAME"]);
                            
                            printf('<li><a href="/%s">%s</a></li>', $current, $category[1]);
                            for($i=2; $i<sizeof($category); $i++)
                                printf('<li><a href="/%s?category=%d">%s</a></li>', $current, $i, $category[$i]);
                        ?>
                        <li><a href="/logout.php"><strong>Log Out</strong></a></li>
                    </ul>
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Your Account&nbsp;&nbsp; </a></li>
                    </ul>
                </nav>
                
                <?php endif ?>
            </div>

            <div id="middle">
