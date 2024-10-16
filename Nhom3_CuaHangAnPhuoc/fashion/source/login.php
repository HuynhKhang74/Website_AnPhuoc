<?php
if(isset($_POST['login'])){
    $customer = selectOne('select * from khachhang where email = "'.escape_string($_POST['email']).'" and password = "'.md5($_POST['password']).'"');
    if($customer){
        $_SESSION['customer'] = $customer['email'];
        if(isset($_GET['back'])){
            header('location:/'.$_GET['back']);
            exit();
        }
        else{
            back(2);
        }
       
    }
    else{
        alert('Email hoặc mật khẩu không đúng!!');
        back();
    }
}

$template = 'login';