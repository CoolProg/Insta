;âñå äèàëîãè ïîëüçîâàòåëÿ
$dialogs = $xddialog->get_user_dialogs();
$out = '';
foreach($dialogs as $dg)
  $out.='
  <div class="dialog '.(!$dg['msg_status']?'newmsg':'').'">
    <div class="float_left">
      <span class="nikname"><a href="#" id="user_'.$dg['senderid'].'">'.$dg['sender_name'].'</a></span>
      <span class="message_time">'.date('H:i:s d/m/Y',$dg['public']).'</span>
      <div>'.$dg['message'].'</div>
    </div>
    <div class="float_right">
      <input  class="btn gotodialog" id="dialog_'.$dg['hash'].'" value="ÏÅÐÅÉÒÈ Ê ÄÈÀËÎÃÓ"/>
    </div>
    <div class="clearex"></div>
  </div>';