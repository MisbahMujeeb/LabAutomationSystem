<?php
require('top.inc.php');
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h2 class="box-title">Product Report</h2>
                          <!-- Product Report -->
                          <?php
                                if(isset($_GET['productId'])){
                                    $pId=$_GET['productId'];
                                    $reportData=mysqli_query($con,"SELECT * from report where productId='$pId'");
                                    // if Product Report is given Show Report
                                    if($reportData->num_rows > 0){
                                        while($row2=mysqli_fetch_array($reportData)){
                                            echo "
                                            <dl class='row' style='margin-left:50px'>
                                            <dt class='col-sm-3'>Test ID</dt>
                                            <dd class='col-sm-9'>$row2[0]</dd>
                                          
                                            <dt class='col-sm-3'>Product Id</dt>
                                            <dd class='col-sm-9'>
                                            $row2[1]
                                            </dd>
                                          
                                            <dt class='col-sm-3'>Test Title </dt>
                                            <dd class='col-sm-9'> $row2[2]</dd>
                                          
                                            <dt class='col-sm-3 text-truncate'>Test Details</dt>
                                            <dd class='col-sm-9'>$row2[3]</dd>
                                          
                                            <dt class='col-sm-3 text-truncate'>Test Output</dt>
                                            <dd class='col-sm-9'>$row2[4]</dd>
                                          
                                            <dt class='col-sm-3 text-truncate'>Result</dt>
                                            <dd class='col-sm-9'>$row2[5]</dd>
                            
                                          <dt class='col-sm-3 text-truncate'></dt>
                                          <dd class='col-sm-9 '><span class='btn btn-lg' style='background:#00c292'>  <a  style='color: #fff' href='editReport.php?editReport=$row2[0]'>EDIT</a></span>
                                          <span class='btn btn-lg' style='background:#fb9678'>  <a  style='color: #fff' href='Report.php?del=$row2[0]'>DELETE</a></span></dd>
                            
                                            </div>";
                                        }
                                    }
                                    
                                        //End of Show Report
                                         //If Product Report is not Present in database
                                         else{

                                            if(isset($_SESSION['ADMIN_LOGIN'])&& $_SESSION['ADMIN_LOGIN']!=''){
                                                $fetch = mysqli_query($con,"SELECT * from Products where id=$pId");
                                                while($row=mysqli_fetch_array($fetch)){
                                                echo "<h4 class='box-link'><a href='addReport.php?abc=$row[0]' >Add Report</a> </h4>";
                                            }
                                    }else{
                                        echo "<h4 class='box-link'>Product is not yet bee tested</a> </h4>";
                                        echo "<h4 class='box-link'><a href='items.php' >Back</a> </h4>";
                                    }
                                        }

                                }

                                //Delete Report Code
                                if(isset($_GET['del'])){
                                    $del=$_GET['del'];
                                    $sqlDel=mysqli_query($con,"DELETE from report where id=$del");
                                    header('location:items.php');
                                }
                                 //End of Delete Report Code
                          ?>
                             

                     </div>
                  </div>
            </div>
          </div>
<?php
require('footer.inc.php');
?>