<?php
include_once '../lib/database.php';
$db = new Database();
$id = $_GET['id'];
$status = $_GET['status'];
$page = $_GET['page'];

switch ($page) {
    case 'prod':
        if ($status == 1)
            $query = "UPDATE tbl_product SET prod_status = 0 WHERE id = $id";
        else
            $query = "UPDATE tbl_product SET prod_status = 1 WHERE id = $id";
        $db->update($query);
        echo '<script>window.location="../admin/list_product.php";</script>';
        break;
    case 'cate':
        if ($status == 1)
            $query = "UPDATE tbl_category SET cate_status = 0 WHERE id = $id";
        else
            $query = "UPDATE tbl_category SET cate_status = 1 WHERE id = $id";
        $db->update($query);
        echo '<script>window.location="../admin/list_category.php";</script>';
        break;
}
