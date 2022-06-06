<?php 
    include_once('db.php');
    $id = $_GET['post_id'];
    
    
    $sql1 ="SELECT * FROM posts WHERE id = '$id'";
    $post = fetch($sql1, $connection); 

    $sql = "SELECT * FROM comments WHERE post_id = '$id'";
    $comments = fetch($sql, $connection, true);
    
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
        <p class="blog-post-meta"><?php echo($post['created_at']); ?> <a href="#"><?php echo($post['author']); ?></a></p>
        <p> <?php echo($post['body']) ?></p>

            <ul>
                <?php foreach ($comments as $comment) {
                    
                    echo "<hr><li>".$comment['author']."</br>", " ". $comment['text']."</li>";
                } ?>
            </ul>
        
    </div>

        

    </div><!-- /.row -->
    <?php include('sidebar.php')?>

</main><!-- /.container -->

<?php include('footer.php')?>    
</body>
</html>

