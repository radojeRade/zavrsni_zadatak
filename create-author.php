<?php 
    include_once('db.php');
    
    $required="";
    
    if (isset($_POST['submit'])){
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $gender = $_POST['gender'];
        
        if(empty($firstName) || empty($lastName) || empty($gender)){
            $required = "Nisu svi podaci uneti!";
        }else {
            $sql = "INSERT INTO author (first_name, last_name, gender)
                    VALUES ('$firstName', '$lastName', '$gender')";
            insertIntoDatabase($sql, $connection);
            header("Location: ./home.php");
            echo ("Upisi u bazu");
        }
    }
?>    
<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/styles.css" rel="stylesheet">
</head>

<body>
    <?php include('header.php')?>

<main role="main" class="container">

    <div class="row">

    <div class="col-sm-8 blog-main">
                
    <div class="blog-post">
    
        <form class="form1" action="./create-author.php" method="POST" id="postsForma">
            
            First name: <input type="text" name="firstName" id=”fname” placeholder="your name"> 
                    <label for="fname" style="color:red"><?php echo $required; ?></label><br><br>   
            
            Last name: <input type="text" name="lastName" id=”lname” placeholder="your last name" >
                    <label for="lname"style="color:red"><?php echo $required; ?></label><br><br>
                    
                    <input type="radio" name="gender" value="female">Z
                    <input type="radio" name="gender" value="male">M
                    <label for="gender" style="color:red"><?php echo $required; ?></label><br><br>
                    
                    <input type="submit" name="submit" value="Submit"> 
        
        </form>
        
    </div>
    </div><!-- /.row -->
    <?php include('sidebar.php')?>

</main><!-- /.container -->

<?php include('footer.php')?> 
<script>
    function goToCreatePost(){
        window.location='create-post.php';
    }
</script>   
</body>
</html>

    
    ?>