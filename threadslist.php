<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="/forum/fontawesome/css/all.css">
    <title>iDiscuss-Coding Forum</title>

    <style>
    #ques {
        min-height: 433px;
    }
    </style>
</head>

<body>
    <?php include 'partials/_header.php'; ?>
    <?php include 'partials/_dbconnect.php'; ?>

    <?php 
    $id=$_GET['catid'];
    $sql= "SELECT * FROM `categories` WHERE category_id=$id";
    $result=mysqli_query($con,$sql);
    while($row= mysqli_fetch_assoc($result)){
        
        $catname = $row['category_name'];
        $catdsc = $row['category_desc'];
    }

    ?>

    <?php 

        $showalert=false;

        if($_SERVER["REQUEST_METHOD"]=="POST"){
            
            $th_title=$_POST['title'];
            $th_desc=$_POST['desc'];

            $sql="INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '0' , current_timestamp())";
            
            $result=mysqli_query($con,$sql);
            if($result)
            {
                $showalert=true;
                if($showalert){
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Great!</strong> your question is submitted. you will got your answer soon by others..
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                }
            }
        }

    ?>




    <div class="container my-4">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Welcome to <?php echo $catname?> forums</h1>
                <p class="col-md-8 fs-4"><?php echo $catdsc?></p>
                <hr class="my-4">
                <p>This is a peer to peer forum for sharing knowledge each other</p>
                <button class="btn btn-success btn-lg" type="button">Learn More</button>
            </div>
        </div>
    </div>


    <div class="container">
        <h1 class="py-2">Ask a Question</h1>
        <!-- below php code is use to post on same page  -->
        <!-- php $_SERVER['PHP_SELF']  or php $_SERVER['REQUEST_URI']  -->
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Thread Title</label>
                <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title" required>
                <div id="emailHelp" class="form-text">Keep your title as short and crisp as possible</div>
            </div>
            <div class="form-floating mb-2">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                    style="height: 100px" name="desc" required></textarea>
                <label for="floatingTextarea2">Elaborate your concern..</label>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>

    <div class="container" id="ques">
        <h1 class="py-2">Browse Questions</h1>

        <?php 
    
        $id=$_GET['catid'];
        $sql= "SELECT * FROM `threads` WHERE thread_cat_id=$id";
        $result=mysqli_query($con,$sql);

        $noResult=true;
        while($row= mysqli_fetch_assoc($result)){
            
            $noResult=false;
            $id = $row['thread_id'];
            $title = $row['thread_title'];
            $dsc = $row['thread_desc'];
            $time = $row['timestamp'];


           echo ' <div class="d-flex ">
                <div class="flex-shrink-0">
                <i class="fa-solid fa-circle-user"></i>
                </div>
                <div class="flex-grow-1 ms-3">
                <p class="mb-0"><b>Anonymous User</b> at '.$time.'</p>
                    <h6 class="my-0"><a  href="/forum/thread.php?threadid='. $id .'" class="text-dark text-decoration-none ">'.$title.'</a> </h6>
                    '.$dsc.'
                </div>
            </div>';


        }

        if($noResult){
            echo '<div class="p-3 mb-4 bg-light rounded-3"">
            <div class="container">
                <p class="display-4">No Results Found</p>
                <p class="lead">Be the first person to ask a question</p>
            </div>
        </div>';

            
        }

    ?>



        <!--  -->
        <!-- <div class="media"> -->
        <!-- <img src="" width="34px" alt="" class="mr-3"> -->
        <!-- <div class="media-body">
                <h5 class="mt-0 ms-1"><i class="fa-solid fa-circle-user"></i> User name</h5>
                <section class="ms-4 mt-0 mb-2">This is user question Lorem ipsum dolor sit amet consectetur,
                    adipisicing elit. Nisi facilis doloribus aperiam non possimus odit?This is user question Lorem ipsum dolor sit amet consectetur,
                    adipisicing elit. Nisi facilis doloribus aperiam non possimus odit?</section>
            </div>
        </div> -->



    </div>

    <?php include 'partials/_footer.php'; ?>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>