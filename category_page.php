<?php
error_reporting(0);
include('include/home_header.php');
?>

 <div class="card" style="width:100%; border-color: black; border-width: thick;">
  <img class="card-img-top" src="https://schools.firstnews.co.uk/wp-content/uploads/sites/3/2019/11/Features-of-a-newspaper-report-Featured.jpg" alt="Card image" style=" height: 380px; border-style: solid; border-color: lightblue; border-width: 8px;" >
</div>
<br><br>


<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic bg-light text-muted">Find with FOCUS</h3>
      <hr>

  <?php 
  include('db/connection.php');
  $id=$_GET['single'];

  $query1=mysqli_query($conn,"select * from post where category='$id' ");
  while ($row=mysqli_fetch_array($query1)) {
    
  ?>
  <div class="blog-post">
        <h2 class="blog-post-title"><a href="single_page.php?single=<?php echo $row['id']; ?>" ><?php echo $row['title']; ?> </a></h2>
        <p class="blog-post-meta"><?php echo $row['date']; ?> <a href="#"><?php echo $row['admin']; ?></a></p>
        <p><img class="img img-thumbnail" src="images/<?php echo $row['thumbnail']; ?>" style="height: 350px; width: 650px;" ></p>
        <hr>
        
        <blockquote>
          <?php echo substr($row['description'],0,300); ?>
          <a href="single_page.php?single=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Read More</a>
        </blockquote>

      </div><!-- /.blog-post -->

    <?php } ?>
     
    </div><!-- /.blog-main -->

 <aside class="col-md-4 blog-sidebar">
      <div class="mt-3 px-4 py-2 ml-2" style="background-color: rgb(245, 218, 137);">
        <h4 class="font-italic">Categories</h4>
        <hr>
        <ol class="list-unstyled mb-0">
          <?php
          include('db/connection.php');
          $query1=mysqli_query($conn,"select * from category");
          while ($row=mysqli_fetch_array($query1)) {
            
          ?>
          <li><a  class="cat_list" href="category_page.php?single=<?php echo $row['category_name']; ?>"><?php echo $row['category_name']; ?></a></li>
        <?php } ?>
        </ol>
      </div>
      <br><br>

     <!--Covid-19 blog start-->
      <div class="p-4 my-5 mx-3 bg-light rounded w-100">
        <h4 class="font-italic">Coronavirus (COVID-19) disease</h4>
        <hr>
        <h5>Overview</h5>
         <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSuTBeXovjB6zJy4H4ZDG09aAAf1HHpMbgBhQ&usqp=CAU" style="height: 180px; 
        width: 300px;"> <br><br>
        <p class="mb-0">Coronavirus disease (COVID-19) is<em>an infectious disease caused by a newly discovered coronavirus.</em>Most people infected with the COVID-19 virus will experience mild to moderate respiratory illness and recover without requiring special treatment. <br>Older people, and those with underlying medical problems are more likely to develop serious illness.</p>
        <br>
        <p class="p-2 text-success">To know more <a href="https://www.who.int/"><em>visit here</em></a>
      </div>
<!--Covid-19 blog end-->
      <br><br><br>
   
<h2 class="font-italic pl-3 m-4 bg-warning">Focus on Positive's</h2> <hr>   
    <?php 
  include('db/connection.php');
  $query1=mysqli_query($conn,"select * from positives order by date desc limit 3");
  while ($row=mysqli_fetch_array($query1)) {
    $date=$row['date'];
    $title=$row['title'];
    $thumbnail=$row['image'];
  
  ?>

    <div class="col-md-12">
      <div class="card flex-md-row mb-4 box-shadow h-md-250">
        <div class="card-body d-flex flex-column align-items-start">
          <h6 class="mb-0">
            <a href="single_page.php?single=<?php echo $row['id']; ?>" class="text-dark"><?php echo $title; ?></a>
          </h6>
          <div class="mb-1 text-muted"><?php echo $date; ?></div>
          <a class="font-weight-bold" href="pos_page.php?single=<?php echo $row['id']; ?>">Continue reading</a>
        </div>
        <img class="card-img-right my-3 pr-2" src="images/<?php echo $thumbnail; ?>" style="height: 150px; 
        width: 150px; " >
      </div>
    </div>
  
<?php } ?>
  </div>

  <!--Positive news section end-->
    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->

</main><!-- /.container -->

<!--Including Footer-->
<?php
include ('include/home_footer.php');
?>
