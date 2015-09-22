<div id="main_content">
<?php
include ("includes/connect.php");

$select_posts="select * from posts";

$run_posts = mysql_query($select_posts);

while($row=  mysql_fetch_array($run_posts)){
    
    $post_id=$row['post_id'];
    $post_title= $row['post_title'];
    $post_date= $row['post_date'];
    $post_author= $row['post_author'];
    $post_image= $row['post_image'];
    $post_keywords= $row['post_keywords'];
    $post_contents= $row['post_contents'];


?>
    <h2><?php echo $post_title; ?></h2>
    
    
    <p align="left">Published on:&nbsp;&nbsp;<b><?php echo $post_date; ?></b></p>
    <p align="right">Posted by:&nbsp;&nbsp;<b><?php echo $post_author;?></b></p>
    <center <img src="images/<?php echo $post_image; ?>" width="500" height="400"/></center>
    <p align="justify"><?php echo $post_contents;?></p>
    
    <?php
}
?>
</div>
