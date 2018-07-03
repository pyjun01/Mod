<?php
    function c_log($v){
        echo "<script>console.log('{$v}');</script>";
    }
    function query($sql){
        $db= new PDO("mysql:host=localhost;dbname=mod;charset=utf8","root","");
        $row= $db->query($sql);
        return $row;
    }
    function alert($t){
        echo "<script>alert('{$t}');</script>";
    }
    function location($l=null){
        if($l==null)
            echo "<script>history.back();</script>";
        else
            echo "<script>location.replace('{$l}');</script>";
        exit;
    }
    function Check($tf= false,$t= '로그인 후 이용해주세요.',$l= '/user/login'){
        if($tf){
            alert("잘못된 접근입니다.");
            location();
        }else{
            if(!isset($_SESSION["id"])){
                alert($t);
                location($l);
            }
        }
    }
?>