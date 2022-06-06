<?php
    include_once('db.php');

    $sql = $sql = "SELECT * FROM posts ORDER BY created_at DESC";

    $posts= fetch($sql, $connection, true)
    ?>
              
<div class="col-sm-8 blog-main">
                <?php
                    foreach ($posts as $post) {
                ?>
        <div class="blog-post">
            <h2> <a href ="single-post.php?post_id=<?php echo($post['id']);?>"class="blog-post-title"><?php echo($post['title']); ?></a></h2>
            <p class="blog-post-meta"><?php echo($post['created_at']); ?> <a href="#"><?php echo($post['author']); ?></a></p>
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