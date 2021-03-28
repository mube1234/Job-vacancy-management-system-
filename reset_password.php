
<?php
include ('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/crousel.css">
<link rel="stylesheet" href="bootstrap/style.css">
<script src="bootstrap/js/jquery-1.11.3.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
    <title>Reset password</title>
</head>
<body>
	<div class="container-fluid"  style="margin-top:60px;">
		<div class="col-md-12">

			<div class="col-md-6">
                <?php
                if(isset($_POST['btn_reset']))
                {
                    $phone=$_POST['phone'];
                    $question=$_POST['que'];
                    $answer=$_POST['ans'];


                    $check_phone="select * from user where Phone='$phone'";
                    $query_phone = mysqli_query($conn,$check_phone);
                    $check2=mysqli_fetch_array($query_phone);
                    $check= mysqli_num_rows($query_phone);
                    if ($check==1 && $check2['Phone']==$phone)
                    {
//               echo "<div class='alert alert-danger' style='background-color: #d80000;color: #ffffff'><p>Phone number already exist,try to use another number</p></div>";

                        $chech_id="select Id from user where Phone='$phone'";
                        $query_id = mysqli_query($conn,$check_phone);
                        $row=mysqli_fetch_array($query_id);
                        if ($row['Id'])
                        {
                            $id=$row['Id'];
                            $chech_id = "select *  from forgot_table f JOIN user u ON f.user_id=u.Id where user_id='$id'";
                            $query_ques = mysqli_query($conn, $chech_id );
                            $row = mysqli_fetch_array($query_ques);

                            if ($row['question'] == $question && $row['answer'] == $answer)
                            {
                                ?>
                                <a href="new_password.php?id=<?php echo $row['user_id'] ?>" class="btn btn-primary" style="float: right;">Click Next</a>
                                <div class="clearfix"></div>
                                <?php

                            } else
                            {
                                echo "<div class='alert alert-danger' style='background-color: #ae2a1e;color: #ffffff'><p>try again! question or answer is incorrect</p></div>";

                            }
                        }
                        else
                        {

                        }
                    }
                    else
                    {
                        echo "<div class='alert alert-danger' style='background-color: #ae2a1e;color: #ffffff'><p>Phone number does not registered! create new account <a href='create_account.php' class='btn btn-info' style='color:#ffffff'>here</a> </p></div>";

                    }
                }


                ?>
				<form method="post">
                    <div class="panel panel-success">
                            <div class="panel-heading">Password Retrieve Method</div>
                    	<div class="panel-body">
                    		 <label>Your Phone number *</label>
                         <input type="number" name="phone" class="form-control" required="required">
                         <label>select question *</label>
                    		<select class="form-control" name="que" required="required">SELECT QUESTION?
                    			<option>What is the name of your first school?</option>
                    			<option>What is your favourite food name?</option>
                    			<option>What is your future goal?</option>
                    		</select>
                    		<label>Answer here  *</label>
                    		<input type="text" name="ans" class="form-control" required="required"><br>
                    		<button type="submit" class="btn btn-info" name="btn_reset">submit</button>
                    	</div>
                    </div>
                </form>

			</div>
			
		</div>
		
	</div>

</body>
</html>