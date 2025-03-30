<?php
    include('core/frontend_functions.php');

    $filters = [];
    if(isset($_GET['status'])){
        $filters['status'] = $_GET['status'];
    }
    print_r($filters);
    die();

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
                <h3>Manage Jobs</h3>
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
                            <!-- <?php while ($my_job = mysqli_fetch_assoc($my_jobs)) { ?>

                                <tr class="<?= $my_job['status'] === 'Pending' ? 'pending' : ($my_job['status'] === 'Rejected' ? 'rejected' : '') ?>">
                                    <td>#<?= $my_job['id'] ?></td>
                                    <td><?= $my_job['title'] ?></td>
                                    <td><?= date('d M, Y', strtotime($my_job['deadline'])) ?></td>
                                    <td><?= $my_job['salary'] ?></td>
                                    <td>
                                        <a href="#" class="button button-sm button-a">View</a>
                                        <a href="?action=update&id=<?= $my_job['id'] ?>" class="button button-sm button-a">Edit</a>
                                        <a href="?delete=true&id=<?= $my_job['id'] ?>" onclick="return confirm('Are you want to Delete!')" class="button button-sm button-a">Delete</a>
                                    </td>
                                </tr>

                            <?php } ?> -->

                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>
</section>


<?php require_once("includes/footer.php"); ?>