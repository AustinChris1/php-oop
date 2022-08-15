<?php
include "includes/header.php";
include "includes/topbar.php";
require_once "controllers/userController.php";

?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Users</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Username</th>
                                                <th>Phone</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $users = new userController;
                                            $result = $users->index();
                                            if($result){
                                                foreach($result as $row){
                                                    ?>
                                        <tr>
                                            <td><?= $row['id'];?></td>
                                            <td><?= $row['name'];?></td>
                                            <td><?= $row['email'];?></td>
                                            <td><?= $row['username'];?></td>
                                            <td><?= $row['phone'];?></td>
                                            <td>
                                                <a href="user_edit.php?id=<?= $row['id'];?>" class="btn btn-info">Edit</a>
                                            </td>
                                            <td>
                                                <form action="codes/userCode.php" method="post">
                                                <button type="submit" name="delete_user" value="<?= $row['id']?>" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        </tr>

                                                    <?php
                                                }

                                            }else{
                                                echo "No record found";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <?php
include "includes/footer.php";
?>