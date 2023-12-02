<?php 
require_once("../config.php");
?>

<?php
include(FRONT.DS."header.php");
?>

<div class="container-fluid mt-5">
    <div class="row content">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">
        <h1 class="text-center">Login</h1>
        <h6 class="text-center text-danger"><?php display_message() ?></h6>
        <div class="card p-4 bg-light">
  <form action=" <?php login_user();?>" method="POST" enctype="multipart/form-data">
     
    <div class="form-group text-left">
      <label for="username">Username:</label>
      <input type="username" name="username" class="form-control">
    </div>
    <div class="form-group text-left">
      <label for="password">Password:</label>
      <input type="password" name="password" class="form-control">
    </div>
    <div class="form-group text-left">
      <input type="submit" value="submit" class="btn text-light bg-dark ">
    </div>
    <input type="checkbox" name="recordar" >
      <label for="recordar">Recordar</label>
  </form>
</div><!--card-->
<!--login/registro/ -->
  <a  class="text-dark" href="" >Darse de alta en el sistema</a><br>
</div> <!--8col -->
<div class="col-sm-2"></div>
</div> <!--row -->
</div> <!--container-->



<?php
include(FRONT.DS."footer.php");
?>