/**
 * Created by zulup on 9/3/2016.
 */




$(document).ready(function () {
    $("#submit_adm").on('click',function () {
        //var $img=$('#path_adm').val();
        var $name=$('#name_adm').val();
        if($name == '') {
            alert('please fill form properly');
        return false
        }
        var $obj={
            data:"admin_data",
            post_name:$name,
                };

        $.ajax({
            type:"POST",
            url:"function.php",
            data:$obj,
            success: function (result){
                alert('running');
            },
            error: function (error) {
                alert('error e');
            }
        })
    })
});

    
    

$(document).ready(function () {
    $("#submit_comment").on('click', function () {

        var $id = $('#cmt_id').val();
        var $name = $('#cmt_name').val();
        var $email = $('#cmt_email').val();
        var $content = $('#cmt_content').val();
            if($name == '' && $email == '' && $content == '') {
                alert('please fill form properly');
                return false;
            }
           var $obj = {
               data: "comment_data",
               id : $id,
               name : $name,
               email : $email,
               content : $content
           };

        $.ajax({
            type: "POST",
            url: "function.php",
            data: $obj,
            success: function (result){
                alert('running');
            },
            error: function (error) {
                
            }
        });
    })
});