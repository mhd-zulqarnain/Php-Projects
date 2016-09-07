/**
 * Created by zulup on 9/3/2016.
 */

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
                alert(result);
            },
            error: function (error) {
                alert(error);
            }
        });
    })
});