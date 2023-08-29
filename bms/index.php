<?php
include'header.php';
include'config.php';

?>


<!--////////////////////////////////////////////////////////////////////////////slider/////////////////////////////////////////-->

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/4.jpg" alt="First slide" height="570px">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/6.jpg" alt="Second slide" height="570px">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/5.jpg" alt="Third slide" height="570px">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



    <?php
    include 'footer.php';
    ?>
   