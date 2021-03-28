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
<html>
<body>

<div class="col-md-12"  style="margin-top:60px;">
    <?php
    include ("sidebar.php")
    ?>
    <div class="col-md-8">
        <form class="form-inline" style="margin-top: 30px">
            <input type="text" class="form-control" placeholder="Search customers here..." style="width: 50%">
            <button type="submit" class="btn btn-primary">Search </button>
        </form><br>
            <?php
            $users="select * from user WHERE role='Candidate'";
            $users=mysqli_query($conn,$users);
            $total_can=mysqli_num_rows($users);
            ?>
        <?php
        echo $total_can."  ". "<b>Candidiate found</b>";
        ?>
            <table  class="table table-bordered table-striped table-condensed table-responsive">
                <tr style="height: 50px;">

                    <th>Id</th>
                    <th >frist name</th>
                    <th>last name</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Actions</th>

                </tr>

                <?php
                while ($user=mysqli_fetch_array($users))
                {


                    ?>
                    <tr>
                        <td> <?php echo $user['Id'] ?></td>
                        <td>  <?php echo $user['Fname'] ?></td>
                        <td> <?php echo $user['Mname'] ?></td>
                        <td><?php echo $user["Phone"] ?></td>
                        <td> <?php echo $user['Gender'] ?></td>
                        <td> <?php echo $user['Address'] ?></td>

                      <?php
                        $id=$user['Id'];
                        ?>
                        <td>
                            <a href="#" class="btn btn-link btn-sm"><i class="glyphicon glyphicon-eye-open"></i> Detail</a>
                            <a href="#" onclick='deleteCandidate(<?php echo $id;?>)'  class="btn btn-link btn-sm"><i class="glyphicon glyphicon-trash"></i> Delete</a



                        </td>

                    </tr>
                    <?php
                }
                ?>
            </table>

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




<script>//to delete the category
    function deleteCandidate(Id)
    {
        var ans=confirm("Are you sure to delete Candidate with  Id "+" = "+ Id+"?");
        if(ans){
            window.location="http://localhost/vcnp/delete_candidate.php?id="+Id;
        }

    }

</script>
