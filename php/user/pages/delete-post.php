<?php
$post_id = filter_data($_GET['deletePost']);
$obj = mysqli_query($conn,"SELECT * FROM posts WHERE post_id = $post_id");
if(mysqli_fetch_assoc($obj) == 0){
    echo "<script>window.location.href='main.php';</script>";
}else{
    $rows = mysqli_fetch_assoc($obj);
    $upload_directory = $rows['post_location'];
    if(file_exists($upload_directory)){
        unlink($upload_directory);
    }
    mysqli_query($conn,"DELETE FROM share WHERE post_id = $post_id;");
    mysqli_query($conn,"DELETE FROM comments WHERE post_id = $post_id;");
    mysqli_query($conn,"DELETE FROM likes WHERE post_id = $post_id;");
    mysqli_query($conn,"DELETE FROM posts WHERE post_id = $post_id;");
    echo "<script>window.location.href='main.php?success=Your Post has been Deleted...';</script>";
}
?>