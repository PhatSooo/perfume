<?php include 'inc/header.php'; ?>
<?php include '../classes/category.php'; ?>

<?php
$cate = new Category();
if (isset($_GET['del']) && $_GET['del'] != '') {
    $cate->del_cate($_GET['del']);
}
?>

<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                    <li class="breadcrumb-item"><a href="main.php" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
                </ol>
            </nav>
            <h1 class="mb-0 fw-bold">Categories</h1>
        </div>
        <div class="col-6">
            <div class="text-end upgrade-btn">
                <a href="insert_category.php" class="btn btn-primary text-white">Add New Category</a>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <div class="row">
        <div class="">
            <div class="card">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Cate_ID</th>
                                <th scope="col">Cate_Name</th>
                                <th scope="col">Cate_Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $res = $cate->list_cate();
                            $i = 0;
                            while ($row = $res->fetch_assoc()) {
                                $i++;
                            ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['cate_name'] ?></td>
                                    <td>
                                        <?php
                                        if ($row['cate_status'] == 1)
                                            echo '<a href="../classes/status.php?id=' . $row['id'] . '&page=cate&status=1" class="badge bg-success">Active</a>';
                                        else echo '<a href="../classes/status.php?id=' . $row['id'] . '&page=cate&status=0" class="badge bg-warning">Inactive</a>';
                                        ?>
                                    </td>
                                    <td><a href="edit_category.php?edit=<?= $row['id'] ?>"><button class="badge bg-info">Edit</button></a>
                                        ||
                                        <a onclick="return confirm('Are you sure to delete this item?')" href="?del=<?= $row['id'] ?>" class="badge bg-danger" href="">Delete</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include 'inc/footer.php'; ?>