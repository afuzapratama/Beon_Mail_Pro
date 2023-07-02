<?php

include './modules/generators.php';

function bigrandom($data)
{
    $tag = array(
        "{randomemail}",
        "{randomstring}",
        "{randomstring1}",
        "{randomstring2}",
        "{randomstring3}",
        "{randomstring4}",
        "{randomstringlower}",
        "{randomstringupper}",
        "{randomnumber}",
        "{date}",
        "{date1}",
        "{date2}",
        "{date3}",
        "{date4}",
        "{randomip}",
        "{randomos}",
        "{randomdevice}",
        "{randomcountry}",
        "{md5micro}",
        "{specialnumber}",
        "{md5microupper}",
        "{md5microlower}",
        "{generateid}"
    );
    $replace = array(
        randomEmail(),
        randomStr(10),
        randomStr1(10),
        randomStr2(10),
        randomStr3(10),
        randomStr4(10),
        strtolower(randomStr(20)),
        strtoupper(randomStr(20)),
        randomNum(10),
        date('Y-m-d H:i:s'),
        date('D, F d, Y  g:i A'),
        date('D, F d, Y'),
        date('F d, Y  g:i A'),
        date('F d, Y'),
        randIP(),
        randomOS(),
        randomDevice(),
        randomCountry(),
        md5micro(),
        randNumber(10),
        md5microupper(),
        md5microlower(),
        generateId()
    );

    return str_replace($tag, $replace, $data);
}

function color()
{
    $colors = array(
        "reset" => "\033[0m",
        # Warna Reguler
        "Hitam"     => " \033[0;30m ",        # Hitam
        "Merah"     => " \033[0;31m ",         # Merah
        "Hijau"     => " \033[0;32m ",         # Hijau
        "Kuning"    => " \033[0;33m ",        # Kuning
        "Biru"      => " \033[0;34m ",          # Biru
        "Ungu"      => " \033[0;35m ",        # Ungu
        "Cyan"      => " \033[0;36m ",          # Cyan
        "Putih"     => " \033[0;37m ",        # Putih
        #Bold
        "BBlack" => " \033[1;30m ",        # Hitam
        "BRed" => " \033[1;31m ",          # Merah
        "BHijau" => " \033[1;32m ",        # Hijau
        "BYellow" => " \033[1;33m ",       # Kuning
        "BBlue" => " \033[1;34m ",         # Biru
        'BUngu' => " \033[1;35m ",       # Ungu
        "BCyan" => " \033[1;36m ",         # Cyan
        "BPutih" => " \033[1;37m ",       # Putih
        # Garis bawah
        "UBlack" => " \033[4;30m ",        # Hitam
        "URed" => " \033[4;31m ",         # Merah
        "UGreen" => " \033[4;32m ",        # Hijau
        "UKuning" => " \033[4;33m ",       # Kuning
        "UBlue" => " \033[4;34m ",        # Biru
        "UUngu" => " \033[4;35m ",      # Ungu
        "UCyan" => " \033[4;36m ",        # Cyan
        "UPutih" => " \033[4;37m ",       # Putih

        # Latar Belakang
        "Aktif_Hitam" => " \033[40m ",       # Hitam
        "Aktif_Merah" => " \033[41m ",        # Merah
        "On_Green" => " \033[42m ",  # Hijau
        "On_Yellow" => " \033[43m ", # Kuning
        "On_Blue" => " \033[44m ", # Biru
        "On_Purple" => " \033[45m ",  # Ungu
        "On_Cyan" => " \033[46m ",   #Cyan
        "On_White" => " \033[47m ",  # Putih

        # Intensitas Tinggi
        "IBlack" => " \033[0;90m ",    # Hitam
        "IRed" => " \033[0;91m ",   # Merah
        "IHijau" => " \033[0;92m ",  # Hijau
        "IKuning" => " \033[0;93m ", # Kuning
        "IBlue" => " \033[0;94m ",        # Biru
        "IPungu" => " \033[0;95m ",       # Ungu
        "ICyan" => " \033[0;96m ",       # Cyan
        "IPutih" => " \033[0;97m ",      # Putih

        # Berani Intensitas Tinggi
        "BIBlack" => " \033[1;90m ",       # Hitam
        "BIRed" => " \033[1;91m ",       # Merah
        "BIGreen" => " \033[1;92m ",       # Hijau
        "BIYellow" => " \033[1;93m ",      # Kuning
        "BIBlue" => " \033[1;94m ",     # Biru
        "BIUngu" => " \033[1;95m ",   # Ungu
        "BICyan" => " \033[1;96m ",     # Cyan
        "BIPutih" => " \033[1;97m ",    # Putih

        # Latar belakang Intensitas Tinggi
        "On_IBlack" => " \033[0;100m ",  # Hitam
        "On_IRed" => " \033[0;101m ",   # Merah
        "On_IGreen" => " \033[0;102m ",   # Hijau
        "On_IYellow" => " \033[0;103m ",  # Kuning
        "On_IBlue" => " \033[0;104m ",  # Biru
        "On_IPurple" => " \033[10;95m ",  # Ungu
        "On_ICyan" => " \033[0;106m ",  # Cyan
        "On_IWhite" => " \033[0;107m ",  # Putih
    );
    return $colors;
}

