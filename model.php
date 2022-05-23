<?php
    
    class Db{
        public $users = array();
        public function __construct(){
            $string = file_get_contents('bd');
            $arr = str_getcsv($string, "\n");
            foreach($arr as $one){
                $this->users[] = str_getcsv($one);
            }
        }
        public function errormsg($code){
            switch($code){
                case 'bp':
                    echo 'Bad password';
                    break;
                case 'bu':
                    echo 'No such user';
                    break;
            }
        }
        public function check($word, $type){
            if($type == 'login'){
                if (!is_string($word)) exit('Need string parameter as login');
            }
            if($type == 'pass'){
                if (!is_string($word)) exit('Need string parameter as password');
            }
        }

        public function authenticate($login, $pass){
        
            foreach($this->users as $user){
                                       
                if($login == $user[3]){
                    if($pass != $user[4]){
                        return 'bp';
                    } else {return 'ok';}
                }
            }

           return 'bu';
        }

        public function ulist(){
            require('list.php');
        }
        public function enter(){
            require('index.html');
        }
        public function add(){
            require('add.php');
        }
        public function save($user){
            $string = $_REQUEST['name'] . ',' . $_REQUEST['sname'] . ',' . $_REQUEST['age'] . ',' . $_REQUEST['login'] . ',' . $_REQUEST['pass'] . "\n";
            if(!file_put_contents('bd', $string, FILE_APPEND)){
                exit('Ошибка записи в базу данных!');
            }
            echo 'Пользователь добавлен';
        }
    }
    

    