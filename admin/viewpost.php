<?php include 'inc\header.php';?>
<script src="ckeditor/ckeditor.js" type="text/javascript"></script>
<?php
            if(!isset($_GET['viewpostid'])||$_GET['viewpostid']==NULL){
                echo"<script>window.location = 'postlist.php';</script>";
            }else{
                $postid=$_GET['viewpostid'];
            }
        ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>

                <div class="block">
                 <form action="" method="post" enctype="multipart/form-data">
                 <?php
                      $query="SELECT * ,tbl_category.cat_name,tbl_admins.admin_name 
                        FROM tbl_post 
                        INNER JOIN tbl_category
                        ON tbl_post.cat_id=tbl_category.cat_id and tbl_post.id='$postid'
                        INNER JOIN tbl_admins
                        ON tbl_post.admin_id=tbl_admins.admin_id
                        order by tbl_post.id desc";
                        $post=$db->select($query);
                        if ($post) {
                            while ($postresult=$post->fetch_assoc()) {
                    ?>
                    <table class="form">
                    
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $postresult['title'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" readonly name="author" value="<?php echo $postresult['admin_name'];?>"  class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" readonly name="tag" value="<?php echo $postresult['tag'];?>"  class="medium" />
                            </td>
                        </tr>



                        <tr>
                            <td>
                                <label>Category</label>
                            </td>

                            <td>
                              <input type="text" readonly name="tag" value="<?php echo $postresult['cat_name'];?>"  class="medium" />
                            </td>

                        </tr>
            
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <img src="<?php echo $postresult['image'];?>" hight="50px" width="80px" style="padding:10px"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea readonly name="body" id="editor1">
                                 <?php echo $postresult['body'];?>    
                                </textarea>
                            </td>
                        </tr>
                        <?php }}?>
						<tr>
                            <td></td>
                            <td>
                                <a href="postlist.php">OK</a>
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