<?php

  include '_dbconnect.php';

  
    $sql= "SELECT * FROM `categories`";
    $result=mysqli_query($con,$sql);
    while($row= mysqli_fetch_assoc($result)){
        
        $cat = $row['category_name'];
        // echo $cat;
    }
  

    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">iDiscuss</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/forum/index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/forum/about.php">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Category
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

            // while($row= mysqli_fetch_assoc($result)){
        
            //   $cat = $row["category_name"]
            //   <li><a class="dropdown-item" href="#">'.$cat.'</a></li>
            //   <li><hr class="dropdown-divider"></li>
            // }
              
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/forum/contact.php">Contact</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit">Search</button>
        </form>
        <div class="mx-2">
            <button class=" btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#loginmodal">Login</button>
            <button class=" btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#signupmodal" >Signup</button>
        </div>
      </div>
    </div>
    </nav>';

    include '_signupmodal.php';
    include '_loginmodal.php';

    

?>