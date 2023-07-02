<?php
function generaterandom($type, $length)
{
    switch ($type) {
        case 'lowercase':
            $res = 'abcdefghijklmnopqrstuvwxyz';
            break;
        case 'uppercase':
            $res = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            break;
        case 'numeric':
            $res = '0123456789';
            break;
        case 'mixedupper':
            $res = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            break;
        case 'mixedlower':
            $res = 'abcdefghijklmnopqrstuvwxyz0123456789';
            break;
        case 'hexadecimal':
            $res = '0123456789abcdef';
            break;
        default:
            $res = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            break;
    }
    $strlen = strlen($res);
    $str = '';
    for ($i = 0; $i < $length; $i++) {
        $str .= $res[rand(0, $strlen - 1)];
    }
    return $str;
}
function randominset($data)
{
    $patren = '/{(.*?)}/';

    $mach = preg_match_all($patren, $data, $match);

    if ($mach) {
        foreach ($match[1] as $isi) {
            if (preg_match("/(_)/", $isi)) {
                $buff = explode("_", $isi);
                $getrand = generaterandom($buff[0], $buff[1]);
                $wajib = "{" . $isi . "}";
                $data = str_replace($wajib, $getrand, $data);
            }
            return $data;
        }
    } else {
        return $data;
    }
}
function randomEmail()
{
    $tld = array("com", "biz", "net", "org", "edu", "com.au", "ca", "fr", "us", "de", "id", "in", "co.jp", "io", "me", "com.ae", "co.uk", "nl", "cn", "com.br");
    return strtolower(randomStr($length = 25)) . "@" . strtolower(randomStr($length = 8)) . "." . strtolower(randomStr($length = 15)) . "." . $tld[array_rand($tld)];
}
function randomNum($length)
{
    $result = '12345678901234567890';
    $numberlength = strlen($result);
    $randomnumber = '';
    for ($i = 0; $i < $length; $i++) {
        $randomnumber .= $result[rand(0, $numberlength - 1)];
    }

    return $randomnumber;
}
function randomStr($length = 16)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function randomStr1($length = 16)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function randomStr2($length = 16)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function randomStr3($length = 16)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function randomStr4($length = 16)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function randIP()
{
    $result = mt_rand(0, 255) . '.' . mt_rand(0, 255) . '.' . mt_rand(0, 255) . '.' . mt_rand(0, 255);

    for ($i = 0; $i; $i++) {
        $result .= mt_rand(0, 255);
    }

    return $result;
}
function randomOS()
{
    $oslist = array(
        "Windows 7",
        "Windows Vista",
        "Windows XP",
        "Windows 8",
        "Windows 10",
        "Windows 11",
        "Mac OS X",
        "Apple iOS",
        "Cent OS",
        "Linux",
        "Ubuntu",
        "Android",
        "Windows Phone",
    );
    return $oslist[array_rand($oslist)];
}
function randomDevice()
{
    $device_get = array_unique(explode("\n", file_get_contents('./modules/device.txt')));

    return $device_get[array_rand($device_get)];
}
function randomCountry()
{
    $country_get = array_unique(explode("\n", file_get_contents('./modules/country.txt')));
    return $country_get[array_rand($country_get)];
}

function md5micro()
{
    $token = md5(microtime() . mt_rand());
    $token = md5(microtime());
    return $token;
}
function md5microupper()
{
    $token = strtoupper(md5(microtime() . mt_rand()));
    $token = strtoupper(md5(microtime()));
    return $token;
}
function md5microlower()
{
    $token = strtolower(md5(microtime() . mt_rand()));
    $token = strtolower(md5(microtime()));
    return $token;
}
function randNumber($length)
{

    $numbernya = mt_rand(1, 999) . mt_rand(1, 999) . mt_rand(1, 999) . mt_rand(1, 999) . mt_rand(1, 999);
    for ($i = 0; $i; $i++) {
        $numbernya .= mt_rand(1, 999) . mt_rand(1, 999) . mt_rand(1, 999) . mt_rand(1, 999) . mt_rand(1, 999);
    }
    return $numbernya;
}
function generateId()
{
    $len = 32; //32 bytes = 256 bits
    $bytes = '';
    if (function_exists('random_bytes')) {
        try {
            $bytes = random_bytes($len);
        } catch (\Exception $e) {
            //Do nothing
        }
    } elseif (function_exists('openssl_random_pseudo_bytes')) {
        /** @noinspection CryptographicallySecureRandomnessInspection */
        $bytes = openssl_random_pseudo_bytes($len);
    }
    if ($bytes === '') {
        //We failed to produce a proper random string, so make do.
        //Use a hash to force the length to the same as the other methods
        $bytes = hash('sha256', uniqid((string) mt_rand(), true), true);
    }

    //We don't care about messing up base64 format here, just want a random string
    return str_replace(['=', '+', '/'], '', base64_encode(hash('sha256', $bytes, true)));
}
