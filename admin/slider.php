<?php 
ob_start();
include 'inc\header.php';
?>

        <div class="grid_10">
		
            <div class="box round first grid" style="float:left;width: 502px;" >
                <h2>Add New Category</h2>
                <?php
                    if(isset($_GET['sid'])){
                         $id=$_GET['sid'];
                            $query="SELECT * FROM slider WHERE id='$id'";
                            $image=$db->select($query);
                            if ($image) {
                                while ($result=$image->fetch_assoc()) {
                                    $r=$result['name'];
                                    $r=trim( $r);
                                }
                                $delresult=unlink($r);
                            }
                            $query="DELETE FROM slider WHERE id='$id'";
                            $delslider=$db->delete($query);
                            if ($delslider && $delresult ) {
                                
                                  echo "<div class='alert alert-success'>
                                         <strong>Success!</strong> Slider delete Successfully!.
                                    </div>";
                                
                                
                             }else{
                                 echo "Slider Not deleted!!";
                             }
                         }
                 ?>
               <div class="block copyblock" style="width: 400px;margin-left: 20px;"> 

                  
                    <table class="form" style="width: 400px;" >	
                    <?php
                        $query="SELECT * FROM slider order by id desc";
                        $slider=$db->select($query);
                        if ($slider) {
                            $i=1;
                            while ($result=$slider->fetch_assoc()) {
                            

                    ?>				
                        <tr style="width: 400px;">
                            <td style="width: 315px;">
                                <img height="150px" width="200px" src="<?php echo $result['name'];?>">
                            </td>
                            <td style="width: 500px;">
                                <a onclick="return confirm('Are you Sure to Delete This slider???');" href="?sid=<?php echo $result['id'];?>">Delete</a>
                            </td>

                        </tr>
                        <?php }}?>
                    </table>

                </div>
                </div>
                <div class="box round first grid" style="float:right;width: 550px;padding-bottom: 0px;margin-bottom: 0px;" >
                <h2>Add New Slider</h2>
                    <div>
                        <?php
                    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
                        $weblink=$_POST['link'];
                         $weblink="http://". $weblink;
                         $caption=$_POST['caption'];

                        $permited = array('jpg', 'jpeg', 'png', 'gif');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];
                        
                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $uploaded_image=null;
                       
                         $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
                         $uploaded_image ="upload/slider/".$unique_image;

                        

                        if (empty( $file_name) || empty($weblink)) {
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
                            $query="INSERT INTO slider (name,link,caption) VALUES('$uploaded_image','$weblink','$caption')";
                            $inserted = $db->insert($query);
                            if ($inserted) {
                                echo "<span class='success'>Image Inserted Successfully !!!</span>";
                               // header("Refresh:0");
                                //exit();
                                $page = $_SERVER['PHP_SELF'];
                                $sec = ".5";
                                header("Refresh: $sec; url=$page");
                            } else {
                                echo "<span class='error'>Image Not Inserted !</span>";
                            }
                        }
                    }
                    ?>
                    </div>

                   <div class="block copyblock" style="margin-left: 10px;width: 450px;"> 

                  
                     <form action="slider.php" method="post" enctype="multipart/form-data">
                  
                    <table class="form" >
                     <tr>
                            <td>Caption:</td>
                            <td>
                               <input type="input" name="caption">
                            </td>
                        </tr>
                        <tr>
                            <td>Link:</td>
                            <td>
                               <input type="input" name="link">
                            </td>
                        </tr>
                        <tr>
                            <td>Browse New Picture:</td>
                            <td>
                               <input type="file" name="image">
                            </td>
                        </tr>
                        <tr> 
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Change image" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>

            </div>
        </div>
        
<?php include 'inc\footer.php';?>