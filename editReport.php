<?php
 require('top.inc.php');

if(isset($_POST['submitEditForm'])){
        $eProductTitle=$_POST['trTitle'];
        $eProductDes=$_POST["trDetail"];
        //  $eProductDes="lkjhgfdsa";
        $eProductOutput=$_POST['trOutput'];
        $eProductResult=$_POST['trResult'];
        $eID=$_POST['reportId'];
        // $sql=mysqli_query($con,"UPDATE report set testTitle='$eProductTitle',testDescrition=\"$eProductDes\",testOutput='$eProductOutput',testResult ='$eProductResult where id=$eID");
        $sql=mysqli_query($con,"UPDATE report set testTitle='$eProductTitle',testDescrition=\"$eProductDes\",testOutput='$eProductOutput',testResult='$eProductResult' where id=$eID");   
        if($sql){
            header('location:items.php');
        }else{
            // if(strlen($rProductTitle)>=100){
            //     echo "<p style='color: red; text-align: center'>Title length must be Less then 100 Characters</p>";
            //   }
            //   elseif(strlen($rProductOutput)>=50){
            //       echo "<p style='color: red; text-align: center'>Output length must be Less then 50 Characters</p>";
            //   }else{
            //       return;
            //   }
        }
    }

?>
 <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header">
                        <strong>Edit Testing Report</strong>
                        <small> Form</small></div>
                      <!-- Find Product Id -->
                        <?php
                        if(isset($_GET['editReport'])){
                        $findRepoId=$_GET['editReport'];
                        $repoIdFind= mysqli_query($con,"SELECT * from report where id=$findRepoId");
                        $rowReport = mysqli_fetch_array($repoIdFind);
                        }
                        
                        ?>
                        <form method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                          <div class="form-group"><label class=" form-control-label">Test ID</label>
                          <input type="text" name="reportId" value="<?php echo $rowReport[0] ?>" class="form-control" readonly ></div>
                          <div class="form-group"><label class=" form-control-label" >Product Id</label>
                          <input type="text" name="proReportId" value="<?php echo $rowReport[1] ?>" class="form-control" readonly ></div>

                             <div class="form-group"><label class=" form-control-label" >Test Title</label>
                             <input type="text" name="trTitle" value="<?php echo $rowReport[2] ?>" placeholder="Enter Test Title" maxlength="50" class="form-control" required ></div>
                             
                             <div class="form-group"><label class=" form-control-label" >Test Detail</label>
                             <textarea name="trDetail" cols="30" rows="5" class="form-control"><?php echo $rowReport[3] ?></textarea></div>
                             
                             <div class="form-group"><label class=" form-control-label">Test Output</label>
                             <input type="text" name="trOutput" value="<?php echo $rowReport[4] ?>" placeholder="Enter Output" maxlength="50" class="form-control" required ></div>
                            
                             <div class="form-group"><label class=" form-control-label">Test Result</label><br>
                             <input type="radio" name="trResult" value="Accept" <?php echo $rowReport[5] == 'Accept' ? 'checked' : '';  ?>>Accept<br>
                             <input type="radio" name="trResult" value="Reject" <?php echo $rowReport[5] == 'Reject' ? 'checked' : '';  ?>>Reject</div>
                             
                             <button id="payment-button" type="submit" name="submitEditForm" value="Add" class="btn btn-lg btn-info btn-block">
                             <span id="payment-button-amount">Submit</span>
                             
                          </button>
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