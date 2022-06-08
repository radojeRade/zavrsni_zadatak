<?php
    include_once('db.php');

    $sql = "SELECT p.title, p.id, p.created_at, p.body, a.first_name, a.last_name FROM posts AS p 
            INNER JOIN author AS a ON a.id = p.author_id ORDER BY created_at DESC";

    $posts= fetch($sql, $connection, true);
    

    if(isset($_POST['submit'])){
        
        $id = $_POST['author'];
        $sql1 = "SELECT p.title, p.id, p.created_at, p.body, a.first_name, a.last_name FROM posts AS p 
                INNER JOIN author AS a ON a.id = p.author_id WHERE p.author_id = '$id'";
        $posts = fetch($sql1, $connection, true);
        
    }

    $sql = "SELECT * FROM author";
    $authors = fetch($sql, $connection, true);
    ?>



<div class="col-sm-8 blog-main">

        <form class="form" action="./home.php" method="POST" id="postsForma">
            <label for="author">Select author</label>
                <select class="form" name="author" >
                    <?php foreach($authors as $author) { ?>
                        <option value="none" selected disabled hidden>All Authors</option>
                        <option  class=<?php echo $author['gender'] ?> value="<?php echo $author['id'] ?>">
                            <?php echo ($author['first_name']. " " .$author['last_name']);?>
                        </option>
                    <?php } ?>
                </select>
                <button type="submit" name="submit">Submit</button>
               
        </form><br>
        
        <?php
            foreach ($posts as $post) {
        ?>
        
        <div class="blog-post">
            <h2> <a href ="single-post.php?post_id=<?php echo($post['id']);?>"class="blog-post-title"><?php echo($post['title']); ?></a></h2>
            <p class="blog-post-meta"><?php echo($post['created_at']); ?> <a href="#"><?php echo($post['first_name']. " ". $post['last_name']); ?></a></p>
            <p> <?php echo($post['body']) ?></p>
            
        </div><!-- /.blog-post -->
        <?php
            }    
        ?>  

    <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
    </nav>

</div><!-- /.blog-main -->