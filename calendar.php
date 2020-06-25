<?php
require('top.inc.php');
?>
<?php
//Set your timezone
    date_default_timezone_set('Asia/Tokyo');

//Get prev & next month
if(isset($_GET['ym'])){
    $ym=$_GET['ym'];
}else{
    //This month
    $ym=date('Y-m');
}
//Check formate
$timestamp =strtotime($ym.'-01');
if($timestamp===false){
    $ym=date('Y-m');
    $timestamp = strtotime($ym . '-01');
}


//Today
$today = date('Y-m-j', time());

//For H3 title
$html_title=date('Y / m ',$timestamp);

//Create prev & next month link mktime(hour,minute,second,month,day,year)
$prev=date('Y-m',mktime(0,0,0,date('m',$timestamp)-1,1,date('Y',$timestamp)));
$next=date('Y-m',mktime(0,0,0,date('m',$timestamp)+1,1,date('Y',$timestamp)));


//Number of days in the month
$day_count=date('t',$timestamp);


//0:Sun
$str=date('w',mktime(0,0,0,date('m',$timestamp),1,date('Y',$timestamp)));


//Create Calender!!
$weeks=array();
$week='';

//Add empty cell
$week .=str_repeat('<td></td>',$str);

for($day=1;$day<=$day_count;$day++,$str++){
    $date=$ym.'-'.$day;
    if($today==$date){
        $week.='<td class="today">'.$day;
    }else{
        $week .='<td>'.$day;
    }
    $week .='</td>';

    //End of the week or End of the month
    if($str % 7==6||$day==$day_count){
        if($day==$day_count){
            //Add empty cell
            $week .=str_repeat('<td></td>',6-($str % 7));
        }
        $weeks[]='<tr>'.$week.'</tr>';
        //Prepare for new
        $week='';


    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&display=swap" rel="stylesheet">
    <style>
        .container{
            font-family: 'Noto Sans', sans-serif;
            margin-top: 58px;
            margin-right:20px;
        }
        h3{
            margin-bottom:10px;
        }
        th{
            height: 40px;
            text-align: center;
        }
        td{
            height: 80px;
        }
        .today{
            background: orange;
        }
        th:nth-of-type(7),td:nth-of-type(7){
            color: blue;
        }
        th:nth-of-type(1),td:nth-of-type(1){
            color: red;
        }
        h1 {
            text-align:center;
            margin-bottom:20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3><a href="?ym=<?php echo $prev; ?>">&lt;</a> <?php echo $html_title; ?> <a href="?ym=<?php echo $next;  ?>">&gt</a> </h3>
        <br>
        <table class="table table-bordered">
        <h1>Calendar of Reservation
</h1>
            <tr>
                <th>S</th>
                <th>M</th>
                <th>T</th>
                <th>W</th>
                <th>T</th>
                <th>F</th>
                <th>S</th>
            </tr>
            <?php
                foreach($weeks as $week)
                {
                echo $week;
                }
            ?>
        </table>
    </div>
</body>
</html>
<?php
require('footer.inc.php');
?>