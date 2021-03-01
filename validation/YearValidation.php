<?php

class YearValid extends BaseValidation{

    public function check($memo) {

        if ($memo == null) {
            $this->errors[] = "入力されていません\n正しい西暦を入力してください。";
            return false;
        }

        if ( !is_numeric($memo) ) {
            $this->errors[] = "西暦が正しくありません。\n正しい西暦を入力してください。";
            return false;
        }
        
        if ($memo < JapaneseCalender::MEIJI || $memo > JapaneseCalender::NOW) {
            $this->errors[] = "西暦が正しくありません。\n正しい西暦を入力してください。";
            return false;
        }
        return $memo;
    }

}