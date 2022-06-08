 
 <?php 
    $sql = "SELECT c.text, a.first_name, a.last_name FROM comments AS c 
            INNER JOIN author AS a ON a.id = c.author_id WHERE c.post_id = '$id'";
    $comments = fetch($sql, $connection, true);
 ?>
            
    <ul>
        <?php foreach ($comments as $comment) {
            echo "<hr><li>".$comment['first_name']. " " . $comment['last_name']."</br>", " ". $comment['text']."<hr></li>";
        } ?>  
    </ul>