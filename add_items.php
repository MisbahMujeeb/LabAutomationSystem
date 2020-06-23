<?php
require('top.inc.php');

$categories_id='';
$model='';
$brand='';
$qty='';
$qty_left='';
$image='';
$status='';
$msg='';
$image_required='required';


if(isset($_GET['id']) && $_GET['id']!=''){
   $image_required='';
   $id=get_safe_value($con,$_GET['id']);
   $res=mysqli_query($con,"SELECT * from products where id='$id'");
   $check=mysqli_num_rows($res);
  
   if($check>0){
      
   $row=mysqli_fetch_assoc($res);
   $categories_id=$row['categories_id'];
   $model=$row['model'];
   $brand=$row['brand'];
   $qty=$row['qty'];
   $qty_left=$row['qty_left'];



}else{
   header('location:items.php');
   die();
}
}

if(isset($_POST['submit'])){

    $categories_id=get_safe_value($con,$_POST['categories_id']);
    $model=get_safe_value($con,$_POST['model']);
    $brand=get_safe_value($con,$_POST['brand']);
    $qty=get_safe_value($con,$_POST['qty']);
    $qty_left=get_safe_value($con,$_POST['qty_left']);


  

    $res=mysqli_query($con,"SELECT * from products where model='$model'");
    $check=mysqli_num_rows($res);
    if($check>0){
       
       if(isset($_GET['id']) && $_GET['id']!=''){
          $getData=mysqli_fetch_assoc($res);
          if($id==$getData['id']){

          }else{
            $msg="Items already exist";

          }

       }else{
         $msg="Items already exist";

       }
    }
if($msg==''){
       if(isset($_GET['id']) && $_GET['id']!=''){
       mysqli_query($con, "update products set categories_id='$categories_id',model='$model',brand='$brand',qty='$qty',qty_left='$qty_left' where id='$id'");
 
       }else{
          $image=rand(11111111111111,22222222).'_'.$_FILES['image']['name'];
          move_uploaded_file($_FILES['image']['tmp_name'],'images/Products/'.$image);
           mysqli_query($con, "insert into products(model,categories_id,brand,qty,qty_left,status,image) values('$model',$categories_id,'$brand',$qty,$qty_left,1,'$image')");
   }
    
    header('location:items.php');
    die();
}    
}


?>
 <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header">
                        <strong>Items</strong>
                        <small> Form</small></div>
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                          
                          <div class="form-group">
                          <label for="categories" class=" form-control-label">Items
                          </label>
                           <select class="form-control" name="categories_id">
                               <option>Select Categories</option>
                               <?php
                               $res=mysqli_query($con,"SELECT id,categories from categories order by categories asc");
                               while($row=mysqli_fetch_assoc($res)){
                                  if($row['id']==$categories_id){

                                    echo "<option selected value=".$row['id'].">".$row['categories']."</option>";

                               }else{
                                 echo "<option value=".$row['id'].">".$row['categories']."</option>";

                               }
                              }
                               ?>
                           </select>  
                             </div>
                             <div class="form-group">
                          <label for="categories" class=" form-control-label">Model
                          </label>
                             <input type="text" name="model" placeholder="Enter Model" class="form-control" required value="<?php echo $model?>">
                             </div>

                             <div class="form-group">
                          <label for="categories" class=" form-control-label">Brand
                          </label>
                             <input type="text" name="brand" placeholder="Enter Brand" class="form-control" required value="<?php echo $brand?>">
                             </div>

                             <div class="form-group">
                          <label for="categories" class=" form-control-label">Quatity
                          </label>
                             <input type="text" name="qty" placeholder="Enter Quatity" class="form-control" required value="<?php echo $qty?>">
                             </div>

                             <div class="form-group">
                          <label for="categories" class=" form-control-label">Quatity Left
                          </label>
                             <input type="text" name="qty_left" placeholder="Enter Quatity Left" class="form-control" required value="<?php echo $qty_left?>">
                             </div>

                             <div class="form-group">
                          <label for="categories" class=" form-control-label">Image
                          </label>
                             <input type="file" name="image" class="form-control" <?php echo $image_required?>>
                             </div>

                             


                             <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">

                             <span id="payment-button-amount">Submit</span>
                             
                          </button>
                          <div class="field_error"><?php echo $msg?></div>
                      </div>



                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
<?php
require('footer.inc.php');
?>