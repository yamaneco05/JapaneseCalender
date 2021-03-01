<?php
require_once 'validation/YearValidation.php';
require_once 'validation/NextValidation.php';

class BaseValidation {

    protected $errors = array();

    public function getErrorMessages() {
        return $this->errors;
    }
}

class JapaneseCalender {

    const NOW = 2021;
    const REIWA = 2018;
    const HEISEI = 1988;
    const SYOWA = 1925;
    const TAISYO = 1911;
    const MEIJI = 1867;
    const CLOSE = 2;

    public function main() {

    echo "西暦を入力すると年号を出力するプログラムです(=^ェ^=)" . PHP_EOL;
    echo "西暦を入力してください > " . PHP_EOL;

    $this->yearNumber();
    $this->next();
    return $this->main();
    }

    public function yearNumber() {

        $memo = $this->input('year');
        
        if ($memo >= self::REIWA) {
            echo '令和です' . PHP_EOL;
        }
        if ($memo < self::REIWA && $memo >= self::HEISEI) {
            echo '平成です' . PHP_EOL;
        }
        if ($memo < self::HEISEI && $memo >= self::SYOWA) {
            echo '昭和です' . PHP_EOL;
        }
        if ($memo < self::SYOWA && $memo >= self::TAISYO) {
            echo '大正です' . PHP_EOL;
        }
        if ($memo < self::TAISYO && $memo >= self::MEIJI) {
            echo '明治です' . PHP_EOL; 
        }
    }

    public function input($type) {

        $memo = trim(fgets(STDIN));

        if ($type == 'year') {

            $validation = new YearValid;
            $check = $validation->check($memo);
        }
        if ($type == 'next') {

            $validation = new NextValid;
            $check = $validation->check($memo);
        }
        if ($check == false) {
            foreach ( $validation->getErrorMessages() as $error ) {
            echo $error . PHP_EOL;
            }
            return $this->input($type);
        }
        return $memo;
    }

    public function next() {
        echo 'もう一度やりますか？'. PHP_EOL;
        echo 'もう一度やるときは[1]、終了するときは[2]を入力して'. PHP_EOL;
        echo 'ENTERキーを押してください。'. PHP_EOL;
        $memo = $this->input('next');

        if ($memo == 2) {
        echo "ご利用ありがとうございました。" . PHP_EOL;
        exit();
        }
        return;
    }
}

$cal = new JapaneseCalender;
$cal->main();
?>