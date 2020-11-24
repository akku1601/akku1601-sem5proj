
<?php
error_reporting(0);
include('include/home_header.php');
?>


 <div class="card" style="width:100%;">
  <img class="card-img-top" src="https://prettygoodash.files.wordpress.com/2019/08/20142f052f212f4a2fsmug.d7455-796x447.jpg" alt="Card image" height="380px" >
</div>
<br>

<div class="row mb-2">
 <?php 
  include('db/connection.php');
  $query1=mysqli_query($conn,"select * from post order by id desc limit 2");
  while ($row=mysqli_fetch_array($query1)) {
    $category=$row['category'];
    $date=$row['date'];
    $title=$row['title'];
    $thumbnail=$row['thumbnail'];
  
  ?>

    <div class="col-md-6">
      <div class="card flex-md-row mb-4 box-shadow h-md-300">
        <div class="card-body d-flex flex-column align-items-start">
          <strong class="d-inline-block mb-2 text-info"><?php echo $category; ?></strong>
          <h3 class="mb-0">
            <a href="single_page.php?single=<?php echo $row['id']; ?>" class="text-dark"><?php echo $title; ?></a>
          </h3>
          <div class="mb-1 text-muted"><?php echo $date; ?></div>
          <a class="text-info font-weight-bold" href="single_page.php?single=<?php echo $row['id']; ?>">Continue reading</a>
        </div>
        <img class="card-img-right flex-auto d-none d-md-block p-3" src="images/<?php echo $thumbnail; ?>" style="height: 230px; 
        width: 230px; " >
      </div>
    </div>
  <?php } ?>

  </div>
</div>
<br>

<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic bg-light text-muted">Find with FOCUS</h3>
      <hr>


      <?php
    include('db/connection.php');
    if (isset($_POST['submit'])) {
      $search=$_POST['search'];
      $query=mysqli_query($conn,"select * from post where title like '%$search%' ");
      while ($row=mysqli_fetch_array($query)) {
        
      $title=$row['title'];
      $date=$row['date'];
      $admin=$row['admin'];
      $thumbnail=$row['thumbnail'];
      $description=$row['description'];
    
    ?>

      <div class="blog-post">
        <h2 class="blog-post-title"><a href="#"><?php echo $title; ?></a></h2>
        <p class="blog-post-meta"><?php echo $date; ?> <a href="#"><?php echo $admin; ?></a></p>
        <p><img class="img img-thumbnail" src="images/<?php echo $thumbnail; ?>" style="height: 350px; width: 650px;" ></p>
        <hr>
        
        <blockquote>
          <?php echo $description; ?>
        </blockquote>

        </ol>
      </div><!-- /.blog-post -->
      <?php } } ?>    

      
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
    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->

</main><!-- /.container -->

<!--Including Footer-->
<?php
include ('include/home_footer.php');
?>



     