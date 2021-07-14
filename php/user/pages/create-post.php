<?php
echo '<form action="pages/post.php" method="post" enctype="multipart/form-data" class="mt-3 w-100 was-validated">
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
    
    <div class="col-12 mt-4">
    <lable class="font-weight-bold"><i class="fas fa-lock"></i> Privacy</lable>
        <select name="privacy" id="privacy" class="form-control" required>
            <option value="">Select Privacy</option>
            <option value="public">Public</option>
            <option value="private">Only me</option>
            <option value="friend">Friends</option>
        </select>
    </div>
    <div class="col-12 mt-4"><lable class=" font-weight-bold p-2"><i class="fas fa-users"></i> Post Category :</lable>
    <select name="category" class="form-control" id="category" required>
        <option value="">Select Post Category</option>
        <option value="education">Educational</option>
        <option value="style">Style</option>
        <option value="nature">Nature</option>
        <option value="cricket">Cricket</option>
    </select></div>
    

    <div class="col-12 mt-4">
    <lable class="font-weight-bold"><i class="fas fa-smile"></i> Feeling</lable>
        <select name="mood" id="mood" class="form-control" required>
            <option value="">Select Feeling</option>
            <option value="good">Good</option>
            <option value="thinking about life">Thinking about life</option>
            <option value="romantic">Romantic</option>
            <option value="happy">Happy</option>
            <option value="sad">Sad</option>
            <option value="emotional">Emotional</option>
            <option value="blessing">Blessing</option>
            <option value="thanksfull">Thanks full</option>
        </select>
    </div>
   <div class="col-12 mt-3"><button name="post" class="btn btn-block btn-primary btn-sm text-light"><i class="fas fa-edit"></i> Post</button></div>
</div>
</form>';
?>