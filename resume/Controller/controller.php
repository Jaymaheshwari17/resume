<?php

// echo "hello world";
require_once("Model/model.php");


class controller extends Model{
    public $baseurl="http://localhost/resume/assets";

    public function __construct(){
        parent:: __construct();
        if(isset($_SERVER['PATH_INFO'])){
            switch($_SERVER['PATH_INFO']){
                case '/':
                case '/home':
                    include_once("Views/header.php");
                    include_once("Views/main.php"); 
                    include_once("Views/footer.php");  
                    
                    
                    break;

                case '/regi':
                    include_once("Views/header.php");
                    include_once("Views/regi.php"); 
                    include_once("Views/footer.php");
                    if(isset($_REQUEST['btn-regist'])){
                        $data=array("username"=>$_REQUEST['username'],
                        "fullname"=>$_REQUEST['fname']." ".$_REQUEST['lname'],
                        "email"=>$_REQUEST['email'],
                        "password"=>$_REQUEST['password'],
                        "dob"=>$_REQUEST['dob'],
                        "mobile"=>$_REQUEST['mobile'],
                        "gender"=>$_REQUEST['gender'],
                        "hobby"=>"cricket",
                        "profile_pic"=>"default.jpg",
                        "city"=>$_REQUEST['city'],
                        "address"=>$_REQUEST['address'],
                        "status"=>0,

                        
                    );
                    $this->insert("registration",$data);
                    



                    
                    }

                    break;

                    case '/login':
                        include_once("Views/header.php");
                        include_once("Views/login.php");
                        include_once("Views/footer.php");
                        
                        $loginRes=$this->login("admin","123");
                        
                        break;


                    default:
                    break;



            }
            
            
        }
        else{
            header("location:home");
        }
    }



}

$obj= new controller;