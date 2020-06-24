<?php
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_safe_value($con,$_GET['type']);
    if($type=='status'){
        $operation=get_safe_value($con,$_GET['operation']);
        $id=get_safe_value($con,$_GET['id']);
        if($operation=='Active'){
            $status='1';
        }else{
            $status='0';
        }
        $update_status_sql="update products set status='$status' where id='$id'";
        mysqli_query($con,$update_status_sql);


    }

    if($type=='delete'){
        $id=get_safe_value($con,$_GET['id']);
       
        $delete_sql="delete from products where id='$id'";
        mysqli_query($con,$delete_sql);


    }
}
$sql="SELECT products.*,categories.categories from products,categories where products.categories_id=categories.id  order by products.id desc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h2 class="box-title">Items </h2>
                           <h4 class="box-link"><a href="add_items.php" >Add Items</a> </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr style="text-align:center">
                                       <th>ID</th>
                                       <th>Categories</th>
                                       <th>Image</th>
                                       <th>Model</th>
                                       <th>Brand</th>
                                       <th>Quatity</th>
                                       <th>Quatity Left</th>
                                       <th style="text-align:center">Actions</th>
                                       
                                      
                                    </tr>
                                 </thead>
                                 <tbody  style="text-align:center">
                                     <?php 
                                     $i=1;
                                     while($row=mysqli_fetch_assoc($res)){?>
                                    <tr>

                                        <td><?php echo $row['id']?></td>
                                        <td><?php echo $row['categories']?></td>
                                        <td><img src="images/Products/<?php echo $row['image']?>"/>
                                        <td><?php echo $row['model']?></td>
                                        <td><?php echo $row['brand']?></td>
                                        <td><?php echo $row['qty']?></td>
                                        <td><?php echo $row['qty_left']?></td>
                                        <td style="text-align:center">
                                        <?php 
                                            if($row['status']==1){
                                                echo "<span class='badge badge-complete'>
                                                <a href='?type=status&operation=Deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
                                            }else{
                                                echo "<span class='badge badge-pending'><a href='?type=status&operation=Active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
                                            }     
                                            echo "<span class='badge badge-pending'><a href='Report.php?productId=".$row['id']."'>Report</a></span>&nbsp;";        

                                            echo "<span class='badge badge-edit'><a href='add_items?id=".$row['id']."'>Edit</a></span>&nbsp;";             

                                                echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";             
                                            ?>
                                        </td>
                                    </tr>
                                     <?php } ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
          </div>
<?php
require('footer.inc.php');
?>