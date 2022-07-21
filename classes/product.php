<?php include_once '../lib/database.php'; ?>

<?php

class Product
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function list_prod()
    {
        $query = "SELECT a.*, b.cate_name FROM tbl_product a INNER JOIN tbl_category b ON a.prod_cateId = b.id";
        return $this->db->select($query);
    }

    public function list_prod_by_ID($id)
    {
        $query = "SELECT * FROM tbl_product WHERE id = $id";
        return $this->db->select($query);
    }

    public function insert_prod($data,$file)
    {
        $name = $data['name'];
        $cateId = $data['cateId'];
        $price = $data['price'];
        $des = $data['des'];
        $file_name = $_FILES['image']['name'];
        $file_temp = $_FILES['image']['tmp_name'];

        $query = "INSERT INTO tbl_product (prod_image,prod_name,prod_cateId,prod_price,prod_des) VALUES ('$file_name','$name',$cateId,'$price','$des')";
        $res = $this->db->insert($query);
        if ($res) {
            move_uploaded_file($file_temp,'uploads/'.$file_name);
            $alert = "<span class='badge bg-success'>Insert Successfully</span>";
            return $alert;
        }
        $alert = "<span class='badge bg-warning'>Insert Failed! Try again</span>";
        return $alert;
    }

    public function edit_prod($data, $file)
    {
        $id = $data['id'];
        $name = $data['name'];
        $price = $data['price'];
        $des = $data['des'];
        $cateId = $data['cateId'];
        $oldImage = $data['oldImage'];

        $file_name = $_FILES['image']['name'];
        $file_temp = $_FILES['image']['tmp_name'];

        #Not update image
        if ($file_name == '') {
            $query = "UPDATE tbl_product SET prod_cateId = $cateId, prod_name = '$name', prod_price = '$price', prod_des = '$des' WHERE id = $id";
            $this->db->update($query);
            return '<script>window.location="list_product.php";</script>';
        }
        #image updated
        else {
            $query = "UPDATE tbl_product SET prod_image = '$file_name', prod_cateId = $cateId, prod_name = '$name', prod_price = '$price', prod_des = '$des' WHERE id = $id";
            $res = $this->db->update($query);
            if ($res) {
                unlink('uploads/'.$oldImage);
                move_uploaded_file($file_temp,'uploads/'.$file_name);
            }
            return '<script>window.location="list_product.php";</script>';
        }
    }

    public function del_prod($id)
    {
        $query = "SELECT * FROM tbl_product WHERE id = $id";
        $res = $this->db->select($query)->fetch_assoc();
        $oldImage = $res['prod_image'];
        $query = "DELETE FROM tbl_product WHERE id = $id";
        $this->db->delete($query);
        unlink('uploads/'.$oldImage);
        return '<script>window.location="list_product.php";</script>';
    }
}

?>