

window.load=setInterval(function()
{
    $.ajax({
        url:"../update_Session.php",
        success:function(data)
        {
//do nothing
        }
    });
}, 10001);


/*window.onunload = function() {

    $.ajax({

        async: false,
        url:'../logout.php'
    });
}*/
