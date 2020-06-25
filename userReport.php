<?php
require_once('userNavbar.php');

$con=mysqli_connect("localhost","root","","lab_automation");
?>
<!-- HERO
================================================== -->
<section class="page-banner-area page-service">
        <div class="overlay"></div>
        <!-- Content -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-md-12 col-12 text-center">
                    <div class="page-banner-content">
                        <h1 class="display-4 font-weight-bold">PRODUCT REPORT</h1>
                        <p>We'd love to talk about how we can help you.</p>
                    </div>
                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>








<!-- SECTIONS
    ================================================== -->
    <section class="section" id="process" >
        <div class="container" style="background:whitesmoke;margin-top:-50px">
        
            <div class="row justify-content-center" >
                <h1 style="margin:20px;color:#00c292">REPORT</h1>
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
                                            <dt class='col-sm-3 text-truncate'>Result</dt>
                                            <dd class='col-sm-9'>   <h4 class='box-link'><a href='userProduct.php' >Back</a> </h4></dd>
                                         
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
                                        echo "<h4 class='box-link'><a href='userProduct.php' >Back</a> </h4>";
                                    }
                                        }

                                }
                                 //End of Delete Report Code
                          ?>
            </div>
        </div>
    </section>


    <?php
require_once('userFooter.php');
?>