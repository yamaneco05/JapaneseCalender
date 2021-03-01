<?php

class NextValid extends BaseValidation{

    public function check($memo) {

        if ($memo == null) {
            $this->errors[] = "入力されていません\n1か2を入力してください。";
            return false;
        }
        if (!ctype_digit($memo) || $memo > JapaneseCalender::CLOSE) {
            $this->errors[] = "無効な値です。\n1か2を入力してください。";
            return false;
        }
        return $memo;
    }
}