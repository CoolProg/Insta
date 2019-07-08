$cnt = $xddialog->get_new_messages_cnt();
$messages = (!$cnt)?array():$xddialog->get_messages_from_dialog(true);