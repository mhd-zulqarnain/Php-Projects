/*
fbchat={
    bootchat:function () {
        var chatArea=$("#chat"),
            that = this;
        setInterval(this.getMessages, 2000);
        chatArea.bind('keydown',function (event) {
            
            if(event.keyCode===13 && event.shiftKey===false){
                var message=chatArea.val();
                if(message.lenght!==0){
                    this.sendmessage(message)
                }
                else {
                    alert('Enter a message');
                }
            }
            
        })
    },
    sendmessage:function (message) {
        var that=this;
        $.ajax({
            url:'ajax/add_msg.php',
            method:'post',
            data:{msg:message},
            success:function (data) {
                $("#chat").val('')
                    
            }
        })
    },
    getmessage:function () {
            $.ajax({
                url:'ajax/get_messages.php',
                method:'GET',
                success:function (data) {
                    $('.msg-wgt-body').html(data)
                }
                
            })
    }
    
}*/
    function bootChat(e) {
       var chat=$('#chat');
        chat.bind('keydown',function (event) {
            if(event.keyCode===13 && event.shiftKey===false){
                var message = $('#chat').val();
                $(".msg-wgt-body").scrollTop(0);
                if(message !== ''){
                    send_message(message);
                    e.preventDefault();
                }else {
                    alert('plesae fill fileld');
                    $('#chat').val('');
                }
            }
        })
        
        
    }

function send_message(msg) {

    $.ajax({
        type:'POST',
        url:'ajax/add_message.php',
        data:{msg:msg},

        error:function (error) {
            alert('try again');
        },
        success:function (response) {
            location.reload();
           /* $(".msg-wgt-body").animate(function () {
                console.log($(".msg-wgt-body").offset().top);
            });*/
        }

        
    })
}

