<?php
include 'config.php';
include 'main.php';
require_once './modules/beon_core.php';

benner();

$cek_list = file_get_contents($list_enter['list_file'] . $list_enter['list_used']);
if (empty($cek_list) || $cek_list == null || $cek_list == '' || $cek_list == ' ') {
    file_kosong();
    exit;
}

$list_mail =  preg_split('/\n|\r\n?/', trim(file_get_contents($list_enter['list_file'] . $list_enter['list_used'])));


if ($SENDER_SETTING['remove_duplicate'] == true) {
    $list_mail = array_unique($list_mail);
}

$file_letter = file_get_contents($letter_enter['letter_html_file'] . $letter_enter['letter_html_used']);

$file_letter_2 = file_get_contents($letter_enter['plain_text_file'] . $letter_enter['plain_text_used']);

$file_smtp = preg_split('/\n|\r\n?/', trim(file_get_contents($smtp_enter['smtp_file'] . $smtp_enter['smtp_used'])));

$count_mail = count($list_mail);

$count_send = 0;

pleasewait();

if ($SENDER_SETTING['clear_temp'] === true) {
    @unlink('./temp/email_faild.txt');
    @unlink('./temp/email_sucsess.txt');
}

foreach ($list_mail as $key => $value) {

    $count_send++;
    $delay              = $list_enter['list_delay'];
    $msg_type           = $letter_enter['plain_text_mode'];
    $sub_list           = $subject_list[array_rand($subject_list)];
    $from_email         = $from_email_list[array_rand($from_email_list)];
    $from_name          = $from_name_list[array_rand($from_name_list)];
    $smtp_list          = $file_smtp[array_rand($file_smtp)];
    $smtp_list          = explode(',', $smtp_list);

    $username_smtp      = $smtp_list[0];
    $password_smtp      = $smtp_list[1];
    $host_smtp          = $smtp_list[2];
    $port_smtp          = $smtp_list[3];



    if ($msg_type === true) {
        $letter_enters =  str_replace('{email}', $value, $file_letter_2);
    } else {
        $letter_enters = str_replace('{email}', $value, $file_letter);
    }

    SendTo($value, $sub_list, $letter_enters, $from_email, $from_name, $smtp_list);
}

end_send();
