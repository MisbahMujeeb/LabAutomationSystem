<?php
 require('top.inc.php');

if(isset($_POST['submitForm'])){
        $rProductId=$_POST['proId'];
        $rProductTitle=$_POST['tTitle'];
        $rProductDes=$_POST["tDetail"];
        $rProductOutput=$_POST['tOutput'];
        $rProductResult=$_POST['tResult'];
        $sql=mysqli_query($con,"INSERT into report(productId,testTitle,testDescrition,testOutput,testResult) values ($rProductId,'$rProductTitle',\"$rProductDes\",
        '$rProductOutput','$rProductResult')");
           if($sql){
            header('location:items.php');
        }else{
            if(strlen($rProductTitle)>=100){
                echo "<p style='color: red; text-align: center'>Title length must be Less then 100 Characters</p>";
              }
              elseif(strlen($rProductOutput)>=50){
                  echo "<p style='color: red; text-align: center'>Output length must be Less then 50 Characters</p>";
              }else{
                  return;
              }
        }
    }
    



?>
 <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header">
                        <strong>Testing Report</strong>
                        <small> Form</small></div>
                      <!-- Find Product Id -->
                        <?php
                        if(isset($_GET['abc'])){
                        $findProId=$_GET['abc'];
                        $proIdFind= mysqli_query($con,"SELECT * from products where id=$findProId");
                        $row = mysqli_fetch_array($proIdFind);
                        }
                        ?>
                        <form method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                          
                          <div class="form-group"><label class=" form-control-label">Product </label>
                          <input type="hidden" name="proId" value="<?php echo $row[0] ?>" class="form-control" readonly >
                             <input type="text" value="<?php echo $row['brand'] ?>" class="form-control" readonly ></div>
                             <div class="form-group"><label class=" form-control-label" >Test Title</label>
                             <input type="text" name="tTitle" placeholder="Enter Test Title" maxlength="50" class="form-control" required ></div>
                             <div class="form-group"><label class=" form-control-label" >Test Detail</label>
                             <!-- <input type="text" name="tDetail" placeholder="Enter Detail" class="form-control" required > -->
                             <textarea name="tDetail" cols="30" rows="5" class="form-control"></textarea>
                             </div>
                             <div class="form-group"><label class=" form-control-label">Test Output</label>
                             <input type="text" name="tOutput" placeholder="Enter Output" maxlength="50" class="form-control" required ></div>
                             <div class="form-group"><label class=" form-control-label">Test Result</label><br>
                             <input type="radio" name="tResult" value="Accept">Accept<br>
                             <input type="radio" name="tResult" value="Reject">Reject</div>
                             

                             <button id="payment-button" type="submit" name="submitForm" value="Add" class="btn btn-lg btn-info btn-block">
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