<?php
    include('core/frontend_functions.php');

    $filters = [];
    if(isset($_GET['status'])){
        $filters['status'] = $_GET['status'];
    }
    $get_all_jobs = all_jobs_with_filters($filters,1);
    
    require_once("includes/header.php");
    if (!isset($_SESSION['auth_id'])) {
        header("Location: sign-in.php");
    }
    if ($auth_user['role'] === 'Company') {
        header("Location: dashboard.php");
    }

    
?>

<section class="single-page bg-white">
    <div class="container">
    <?php include("./includes/dashboard_menu.php"); ?>
        <div class="contact-box ">
            <div class="box-shadow contact-form">
                <div class="flex justify-between">
                    <h3>Manage <?= isset($_GET['status']) ? $_GET['status'] : '' ?> Jobs</h3>
                    <div>
                        <a href="all-jobs.php" class="button button-sm button-a">All</a>
                        <a href="?status=Approved" class="button button-sm button-a">Approved</a>
                        <a href="?status=Pending" class="button button-sm button-a">Pending</a>
                        <a href="?status=Rejected" class="button button-sm button-a">Rejected</a>
                    </div>
                </div>
                <div class="table responsive-table">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Job By</th>
                                <th>Job Title</th>
                                <th>Job Deadline</th>
                                <th>Job Salary</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($all_jobs = mysqli_fetch_assoc($get_all_jobs)) { ?>

                                <tr class="<?= $all_jobs['status'] === 'Pending' ? 'pending' : ($all_jobs['status'] === 'Rejected' ? 'rejected' : '') ?>">
                                    <td>#<?= $all_jobs['id'] ?></td>
                                    <td><?= $all_jobs['name'] ?></td>
                                    <td><?= $all_jobs['title'] ?></td>
                                    <td><?= date('d M, Y', strtotime($all_jobs['deadline'])) ?></td>
                                    <td><?= $all_jobs['salary'] ?></td>
                                    <td>
                                        <a href="#" class="button button-sm button-a">View</a>
                                        <a href="?action=update&id=<?= $all_jobs['id'] ?>" class="button button-sm button-a">Edit</a>
                                        <a href="?delete=true&id=<?= $all_jobs['id'] ?>" onclick="return confirm('Are you want to Delete!')" class="button button-sm button-a">Delete</a>
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