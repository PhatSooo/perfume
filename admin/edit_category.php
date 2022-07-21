<?php include 'inc/header.php'; ?>
<?php include '../classes/category.php'; ?>

<?php
$cate = new Category();
$id = $_GET['edit'];
$get = $cate->list_cate_by_ID($id)->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $edit = $cate->edit_cate($id, $name);
}

?>

<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                    <li class="breadcrumb-item"><a href="main.php" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
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
                    <form method="POST">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Category_ID</label>
                            <input disabled type="text" class="form-control" id="formGroupExampleInput" value="<?= $get['id'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Category_Name</label>
                            <input name="name" type="text" class="form-control" id="formGroupExampleInput2" value="<?= $get['cate_name'] ?>" placeholder="Another input placeholder">
                        </div>
                        <button type="submit">Save</button>
                        <a href="list_category.php"><button>Cancle</button></a>
                    </form>
                </div>
            </div>
        </center>
    </div>

    <?php include 'inc/footer.php'; ?>