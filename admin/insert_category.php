<?php include 'inc/header.php'; ?>
<?php include '../classes/category.php'; ?>

<?php
$cate = new Category();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $insert = $cate->insert_cate($name);
}

?>

<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                    <li class="breadcrumb-item"><a href="list_category.php" class="link"><i class="mdi mdi-border-all"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
                </ol>
            </nav>
            <h1 class="mb-0 fw-bold">Edit Category</h1>
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
        <center>
            <div style="width: 50%;" class="">
                <div class="card">
                    <?php
                    if (isset($insert)) {
                        echo $insert;
                    }
                    ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Category_Name</label>
                            <input name="name" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Category Name input placeholder">
                        </div>
                        <button type="submit">Insert</button>
                    </form>
                </div>
            </div>
        </center>
    </div>

    <?php include 'inc/footer.php'; ?>