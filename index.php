<?php

// if the  functions begins with "mb_" did not work, plase remove all the "mb_" from functions

function reversText(string $word) {
    
    $wordArr = mb_str_split($word);

    $checkedUpperCaseChurackters = [];
    
    foreach($wordArr as $key => $char) {
        if($char === mb_strtoupper($char)) {
            $checkedUpperCaseChurackters[] = 1;
        } else {
            $checkedUpperCaseChurackters[] = 0;
        }
    }

    $reversed = mb_strtolower(mb_strrev($word));
    $wordArr = mb_str_split($reversed);
    
    for($i = 0; $i < count($wordArr); $i++) {
        if($checkedUpperCaseChurackters[$i]){
            $wordArr[$i] = mb_strtoupper($wordArr[$i]);
        }
    }

    return join('', $wordArr);

}

function mb_strrev($str){
    $r = '';
    for ($i = mb_strlen($str); $i>=0; $i--) {
        $r .= mb_substr($str, $i, 1);
    }
    return $r;
}

function getReversedText(string $sentence) {
    
    $arrWords = explode(' ', $sentence);

    $expectedCharackters = '?!;.,:';
    for($i = 0; $i < count($arrWords); $i++)
    {
        if(mb_strlen($arrWords[$i]) > 1){
            $findme = mb_substr($arrWords[$i], -1, 1);
            
            $yesChar = mb_strpos($expectedCharackters, $findme);

            if($yesChar !== false) {
            
                $word = mb_substr($arrWords[$i], 0, -1);
            
                $arrWords[$i] = reversText($word) . $findme;
            
            } else {
              $arrWords[$i] = reversText($arrWords[$i]);
            }
        } else {
            $arrWords[$i] = reversText($arrWords[$i]);
        }
    }

    return join(' ', $arrWords);

}

echo getReversedText("Привет! Давно не виделись.");