function benner()
{
    print color()['BHijau'] . "
██████╗ ███████╗ ██████╗ ███╗   ██╗    ███████╗███████╗███╗   ██╗██████╗ ███████╗██████╗ " . color()['BBlue'] . "
██╔══██╗██╔════╝██╔═══██╗████╗  ██║    ██╔════╝██╔════╝████╗  ██║██╔══██╗██╔════╝██╔══██╗" . color()['BUngu'] . "
██████╔╝█████╗  ██║   ██║██╔██╗ ██║    ███████╗█████╗  ██╔██╗ ██║██║  ██║█████╗  ██████╔╝" . color()['BYellow'] . "
██╔══██╗██╔══╝  ██║   ██║██║╚██╗██║    ╚════██║██╔══╝  ██║╚██╗██║██║  ██║██╔══╝  ██╔══██╗" . color()['BRed'] . "
██████╔╝███████╗╚██████╔╝██║ ╚████║    ███████║███████╗██║ ╚████║██████╔╝███████╗██║  ██║" . color()['BCyan'] . "
╚═════╝ ╚══════╝ ╚═════╝ ╚═╝  ╚═══╝    ╚══════╝╚══════╝╚═╝  ╚═══╝╚═════╝ ╚══════╝╚═╝  ╚═╝" . color()['reset'] . PHP_EOL;
}
function pleasewait()
{
    print  color()['BIPutih'] . "
    ===================================================================================
    || " . color()['BRed'] . "              SETTINGAN DAH OKE PROSES SEND" . color()['BIPutih'] . "                               ||
    ===================================================================================" . color()['reset'] . "
    " . PHP_EOL;
}
function file_kosong()
{
    print  color()['BIPutih'] . "
    ===================================================================================
    || " . color()['BRed'] . "               LIST KOSONG ATAU FOLDER SETTINGAN GAK BENAR" . color()['BIPutih'] . "                ||
    ===================================================================================" . color()['reset'] . "
    " . PHP_EOL;
}
function end_send()
{
    global $count_mail;

    $sucess = explode("\r\n", file_get_contents('./temp/email_sucsess.txt'));
    @$failed = explode("\r\n", file_get_contents('./temp/email_faild.txt'));
    @$failedcek = file_get_contents('./temp/email_faild.txt');

    if (empty($failedcek) || !file_exists($failedcek) || $failedcek == null || $failedcek == '' || $failedcek == ' ') {
        $failed = 0;
    } else {
        $failed = count(array_filter($failed));
    }
    $sucess = count(array_filter($sucess));
    print  color()['BCyan'] . "
    ===================================================================================
    || " . color()['BUngu'] . "                  PROSES SEND SELESAI  " . color()['BCyan'] . "
    ===================================================================================" . color()['BCyan'] . "
    || " . color()['BHijau'] . "                  SUKSES SEND [ $sucess / $count_mail ]" . color()['BCyan'] . "                                           
    || " . color()['BRed'] . "                  GAGAL  SEND [ $failed / $count_mail ]" . color()['BCyan'] . "                                            
    ===================================================================================" . color()['reset'] . "
    " . PHP_EOL;
}
