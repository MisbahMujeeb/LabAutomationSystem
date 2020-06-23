<?php
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_safe_value($con,$_GET['type']);
   

    if($type=='delete'){
        $id=get_safe_value($con,$_GET['id']);
       
        $delete_sql="delete from contact where id='$id'";
        mysqli_query($con,$delete_sql);


    }
}
$sql="SELECT * from contact order by id desc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h2 class="box-title">Contact Us </h2>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead style="text-align:center">
                                    <tr>
                                       <th>ID</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Phone No</th>
                                       <th>Query</th>
                                       <th>Date</th>
                                       <th style="text-align:center">Action</th>
                                      
                                    </tr>
                                 </thead>
                                 <tbody style="text-align:center">
                                     <?php 
                                     $i=1;
                                     while($row=mysqli_fetch_assoc($res)){?>
                                    <tr>

                                        <td><?php echo $row['id']?></td>
                                        <td><?php echo $row['name']?></td>
                                        <td><?php echo $row['email']?></td>
                                        <td><?php echo $row['mobile']?></td>
                                        <td><?php echo $row['comment']?></td>
                                        <td><?php echo $row['added_on']?></td>
                                        <td style="text-align:center">
                                            <?php 
                                            
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