$(".cmt_content").on('keyup', function (e) {

    var $pid = $(this).siblings('.cmt_id').val(),
        $content = $(this).val();
console.log($content);
    if(event.keyCode===13 && $content.length >3){
        var $obj={
            data:"comment",
            text:$content,
            pid: $pid
        };
        $.ajax({
            type:"post",
            url:"function/function.php",
            data:$obj,
            success:function (response) {
                location.reload();
            }
        });
    }
});


$(".cmt_content").on('keyup',function (e) {

   var pid=$(this).siblings('cmt_id').val,
       $content=$(this).val();
    

});


$(".btn-add").on("click",function () {
    var $id=$(".fri").val();
    $obj={
        data:"add_friend",
        id:$id,
    };
    $.ajax({
        type:"POST",
        url:"function/function.php",
        data:$obj,
        success:function (success) {
            alert("added as friend")
        },
    });

})

