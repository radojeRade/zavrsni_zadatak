<?php 
    include_once('db.php');
    
    $required = "";

    if (isset($_POST['submit'])){
        $body = $_POST['body'];
        $title = $_POST['title'];
        $id = $_POST['author'];
        
        if(empty($body) || empty($title) || empty($id)){
            $required = "Nisu svi podaci uneti!";
        }else {
            $currentDate = date("Y-m-d");
            $sql = "INSERT INTO posts (title, body, author_id, created_at)
                    VALUES ('$title', '$body', '$id', '$currentDate')";
            insertIntoDatabase($sql, $connection);
            header("Location: ./home.php");
            echo ("Upisi u bazu");
        }
    }
    $sql = "SELECT * FROM author";
    $authors = fetch($sql, $connection, true);
    
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
        <form class="form" action="./create-post.php" method="POST" id="postsForma">
                    
            <label for="author">Select author</label>
                    <select class="form" name="author" placeholder="Select Author" >
                        <?php foreach($authors as $author) { ?> 
                            <option  class=<?php echo $author['gender'] ?> value="<?php echo $author['id'] ?>">
                                    <?php echo ($author['first_name']. " " .$author['last_name']);?>
                            </option>
                        <?php } ?>
                    </select>
            <ul >
                <li>
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" placeholder="Enter title">
                </li>
                <li>
                    <label for="body">Content</label>
                    <textarea name="body" placeholder="Enter body" rows="30" id="bodyPosts"></textarea><br>
                </li>
                <li>
                    <button type="submit" name="submit">Submit</button>
                </li>
                <?php echo $required; ?>
            </ul>
        </form>    
    </div>
    </div><!-- /.row -->
    
    <?php include('sidebar.php')?>

</main><!-- /.container -->

<?php include('footer.php')?>    
</body>
</html>
