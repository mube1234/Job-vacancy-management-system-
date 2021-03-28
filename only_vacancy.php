<?php
session_start();
?>
<?php
if (isset($_SESSION['id'])) {
# code...

?>
<?php
include ("navbar.php");
include ("connection.php");
?>

<div class="col-md-12"  style="margin-top:90px;">
<div class="row">
    <div class="container-fluid">
        <form method="get" >
            <div class="col-md-8">
            <div class="input-group ">
                <input type="text" class="form-control" name="search_vacancy"  placeholder="Search here..."  required="required">
                <div class="input-group-btn">
                    <button type="submit" name="search_vacancy_btn" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Search</button>

                </div>
            </div>
              <center>  <h3 style="color: #1ca095">Recent vacancy availables</h3></center>
            </div>
        </form>



    </div>
    </div>

<?php
if (isset($_GET['search_vacancy_btn']))
{
        $search_query= $_GET['search_vacancy'];
        $get_vacancy="select * from vacancy where Title like '%$search_query%' OR 
                    Description like '%$search_query%' or Cat_Id like '%$search_query%'";
}
else
{
    $get_vacancy="select * from vacancy ORDER BY Date DESC ";
}
$run_vacancy=mysqli_query($conn,$get_vacancy);

while ($list_vac=mysqli_fetch_array($run_vacancy))
{
    $upload_date=$list_vac['Date'];
    $date=new DateTime($upload_date);

    $exp_date=$list_vac['Last_Date'];
    $last_date=new DateTime($exp_date);

    $title=$list_vac['Title'];
    $description=$list_vac['Description'];

    ?>
</div>

<div class="row ">
<div class="col-md-12 ">
  <div class="col-md-9">
    <div class=" panel panel-body" style=" border:1px solid #c5c5c5;">


        <small class="text-muted" style="float: right">Uploaded on: <?php echo $date->format('d/m/yy')?></small><br>

        <center><h4><?php echo $title ?></h4></center>

        <small class="text-muted"> <span class="glyphicon glyphicon-map-marker"></span> Bedele, Ethiopia</small>

        <p><b>Description:</b> <?php echo implode(" ",array_slice(str_word_count($description,2),0,30)); ?>...</p>
        <a href="vacancy_detail.php?id=<?php echo $list_vac['id'] ?>" class="btn btn-info btn-sm "> Read More</a><br><br>

        <div style="color: #b22454" >

<!--            --><?php
//            $time_ago=strtotime($upload_date);
//            echo timeAgo($time_ago);
//            ?>


        </div><br>
        <p><span class="glyphicon glyphicon-calendar"></span> Last date:  <?php echo $last_date->format('d/m/yy')?></p><br>

        <div style="float:right;color: #2e6da4">

            <a href=""> <span class="glyphicon glyphicon-share"></span> Share</a>
        </div>
    </div>
</div>
</div>
</div>
    <?php
}
?>
<!--time ago-->

<?php
function timeAgo($time_ago){

    $cur_time=time();
    $time_elapsed=$cur_time-$time_ago;
    $seconds=$time_elapsed;
    $minutes=round($time_elapsed/60);
    $hours=round($time_elapsed/3600);
    $days=round($time_elapsed/86400);
    $weeks=round($time_elapsed/604800);
    $months=round($time_elapsed/2600640);
    $years=round($time_elapsed/31207680);
    //seconds
    if ($seconds <= 60)
    {
        echo "$seconds seconds ago";
    }
    //minutes
    else if ($minutes<=60)
    {
        if ($minutes==1)
        {
            echo "one minutes ago";
        }
        else
        {
            echo "$minutes minutes ago";
        }

    }
    //hours
    else if ($hours<=24)
    {
        if ($hours==1)
        {
            echo "an hour ago";
        }
        else
        {
            echo "$hours hours ago";
        }

    }

    //days
    else if ($days<=7)
    {
        if ($days==1)
        {
            echo "yesterday";
        }
        else
        {
            echo "$days days ago";
        }
    }
    //weeks
    else if ($weeks<=4.3)
    {
        if ($weeks==1)
        {
            echo "a week ago";
        }
        else
        {
            echo "$weeks weeks ago";
        }
    }
    //months
    elseif ($months<=12)
    {
        if ($months==1)
        {
            echo "a months ago";
        }
        else
        {
            echo "$months months ago";
        }
    }
    //years
    else
    {
        if ($years==1)
        {
            echo "one year ago";
        }
        else
        {
            echo "$years years ago";
        }
    }
}

?>
    <?php
}
else
{
    header("location:login.php");
//    header("location:http://localhost/vcnp/login.php");
}
?>

<!--end of time ago-->

