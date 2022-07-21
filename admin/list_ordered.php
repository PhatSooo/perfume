<?php include 'inc/header.php'; ?>
<?php include '../classes/order.php'; ?>
<?php
$order = new Order();
$get = $order->list_all_orderdetails();
?>


<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                    <li class="breadcrumb-item"><a href="main.php" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Orders</li>
                </ol>
            </nav>
            <h1 class="mb-0 fw-bold">Orders</h1>
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
                    <table class="table table-bordered">
                        <thead>
                            <th>#</th>
                            <th>Order_ID</th>
                            <th>Details</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            while ($row = $get->fetch_assoc()) {
                                $i++;
                            ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $row['orderId'] ?></td>
                                    <td>
                                        <table class="table">
                                            <thead>
                                                <th>Product Name</th>
                                                <th>Product Price</th>
                                                <th>Product Image</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $list = $order->list_prod_by_orderId($row['orderId']);
                                                while ($res = $list->fetch_assoc()) {
                                                ?>
                                                    <tr>
                                                        <td><?= $res['productName'] ?></td>
                                                        <td><?= $res['productPrice'] ?></td>
                                                        <td><img width="100" height="100" src="uploads/<?= $res['productImg'] ?>"></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td><?= $row['total'] ?></td>
                                    <td><?= $row['cusDate'] ?></td>
                                    <td>
                                        <?php
                                        if ($row['status'] == 0) {
                                            echo '<a href="../classes/status.php?page=order&status=0&id=' . $row['id'] . '"><span class="btn btn-warning">Pending</span></a>';
                                        } elseif ($row['status'] == 1) {
                                            echo '<a href="../classes/status.php?page=order&status=1&id=' . $row['id'] . '"><span class="btn btn-success">Accepted</span></a>';
                                        } elseif ($row['status'] == 2) {
                                            echo '<a href="../classes/status.php?page=order&status=3&id=' . $row['id'] . '"><span class="btn btn-info">Shipping</span></a>';
                                        } elseif ($row['status'] == 3) {
                                            echo '<span class="btn btn-dark">Completed</span>';
                                        }
                                        ?>
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
</div>

<?php include 'inc/footer.php'; ?>