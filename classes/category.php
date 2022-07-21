<?php include_once '../lib/database.php'; ?>

<?php

class Category
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function list_cate()
    {
        $query = "SELECT * FROM tbl_category";
        return $this->db->select($query);
    }

    public function list_cate_by_ID($id)
    {
        $query = "SELECT * FROM tbl_category WHERE id = $id";
        return $this->db->select($query);
    }

    public function insert_cate($name)
    {
        $query = "INSERT INTO tbl_category (cate_name) VALUES ('$name')";
        $res = $this->db->insert($query);
        if ($res) {
            $alert = "<span class='badge bg-success'>Insert Successfully</span>";
            return $alert;
        }
        $alert = "<span class='badge bg-warning'>Insert Failed! Try again</span>";
        return $alert;
    }

    public function edit_cate($id, $name)
    {
        $query = "UPDATE tbl_category SET cate_name = '$name' WHERE id = $id";
        $this->db->update($query);
        return '<script>window.location="list_category.php";</script>';
    }

    public function del_cate($id)
    {
        $query = "DELETE FROM tbl_category WHERE id = '$id'";
        $this->db->delete($query);
        return header('location:list_category.php');
    }
}

?>