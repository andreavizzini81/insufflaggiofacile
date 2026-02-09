<?php

final class Utils {

    const DAYS_OF_WEEK = array(
        2 => 'Lunedi',
        3 => 'Martedi',
        4 => 'Mercoledi',
        5 => 'Giovedi',
        6 => 'Venerdi',
        7 => 'Sabato',
        1 => 'Domenica'
    );

    private const CAST_DEFAULT_TYPES = array('boolean', 'bool', 'integer', 'int', 'float', 'double', 'string', 'array', 'object', 'null');

    public static function slugify($text) {
        $text = html_entity_decode(strtolower($text));
        $text = preg_replace('/[^\pL\d]+/u', '-', $text);
        $text = Transliterator::create("Any-Latin; Latin-ASCII; [\u0080-\u7fff] remove")->transliterate($text);
        $text = preg_replace('/[^-\w]+/', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('/-+/', '-', $text);
        $text = (empty($text)) ? 'n-a' : $text;
        return $text;
    }

    public static function c2Convert($string, $capitalizeFirstCharacter = false) {
        $str = str_replace('_', '', ucwords($string, '_'));
        if (!$capitalizeFirstCharacter) {
            $str = lcfirst($str);
        }
        return $str;
    }

    public static function formatTitle($title) {
        return htmlentities(trim(strtolower(stripslashes($title))), ENT_COMPAT | ENT_QUOTES);
    }    

    public static function normalizeDate($expression, $asObject = false) {
        if (!$expression) {
            return '';
        }
        $formats = array(
            "/^([0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4})$/" => array("from" => "d/m/Y", "to" => "Y-m-d"),
            "/^([0-9]{4}\-[0-9]{1,2}\-[0-9]{1,2})$/" => array("from" => "Y-m-d","to" => "Y-m-d"),
            "/^([0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4} [0-9]{1,2}\:[0-9]{1,2}\:[0-9]{1,2})$/" => array("from" => "d/m/Y H:i:s", "to" => "Y-m-d H:i:s"),
            "/^([0-9]{4}\-[0-9]{1,2}\-[0-9]{1,2} [0-9]{1,2}\:[0-9]{1,2}\:[0-9]{1,2})$/" => array("from" => "Y-m-d H:i:s", "to" => "Y-m-d H:i:s"),
            "/^([0-9]{4}\-[0-9]{1,2}\-[0-9]{1,2}T[0-9]{1,2}\:[0-9]{1,2}\:[0-9]{1,2})\+([0-9]{4})$/" => array("from" => "Y-m-d\TH:i:sO", "to" => "Y-m-d H:i:s")
        );
        foreach($formats as $pattern => $format) {
            if (preg_match($pattern, $expression)) {
                $dtInstance = DateTime::createFromFormat($format['from'], $expression);
                if ($dtInstance !== false && $dtInstance->getTimestamp() > -2208988800) {
                    return ($asObject) ? $dtInstance : $dtInstance->format($format['to']);
                }
            }
        }
        return '';
    }

    public static function europeanDate($expression) {
        $formats = array(
            "/^([0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4})$/" => array("from" => "d/m/Y", "to" => "d/m/Y"),
            "/^([0-9]{4}\-[0-9]{1,2}\-[0-9]{1,2})$/" => array("from" => "Y-m-d","to" => "d/m/Y"),
            "/^([0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4} [0-9]{1,2}\:[0-9]{1,2}\:[0-9]{1,2})$/" => array("from" => "d/m/Y H:i:s", "to" => "d/m/Y H:i:s"),
            "/^([0-9]{4}\-[0-9]{1,2}\-[0-9]{1,2} [0-9]{1,2}\:[0-9]{1,2}\:[0-9]{1,2})$/" => array("from" => "Y-m-d H:i:s", "to" => "d/m/Y H:i:s")
        );
        foreach($formats as $pattern => $format) {
            if (preg_match($pattern, $expression)) {
                $dtInstance = DateTime::createFromFormat($format['from'], $expression);
                if ($dtInstance !== false && $dtInstance->getTimestamp() > -2208988800) {
                    return $dtInstance->format($format['to']);
                }
            }
        }
        return '';
    }

    public static function varDebug($var, $mode = 0, $overlay = false) {
        echo ($overlay === true) ? '<pre style="background-color: #FAFAFA99; border: 1px solid #DDD; z-index: 9999; position: fixed; top: 0; left: 0;">'
                                 : '<pre style="background-color: #FAFAFA; border: 1px solid #DDD;">';
        if ($mode == 0) {
            var_dump($var);
        } else {
            print_r($var);
        }
        echo '</pre>';
    }

    public static function validateUUID($uuid = '') {
        return preg_match("/^([a-f0-9]{8})\-([a-f0-9]{4})\-([a-f0-9]{4})\-([a-f0-9]{4})\-([a-f0-9]{12})$/", $uuid);
    }

    public static function guid() {
        $randomString = openssl_random_pseudo_bytes(16);
        $time_low = bin2hex(substr($randomString, 0, 4));
        $time_mid = bin2hex(substr($randomString, 4, 2));
        $time_hi_and_version = bin2hex(substr($randomString, 6, 2));
        $clock_seq_hi_and_reserved = bin2hex(substr($randomString, 8, 2));
        $node = bin2hex(substr($randomString, 10, 6));
        $time_hi_and_version = hexdec($time_hi_and_version);
        $time_hi_and_version = $time_hi_and_version >> 4;
        $time_hi_and_version = $time_hi_and_version | 0x4000;
        $clock_seq_hi_and_reserved = hexdec($clock_seq_hi_and_reserved);
        $clock_seq_hi_and_reserved = $clock_seq_hi_and_reserved >> 2;
        $clock_seq_hi_and_reserved = $clock_seq_hi_and_reserved | 0x8000;
        return sprintf('%08s-%04s-%04x-%04x-%012s', $time_low, $time_mid, $time_hi_and_version, $clock_seq_hi_and_reserved, $node);
    }

    public static function getExtensionFromMimeType(string $mime): ?string {
        $mime_map = [
            'video/3gpp2'                                                               => '3g2',
            'video/3gp'                                                                 => '3gp',
            'video/3gpp'                                                                => '3gp',
            'application/x-compressed'                                                  => '7zip',
            'audio/x-acc'                                                               => 'aac',
            'audio/ac3'                                                                 => 'ac3',
            'application/postscript'                                                    => 'ai',
            'audio/x-aiff'                                                              => 'aif',
            'audio/aiff'                                                                => 'aif',
            'audio/x-au'                                                                => 'au',
            'video/x-msvideo'                                                           => 'avi',
            'video/msvideo'                                                             => 'avi',
            'video/avi'                                                                 => 'avi',
            'application/x-troff-msvideo'                                               => 'avi',
            'application/macbinary'                                                     => 'bin',
            'application/mac-binary'                                                    => 'bin',
            'application/x-binary'                                                      => 'bin',
            'application/x-macbinary'                                                   => 'bin',
            'image/bmp'                                                                 => 'bmp',
            'image/x-bmp'                                                               => 'bmp',
            'image/x-bitmap'                                                            => 'bmp',
            'image/x-xbitmap'                                                           => 'bmp',
            'image/x-win-bitmap'                                                        => 'bmp',
            'image/x-windows-bmp'                                                       => 'bmp',
            'image/ms-bmp'                                                              => 'bmp',
            'image/x-ms-bmp'                                                            => 'bmp',
            'application/bmp'                                                           => 'bmp',
            'application/x-bmp'                                                         => 'bmp',
            'application/x-win-bitmap'                                                  => 'bmp',
            'application/cdr'                                                           => 'cdr',
            'application/coreldraw'                                                     => 'cdr',
            'application/x-cdr'                                                         => 'cdr',
            'application/x-coreldraw'                                                   => 'cdr',
            'image/cdr'                                                                 => 'cdr',
            'image/x-cdr'                                                               => 'cdr',
            'zz-application/zz-winassoc-cdr'                                            => 'cdr',
            'application/mac-compactpro'                                                => 'cpt',
            'application/pkix-crl'                                                      => 'crl',
            'application/pkcs-crl'                                                      => 'crl',
            'application/x-x509-ca-cert'                                                => 'crt',
            'application/pkix-cert'                                                     => 'crt',
            'text/css'                                                                  => 'css',
            'text/x-comma-separated-values'                                             => 'csv',
            'text/comma-separated-values'                                               => 'csv',
            'text/csv'                                                                  => 'csv',
            'application/vnd.msexcel'                                                   => 'csv',
            'application/x-director'                                                    => 'dcr',
            'application/vnd.openxmlformats-officedocument.word'                        => 'docx',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document'   => 'docx',
            'application/x-dvi'                                                         => 'dvi',
            'message/rfc822'                                                            => 'eml',
            'application/x-msdownload'                                                  => 'exe',
            'video/x-f4v'                                                               => 'f4v',
            'audio/x-flac'                                                              => 'flac',
            'video/x-flv'                                                               => 'flv',
            'image/gif'                                                                 => 'gif',
            'application/gpg-keys'                                                      => 'gpg',
            'application/x-gtar'                                                        => 'gtar',
            'application/x-gzip'                                                        => 'gzip',
            'application/mac-binhex40'                                                  => 'hqx',
            'application/mac-binhex'                                                    => 'hqx',
            'application/x-binhex40'                                                    => 'hqx',
            'application/x-mac-binhex40'                                                => 'hqx',
            'text/html'                                                                 => 'html',
            'image/x-icon'                                                              => 'ico',
            'image/x-ico'                                                               => 'ico',
            'image/vnd.microsoft.icon'                                                  => 'ico',
            'text/calendar'                                                             => 'ics',
            'application/java-archive'                                                  => 'jar',
            'application/x-java-application'                                            => 'jar',
            'application/x-jar'                                                         => 'jar',
            'image/jp2'                                                                 => 'jp2',
            'video/mj2'                                                                 => 'jp2',
            'image/jpx'                                                                 => 'jp2',
            'image/jpm'                                                                 => 'jp2',
            'image/jpeg'                                                                => 'jpg',
            'image/pjpeg'                                                               => 'jpg',
            'application/x-javascript'                                                  => 'js',
            'application/json'                                                          => 'json',
            'text/json'                                                                 => 'json',
            'application/vnd.google-earth.kml+xml'                                      => 'kml',
            'application/vnd.google-earth.kmz'                                          => 'kmz',
            'text/x-log'                                                                => 'log',
            'audio/x-m4a'                                                               => 'm4a',
            'application/vnd.mpegurl'                                                   => 'm4u',
            'audio/midi'                                                                => 'mid',
            'application/vnd.mif'                                                       => 'mif',
            'video/quicktime'                                                           => 'mov',
            'video/x-sgi-movie'                                                         => 'movie',
            'audio/mpeg'                                                                => 'mp3',
            'audio/mpg'                                                                 => 'mp3',
            'audio/mpeg3'                                                               => 'mp3',
            'audio/mp3'                                                                 => 'mp3',
            'video/mp4'                                                                 => 'mp4',
            'video/mpeg'                                                                => 'mpeg',
            'application/oda'                                                           => 'oda',
            'audio/ogg'                                                                 => 'ogg',
            'video/ogg'                                                                 => 'ogg',
            'application/ogg'                                                           => 'ogg',
            'application/x-pkcs10'                                                      => 'p10',
            'application/pkcs10'                                                        => 'p10',
            'application/x-pkcs12'                                                      => 'p12',
            'application/x-pkcs7-signature'                                             => 'p7a',
            'application/pkcs7-mime'                                                    => 'p7c',
            'application/x-pkcs7-mime'                                                  => 'p7c',
            'application/x-pkcs7-certreqresp'                                           => 'p7r',
            'application/pkcs7-signature'                                               => 'p7s',
            'application/pdf'                                                           => 'pdf',
            'application/octet-stream'                                                  => 'pdf',
            'application/x-x509-user-cert'                                              => 'pem',
            'application/x-pem-file'                                                    => 'pem',
            'application/pgp'                                                           => 'pgp',
            'application/x-httpd-php'                                                   => 'php',
            'application/php'                                                           => 'php',
            'application/x-php'                                                         => 'php',
            'text/php'                                                                  => 'php',
            'text/x-php'                                                                => 'php',
            'application/x-httpd-php-source'                                            => 'php',
            'image/png'                                                                 => 'png',
            'image/x-png'                                                               => 'png',
            'application/powerpoint'                                                    => 'ppt',
            'application/vnd.ms-powerpoint'                                             => 'ppt',
            'application/vnd.ms-office'                                                 => 'ppt',
            'application/msword'                                                        => 'doc',
            'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'pptx',
            'application/x-photoshop'                                                   => 'psd',
            'image/vnd.adobe.photoshop'                                                 => 'psd',
            'audio/x-realaudio'                                                         => 'ra',
            'audio/x-pn-realaudio'                                                      => 'ram',
            'application/x-rar'                                                         => 'rar',
            'application/rar'                                                           => 'rar',
            'application/x-rar-compressed'                                              => 'rar',
            'audio/x-pn-realaudio-plugin'                                               => 'rpm',
            'application/x-pkcs7'                                                       => 'rsa',
            'text/rtf'                                                                  => 'rtf',
            'text/richtext'                                                             => 'rtx',
            'video/vnd.rn-realvideo'                                                    => 'rv',
            'application/x-stuffit'                                                     => 'sit',
            'application/smil'                                                          => 'smil',
            'text/srt'                                                                  => 'srt',
            'image/svg+xml'                                                             => 'svg',
            'application/x-shockwave-flash'                                             => 'swf',
            'application/x-tar'                                                         => 'tar',
            'application/x-gzip-compressed'                                             => 'tgz',
            'image/tiff'                                                                => 'tiff',
            'text/plain'                                                                => 'txt',
            'text/x-vcard'                                                              => 'vcf',
            'application/videolan'                                                      => 'vlc',
            'text/vtt'                                                                  => 'vtt',
            'audio/x-wav'                                                               => 'wav',
            'audio/wave'                                                                => 'wav',
            'audio/wav'                                                                 => 'wav',
            'application/wbxml'                                                         => 'wbxml',
            'video/webm'                                                                => 'webm',
            'audio/x-ms-wma'                                                            => 'wma',
            'application/wmlc'                                                          => 'wmlc',
            'video/x-ms-wmv'                                                            => 'wmv',
            'video/x-ms-asf'                                                            => 'wmv',
            'application/xhtml+xml'                                                     => 'xhtml',
            'application/excel'                                                         => 'xl',
            'application/msexcel'                                                       => 'xls',
            'application/x-msexcel'                                                     => 'xls',
            'application/x-ms-excel'                                                    => 'xls',
            'application/x-excel'                                                       => 'xls',
            'application/x-dos_ms_excel'                                                => 'xls',
            'application/xls'                                                           => 'xls',
            'application/x-xls'                                                         => 'xls',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'         => 'xlsx',
            'application/vnd.ms-excel'                                                  => 'xlsx',
            'application/xml'                                                           => 'xml',
            'text/xml'                                                                  => 'xml',
            'text/xsl'                                                                  => 'xsl',
            'application/xspf+xml'                                                      => 'xspf',
            'application/x-compress'                                                    => 'z',
            'application/x-zip'                                                         => 'zip',
            'application/zip'                                                           => 'zip',
            'application/x-zip-compressed'                                              => 'zip',
            'application/s-compressed'                                                  => 'zip',
            'multipart/x-zip'                                                           => 'zip',
            'text/x-scriptzsh'                                                          => 'zsh',
        ];
        return isset($mime_map[$mime]) ? $mime_map[$mime] : null;
    }

    public static function generatePagination(object $data, Request $request, array $config = []) {
        $config = [
            'size' => 5,
            'showTotal' => true,
            ...$config
        ];

        if ($data->results == 0) {
            return false;
        }
        $pagination = (object)[
            'first' => (object)[
                'active' => $data->current > 1,
                'href' => $data->current > 1 ? $request->clone()->setQueryParam('page', 1)->getUrl() : 'javascript:void(0);'
            ],
            'last' => (object)[
                'active' => $data->current < $data->total,
                'href' => $data->current < $data->total ? $request->clone()->setQueryParam('page', $data->total)->getUrl() : 'javascript:void(0);'
            ],
            'prev' => (object)[
                'active' => $data->current > 1,
                'href' => $data->current > 1 ? $request->clone()->setQueryParam('page', $data->current - 1)->getUrl() : 'javascript:void(0);'
            ],
            'next' => (object)[
                'active' => $data->current < $data->total,
                'href' => $data->current < $data->total ? $request->clone()->setQueryParam('page', $data->current + 1)->getUrl() : 'javascript:void(0);'
            ],
            'pages' => []
        ];
        if ($config['showTotal']) {
            $pagination->results = $data->results;
        }
        $halfSize = floor($config['size'] / 2);
        $countPlay = 1;
        $countStop = $config['size'];
        if ($data->total > $config['size'] && $data->current > $halfSize){
            $countPlay = $data->current - $halfSize;
            $countStop = $countPlay + ($config['size'] - 1);
        }
        if (($data->total - $halfSize) <= $data->current) {
            $countPlay = $data->total - $config['size'];
            $countStop = $data->total;
        }
        if ($data->total <= $config['size']) {
            $countPlay = 1;
            $countStop = $data->total;
        }
        for ($i = $countPlay; $i <= $countStop; $i++) {
            $pagination->pages[] = (object)[
                'value' => $i,
                'active' => $i == $data->current,
                'href' => $i == $data->current ? 'javascript:void(0);' : $request->clone()->setQueryParam('page', $i)->getUrl()
            ];
        }
        return $pagination;
    }

    public static function getInputClassByParseType($parseType) {
        switch($parseType) {
            case 'int':
            case 'integer':
                return 'numericField';
            case 'decimal':
            case 'float':
                return 'currencyField';
            default:
                return '';
        }
    }

    public static function flattenMultidimensionalArray(array $array) {
        $result = array();
        array_walk_recursive($array, function($a) use (&$result) { $result[] = $a; });
        return $result;
    }

    public static function getMultidimensionalArrayCombinations(array $array) {
        $result = array(array());
        foreach ($array as $property => $property_values) {
            $tmp = array();
            foreach ($result as $result_item) {
                foreach ($property_values as $property_value) {
                    $tmp[] = array_merge($result_item, array($property => $property_value));
                }
            }
            $result = $tmp;
        }
        return $result;
    }

    public static function extendedTypeCast($var, $type) {
        if (in_array($type, self::CAST_DEFAULT_TYPES)) {
            settype($var, $type);
        } else {
            switch($type) {
                case 'datetime':
                case 'date':    
                    $var = self::normalizeDate($var);
                    break;
                default:
                    $var = false;
            }            
        }
        return $var;
    }

    public static function setFlag($targetValue, $value, $output) {
        return ($value == $targetValue) ? $output : '';
    }
    
    public static function setCheckbox($targetValue, $value) {
        return ($value == $targetValue) ? 'checked="checked"' : '';
    }
    
    public static function setOption($target, $value) {
        $match = is_array($target) ? in_array($value, $target) : ($value == $target);
        return $match ? 'selected="selected"' : '';
    }

    public static function flagInArray(mixed $needle, array $array, string $flag) :string {
        return (in_array($needle, $array)) ? $flag : '';
    }

    public static function validateInfocarAM(string $codiceInfocar) :bool {
        return preg_match('/^[12]{1}[\d]{3}[01]{1}[\d]{1}[\d]{3,6}$/', $codiceInfocar) !== false;
    }

    public static function explodeInfocarAM(string $codiceInfocar, bool $asValueArray = false) {
        if (!Utils::validateInfocarAM($codiceInfocar)) {
            return false;
        }
        $data = [
            'idAllestimento' => (int)substr($codiceInfocar, 6, strlen($codiceInfocar)),
            'anno' => (int)substr($codiceInfocar, 0, 4),
            'mese' => (int)substr($codiceInfocar, 4, 2)
        ];
        return ($asValueArray) ? array_values($data) : (object)$data;
    }

    public static function implodeInfocarAM(int $variantId, int $year, int $month) {
        return sprintf(
            '%s%s%s', $year, str_pad($month, 2, '0', STR_PAD_LEFT), str_pad($variantId, 6, '0', STR_PAD_LEFT)
        );
    }

    public static function isItalianMobilePhoneNumber($input) {
        // Elimino tutti i caratteri che non sono numerici dalla stringa
        $num = preg_replace("/([^\d]+)/", '', $input);
        // Scarto il numero se non inizia con il carattere 3
        if (!str_starts_with($num, '3')) {
            return false;
        }
        // Se la stringa è più lunga di 10 caratteri e inizia con 39 probabilmente 
        // contiene il prefisso nazionale, che elimino
        if (strlen($num) > 10 && str_starts_with($num, '39')) {
            $num = substr($num, 2);
        }
        // Scarto il numero se è lungo 9 cifre ma non ha un prefisso TACS
        if (strlen($num) == 9 && !in_array(substr($num, 0, 3), ['330','336','337','360','368'])) {
            return false;
        }
        $numLen = strlen($num);
        // Verifico che il numero sia lungo 9 o 10 cifre
        return ($numLen == 9 || $numLen == 10) ? $num : false;
    }

}