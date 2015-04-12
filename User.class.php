<?php
/**
 * Created by PhpStorm.
 * @author: Hamzeen. H.
 * @Date: 4/11/15 Time: 11:26 AM
 */

class User {
    public $id;
    public $username;

    function __construct() {

    }

    function create($result) {
        foreach ($result as $var => $value) {
            $this->$var = $value;
        }
    }
}
?>