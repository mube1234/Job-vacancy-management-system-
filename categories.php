<?php
session_start();
?>
<?php
if(isset($_SESSION['id'])) {
    ?>
<!DOCTYPE html>
<html>
<title>Homepage</title>
<body style="background: #f2f2f2">
<?php
include ("navbar.php");
include ("connection.php");
?>
<div class="col-md-12"  style="margin-top:60px;">
<?php
include ("sidebar.php")
?>
    <div class="col-sm-8" style="margin-top: 10px;">
        <div class="panel">
            <div class="panel-heading">
                <h2>Vacancy Categories</h2>
                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#githubModal"  style="float: right"><i class="glyphicon glyphicon-plus " ></i> Add New</button>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr style="background: #f2f2f2">

                        <th>Category name</th>
                        <th>Actions </th>
                    </tr>


                <?php
                $view_cat="SELECT * FROM category";
                $query=mysqli_query($conn,$view_cat);
                $total_category=mysqli_num_rows($query);
                while ($list_cat=mysqli_fetch_array($query))
                {
                   ?>
                    <tr>

                        <td><?php echo $list_cat['name']?></td>
                        <?php $id=$list_cat['Id'];?>
                        <td ><a href="" class="btn btn-info btn-sm" ><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                            <a href="" onclick='deleteCategory(<?php echo $id;?>)' class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> delete</a>
                        </td>
                    </tr>

                <?php
                }
                ?>
                </table>

            <?php
            echo $total_category. " ".'categories'
            ?>
            </div>
        </div>

<!--        modal-->

        <div class="modal fade" id="githubModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="glyphicon glyphicon-remove"></i></button>
                        <h4 class="modal-title">Add vacancy category</h4>
                    </div>
                    <div class="modal-body">
                       <label>Category</label>
                        <form action="" method="post">
                        <input type="text" name="category" placeholder="example qacarrii" class="form-control"><br>
                        <button type="submit" class="btn btn-info" name="btn_enter">Enter</button>
<!--                            php code should be here-->
                            <?php
                            if(isset($_POST['btn_enter']))
                            {
                                $name=$_POST['category'];

                                $checking="SELECT * FROM category WHERE name='$name'";
                                $run_cat = mysqli_query($conn,$checking);
                                $check_test=mysqli_fetch_array($run_cat);
                                $check= mysqli_num_rows($run_cat);

                                if ($check>0 && $check_test['name']==$name)
                                {
                                    echo "<script>alert('sorry,this category already exist!')</script>";
                                    exit();
                                }
                                $name_insert="INSERT INTO category(name) VALUES ('$name')";
                                $name_result=mysqli_query($conn,$name_insert);
                                if($name_result)
                                {
                                    echo "<script>alert(' Done,data inserted successfully')</script>";
                                }
                                else
                                {

                                    die('falied'. mysqli_error($conn));
                                }
                            }

                            ?>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i>  Cancel</button>

                    </div>
                </div>
            </div>
        </div>

<!--        end of modal-->
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
<script>//to delete the category
    function deleteCategory(Id)
    {
        var ans=confirm("Are you sure to delete these category ");
        if(ans){
            window.location="http://localhost/vcnp/delete_category.php?id="+Id;
        }

    }

</script>