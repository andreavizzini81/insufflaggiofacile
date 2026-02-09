<?php

class Cli {

    private const FG = [
        'black' => '0;30',
        'dark_gray' => '1;30',
        'red' => '0;31',
        'bold_red' => '1;31',
        'green' => '0;32',
        'bold_green' => '1;32',
        'brown' => '0;33',
        'yellow' => '1;33',
        'blue' => '0;34',
        'bold_blue' => '1;34',
        'purple' => '0;35',
        'bold_purple' => '1;35',
        'cyan' => '0;36',
        'bold_cyan' => '1;36',
        'white' => '1;37',
        'bold_gray' => '0;37'
    ];

    private const BG = [
        'black'      => '40',
        'red'        => '41',
        'magenta'    => '45',
        'yellow'     => '43',
        'green'      => '42',
        'blue'       => '44',
        'cyan'       => '46',
        'light_gray' => '47',
    ];

    public static function fg_color($color, $string) {
        if (!isset(self::FG[$color])) {
            throw new Exception('Foreground color is not defined');
        }
        return sprintf("\033[%sm%s\033[0m", self::FG[$color], $string);
    }

    public static function bg_color($color, $string) {
        if (!isset(self::BG[$color])) {
            throw new Exception('Background color is not defined');
        }
        return sprintf("\033[%sm%s\033[0m", self::BG[$color], $string);
    }

    public static function all_fg() {
        foreach (self::FG as $color => $code) {
            echo "$color - " . self::fg_color($color, 'Hello, world!') . PHP_EOL;
        }
    }

    public static function all_bg() {
        foreach (self::BG as $color => $code) {
            echo "$color - " . self::bg_color($color, 'Hello, world!') . PHP_EOL;
        }
    }

    public static function print(string $text = '', $crlf = true, $foreground = null, $background = null) {
        $text = ($foreground) ? self::fg_color($foreground, $text) : $text;
        $text = ($background) ? self::bg_color($background, $text) : $text;
        printf('%s%s', $text, $crlf ? "\n" : null);
    }

    public static function error(string $text, bool $crlf = true) {
        self::print($text, $crlf, 'bold_red', null);
    }

    public static function bgInfo(string $text, bool $crlf = true) {
        self::print($text, $crlf, null, 'blue');
    }
    
}