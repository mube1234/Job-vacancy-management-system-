<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head></head>
<title>Homepage</title>
<body>
<?php
include ("connection.php");
 include ("navbar.php");
?>

<!-- Carousel
   ================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="first-slide" src="images/tech1.jpg" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h2>Beeksisa Qacarrii</h2>

                    <p><a class="btn btn-lg btn-primary" href="create_account.php" role="button">Sign up today</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="second-slide" src="images/teck3.jpeg" alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <h2>Beeksisa Caalbaasii</h2>

                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="third-slide" src="images/tech6.jpg" alt="Third slide">
            <div class="container">
                <div class="carousel-caption">
                    <h2>Beeksisa Jijjiirraa</h2>

                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="fourth-slide" src="images/teck4.jpeg" alt="Fourth slide">
            <div class="container">
                <div class="carousel-caption">
                    <h2>Beeksisa Bittaa Meeshaa</h2>

                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- /.carousel -->

<div class="container-fluid">
    <div class="row" >
        <div  class="panel panel-body" >
            <div class="container">
                 <center><h3 style="color: #2e6da4">Welcome to Job Vacancy Network Platform</h3>
                         <h3  style="color: green">Join Us today</h3>
                 </center>
                            <br><br>
                <center>
                    <div class="col-md-3">
                        <img src="icons/AddUser.png">
                        <h5><b>Step1:</b> Creat account</h5>


                    </div>
                    <div class="col-md-3">

                        <img src="icons/Resume.png">
                        <h5><b>Step2:</b> Upload Resume</h5>

                    </div>
                    <div class="col-md-3">

                        <img src="icons/apply.png">
                        <h5><b>Step3:</b> Apply for vacancy</h5>


                    </div>
                    <div class="col-md-3">
                        <img src="icons/Approval.png">
                        <h5><b>Step4:</b> Get confirmation  </h5>

                    </div>
                </center>
<!--                         <p>Welcome to online Job vacancy network platform. It provides facility to the Job Seeker or candidates-->
<!--                             to search for various jobs as per his qualification. Here Job Seeker can registered himself on the web portal and create-->
<!--                             his profile along with his educational information. </p>-->
<!--                         <p>This Portal is also designed for the various employer who required to recruit employees in their organization or office.-->
<!--                             candidates can registered by admin on the web portal and then he can upload information of various job vacancies in their-->
<!--                             organization or office.-->
<!--                             Employeer can view the applications of Job Seeker and send call latter to the job seekers.</p>-->

<!--        <section class="panel panel-body text-right" style="margin-top: 40px;">-->
<!--            --><?php
//            if(isset($_SESSION['id']) && !empty($_SESSION['id']) )
//            {
//                ?>
<!--                --><?php
//            }
//            else
//            {
//                ?>
<!--                <a href="login.php"><span class="glyphicon glyphicon-log-in" ></span> Login</a>-->
<!--                <a href="create_account.php">  <span class="glyphicon glyphicon-user" style="margin-left: 30px"></span> Register<br></a>-->
<!---->
<!--                --><?php
//            }
//            ?>
<!--                </section>-->

                    <form method="get" >
                        <div class="input-group col-md-6">
                            <input type="text" class="form-control" name="search_vacancy"  placeholder="Search vacancy here..."  required="required">
                            <div class="input-group-btn">
                                <button type="submit" name="search_vacancy_btn" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> search</button>
                            </div>
                        </div>

                    </form>

<!--            <center><h2 style="color: #375dae">Recent Job Vacancies  <span class="glyphicon glyphicon-arrow-down"</span></h2></center>-->
    </div>
</div>
</div>
</div>

<!--for pagination purpose-->
<?php
$per_page=5;
if (isset($_GET['page']))
{
    $page=$_GET['page'];
}
else
{
    $page=1;
}
$start_from=($page-1)*$per_page;
?>

<div class="container-fluid">
<div class="row">
    <div class="col-md-8">

            <?php
            $view_vac="select * from vacancy  ORDER BY Date DESC LIMIT $start_from,$per_page ";
            $query=mysqli_query($conn,$view_vac);
            while ($list_vac=mysqli_fetch_array($query))
            {
                $upload_date=$list_vac['Date'];
                $date=new DateTime($upload_date);

                $exp_date=$list_vac['Last_Date'];
                $last_date=new DateTime($exp_date);

                $title=$list_vac['Title'];
                $description=$list_vac['Description'];

                ?>
        <div class=" panel panel-body" style=" border:2px solid #c5c5c5;">


                 <small class="text-muted" style="float: right">Uploaded on: <?php echo $date->format('d/m/yy')?></small><br>

            <center><h4><?php echo $title ?></h4></center>

           <small class="text-muted"> <span class="glyphicon glyphicon-map-marker"></span> Bedele, Ethiopia</small>

                 <p><b>Description:</b> <?php echo implode(" ",array_slice(str_word_count($description,2),0,30)); ?>...</p>
            <a href="vacancy_detail.php?id=<?php echo $list_vac['id'] ?>" class="btn btn-info btn-sm "> Read More</a><br><br>

            <div style="color: #b22454" >

                <?php
                $time_ago=strtotime($upload_date);
                echo timeAgo($time_ago);
                ?>


            </div><br>
                 <p><span class="glyphicon glyphicon-calendar"></span> Last date:  <?php echo $last_date->format('d/m/yy')?></p><br>

                <div style="float:right;color: #2e6da4">

                    <a href=""> <span class="glyphicon glyphicon-share"></span> Share</a>
                 </div>
        </div>
                <?php
            }
            ?>







<!--            pagination-->
            <div class="">
                <ul class="pagination">
                    <?php
                    $pagination_sql="SELECT * FROM vacancy;";
                    $run_pagination=mysqli_query($conn,$pagination_sql);
                    $count=mysqli_num_rows($run_pagination);
                    $total_page=ceil($count/$per_page);
                    for ($i=1;$i<=$total_page;$i++)
                    {
                        echo '  <li><a href="index.php?page='.$i.'">'.$i.'</a></li>';
                    }
                    ?>



                    </ul>


          </div>
<!--        end of pagination-->
    </div>
        <div class="col-md-4">
            <div class="panel panel-body">
                <h3>Subscribe for free</h3>
                <input type="email" name="subscribe" placeholder="example@gmail.com" class="form-control"><br>
                <button type="submit" class="btn btn-primary" style="float: right">Subscribe</button>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading" style="background-color: #326dad"><h4><center>Job by Category</center>

                    </h4></div>
                <div class="panel-body">
                   <div class="col-md-8" >
                       <?php
                       $qacarrii="SELECT * FROM vacancy WHERE category='beeksisa qacarrii';";
                       $run_pagination=mysqli_query($conn,$qacarrii);
                       $qacarrii_count=mysqli_num_rows($run_pagination);
                       ?>
                       <p><span class="glyphicon glyphicon-ok-sign"></span><a href=""> Beeksisa qacarrii (<?php echo $qacarrii_count; ?>)</a></p>
                       <p><span class="glyphicon glyphicon-ok-sign"></span><a href=""> Beeksisa caalbaasii(8)</a></p>
                       <p><span class="glyphicon glyphicon-ok-sign"></span><a href=""> Beeksisa guddina sadarkaa(8)</a></p>
                       <p><span class="glyphicon glyphicon-ok-sign"></span><a href=""> Beeksisa carraa barnootaa(8)</a></p>



                   </div>
                   </div>
            </div>

    </div>
</div>

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

<!--end of time ago-->
</div>

</body>
<?php
include ("footer.php");
?>


</html>
