<?php include 'inc/header.php'; ?>

<?php
$get = $order->list_orderdetails_by_cusId(Session::get('cus_id'));
?>

<div class="container">
    <div class="row">
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
                                            <td><img width="100" height="100" src="admin/uploads/<?= $res['productImg'] ?>"></td>
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
                                echo '<span class="btn btn-warning">Pending</span>';
                            } elseif ($row['status'] == 1) {
                                echo '<span class="btn btn-success">Accepted</span>';
                            } elseif ($row['status'] == 2) {
                                echo '<span class="btn btn-info">Shipping</span>';
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

<?php include 'inc/footer.php'; ?>