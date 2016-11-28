

function chat(e,val) {
    var chat=$('#text');
    var Pid=$('#proID').val();

         chat.bind('keydown' ,function(event) {

        if(event.keyCode===13 && event.shiftKey==false){
            var msg=$('#text').val();
            if(msg==''){
                alert('Enter a message')
            }
            else {
                sendMessage(msg,Pid);
                $("#text").val('');
                e.preventDefault();
            }
        }

    })


}

var getdata =  function () {
    $.get("function/get_message.php", function(data){
        $(".msg-wgt-body").html(data);
    });
};

setInterval(getdata, 3000);

function sendMessage(mesg,pid) {
    $obj={
        data:"mesg",
        msg:mesg,
        pid:pid,
    },
    $.ajax({
        url:"function/add_message.php",
        type:"POST",
        data:$obj,
        success:function () {
            getdata();
        }

        
        
    })
}
// $(".msg-wgt-body").animate({ scrollTop: $('.msg-wgt-body').prop("scrollHeight")},1);