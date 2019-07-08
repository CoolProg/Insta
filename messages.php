;получить все сообщения из текущего дилога

$cnt = $xddialog->get_new_messages_cnt();
$messages = (!$cnt)?array():$xddialog->get_messages_from_dialog();
$out = '';
foreach($messages as $msg)
  $out.='
  <div>
    <div class="float_left">
      <span class="nikname"><a href="#" id="user_'.$msg['senderid'].'">'.$msg['sender_name'].'</a></span>
      <span class="message_time">'.date('H:i:s d/m/Y',$msg['public']).'</span>
      <div>'.$msg['message'].'</div>
    </div>
    <div class="clearex"></div>
  </div>';