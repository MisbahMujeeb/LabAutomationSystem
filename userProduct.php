<?php
require_once('userNavbar.php');
$con=mysqli_connect("localhost","root","","lab_automation");
?>
<?php
$sql="SELECT products.*,categories.categories from products,categories where products.categories_id=categories.id  order by products.id desc";
$res=mysqli_query($con,$sql);
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
                        <h1 class="display-4 font-weight-bold">OUR TESTED PRODUCTS</h1>
                        <p>We'd love to talk about how we can help you.</p>
                    </div>
                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>
    

  <!-- SECTIONS
    ================================================== -->

    <section class="section" id="process">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 text-center">
                    <div class="section-heading">
                        <!-- Heading -->
                        <h2 class="section-title">
                            Our Products
                        </h2>

                        <!-- Subheading -->
                        <p>
                        SRS Electronic Appliances makes electrical test equipment to help you install, improve efficiency and extend the life of electrical assets and cable networks at high, medium and low voltage. 
                        </p>

                    </div>
                </div>
            </div> <!-- / .row -->

        
            <div class="row justify-content-center">
                

            <?php 
                                     $i=1;
                                     while($row=mysqli_fetch_assoc($res)){?>
              
                <div class="col-lg-4 col-sm-6 col-md-6" style="margin-top:50px">
                    <div class="process-block">
                        <!-- <img src="userimages/process/process-1.jpg" alt="" class="img-fluid"> -->
                        <td><img width="200px " height="200px" src="images/Products/<?php echo $row['image']?>"/>
                        <h3><?php echo $row['categories'] ?></h3>
                        <p> <b>Product ID :</b><?php echo $row['id'] ?></p>
                        <p> <b>Model :</b><?php echo $row['model'] ?></p>
                        <p> <b>Category :</b><?php echo $row['brand'] ?></p>
                        <a href="<?php echo 'userReport.php?productId='.$row['id'] ?>" class="btn btn-primary btn-circled" >Report</a>
                    </div>
                </div>
                <?php } ?>
  
            </div>
        </div>
    </section>




    <?php
require_once('userFooter.php');
?>