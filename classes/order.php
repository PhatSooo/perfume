<?php include_once  $_SERVER['DOCUMENT_ROOT'] . '/perfume/lib/database.php'; ?>

<?php

class Order
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function insert_order($data)
    {
        #get product cart
        $session = session_id();
        $query = "SELECT * FROM tbl_cart WHERE cart_session = '$session'";
        $cart = $this->db->select($query);
        
        #insert to tbl_order
        $id = uniqid();
        while ($row = $cart->fetch_assoc()) {
            $productId = $row['product_id'];
            $productName = $row['product_name'];
            $cateName = $row['cate_name'];
            $productPrice = $row['product_price'];
            $prodImg = $row['prod_img'];
             // auto-generate id
            $query = "INSERT INTO tbl_order (id,productId,productName,cateName,productPrice,productImg) 
                VALUES ('$id',$productId,'$productName','$cateName','$productPrice','$prodImg')";
            $this->db->insert($query);
        }
        
        #insert to tbl_orderdetails
        $cusName = $data['name'];
        $cusPhone = $data['phone'];
        $cusAddress = $data['address'];
        $cusId = Session::get('cus_id');
        $total = $data['total'];

        $query = "INSERT INTO tbl_orderdetails (orderId,cusName,cusPhone,cusAddress,cusId,total) 
            VALUES ('$id','$cusName','$cusPhone','$cusAddress',$cusId,'$total')";
        $this->db->insert($query);

        #del data on tbl_cart
        $query = "DELETE FROM tbl_cart WHERE cart_session = '$id'";

        return '<script>window.location = "success.php"</script>';
    }

    public function list_orderdetails_by_cusId($id)
    {
        $query = "SELECT * FROM tbl_orderdetails WHERE cusId = $id";
        return $this->db->select($query);
    }

    public function list_all_orderdetails()
    {
        $query = "SELECT * FROM tbl_orderdetails";
        return $this->db->select($query);
    }

    public function list_prod_by_orderId($orderId)
    {
        $query = "SELECT * FROM tbl_order WHERE id = '$orderId'";
        return $this->db->select($query);
    }
}
