<?php include 'inc/header.php'; ?>
<?php
if (isset($_GET) && $_GET['id'] != '') {
    $id = $_GET['id'];
    $get = $prod->list_prod_by_ID($id)->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $insert_card = $cart->insert_cart($_POST);
}
?>

<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <?php if (isset($insert_card)) echo $insert_card; ?>
                <form method="POST">
                    <div class="row">
                        <input type="hidden" name="prod_id" value="<?= $get['id'] ?>">
                        <input type="hidden" name="prod_name" value="<?= $get['prod_name'] ?>">
                        <input type="hidden" name="cate_name" value="<?= $get['cate_name'] ?>">
                        <input type="hidden" name="prod_price" value="<?= $get['prod_price'] ?>">
                        <input type="hidden" name="prod_img" value="<?= $get['prod_image'] ?>">
                        <div class="col-md-6">
                            <div class="images p-3">
                                <div class="text-center p-4"> <img id="main-image" src="admin/uploads/<?= $get['prod_image'] ?>" width="250" /> </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product p-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="index.php">
                                        <div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i> <span class="ml-1">Back</span> </div> <i class="fa fa-shopping-cart text-muted"></i>
                                    </a>
                                </div>
                                <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand"><?= $get['cate_name'] ?></span>
                                    <h5 class="text-uppercase"><?= $get['prod_name'] ?></h5>
                                    <div class="price d-flex flex-row align-items-center"> <span class="act-price"><?= $get['prod_price'] ?>VNĐ</span>
                                    </div>
                                </div>
                                <p class="about"><?= $get['prod_des'] ?></p>
                                <div class="cart mt-4 align-items-center"><a href="checkout.php?session=<?= session_id() ?>"> <button class="btn btn-danger text-uppercase mr-2 px-4">Add to cart</button> <i class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i> </a></div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>