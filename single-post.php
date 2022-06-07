<?php 
    include_once('db.php');
    
    if (isset($_GET['post_id'])){
        
        $id = $_GET['post_id'];
        $sql1 ="SELECT p.title, p.id, p.created_at, p.body, a.first_name, a.last_name, a.gender FROM posts AS p 
                INNER JOIN author AS a ON a.id = p.author_id WHERE p.id = '$id'";
        $post = fetch($sql1, $connection); 
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
        <h2 class="blog-post-title"><?php echo($post['title']); ?></h2>
        <p class="blog-post-meta"><?php echo($post['created_at']); ?> <a href="#"class= <?php echo ($post['gender'])?>><?php echo($post['first_name']." ".$post['last_name']); ?></a></p>
        <p> <?php echo($post['body']) ?></p>

        <?php include ('comments.php');?>
    </div>

    </div><!-- /.row -->
    <?php include('sidebar.php')?>

</main><!-- /.container -->

<?php include('footer.php')?>    
</body>
</html>

