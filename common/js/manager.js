function user_sort(){
  if(!$("#filled-in-box").is(":checked")){
    var agree_cnt = $(".agree_row").length;

    for(var k=0; k < agree_cnt; k++){
      agree_row = $(".agree_row").eq(0).html();
      $(".agree_row").eq(0).remove();
      $("table tbody").append("<tr class='table_row'>"+agree_row+"</tr>");
    }

  }else if($("#filled-in-box").is(":checked")){
    var max_row = $(".table_row").length;
    // console.log(max_row);

    var user_sort_btn = $(".user_sort");

    var agree_row;
    for (var i = 0; i < max_row; i++) {
      if($(".table_row .table_list:nth-child(6) > .user_sort").eq(i).attr("data-agree") == "agree"){
        agree_list_row = $(".table_row").eq(i);
        agree_list_row.addClass("agree_row");
      }
      // console.log($(".table_row .table_list:nth-child(6) > .user_sort").eq(i).attr("data-agree"));
    }
    for(var k=0; k < $(".agree_row").length; k++){
      agree_row = $(".agree_row").eq(k).html();
      $(".agree_row").eq(k).remove();
      $("table tr").eq(1).before("<tr class='table_row agree_row'>"+agree_row+"</tr>");
    }
    // console.log(agree_row);
  }
}
