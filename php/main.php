<?php
   session_start();
   include_once("dbconnect.php");
  
$email=$_SESSION ["email"];
$password=$_SESSION ["password"];

?>

<!DOCTYPE html>
<html>
   <head>
      <title>Main Page</title>
      <link rel="shortcut icon" type="image" href="../images/edit1.png">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="../js/valida.js"></script>
      <link rel="stylesheet" href="../css/style.css">
   </head>
   <body>
      <div class="header">
         <a class="logout" href="../index.html"><i class="fa fa-sign-out"></i></a>
         <img src="../images/edit1.png" alt="Logo">
         <h1>Welcome to Nanji Rice Shop</h1>
         <p>Main Page</p>
      </div>
      <div class="navbar">
         <a href="../php/newproduct.php" class="right">Add food</a>
      </div>
      <div class="main">
         <center>
            <h1 style="margin-top:-2%;">Welcome <?php echo $email?> to Nanji Rice Shop</h1>
            <br><br>
            <!-- <img src="../images/logocloth.png"> -->
            <h2>Food List</h2>
         </center>
      </div>
      <div class="navbar1">
        <form action="search.php" method="POST" align="right">
            <div class="row">
                <div class="column1">
                  <input type="text" id="idname" name="prname" placeholder="Food name..">
                </div>
                <div class="column1">
                    <select id="idtype" name="prtype">
                        <option value="all">All</option>
                        <option value="hainan">Hai Nan</option>
                        <option value="steamed">Steamed</option>
                        <option value="grilled">Grilled</option>
                        <option value="blacksource">Black Source</option>
                    </select>
                </div>
                <div class="column1">
                    <button type="submit" name="button" value="search"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
      </div>
      <div class="row">
         <?php
            $conn = mysqli_connect("localhost","root","") or die("Unable to connect");
            mysqli_select_db($conn,"cokcok");
            
            $sql ="SELECT * FROM tbl_products ORDER BY prid DESC";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
            	while($row=mysqli_fetch_assoc($result)){
         ?>
         <div class="column-card" >
            <div class="card">
               <div class="left">
                  <!-- <div style="float:left;width:25%;text-align:center;padding:10px 50px 18px 50px"> -->
                  <img src = "/ShuSeeYong/lab3/images/<?php echo $row['image'];?>" height=80% width=80%/>
               </div>
               <div class="right">
                  <h3 style="color:black"><?php echo $row['prname']; ?></h3>
                  <p>Food Type: &nbsp&nbsp<?php echo $row['prtype']; ?></p>
                  <p>Food Price: <?php echo $row['prprice']; ?></p>
                  <p>Quantity: &nbsp&nbsp<?php echo $row['prqty']; ?></p>
               </div>
            </div>
         </div>
         <?php
            }}
         ?>
      </div>
      <br>
      <br>
      <a href="newproduct.php" class="float">
      <i class="fa fa-plus my-float"></i>
      <span class="tooltiptext">Add New Food</span>
      </a>
      <div class="footer">
         <p>copyright <span>&#169;</span> 2021 Seeyong</p>
      </div>
   </body>
</html>