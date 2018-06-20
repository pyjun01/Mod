<?php
    // if(empty($user = $_POST['user'])){
    //     exit("<script>location.replace('index.php');</script>");
    // }
    $user_name = $_POST['user_name'];
    $user_id = $_POST['user_id'];
    // $user = iconv("UTF-8","EUC-KR",$user);
    $sql = "SELECT * FROM user_connect WHERE username='{$user_name}'";
    $rs = $db->query($sql);
    if($rs->rowcount()>0){
        $sql = "UPDATE user_connect SET usertime=now() WHERE username='{$user_name}'";
        $db->query($sql);
    }else{
        $sql = "INSERT INTO user_connect SET username='{$user_name}', userid='{$user_id}', usertime=now()";
        $db->query($sql);
    }
    date_default_timezone_set("Asia/Seoul");
    $now = date('Y-m-d G:i:s',time()-5);//현재시간 - 5초
    $sql = "SELECT * FROM user_connect WHERE usertime > '{$now}'";//최근접속한 시간이 5초전 이하면
    $rs = $db->query($sql);
    $user_list=null;
    foreach($rs as $row){
	     $u_name = $row['username'];
       $u_id = $row['userid'];
        $user_list .= $u_id."|";
    }
    $sql = "DELETE FROM user_connect WHERE usertime < '{$now}'";
    $rs = $db->query($sql);

    echo $user_list;
?>
