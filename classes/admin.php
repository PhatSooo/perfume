<?php include '../lib/database.php'; ?>
<?php include '../lib/session.php'; Session::init() ?>

<?php

class Admin {
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function login($data)
    {
        $user = $data['username'];
        $pass = $data['password'];

        $query = "SELECT * FROM tbl_admin WHERE username = '$user' AND password = '$pass'";;
        $res = $this->db->select($query);
        if ($res) {
            $val = $res->fetch_assoc();
            Session::set('admin_login',true);
            Session::set('admin_id',$val['id']);
            Session::set('admin_name',$val['name']);
            return header('location:main.php');
        }
        else return '<span>Login Failed</span>';
    }
}

?>