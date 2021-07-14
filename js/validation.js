function commentValid(){
    var userId = document.getElementById("user_id").value;
    var postId = document.getElementById("post_id").value;
    var comment = document.getElementById("comment").value;
    if(userId == '' || postId == '' || comment == ''){
        alert("Please write something in commnet...");
        return false;
    }
    if(comment.length > 500){
        alert("You can only write 500 words...");
        return false;

    }
    return true;
}

