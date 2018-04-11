<?php include 'inc\header.php';?>
        <?php
            if(!isset($_GET['catid'])||$_GET['catid']==NULL){
                echo"<script>window.location = 'catlist.php';</script>";
            }else{
                $id=$_GET['catid'];
            }
        ?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
                <div>
                   <?php
                       if ($_SERVER['REQUEST_METHOD']=='POST') {
                            $name=$_POST['name'];
                            $name=mysqli_real_escape_string($db->link,$name);
                            if (empty( $name)) {
                              echo "<div class='alert alert-warning'>
                                             <strong>Warning!</strong> Field must not be empty.
                                        </div>";
                            }else{
                                 $query="UPDATE tbl_category SET cat_name='$name' WHERE cat_id='$id'";
                                 $result=$db->update($query);
                                 if ($result) {
                                     echo "<div class='alert alert-success'>
                                             <strong>Success!</strong> Category updated Successfully!.
                                        </div>";

                                 }else{
                                     echo "Category Not Updated!!";
                                 }
                            }
                      }

               ?> 
                </div>
                
               <div class="block copyblock"> 
                    <?php
                        $query="SELECT * FROM tbl_category WHERE cat_id='$id'";
                        $category=$db->select($query);
                        if ($category) {
                                               
                        while ($result=$category->fetch_assoc()) {
                    ?>
              
                 <form action="" method="post">
                  
                    <table class="form" >					
                        <tr>
                            <td>
                                <input type="text" name="name" value="<?php echo $result['cat_name'];?>"/>
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php } }?>
                </div>
            </div>
        </div>
        
<?php include 'inc\footer.php';?>