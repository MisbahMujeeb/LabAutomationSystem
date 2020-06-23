<?php
require('top.inc.php');
$room='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
   $id=get_safe_value($con,$_GET['id']);
   $res=mysqli_query($con,"SELECT * from room where id='$id'");
   $check=mysqli_num_rows($res);
   if($check>0){

   $row=mysqli_fetch_assoc($res);
   $room=$row['room'];
}else{
   header('location:room.php');
   die();
}
}

if(isset($_POST['submit'])){

    $room=get_safe_value($con,$_POST['room']);
    $res=mysqli_query($con,"SELECT * from room where room='$room'");
    $check=mysqli_num_rows($res);
    if($check>0){
       if(isset($_GET['id']) && $_GET['id']!=''){
          $getData=mysqli_fetch_assoc($res);
          if($id==$getData['id']){

          }else{
            $msg="room already exist";

          }

       }else{
         $msg="room already exist";

       }
    }else{

       if(isset($_GET['id']) && $_GET['id']!=''){
       mysqli_query($con, "update room set room='$room' where id='$id'");
  
       }else{
           mysqli_query($con, "insert into room(room) values('$room')");
   }
    
    header('location:room.php');
    die();
}    } 



?>
 <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header">
                        <strong>Room</strong>
                        <small> Form</small></div>
                        <form action="" method="post">
                        <div class="card-body card-block">
                          
                          <div class="form-group"><label for="room" class=" form-control-label">Room</label>
                             <input type="text" name="room" placeholder="Enter Room Name" class="form-control" required value="<?php echo $room?>"></div>
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