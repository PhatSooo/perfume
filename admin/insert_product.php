<?php include 'inc/header.php'; ?>
<?php include '../classes/category.php'; ?>
<?php include '../classes/product.php'; ?>

<?php
$cate = new Category();
$prod = new Product();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $insert = $prod->insert_prod($_POST, $_FILES);
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
                    <?php if (isset($insert)) echo $insert; ?>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="col-auto">
                            <label class="visually-hidden" for="autoSizingSelect">Product_Category</label>
                            <select name="cateId" class="form-select" id="autoSizingSelect">
                                <?php
                                $res = $cate->list_cate();
                                while ($row = $res->fetch_assoc()) {
                                ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['cate_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-auto">
                            <label for="formGroupExampleInput2" class="form-label">Product_Name</label>
                            <input required name="name" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Product_Name input placeholder">
                        </div>
                        <div class="col-auto">
                            <label for="formGroupExampleInput3" class="form-label">Product_Price</label>
                            <input required name="price" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Product_Price input placeholder">
                        </div>
                        <div class="col-auto">
                            <label for="formGroupExampleInput4" class="form-label">Product_Description</label>
                            <input required name="des" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Product_Description input placeholder">
                        </div>
                        <div class="col-auto">
                            <label for="formGroupExampleInput5" class="form-label">Product_Image</label>
                            <input required name="image" type="file" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
                        </div>
                        <button type="submit">Save</button>
                    </form><a href="list_product.php"><button>Cancle</button></a>
                </div>
            </div>
        </center>
    </div>

    <?php include 'inc/footer.php'; ?>