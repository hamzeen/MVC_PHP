<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/11/15 Time: 12:45 PM
 */

include ('User.class.php');
include ('Database.class.php');
class ViewController {

    public $info;
    public $db;
    public $user;

    function __construct(){
        $this->db = new Database();
        $this->user = new User();
    }

    function validate() {
        $this->info = "Sorry, This is a bad request.”;
        $isValid= false;$render = false;

        // check whether it's a valid request.
        if (isset($_GET['id']) && trim($_GET['id']) > 0) {
            $isValid = true; //$this->info = "This is a valid Request";
        }


        if($isValid) {
            // connect to db. query to check whether requested record is present.
            $id = $_GET['id'];
            $this->db->connect();

            // check whether record is available in the DB.
            if(mysql_num_rows($this->db->query("select id from user where id='$id'")) > 0) {

                $result = mysql_fetch_object($this->db->query("select * from user where id='$id'"));
                $this->user->create($result);

                $render = true;
                $this->info="User Info";
            } else {
                $this->info = "No record(s) found.";
            }
            return $render;
        }
    }
}