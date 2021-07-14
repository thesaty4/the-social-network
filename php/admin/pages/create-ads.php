<div class="container">
    <div class="col-12 h4 text-right bg-light pb-1 box-shadow-black"><a href="main.php?home" class='text-danger'>&times;</a></div>
    <div class="row m-lg-5 radius box-shadow-black bg-light my-3 p-3 p-md-5">
        <form action="pages/ads-post.php" method="post" enctype="multipart/form-data" class="w-100 was-validated">
        <div class="row p-2">
        <textarea name="post-title" id="post-title" placeholder="write your post..." cols="" rows="5" class="form-control" required></textarea>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01"><i class="fas fa-images"></i></span>
            </div>
            <div class="custom-file">
                <input type="file" name="myfile-post" class="custom-file-input" id="inputGroupFile01"
                aria-describedby="inputGroupFileAddon01" required>

                <label class="custom-file-label" for="inputGroupFile01">Choose image..</label>
            </div>
        </div>
    </div>
    <div class="col-12 mt-3"><button name="post" class="btn btn-block btn-primary btn-sm text-light"><i class="fas fa-edit"></i> Post</button></div>
    </div>
    </form>
    </div>
</div>