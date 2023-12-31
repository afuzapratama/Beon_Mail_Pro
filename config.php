<?php

$KEY_SENDER = 'Your_Sender_Key';

$SENDER_SETTING = [
    'debugsender'       => false, // true or false (if true, the script will not send the message, but will display the message in the log)
    'priority'          => '2', // '1' or '2' or '3' 
    'remove_duplicate'  => true, // 'true' or 'false (if true, the script will remove duplicate email)
    'list_mode'         => true, // 'true' or 'false' (if true, the script will use the list)
    'costum_header'     => false, // 'true' or 'false' (if true, the script will use the custom header)
    'clear_temp'        => true, // 'true' or 'false' (if true, the script will delete the temporary file)
    'costum_from_mail'  => true, // 'true' or 'false' (if true, the script will use random from mail)
];

$smtp_enter = [
    'smtp_used' => 'smtp.txt',
    'smtp_file' => 'smtp/',
];

$list_enter = [
    'list_used'     => 'list.txt',
    'list_file'     => 'list/',
    'list_remove'   => false, // 'true' or 'false proses memakan waktu 5 sampai 8 detik
    'list_delay'    => '2', // '0' or '1' for seconds
];

$letter_enter = [
    'letter_html_used'  => 'let.html',
    'letter_html_file'  => 'letter/',
    //plain_text
    'plain_text_mode'   => false, # Jika ingin menggunakan mode plain ubah false ke true
    'plain_text_used'   => 'text_plain.txt',
    'plain_text_file'   => 'text_plain/',
];

$subject_list = [
    'Hellow Dapit Disini',
];

$from_name_list = [
    'АррIе.co.jp',
];

$from_email_list = [
    'newletter@intheirroom.com',
    'no-reply@intheirroom.com',
];

$shortlink_list = [
    'https://app-translation.cloud/?{lowercase_10}&key={email}',
];

$custom_header = [
    'X-Transport' => 'smtp',
    'X-Mailer' => 'Symfony Mailer',
    'X-Priority' => '1 (Highest)',
];
