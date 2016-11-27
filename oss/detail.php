<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="style/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <link href="style/main.css" rel="stylesheet">
    <?php include("function/function.php");?>
</head>
<body>

<?php

session_start();
if(isset($_SESSION['vid'])!=""){
    $vid=$_SESSION['vid'];

    UpdateStatus($vid);
}
?>
<div class="container main">
    <div class="col-lg-12">
        <div class="col-lg-4 logo">
            <a href="index.php"> <img src="../Final/assets/images/avatar.png"></a>
        </div>

        <div class="col-lg-12 header">
            <div class="col-lg-4 country"></div>
            <div class="col-lg-4 pull-right status">
                <?php
                $pid=$_REQUEST['id'];
                if(isset($_SESSION['vid'])){
                    echo '<h3>'.getName($vid).' <span><a href="logout.php?&pid='.$pid.'">logout</a></span></h3>';

                }
                else{
                    echo '<h3>Account<span><a href="login.php">login</a></span></h3>';
                }
                ?>
            </div>
        </div>
    </div>

    <div class="col-lg-12 wrapper">
        <div class="col-lg-2 cat">
            <ul>
                <?php getCat();
                ?>

            </ul>
        </div>
        <div class="col-lg-8 product">

            <?php getProDetails();
            echo '<div class="col-lg-3 col-lg-push-7 chat">';
             $session=isset($_SESSION['vid'])?true:false;
            if($session) {
                $time=time()-20;
                $pid=$_REQUEST['id'];
                $sql="SELECT P.pid, V.vid FROM visitor AS V JOIN productdetails AS P ON p.vid=V.vid AND V.online=1 AND P.pid='$pid' AND V.login_activity > '$time'";//----test dealer is online
                $isOnline=mysqli_num_rows(Run($sql));
                if($isOnline>0)
                    //------if dealer is online------
                {
                 ?>


                    <div class="col-lg-12 chatHead" style="text-align: center;background-color: blue;color: white">
                        <h3>Deal the Product</h3>
                    </div>
               <div class="toog">     
                    <div class="col-lg-12 msg-wgt-body">
                        <table>
                            <?php
                            require_once 'chat_class.php';
                            $obj = new chat();

                            $message = $obj->getMessage($pid);

                            foreach ($message as $msg) {

                                $text = $msg['message'];
                                $name = $msg['name'];
                                $time = $msg['time'];
                                echo '
                        <tr>
                            <td>
                            <div class="msg-body">
                                <div class="avatar">
                                </div>
                               <span> <span><a href="#">' . '_' . $name . '</a></span> <span class="msg-wgt-time">' . $time . '</span><span><br>' . $text . '</span></span>
                            </div>
                            </td>
                        </tr>        
                      ';

                            }
                            ?>
                        </table>
                    </div>
                    <input type="hidden" id='proID' value="<?php echo $_REQUEST['id'] ?>">

                    <div class="msg-wgt-footer col-lg-12" style="width: 99%;">
                        <textarea id="text" placeholder="Type your message" onkeypress="chat()"
                                  style="width: 100%"></textarea>
                    </div>
               </div>
                    <?php
                    //------if dealer is online end------
                }
                   ////-----------for dealer is not online-----
                    else{
                        echo '
                                <div class="col-lg-12" style="text-align: center;background-color: blue;color: white">
                                <h3>Deal the Product</h3>
                                </div>
                                <div class="col-lg-12 " style="text-align: center;background-color: grey;color: white">
                                <h4 >Sorry dealer is not online</h4>
                                <h5> Contact him @ <span>Mobile'.getUphone($pid).'</span> <br> <span>Email'.getEmail($pid).'</span></h5>
                                </div>
                               </div>
                    ';
                    }

                ////-----------for dealer offlne end-----------
                ?>
                    <script src="js/chat.js" type="text/javascript"></script>
                    <script src="js/jquery.js" type="text/javascript"></script>
                </div>
                <?php
            }else
            {?>
                <!--If you are not signed in-->

                    <div class="col-lg-12 chatHead" style="text-align: center;background-color: blue;color: white">
                        <h3>Deal the Product</h3>
                    </div>
        <div class="toog">
                    <div class="col-lg-12 msg-wgt-body">
                        <table>
                        <tr>
                            <td>
                            <div class="msg-body">

                               <span> <h5>Sign in to chat <span><a href="login.php?&pid=<?php echo $pid?>">Sign in</a></span></h5></span>
                            </div>
                            </td>
                        </tr>
                        </table>
                    </div>
                    <div class="msg-wgt-footer col-lg-12" style="width: 99%;">
                        <textarea id="text" placeholder="Sign in chat" disabled style="width: 100%"></textarea>
                    </div>
                </div>
    </div>
            <?php
            }
            ?>
            </div>
        </div>
        <div class="col-lg-2 bet"></div>
    </div>

</body>
</html>
<script>
    $(".msg-wgt-body").animate({ scrollTop: $('.msg-wgt-body').prop("scrollHeight")},1);
$('.chatHead').click(function () {
    $('.toog').toggle();
})
</script>

<?php

if(isset($_SESSION['vid'])!=''){

    echo' <script>
 window.onunload = function() {
    alert(\'Bye.\');
}
        </script>';
}

?>