<?php
    require_once("includes/header.php");
    include('core/frontend_functions.php');

    if (!isset($_SESSION['auth_id'])) {
        header("Location: sign-in.php");
    }
    if ($auth_user['role'] === 'Company') {
        header("Location: dashboard.php");
    }

    $role = 0;
    if(isset($_GET['role'])){
        $role = $_GET['role'];
    }

    $all_users = get_users($role);
    
    if(isset($_GET['change_role']) && $_GET['id']){
        $role = $_GET['change_role'];
        $user_id = $_GET['id'];
        change_user_role($user_id,$role);
        if($status_chnage == 'Approved'){
            $status = 'success';
        }else{
            $status = 'invalid'; 
        }
        header("Location: users.php?action=success&msg=User Role Changed Successfully!");
    }

    
?>

<section class="single-page bg-white">
    <div class="container">
    <?php 

        if(isset($_GET['action']) && $_GET['action'] === 'success'){ ?> 
            <div class=" success"><?= isset($_GET['msg']) ? $_GET['msg'] : '' ?></div>
        <?php }elseif(isset($_GET['action']) && $_GET['action'] === 'invalid'){ ?>
            <div class="invalid"><?= isset($_GET['msg']) ? $_GET['msg'] : '' ?></div>
        <?php } 
        include("./includes/dashboard_menu.php"); 
    ?>

        <div class="contact-box ">
            <div class="box-shadow contact-form">
                <div class="flex justify-between">
                    <h3>Manage Users</h3>
                    <div>
                        <a href="users.php" class="button button-sm button-a">All</a>
                        <a href="?role=Admin" class="button button-sm button-warning">Admin</a>
                        <a href="?role=Company" class="button button-sm button-a">Company</a>
                    </div>
                </div>
                <div class="table responsive-table">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($all_user = mysqli_fetch_assoc($all_users)) { ?>

                                <tr>
                                    <td>#<?= $all_user['id'] ?></td>
                                    <td><?= $all_user['name'] ?></td>
                                    <td><?= $all_user['email'] ?></td>
                                    <td>
                                        <span class="button button-sm <?= $all_user['role'] == 'Company' ? 'button-a' : 'button-warning' ?>"><?= $all_user['role'] ?></span>
                                    </td>
                                    <td>
                                        <?php if($all_user['id'] != $user_id){ 
                                            if($all_user['role'] == 'Company'){ ?> 
                                            
                                                <a href="?change_role=Admin&id=<?= $all_user['id']; ?>" class="button button-sm button-warning" onclick="return confirm('Are you want to Make Admin!')">Make Admin</a>
                                            <?php }else{?> 
                                                <a href="?change_role=Company&id=<?= $all_user['id']; ?>" class="button button-sm button-red" onclick="return confirm('Are you want to Remove Admin!')">Remove Admin</a>
                                                
                                            <?php } 
                                        } ?>
                                    </td>
                                </tr>

                            <?php } ?>

                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>
</section>


<?php require_once("includes/footer.php"); ?>