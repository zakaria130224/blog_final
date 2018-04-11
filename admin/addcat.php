<?php include 'inc\header.php';?>

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
                                 $query="INSERT INTO tbl_category (cat_name) VALUES('$name')";
                                 $result=$db->insert($query);
                                 if ($result) {
                                     echo "<div class='alert alert-success'>
                                             <strong>Success!</strong> Category inserted Successfully!.
                                        </div>";
                                 }else{
                                     echo "Category Not Inserted!!";
                                 }
                            }
                      }

               ?> 
                </div>
                
               <div class="block copyblock"> 

              
                 <form action="" method="post">
                  
                    <table class="form" >					
                        <tr>
                            <td>
                                <input type="text" name="name" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        
<?php include 'inc\footer.php';?>