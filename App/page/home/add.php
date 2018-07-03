<?php
    Check('',"잘못된 접근입니다.");
 ?>
<section>
    <div class="box" style="padding-top:70px;">
        <div id="board_add_box">
            <div id="board_add_form" style="margin-top:45px;height:75px;">
                <span id="add_title">게시판 증설</span>
                <form id="form_box" method="post" action="/home/board_add">
                    <input type="text" name="board_name" placeholder="게시판 이름" id="board_name" style="width:400px;" />
                    <button type="submit" id="board_add" class="waves-effect waves-light btn" style="margin-left:15px;">내 게시판 증설</button>
                </form>
            </div>
        </div>
        <div id="board_list">
            <div id="list_text">
                <p style="font-size:40px;">게시판 리스트</p>
            </div>
            <div class="lists_title">
                <div class="board_list_title">
                    <span>게시판 이름</span>
                </div>
                <div class="board_list_master">
                    <span>관리자</span>
                </div>
            </div>
            <?php
                $sql= "SELECT * FROM board_list";
                $row= query($sql);
                foreach ($row as $key => $value) {
                    $bname= $value['board_name'];
                    $uname= $value['board_master'];
                    echo "
                    <div class='lists'>
                        <div class='board_list_title'>
                            <span>{$bname}</span>
                        </div>
                        <div class='board_list_master'>
                            <span>{$uname}</span>
                        </div>
                    </div>
                    ";
                }
            ?>
        </div>
    </div>
</section>