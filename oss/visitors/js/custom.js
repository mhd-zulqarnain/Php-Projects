$(document).ready(function () {

    function admFunc(){
        var $val=$(".grab").val();
        var $id=$(".vid").val();
        if($val!="")
        {
            $obj={
                data:"udata",
                vid:$id
            };
            $.ajax({
                type:"Post",
                url:"function/function.php",
                data:$obj,
                success:function (success) {
                    setTimeout(function () {
                        location.reload(1);
                    },3000)
                },
                error:function (error) {
                    alert('error')
                }
            });
        }
    }

//-----------admin----------
    
$('.disform :checkbox').change(function () {

    if(this.checked){

        if(confirm("Are you sure the post will be deleted")){
            $pid=$(this).val();
            console.log($pid);
            $obj={
                data:'disapprove',
                pid:$pid
            };

            $.ajax({
               url:"function/function.php",
               data:$obj,
                success:function (success) {
                    alert('post has been disapprove');
                },
                error:function (error) {
                  alert('function error');
                }
            });

        }
    }

})
    $('.myform :checkbox').change(function() {


        if(this.checked){
            if(confirm("are your sure")){
                var $pid=$(this).val();

                var $object={

                    data:"update",
                    pid:$pid,
                };

                $.ajax({
                    type:"POST",
                    url:"function/function.php",
                    data:$object,
                    success:function (response) {
                        alert('Post has been approved');
                        location.reload();
                    },
                    error:function (error) {
                        alert('error');
                    }


                });


            }
            else
                $(this).prop("checked",false)
        }
        else {

        }
    });

    function admFunc(){

        var $valu=$(".grab").val();
        if($valu!=""){
            $.ajax({
                type:"POST",
                url:"function/function.php",
                data:"data",
                success:function (success) {
                    setTimeout(function () { location.reload(1); }, 1000);

                },
                error:function (error) {
                    alert("error in notification");

                }


            });}
    }


    $(".target").on("click",function () {
        /*  $(this).siblings()
         .slideToggle(1000);*/

        $(this).siblings()
            .slideToggle(1000);

        $var=$(this).closest(".row1").siblings("div").find("div.dist").slideUp(1000);
    })
///end admin------



});

window.load=setInterval(function()
{
    $.ajax({
        url:"../update_Session.php",
        success:function(data)
        {
//do nothing
        }
    });
}, 6000);


/*window.onunload = function() {

    $.ajax({

        async: false,
        url:'../logout.php'
    });
}*/
