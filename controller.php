<?php
    
    require_once('model.php');
    $db = new Db();
   
    if(!empty($_REQUEST['enter'])){
        
        $user = $_REQUEST['login'];
        $pass = $_REQUEST['pass'];
        if(!empty($user)){
            $db->check($user, 'login');
        }
        if(!empty($pass)){
            $db->check($pass, 'pass');
        }
        $auth = $db->authenticate($user, $pass);
        if($auth !== 'ok'){
            $db->errormsg($auth);
        } else {
            $db->ulist();
        }
    }

    if(!empty($_REQUEST['exit'])){
        $db->enter();
    }

    if(!empty($_REQUEST['add'])){
        $db->add();
    }

    if(!empty($_REQUEST['save'])){
        if(!empty($_REQUEST['name']) && !empty($_REQUEST['sname']) && !empty($_REQUEST['age']) && !empty($_REQUEST['login']) && !empty($_REQUEST['pass'])){
            $user = $_REQUEST;
            $db->save($user);
            $db->enter();
        } else {
            echo 'Заполните все поля';
            $db->add();
        }
       
    }