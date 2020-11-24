<?php
error_reporting(0);
include('include/home_header.php');
?>

  <?php
  include('db/connection.php');
  
  $query=mysqli_query($conn,"select * from about");
    while ($row=mysqli_fetch_array($query)) {
    $title=$row['title'];
    $subtitle=$row['subtitle'];
    $description=$row['description'];
    $caption1=$row['cap1'];
    $description1=$row['des1'];
    $caption2=$row['cap2'];
    $description2=$row['des2'];

?>

  <div class="row py-4">
    <div class="col-md-8">

<!--About the website -->
      <div class="card">
        <img src="https://quotefancy.com/media/wallpaper/3840x2160/2972448-Rolf-Dobelli-Quote-News-is-to-the-mind-what-sugar-is-to-the-body.jpg" class="card-img-top">
        <div class="card-body">
          <h2 class="card-title bg-warning p-2"><?php echo $title;?></h4>
          <h4 class="card-title font-italic"><u><?php echo $subtitle;?></u></h4>
          <p class="card-text m-3" style="font-size: 18px;"><?php echo $description;?></p>
          <a href="home.php" class="h6">To Home</a>
        </div>
      </div>
    <?php } ?>

    </div>
    <div class="col-md-4">
      
<!--Side Info -->
      <div class="card">
        <div class="card-body">
          <h4 class="card-title bg-info p-2"><?php echo $caption1;?></h4>
          <p class="card-text p-2"><?php echo $description1;?></p>
        </div>
      </div>

      <br>
     <img src="https://thumbs.gfycat.com/EvilImpartialHart-small.gif" style="border-style: solid; border-width: 6px;" alt="gif">
     <br><br>

      <div class="card">
        <div class="card-body">
          <h4 class="card-title bg-info p-2"><?php echo $caption2;?></h4>
          <p class="card-text p-2"><?php echo $description2;?></p>
        </div>
      </div>

    </div>
  </div>

</div>
<br><br><br><br>

<!--Including Footer-->
<?php
include ('include/home_footer.php');
?>





