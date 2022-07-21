<?php include_once  $_SERVER['DOCUMENT_ROOT'] . '/perfume/lib/database.php'; ?>

<?php

class Cart
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function list_cart($session)
    {
        $query = "SELECT * FROM tbl_cart WHERE cart_session = '$session'";
        $res = $this->db->select($query);
        return $res;
    }

    public function insert_cart($data)
    {
        $session = session_id();
        $prod_id = $data['prod_id'];
        $prod_img = $data['prod_img'];
        $prod_name = $data['prod_name'];
        $cate_name = $data['cate_name'];
        $prod_price = $data['prod_price'];

        $query = "SELECT * FROM tbl_cart WHERE product_id = $prod_id";
        $res = $this->db->select($query);
        if (!$res) {
            $query = "INSERT INTO tbl_cart (cart_session,product_id,product_name,cate_name,product_price,prod_img)
            VALUES ('$session',$prod_id,'$prod_name','$cate_name','$prod_price','$prod_img')";
            $res = $this->db->insert($query);
            if ($res)
                return '<script>window.location = "checkout.php?session=' . $session . '"</script>';
        }

        return '<h6 style="text-align: center;color:red">This Product has been added in Your Cart</h6>';
    }
}
