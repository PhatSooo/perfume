<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/perfume/lib/database.php'; ?>
<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/perfume/lib/session.php'; Session::init() ?>

<?php

class Customer {
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function login($data)
    {
        $user = $data['username'];
        $pass = $data['password'];

        $query = "SELECT * FROM tbl_customer WHERE cus_username = '$user' AND cus_pass = '$pass'";
        $res = $this->db->select($query);
        if ($res) {
            $val = $res->fetch_assoc();
            Session::set('cus_login',true);
            Session::set('cus_id',$val['id']);
            Session::set('cus_name',$val['cus_name']);
            return header('location:index.php');
        }
        else return '<span>Login Failed</span>';
    }

    public function get_cus_by_id($id)
    {
        $query = "SELECT * FROM tbl_customer WHERE id = $id";
        $res = $this->db->select($query);
        return $res;
    }

    public function create_customer($data)
    {
        if ($data['pass'] != $data['re_pass'])
            return '<span class="text-danger">Password does not match</span>';
        $username = $data['username'];
        $name = $data['name'];
        $pass = md5($data['pass']);
        $address = $data['address'];
        $phone = $data['phone'];

        $query = "INSERT INTO tbl_customer (cus_name,cus_username,cus_pass,cus_address,cus_phone)
            VALUES ('$name','$username','$pass','$address','$phone')";

        return $this->db->insert($query);
    }
}

?>