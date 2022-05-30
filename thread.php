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
        #ques{
            min-height:433px;
        }
    </style>
</head>

<body>
    <?php include 'partials/_header.php'; ?>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php 
    
    $id=$_GET['threadid'];
    $sql= "SELECT * FROM `threads` WHERE thread_id=$id";
    $result=mysqli_query($con,$sql);
    while($row= mysqli_fetch_assoc($result)){
        
        $title = $row['thread_title'];
        $dsc = $row['thread_desc'];

    }

    ?>

<?php 

$showalert=false;

if($_SERVER["REQUEST_METHOD"]=="POST"){
    
   
    $comment=$_POST['comment'];

    $sql="INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `timestamp`) VALUES ('$comment', '$id', '1', current_timestamp())";
    
    $result=mysqli_query($con,$sql);
    if($result)
    {
        $showalert=true;
        if($showalert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Great!</strong> your comment has been posted
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
    }
}

?>


<div class="container my-4">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 "><?php echo $title?> </h1>
                <p class="col-md-8 fs-4"><?php echo $dsc?></p>
                <hr class="my-4">
                <p>This is a peer to peer forum for sharing knowledge each other</p>
                <p>Posted by: <b>Ajay</b></p>
            </div>
        </div>
</div>

<div class="container">
        <h1 class="py-2">Post  a Comment</h1>
        <!-- below php code is use to post on same page  -->
        <!-- php $_SERVER['PHP_SELF']  or php $_SERVER['REQUEST_URI']  -->
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-floating mb-2">
                <textarea class="form-control" placeholder="Leave a comment here" id="comment"
                    style="height: 100px" name="comment" required></textarea>
                <label for="comment">Type your Comment</label>
            </div>
            <button type="submit" class="btn btn-success">Post Comment</button>
        </form>
    </div>

<div class="container" id="ques">
        <h1 class="py-2 my-2">Discussions</h1>



        <?php 
    
        $id=$_GET['threadid'];
        $sql= "SELECT * FROM `comments` WHERE thread_id=$id";
        $result=mysqli_query($con,$sql);

        $noResult=true;
        while($row= mysqli_fetch_assoc($result)){
            
            $noResult=false;
            $id = $row['comment_id'];
            $content = $row['comment_content'];
            $time = $row['timestamp'];
           
           echo ' <div class="d-flex ">
                <div class="flex-shrink-0">
                <i class="fa-solid fa-circle-user"></i>
                </div>
                <div class="flex-grow-1 ms-3">
                    <p class="mb-0"><b>Anonymous User</b> at '.$time.'</p>
                    '.$content.'
                </div>
            </div>';

            echo '<hr class="dropdown-divider"/>';


        }

        if($noResult){
            echo '<div class="p-3 mb-4 bg-light rounded-3"">
            <div class="container">
                <p class="display-4">No Discussion Found</p>
                <p class="lead">Be the first person to ask a question</p>
            </div>
        </div>';

            
        }

    ?>




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