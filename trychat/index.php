

<?php
session_start();
if(isset($_SESSION['id'])){
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <!--    <link href="style/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="style/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />-->
    <link href="style/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" type="text/css"/>
    <!--    <link href="style/non-responsive.css" rel="stylesheet" type="text/css" />-->
    <link href="style/core.css" rel="stylesheet" type="text/css"/>
    <link href="style/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="style/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php
    
echo $_SESSION['id'] . "session";
$id = $_SESSION['id'];
include_once 'FbChatMock.php';
$chat = new FbChatMockup();
$msg = $chat->getMessages();
//$name=$chat->getName($id)
?>
<div class="col-lg-4 col-lg-push-6">
    <a href="logout.php" class="btn btn-primary btn-sm">Logout</a>
</div>

<div class="chat" style="border: 1px solid lightgray;">
    <div class="msg-wgt-header">
        <a>Ahmad</a>
    </div>
    <div class="msg-wgt-body">
        <table>
            <?php
            if (!empty($msg)) {
                foreach ($msg as $message) {
                    $masg = htmlentities($message['message'], ENT_NOQUOTES);
                    $user_name = ucfirst($message['username']);
                    $sent = date('Y.D.M');
                    echo '
                        <tr>
                            <td>
                                <div class="avatar">
                                </div>
                               <span> <span><a href="#">' . $user_name . '</a></span><span><br>' . $masg . '</span></span>
                            </td>
                        </tr>        
                    ';

                }

            } else
                echo '<span> <p>Nothing to display</p></span>'
            ?>


        </table>


    </div>
    <div class="msg-wgt-footer" style="width: 99%;">
        <textarea id="chat" placeholder="Type your message" onkeypress="bootChat()"></textarea>
    </div>
    <script src="js/custom.js" type="text/javascript"></script>
    <script src="js/jquery-2.2.3.js" type="text/javascript"></script>
</body>


<?php
}
else
header("location:login.php");
?>


<script>
    $(".msg-wgt-body").animate({ scrollTop: $('.msg-wgt-body').prop("scrollHeight")},1);

</script>