<?php 
    require_once("includes/header.php"); 
    include('core/frontend_functions.php');
    if(!isset($_SESSION['auth_id'])) { 
        header("Location: sign-in.php");
    }
    
 
    $job_id = $_GET['id'];
    $applicants = get_single_data('job_applications','job_id',$job_id);
    $get_job_detail = get_single_job($job_id);
    $job_detail = mysqli_fetch_assoc($get_job_detail);
    
    // $action_type = 'Add';

    // if(isset($_GET['action']) && $_GET['action'] === 'update' && isset($_GET['id'])){
    //     $action_type = "Update";
    //     $job_id = $_GET['id'];
    //     $single_job = get_single_data('jobs','id',$job_id);
    //     if(mysqli_num_rows($single_job) > 0){
    //         $single_job = mysqli_fetch_assoc($single_job);
    //     }else{
    //         header("Location: my-jobs.php");
    //     }
    // }

    // if(isset($_GET['delete']) && $_GET['delete'] === 'true'){
    //     $job_id = $_GET['id'];
    //     delete_data('jobs','id',$job_id);
    //     header("Location: my-jobs.php?action=success&msg=Data Deleted!");
    // }

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
                            <h3>All Applicants</h3>
                        </div>
                        <div class="table responsive-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php while($applicant = mysqli_fetch_assoc($applicants)) { ?>  

                                    <tr>
                                        <td>#<?= $applicant['id'] ?></td>
                                        <td><?= $applicant['name'] ?></td>
                                        <td><?= $applicant['email'] ?></td>
                                        <td><?= date('d M, Y',strtotime($applicant['created_at'])) ?></td>
                                        <td>
                                            <a href="?id=<?= $job_id ?>&application_id=<?= $applicant['id'] ?>" class="button button-sm button-a">View</a>
                                            <a href="?delete=true&id=<?= $applicant['id'] ?>" onclick="return confirm('Are you want to Delete!')" class="button button-sm button-red">Remove</a>
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
                        <h3>Title:  <?= $job_detail['title'] ?></h3>
                        <p>Deadline: <?= date('d M, Y', strtotime($job_detail['deadline'])) ?></p>
                        <br>
                        <?php if(isset($_GET['application_id'])){
                            $get_applicant_data = get_single_data('job_applications','id',$_GET['application_id']);
                            $job_applicant = mysqli_fetch_assoc($get_applicant_data);
                        ?>
                         
                        <p style="margin-bottom:8px"><b>Applicant Name: </b> <?= $job_applicant['name'] ?></p>
                        <p style="margin-bottom:8px"><b>Applicant Email: </b> <?= $job_applicant['email'] ?></p>
                        <p style="margin-bottom:8px"><b>Applicant Phone: </b> <?= $job_applicant['phone'] ?></p>
                        <div>
                            <p style="margin-bottom:8px"><b>Cover Latter: </b> </p>
                            <?= $job_applicant['cover_latter'] ?>
                        </div>
                        <br><hr><br>
                            <p><b>Applicant CV: </b> <a href="./uploads/<?= $job_applicant['cv'] ?>" target="_blank">Download</a></p>
                        <br><hr>
                        <?php }else{ ?>
                            <br>
                            <h3>No Application is Selected</h3>
                        <?php } ?>
                    </div>
                </div>
            </div>
            
        </div>
    </section>


<?php require_once("includes/footer.php"); ?>