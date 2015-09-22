
<html>
    <head>
        <title>Inserting new posts</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form method="post" action="insert_post.php" enctype="multipart/form-data">
        
            <table width="600" align="center" border="10">
                <tr>
                    <td align="center" bgcolor="yellow" colspan="6"><h1>Insert
                            New Post here</h1></td>
                </tr>
                
                <tr>
                    <td align="right">Post Title: </td>
                    <td><input type="text" name="title"size="30"></td>
                </tr>
                
                <tr>
                    <td align="right">Post Author: </td>
                    <td><input type="text" name="author"size="30"></td>
                </tr>
                
                <tr>
                    <td align="right">Post Keywords: </td>
                    <td><input type="text" name="keywords" size="30"></td>
                </tr>
                
                <tr>
                    <td align="right">Post Image: </td>
                    <td><input type="file" name="image" ></td>
                </tr>
                
                <tr>
                    <td align="right">Post Content: </td>
                    <td><textarea name="content" cols="30" rows="15"></textarea></td>
                </tr>
                
                <tr>
                  
                    <td align="center" colspan="6"><input type="submit" name="submit" value="Publish now"></td>
                </tr>
        
        
        </form>
    </body>
</html>
<?php
include ("includes/connect.php");

if (isset($_POST['submit'])){
    
    $post_title = $_POST['title'];
    $post_date = date('m-d-y');
    $post_author = $_POST['author'];
    $post_keywords = $_POST['keywords'];
    $post_content = $_POST['content'];
    $post_image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    if ($post_title=='' or $post_keywords=='' or $post_content=='' or $post_author==''){
       echo "<script> alert('any of the fields is empty')</script>";
       exit();       
           }
    
    else {

               
        move_uploaded_file($image_tmp, "../images/$post_image");
       //echo $insert_query = "insert into posts values
               // (post_title,post_date,post_author,post_image,post_keywords,post_content) values('$post_title','$post_date','$post_author',$post_image','$post_keywords','$post_content')";
   
        $insert_query="INSERT INTO `posts`(`post_id`, `post_title`, `post_date`, `post_author`, `post_image`, `post_keywords`, `post_contents`)"
                . " VALUES (NULL,'$post_title','$post_date','$post_author','$post_image','$post_keywords','$post_content')";
                        
        if(mysql_query($insert_query)){ 
            echo "<center><h1>Post Published 
            Successfully!</h1></center>";
            }
            else {
               echo mysql_error ();
            }    
    }
}





?>
