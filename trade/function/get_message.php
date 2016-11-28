
    <?php
    echo '<table>';
    require_once '../chat_class.php';
    session_start();
    $obj = new chat();

    $message = $obj->getMessage($_SESSION['pid']);

    foreach ($message as $msg) {

        $text = $msg['message'];
        $name = ucfirst($msg['name']);
        $time = substr($msg['time'],10);
        echo '
                        <tr>
                            <td>
                            <div class="msg-body">
                                <!--<div class="avatar">
                                </div>-->
                               <span> <span class="msg-wgt-uname"><a href="">' . $name . '</a></span> <span class="msg-wgt-time">' . $time . '</span><span class="msg-wgt-text"><br>' . $text . '</span></span>
                            </div>
                            </td>
                        </tr>        
                      ';

    }
    echo '</table>';
    ?>
    <script>
        $(".msg-wgt-body").animate({ scrollTop: $('.msg-wgt-body').prop("scrollHeight")},1);
    </script>