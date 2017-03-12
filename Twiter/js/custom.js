
$(".cmt_content").on('keyup', function (e) {

    var $pid = $(this).siblings('.cmt_id').val(),
        $content = $(this).val();
    if(event.keyCode===13){
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


$(".btn-add").on("click",function () {
    var $id=$(".fri").val();
    var $ses=$(".ses").val();
    console.log($id);
    $obj={
        data:"add_friend",
        id:$id,
    };
    console.log($obj);
    $.ajax({
        type:"POST",
        url:"function/function.php",
        data:$obj,
        success:function (success) {
            $.get("function/friends.php?ses="+$ses,function(data) {
                $("#myfriends").html(data);
            })
        },
    });

})
$(".delPost").on("click",function () {
    var $owner=$(this).siblings(".powner").val();
    $obj={
        data:'delPost',
        id:$owner,
    }
    $.ajax({
        type:'POST',
        url:'function/function.php',
        data:$obj,
        success:function (response) {
            location.reload();
        }

    })

})

