<?php include 'inc/header.php'; ?>
<?php include '../classes/product.php'; ?>

<?php
$prod = new Product();
if (isset($_GET['del']) && $_GET['del'] != '') {
    $del = $prod->del_prod($_GET['del']);
    echo $del;
}
?>

<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                    <li class="breadcrumb-item"><a href="main.php" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                </ol>
            </nav>
            <h1 class="mb-0 fw-bold">Products</h1>
        </div>
        <div class="col-6">
            <div class="text-end upgrade-btn">
                <a href="insert_product.php" class="btn btn-primary text-white">Add New Product</a>
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
                                <th scope="col">Prod_Cate</th>
                                <th scope="col">Prod_Name</th>
                                <th scope="col">Prod_Price</th>
                                <th scope="col">Prod_Des</th>
                                <th scope="col">Prod_Image</th>
                                <th scope="col">Prod_Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $res = $prod->list_prod();
                            $i = 0;
                            while ($row = $res->fetch_assoc()) {
                                $i++;
                            ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $row['cate_name'] ?></td>
                                    <td><?= $row['prod_name'] ?></td>
                                    <td><?= $row['prod_price'] ?></td>
                                    <td><?= $row['prod_des'] ?></td>
                                    <td><img width="100" height="100" src="uploads/<?= $row['prod_image'] ?>"></td>
                                    <td>
                                        <?php
                                        if ($row['prod_status'] == 1)
                                            echo '<a href="../classes/status.php?id=' . $row['id'] . '&page=prod&status=1" class="badge bg-success">Active</a>';
                                        else echo '<a href="../classes/status.php?id=' . $row['id'] . '&page=prod&status=0" class="badge bg-warning">Inactive</a>';
                                        ?>
                                    </td>
                                    <td><a href="edit_product.php?edit=<?= $row['id'] ?>"><button class="badge bg-info">Edit</button></a>
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