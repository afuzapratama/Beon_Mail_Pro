<?php

require_once './vendor/autoload.php';

use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Address;

function SendTo($recivers, $subject, $message, $fromMail, $fromName)
{
    //global   
    global $letter_enter, $list_enter, $custom_header, $count_send, $count_mail, $delay, $SENDER_SETTING, $shortlink_list, $username_smtp, $password_smtp, $host_smtp, $port_smtp;
    //base64shortlink
    $base64email = base64_encode($recivers);
    //shortlink
    $shortlink  = $shortlink_list[array_rand($shortlink_list)];
    $shortlink  = str_replace('{email}', $base64email, $shortlink);
    //shorlink_prenam
    $shortslak = explode('/', $shortlink);
    $shortslak = $shortslak[2];
    //shortlink change
    $shortlink  = bigrandom($shortlink);
    $shortlink  = randominset($shortlink);
    //subject change
    $subject    = bigrandom($subject);
    $subject    = randominset($subject);
    //message change
    $message    = bigrandom($message);
    $message    = randominset($message);
    $message    = str_replace('{shortlink}', $shortlink, $message);
    $message    = str_replace('{email}', $recivers, $message);
    //fromMail change
    $fromMail   = bigrandom($fromMail);
    $fromMail   = randominset($fromMail);
    //fromName change
    $fromName   = bigrandom($fromName);
    $fromName   = randominset($fromName);
    //transport
    $transport = Transport::fromDsn('smtp://' . $username_smtp . ':' . $password_smtp . '@' . $host_smtp . ':' . $port_smtp . '?encryption=&auth_mode=&verify_peer=0');
    //mailer
    $mailer = new Mailer($transport);
    $email = (new Email());
    //from mail
    if ($SENDER_SETTING['costum_from_mail'] == true) {
        $email->from(new Address($fromMail, $fromName));
    } else {
        $email->from(new Address(randominset("lowercase_7") . "-" . randNumber(10) . '@' . $host_smtp, $fromName));
    }
    //to
    $email->to($recivers);
    //subject
    $email->subject($subject);
    //priority
    $email->priority($SENDER_SETTING['priority']);
    //message
    if ($letter_enter['plain_text_mode'] === true) {
        $email->text($message);
    } else {
        //plain text
        $email->text(strip_tags($message));
        //html text
        $email->html($message);
    }
    // header
    $header = $email->getHeaders();
    if ($SENDER_SETTING['costum_header'] == true) {
        foreach ($custom_header as $key => $value) {
            $header->addTextHeader($key, $value);
        }
    }
    //add header default
    $header->addTextHeader('X-User-ID', generateId());
    $header->addTextHeader('X-Transport', 'Symfony Mailer');
    $header->addTextHeader('X-Mailer', 'BEON SENDER V.1.0');
    $header->addTextHeader('X-Content-Type-Options', 'nosniff');
    $header->addTextHeader('X-Beon', 'Beon Sender');
    $header->addTextHeader('X-Beon-Version', '1.0');
    //send email
    try {

        $mailer->send($email);

        if ($list_enter['list_remove'] == true) {
            $list = file_get_contents($list_enter['list_file'] . $list_enter['list_used']);
            $email_list = $recivers . PHP_EOL;
            $list = str_replace($email_list, '', $list);
            $list = str_replace($recivers, '', $list);
            file_put_contents($list_enter['list_file'] . $list_enter['list_used'], $list);
        }

        file_put_contents('temp/email_sucsess.txt', $recivers . PHP_EOL, FILE_APPEND | LOCK_EX);

        @chmod('temp/email_sucsess.txt', 0777);

        print color()['BIPutih'] . "
    ===================================================================================" . color()['BUngu'] . "
    || 📨 SEND TO        : $recivers" . color()['BYellow'] . "                  
    || 📮 FORM MAIL      : $fromMail" . color()['BCyan'] . "
    || 🧒 FORM NAME      : $fromName" . color()['BBlue'] . "
    || 📝 SUBJECT        : $subject" . color()['BCyan'] . "
    || 🔗 SHORTLINK      : $shortslak" . color()['BIPutih'] . "
    ||=================================================================================" . color()['BRed'] . "
    || 💻 SMTP           : $host_smtp" . color()['BRed'] . "
    || 🛒 TOTAL SEND     : $count_send / $count_mail" . color()['BRed'] . "
    || 🕥 DELAY          : $delay SEC" . color()['BIPutih'] . "
    ===================================================================================" . color()['reset'] . "
    " . PHP_EOL;
        //delay sleep
        sleep($delay);
    } catch (TransportExceptionInterface $e) {

    $errorMessage = $e->getMessage();

    $pattern = '/Expected response code "(.*?)" but got code "(.*?)", with message "(.*?)"/';
    if (preg_match($pattern, $errorMessage, $matches)) {
        $expectedResponseCode = $matches[1];
        $gotCode = $matches[2];
        $errorMessage = $matches[3];

    print  color()['BIPutih'] . "
    =========================================================================
    || " . color()['BUngu'] . " 🔥 ERROR PLEASE CEHCK  " . color()['BIPutih'] . "
    =========================================================================" . color()['BCyan'] . "
    || " . color()['BHijau'] . " 😭 Expected Response Code: $expectedResponseCode" . color()['BCyan'] . "                                           
    || " . color()['BRed'] . " 😭 Got Code: $gotCode" . color()['BIPutih'] . "
    =========================================================================
    " . color()['BRed'] ."😭 Error Message: $errorMessage" . color()['BIPutih'] . "                                        
    =========================================================================" . color()['reset'] . "
        " . PHP_EOL;

    }


        file_put_contents('temp/email_faild.txt', $recivers . PHP_EOL, FILE_APPEND | LOCK_EX);
        @chmod('temp/email_faild.txt', 0777);
    }
}
