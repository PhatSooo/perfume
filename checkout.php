<?php include 'inc/header.php'; ?>
<?php
if (isset($_GET['session']) && $_GET['session'] != '') {
    $session = $_GET['session'];
    $list_cart = $cart->list_cart($session);
    $count_cart = $list_cart->num_rows;
    Session::set('cart',$count_cart);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $get_order = $order->insert_order($_POST);
}
?>

<section class="h-100 h-custom" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card">
                    <div class="card-body p-4">
                        <?php
                        if (isset($get_order)) echo $get_order;
                        ?>
                        <form method="POST">
                            <div class="row">
                                <div class="col-lg-7">
                                    <h5 class="mb-3"><a href="index.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                                    <hr>
                                    <?php
                                    $total = 0;
                                    while ($row = $list_cart->fetch_assoc()) {
                                    ?>
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div>
                                                            <img src="admin/uploads/<?= $row['prod_img'] ?>" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                                        </div>
                                                        <div class="ms-3">
                                                            <h5><?= $row['product_name'] ?></h5>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div style="width: 80px;">
                                                            <h5 class="mb-0"><?= number_format($row['product_price'], 0, '', ',') ?>VNĐ</h5>
                                                        </div>
                                                        <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        $total += $row['product_price'];
                                    }
                                    ?>
                                </div>
                                <?php
                                $cus_by_id = $cus->get_cus_by_id(Session::get('cus_id'));
                                $get = $cus_by_id->fetch_assoc();
                                ?>

                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label for="usr">Name:</label>
                                        <input name="name" value="<?= $get['cus_name'] ?>" type="text" class="form-control" id="usr">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Address:</label>
                                        <input name="address" type="text" value="<?= $get['cus_address'] ?>" class="form-control" id="pwd">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Phone number:</label>
                                        <input name="phone" type="text" value="<?= $get['cus_phone'] ?>" class="form-control" id="pwd">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Total:</label> <?= number_format($total, 0, '', ',') ?>
                                    </div>
                                    <input type="hidden" name="total" value="<?= $total ?>">
                                    <button type="submit">Pay</button>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'inc/footer.php'; ?>