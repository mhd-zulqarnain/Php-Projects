
    <?php
    echo '<table>';
    require_once '../chat_class.php';
    $obj = new chat();
session_start();
    $message = $obj->getMessage($_SESSION['pid']);

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
    echo '</table>'; ?>
    <script >
        $(".msg-wgt-body").animate({ scrollTop: $('.msg-wgt-body').prop("scrollHeight")},1);
    </script>