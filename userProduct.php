<?php
require_once('userNavbar.php');
$con=mysqli_connect("localhost","root","","lab_automation");
?>
<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function

    $query = "SELECT * from products,categories where products.categories_id=categories.id AND CONCAT(`brand`) like '%".$valueToSearch."%' order by products.id desc";

    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT products.*,categories.categories from products,categories where products.categories_id=categories.id  order by products.id desc";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "lab_automation");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
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
                        <form class="form-inline justify-content-center" method="post">
                          
                          <input type="text" name="valueToSearch" style="border-radius:20px 0px 0px 20px" class="form-control" placeholder="Search By Brands">
                          <input type="submit" name="search" style="border-radius:0px 20px 20px 0px;font-weight:bold;font-size:15px;padding-top:9px"  class="btn btn-primary form-control text-center" value="Filter"><br><br>
                    </div>
                  
                </div>
              
            </div> <!-- / .row -->

         
            <div class="row justify-content-center">
                

            <?php 
                                     $i=1;
                                     while($row=mysqli_fetch_array($search_result)){?>
              
                <div class="col-lg-4 col-sm-6 col-md-6" style="margin-top:-35px">
                    <div class="process-block">
                        <!-- <img src="userimages/process/process-1.jpg" alt="" class="img-fluid"> -->
                        <td><img width="200px " height="200px" src="images/Products/<?php echo $row['image']?>"/>
                        <h3><?php echo $row['brand'] ?></h3>
                        <p> <b>Product ID :</b><?php echo $row['id'] ?></p>
                        <p> <b>Model :</b><?php echo $row['model'] ?></p>
                        <p> <b>Category :</b><?php echo $row['categories'] ?></p>
                        <a href="<?php echo 'userReport.php?productId='.$row['id'] ?>" class="btn btn-primary btn-circled" >Report</a>
                    </div>
                </div>
                <?php } ?>
  
            </div>
            </form>
        </div>
    </section>




    <?php
require_once('userFooter.php');
?>