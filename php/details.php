<?php 
require "connect.php";//connect to the db
if(isset($_GET["id"])){//check the id
  $id = $_GET["id"];
  //store the request for annouce table and run it
  $query = $conn->query("SELECT * FROM real_estate_gallery WHERE `id` = $id"); 
  $array = $query->fetch(PDO::FETCH_ASSOC);
} 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Infos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style_detail.css">
    <link rel="stylesheet" href="../css/home.css">
  </head>
  <body>
    <div>
      </div>
      <div class = "card-wrapper">
        <div class = "card">
          <div class = "product-imgs">
          <button class="btn"><a href="user.php">Back home</a></button>
          <div class = "img-display">
            <div class = "img-showcase">
              <img src = "../img/1.png" alt = "shoe image">
              <img src = "../img/2.png" alt = "shoe image">
              <img src = "../img/3.png" alt = "shoe image">
              <img src = "../img/4.png" alt = "shoe image">
            </div>
          </div>
          <div class = "img-select">
            <div class = "img-item">
              <a href = "#" data-id = "1">
                <img src = "../img/1.png" alt = "shoe image1">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "2">
                <img src = "../img/2.png" alt = "shoe image2">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "3">
                <img src = "../img/3.png" alt = "shoe image3">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "4">
                <img src = "../img/4.png" alt = "shoe image4">
              </a>
            </div>
          </div>
        </div>
        <div class = "product-content">
          <h2 class = "product-title"><?php if(isset($_GET["id"])){echo $array["title"];} ?></h2>
          <a href = "#" class = "product-link"><?php if(isset($_GET["id"])){echo $array["category"];} ?></a>
          <div class = "product-price">
            <p class = "new-price">Price: <span><?php if(isset($_GET["id"])){echo $array["price"];} ?> DH</span></p>
          </div>
          <div class = "product-detail">
            <h2>Description :</h2>
            <p><?php if(isset($_GET["id"])){echo $array["description"];} ?></p>
            <ul>
              <li>Size : <span><?php if(isset($_GET["id"])){echo $array["surface"];} ?> m2</span></li>
              <li>Category: <span><?php if(isset($_GET["id"])){echo $array["category"];} ?></span></li>
              <li>Location : <span><?php if(isset($_GET["id"])){echo $array["country"];} ?>,<?php if(isset($_GET["id"])){echo $array["city"];} ?></span></li>
              <li>Publication Date: <span><?php if(isset($_GET["id"])){echo $array["publication_date"];} ?></span></li>
              <li>Zip Code: <span><?php if(isset($_GET["id"])){echo $array["zip_code"];} ?></span></li>
            </ul>
          </div>
          <div class="purchase-info">
            <button class="btn" onclick="document.getElementById('product_info').style.display='block';" id="del">Contact Seller</button>
          </div>
        </div>
      </div>
    </div>


    <div id="product_info" class="product_info" style="display: none;">
        <div class="content">
          <span onclick="document.getElementById('product_info').style.display='none'" class='close' title="Close">&#10005;</span>
          <h2>Message</h2>
          <hr>
          <div id="message">
            <h3>that is the seller number :</h3>
            <p><?php if(isset($_GET["id"])){echo $array["Phone"];} ?></p>
          </div>
          <hr>
          <div class="btns">
          <a  onclick="document.getElementById('product_info').style.display='none'" class="cancel">CANCEL</a>
          </div>
      </div>
    </div>

    <script src="../js/app.js"></script>
  </body>
</html>