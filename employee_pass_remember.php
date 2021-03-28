<?php
session_start();
?>
<?php
if (isset($_SESSION['id'])) {
# code...

?>
<!DOCTYPE html>
<html>
<head>
	<title>forgo_password</title>
</head>
<body style="background-color: #dbd9d5">
	<?php
	include("navbar.php");
	include ("connection.php");
	?>
	<div class="container"  style="margin-top:60px;">
		<div class="col-md-12">

			<div class="col-md-6">
				<form method="post">
                    <div class="panel panel-primary">

                    	<div class="panel-heading">Helps to reset your password</div>
                    	<div class="panel-body">
                            <?php
                            $id=$_GET['id'];
                            
                           
                            if(isset($_POST['btn_insert']))
                            {
                                
                                $question=$_POST['que'];
                                $answer=$_POST['ans'];


                                $insert="INSERT INTO forgot_table (user_id,question,answer) VALUES 
                              ('$id','$question','$answer')";
                                $insert_query=mysqli_query($conn,$insert);
                                if ($insert_query)
                                {
                                    echo  "<div class='alert alert-success' style='background-color: green;color: white'>
                                <i class=\"glyphicon glyphicon-ok\"></i>&nbsp; <b>set Successfully </b>
                              
                                </div>";
//
                                }
                                else
                                {
                                    die( "<b> <font color='red'>something went wrong! try again</font> </b>".mysqli_error($conn));


                                }
                            }
                            ?>


           <input type="text" value="<?php echo $row['Id']; ?>" hidden="hidden">
                            <label>SELECT QUESTION?</label>
                    		<select class="form-control" name="que">
                    			<option>What is your grandfather name?</option>
                    			<option>What is your favourite food name?</option>
                    			<option>What is your hobby?</option>
                    		</select>
                    		<label>answer here</label>
                    		<input type="text" name="ans" class="form-control"><br>
                    		<button type="submit" class="btn btn-info" name="btn_insert">submit</button>
                    	</div>
                    </div>
                </form>

			</div>
			
		</div>
		
	</div>

</body>
</html>
    <?php
}
else
{
    header("location:login.php");
//    header("location:http://localhost/vcnp/login.php");
}
?>