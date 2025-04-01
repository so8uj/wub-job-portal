<?php 
    require_once("includes/header.php"); 
    include('core/frontend_functions.php');
    if(!isset($_SESSION['auth_id'])) { 
        header("Location: sign-in.php");
    }
    
    $filters = [];
    if(isset($_GET['status'])){
        $filters['status'] = $_GET['status'];
    }
    $my_jobs = all_jobs_with_filters($filters,0,1);

    
    $action_type = 'Add';

    if(isset($_GET['action']) && $_GET['action'] === 'update' && isset($_GET['id'])){
        $action_type = "Update";
        $job_id = $_GET['id'];
        $single_job = get_single_data('jobs','id',$job_id);
        if(mysqli_num_rows($single_job) > 0){
            $single_job = mysqli_fetch_assoc($single_job);
        }else{
            header("Location: my-jobs.php");
        }
    }

    if(isset($_GET['delete']) && $_GET['delete'] === 'true'){
        $job_id = $_GET['id'];
        delete_data('jobs','id',$job_id);
        header("Location: my-jobs.php?action=success&msg=Data Deleted!");
    }

?>

    <section class="single-page bg-white">

        <div class="container">
            
            <?php if(isset($_GET['id_opned']) && $_GET['id_opned'] === 'true'){ ?> 
            <div class="success">Welcome to WUB Local Job Portal</div>
            <?php } 
            if(isset($_GET['action']) && $_GET['action'] === 'success'){ ?> 
                <div class=" success"><?= isset($_GET['msg']) ? $_GET['msg'] : '' ?></div>
            <?php }elseif(isset($_GET['action']) && $_GET['action'] === 'invalid'){ ?>
                <div class="invalid"><?= isset($_GET['msg']) ? $_GET['msg'] : '' ?></div>
            <?php } 
            include("./includes/dashboard_menu.php");
            ?>


            <div class="flex contact-box-container">
                <div class="w-60 contact-box ">
                    <div class="box-shadow contact-form">
                        <div class="flex justify-between">
                            <h3>Manage My <?= isset($_GET['status']) ? $_GET['status'] : '' ?> Jobs</h3>
                            <div>
                                <a href="my-jobs.php" class="button button-sm button-a">All</a>
                                <a href="?status=Approved" class="button button-sm button-green">Approved</a>
                                <a href="?status=Pending" class="button button-sm button-warning">Pending</a>
                                <a href="?status=Rejected" class="button button-sm button-red">Rejected</a>
                            </div>
                        </div>
                        <div class="table responsive-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Job Title</th>
                                        <th>Job Deadline</th>
                                        <th>Job Salary</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php while($my_job = mysqli_fetch_assoc($my_jobs)) { ?>  

                                    <tr class="<?= $my_job['status'] === 'Pending' ? 'pending' : ($my_job['status'] === 'Rejected' ? 'rejected' : '') ?>">
                                        <td>#<?= $my_job['id'] ?></td>
                                        <td><?= $my_job['title'] ?></td>
                                        <td><?= date('d M, Y',strtotime($my_job['deadline'])) ?></td>
                                        <td><?= $my_job['salary'] ?></td>
                                        <td>
                                            <a href="#" class="button button-sm button-a">View</a>
                                            <a href="?action=update&id=<?= $my_job['id'] ?>" class="button button-sm button-warning">Edit</a>
                                            <a href="?delete=true&id=<?= $my_job['id'] ?>" onclick="return confirm('Are you want to Delete!')" class="button button-sm button-red">Delete</a>
                                        </td>
                                    </tr>

                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                   
                </div>
                <div class="w-40 contact-box-right">
                    <div class="box-shadow contact-form">
                        <h3><?= $action_type == 'Add' ? 'List a New' : 'Update' ?> Job</h3>
                        <div class="validation-errors"></div>
                        <form action="./core/jobs.php" method="post" class="main-contact-from">
                            <div class="form-group">
                                <label for="title">Job Title</label>
                                <input type="text" data-name="Job Title" placeholder="ex: Laravel Developer" class="input" name="title" value="<?= $action_type == 'Add' ? '' : $single_job['title'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Job Description</label>
                                <textarea cols="50" data-name="Job Description" rows="3" class="input" placeholder="" name="description" required><?= $action_type == 'Add' ? '' : $single_job['description'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="deadline">Job Deadline</label>
                                <input type="date" data-name="Job Deadline" class="input" name="deadline" value="<?= $action_type == 'Add' ? '' : $single_job['deadline'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="area">Job Area</label>
                                <textarea cols="50" rows="3" data-name="Job Area" class="input" placeholder="ex: Belly Tower, 5th Floor Chasara, Narayanganj, 1410" name="area" required><?= $action_type == 'Add' ? '' : $single_job['area'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="salary">Job Salary</label>
                                <input type="text" data-name="Job Salary" placeholder="ex: Negotiable/30,000 BDT" class="input" name="salary" value="<?= $action_type == 'Add' ? '' : $single_job['salary'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="office_time">Office Time</label>
                                <input type="text" data-name="Office Time" placeholder="ex: 10:00 AM - 06:00 PM" class="input" name="office_time" value="<?= $action_type == 'Add' ? '' : $single_job['office_time'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Weekends</label>
                                <input type="text" data-name="Weekends" placeholder="ex: 2/3/4" class="input" name="weekends" value="<?= $action_type == 'Add' ? '' : $single_job['weekends'] ?>" required>
                            </div>
                            <?php if($action_type === 'Update'){ ?>     
                                <input type="hidden" name="job_id" value="<?= $job_id; ?>">
                            <?php } ?>
                            <input type="hidden" name="action_type" value="<?= $action_type; ?>">

                            <button type="button" id="submit-form" class="button button-a"><?= $action_type == 'Add' ? 'Post' : 'Update' ?> Job</button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </section>


<?php require_once("includes/footer.php"); ?>