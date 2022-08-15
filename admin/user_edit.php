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
                                <h3>Edit Users</h3>
                            </div>
                            <div class="card-body">
                                <?php
                                if(isset($_GET['id'])){
                                    $user_id = validateInput($db->conn, $_GET['id']);
                                    $user = new userController;
                                    $result = $user->edit($user_id);
                                    if($result){
                                        ?>
                               <form action="codes/userCode.php" method="post">
                                <div class="col-mb-6">
                                    <input type="hidden" name="id" value="<?= $result['id']?>">
                                        <label for="">Name</label>
                                        <input type="text" name="name" value="<?= $result['name']?>" class="form-control" required>
                                    </div>
                                    <div class="col-mb-6">
                                        <label for="">Username</label>
                                        <input type="text" name="username"  value="<?= $result['username']?>"class="form-control" required>
                                    </div>
                                    <div class="col-mb-6">
                                        <label for="">Email</label>
                                        <input type="email" name="email"  value="<?= $result['email']?>"class="form-control" required>
                                    </div>
                                    <div class="col-mb-6">
                                        <label for="">Phone number</label>
                                        <input type="text" name="phone"  value="<?= $result['phone']?>"class="form-control" required>
                                    </div>
                                    <div class="col-mb-6">
                                        <button type="submit" name="update_user" class="btn btn-success">Update User Details</button>
                                    </div>
                                </form>

                                        <?php
                                    }else{
                                        echo "<h3>No record found";
                                    }
                                }else{
                                    echo "<h3>Something went wrong!</h3>";
                                }
                                ?>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <?php
include "includes/footer.php";
?>