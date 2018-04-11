<?php include 'inc\header.php';?>
<?php
    $admin_id = Session::get("admin_id");
?>
<script src="ckeditor/ckeditor.js" type="text/javascript"></script>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>

                <div class="block">
                    <?php
                    if ($_SERVER['REQUEST_METHOD']=='POST') {
                        $title = mysqli_escape_string($db->link, $_POST['title']);
                        $author = mysqli_escape_string($db->link, $_POST['author']);
                        $tag = mysqli_escape_string($db->link, $_POST['tag']);
                        $category = mysqli_escape_string($db->link, $_POST['category']);
                        $body = mysqli_escape_string($db->link, $_POST['body']);
                        $admin_id = Session::get("admin_id");

                        $permited = array('jpg', 'jpeg', 'png', 'gif');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];

                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
                        $uploaded_image = "upload/".$unique_image;

                        if (empty($title) || empty($author) || empty($tag) || empty($body)||empty(  $uploaded_image)) {
                            echo "<div class='alert alert-warning'>
                                             <strong>Warning!</strong> Field must not be empty.
                                   </div>";
                        } elseif ($file_size > 1048567) {
                            echo "<span class='error'>Image Size should be less then 1MB!</span>";
                        } elseif (in_array($file_ext, $permited) === false) {
                            echo "<span class='error'>You can upload only:-"
                                . implode(', ', $permited) . "</span>";
                        } else {
                            move_uploaded_file($file_temp, $uploaded_image);
                            $query = "INSERT INTO tbl_post (title,body,image,tag,cat_id,admin_id) VALUES('$title','$body','$uploaded_image','$tag','$category',$admin_id)";
                            $inserted_rows = $db->insert($query);
                            if ($inserted_rows) {
                                echo "<span class='success'>Image Inserted Successfully.    </span>";
                            } else {
                                echo "<span class='error'>Image Not Inserted !</span>";
                            }
                        }
                    }
                    ?>
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                             <?php
                                $query="SELECT * FROM tbl_admins where admin_id='$admin_id' ";
                                $admin=$db->select($query);
                                if ($admin) {
                                while ($result=$admin->fetch_assoc()) {


                            ?>
                                <input type="text" name="author" value="<?php echo $result['admin_name'];?>" class="medium" />
                                <?php }}?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" name="tag" placeholder="Enter Tags ..." class="medium" />
                            </td>
                        </tr>



                        <tr>
                            <td>
                                <label>Category</label>
                            </td>

                            <td>
                                <select id="select" name="category">
                                    <option> Select Category </option>
                            <?php
                                $query="SELECT * FROM tbl_category";
                                $category=$db->select($query);
                                if ($category) {
                                while ($result=$category->fetch_assoc()) {


                            ?>
                                    <option value="<?php echo $result['cat_id']?>"><?php echo $result['cat_name']?></option>
                                <?php } }?>
                                </select>
                            </td>

                        </tr>
            
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input name="image" type="file" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea name="body" id="editor1"></textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
     <!-- Load Ckeditor -->
    <script>
        CKEDITOR.replace( 'editor1', {
            filebrowserBrowseUrl: './ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: './ckfinder/ckfinder.html?type=Images',
            filebrowserFlashBrowseUrl: './ckfinder/ckfinder.html?type=Flash',
            filebrowserUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
        } );
</script>
<?php include 'inc\footer.php';?>