<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="utf-8">
         <title>BuyNow | High Quality products</title>
         <link rel="icon" type="image/png" href="icons/search-icon.png">
        <script language="JavaScript" type="text/JavaScript">
             
            function updateUser(username){
                var ajaxUser = document.getElementById("userinfo");
                ajaxUser.innerHTML = "<pre>Welcome:<b> " + username + " </b><a href=\"welcome.php?logout=1\"> Log Out </a></pre>";
            }
            function submit(){
                var form = document.querySelector("header > form");
                form.submit();
            }
        </script> 
        <link rel="stylesheet" href="styles/headerStyle.css"> 
    </head>
    
    <body>
        <header>
                <a href = "index.php">BuyNow</a>
                <form method = "POST" action = "itemlist.php?search=1">
                    <input placeholder = "Search for items..." id = "search" size = "40" type = "search" name = "search">
                    <button id ="searchBtn" onclick = "submit()" id = "searchButton"><img width = "30" height = "25" src = "icons/search-icon.png"></button>
                </form>
                    <?php
                        if (session_status() == PHP_SESSION_NONE) {
                            echo "<span id=\"userinfo\"><a class = 'inup' href=\"login.php\">Login</a>&nbsp;&nbsp;
                            &nbsp;<a class = 'inup' href=\"signup.php\">Signup</a></span>";
                            session_start();
                        }
                        if(isset($_SESSION['name']))
                            printf("<SCRIPT>updateUser('%s');</SCRIPT>", $_SESSION['name']);
                    ?> 
                    
        </header>
               
        
        <nav>
                    <a href="index.php">Home</a>
                    <div class="dropdown">
                        <button class="dropbtn">Electronics</button> 
                        <div class="dropdown-content">
                            <a href="itemlist.php?category=CellPhone">Smart Phones</a>
                            <a href="itemlist.php?category=Laptops">Laptops</a>
                            <a href="itemlist.php?category=Cameras">Cameras </a>
                            <a href="itemlist.php?category=Televisions">Televisions</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="dropbtn">Home & Furniture</a>
                        <div class="dropdown-content" id = "c">
                            <a href="itemlist.php?category=Kitchen">Kitchen Essentials</a>
                            <a href="itemlist.php?category=Bath">Bath Essentials</a>
                            <a href="itemlist.php?category=Furniture">Furniture</a>
                            <a href="itemlist.php?category=Dining">Dining & Serving</a>
                            <a href="itemlist.php?category=Cookware">Cookware</a>
                         </div>
                    </div>
                    <a href="itemlist.php?category=Books">Books</a>
        </nav>

        <footer>
    
        </footer>
    </body>
</html>