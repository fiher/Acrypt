<?php

/**
 * Created by PhpStorm.
 * User: PC
 * Date: 02-May-17
 * Time: 14:07
 */
class Crypt
{
    public function encrypt($text,$publicKey,$privateKey){

    }
    public function cypher0($text){
        $textLength = strlen($text);
        $splitInto = 0;
        $textAsArray = [];
        if($textLength>=5 && $textLength < 10){$splitInto = 2;}
        elseif ($textLength<15){$splitInto = 4;}
        elseif ($textLength<20){$splitInto = 8;}
        elseif ($textLength<30){$splitInto = 6;}
        elseif ($textLength<35){$splitInto = 10;}
        elseif ($textLength<45){$splitInto = 8;}
        elseif ($textLength<50){$splitInto = 4;}
        elseif ($textLength<60){$splitInto = 12;}
        elseif ($textLength<70){$splitInto = 14;}
        elseif ($textLength<80){$splitInto = 16;}
        elseif ($textLength<90){$splitInto = 12;}
        elseif ($textLength<100){$splitInto = 8;}
        elseif ($textLength<120){$splitInto = 14;}
        elseif ($textLength<150){$splitInto = 18;}
        elseif ($textLength<160){$splitInto = 14;}
        elseif ($textLength<180){$splitInto = 16;}
        elseif ($textLength<190){$splitInto = 8;}
        elseif ($textLength<200){$splitInto = 4;}
        elseif ($textLength<240){$splitInto = 9;}
        elseif ($textLength<280){$splitInto = 21;}
        elseif ($textLength<290){$splitInto = 32;}
        elseif ($textLength<300){$splitInto = 14;}
        elseif ($textLength<320){$splitInto = 35;}
        elseif ($textLength<340){$splitInto = 21;}
        elseif ($textLength<356){$splitInto = 4;}
        elseif ($textLength<456){$splitInto = 2;}
        elseif ($textLength<500){$splitInto = 5;}
        elseif ($textLength<550){$splitInto = 23;}
        elseif ($textLength>=550){$splitInto = 40;}
        $arrayOfTextBlocks = [];
        $leftBlockOfText = "";
        $index = 0;
        $text = implode("",array_reverse(str_split($text)));
        for($i= 0 ; $i<$splitInto;$i++){
            $textBlock = "";
            for ($y = 0;$y<floor($textLength/$splitInto);$y++){
                $textBlock .= $text[$index];
                $index++;
            }
            $arrayOfTextBlocks[] = $textBlock;
        }

        $arrayOfTextBlocks = array_reverse($arrayOfTextBlocks);
        foreach ($arrayOfTextBlocks as $textBlock){
            $textAsArray[] = $textBlock;
        }
        if($index<$textLength){
            for ($i = $index;$i<$textLength;$i++){
                $leftBlockOfText .= $text[$i];
            }
            $textAsArray[] = $leftBlockOfText;
        }

        return implode("",$textAsArray);
    }
    public function cypher1($text,$key,$privateKey,$secretKey){
        $textLegnth = strlen($text);
        $insertIndex = floor($textLegnth/3);
        $text = strrev($text);
        $textAsArray = str_split($text);

        for ($i = 0; $i < strlen($key); $i++) {
            array_splice($textAsArray, $insertIndex+$i, 0, $key[$i]);
        }
        for ($i = 0; $i < strlen($privateKey); $i++) {
            array_splice($textAsArray, $insertIndex*2+$i, 0, $privateKey[$i]);
        }
        for ($i = 0; $i < strlen($secretKey); $i++) {
            array_splice($textAsArray, $insertIndex*3+$i, 0, $secretKey[$i]);
        }
        $text = implode("",$textAsArray);
        $text = strrev($text);

        return $text;
    }
    public function cipher2($text,$key,$privateKey,$isFirst){
        $textLength = strlen($text);
        $cipheredText = [];
        $isOdd = false;
        $counter = $textLength/2;
        if(!is_int($counter)) {
            $counter =  floor($counter);
            $isOdd = true;
        }
        for($i = 0; $i<$counter;$i++){
            $cipheredText[] = $text[$textLength-1-$i];
            $cipheredText[] = $text[$i];
        }
        if($isFirst) {
            for ($i = 0; $i < strlen($key); $i++) {
                array_splice($cipheredText, 2, 0, $key[$i]);
            }
            for ($i = 0; $i < strlen($privateKey); $i++) {
                array_splice($cipheredText, 3, 0, $privateKey[$i]);
            }
        }
        if($isOdd){
            $cipheredText[] = $text[intval($counter)];
        }
        return implode("",$cipheredText);
    }
    public function cipher3($text){
        $shift = array(  "4"=>"z","2"=>"f","8"=>"s","1"=>"r","9"=>"k",
            "6"=>"w","0"=>"t","3"=>";","5"=>"@","7"=>"*","A"=>"b",
            "x"=>"y","t"=>"8","R"=>"4","Q"=>"d","@"=>"$","c"=>"l","!"=>"c","i"=>"G",
            "("=>"D","#"=>"#","e"=>"e","h"=>"h","n"=>"q","a"=>"g","b"=>"F",
            "C"=>"<","F"=>"g","o"=>"n","%"=>"B","&"=>"3","j"=>"x","_"=>"9",
            "H"=>"J","q"=>"i","k"=>"^","J"=>"0","d"=>"a","u"=>"j","l"=>"v",")"=>"+",
            "y"=>"5","E"=>"2","D"=>"o","f"=>"1","p"=>"!","L"=>"L","$"=>"%",
            "w"=>"E","m"=>"m","N"=>"(","G"=>"A","I"=>"H","T"=>"P","K"=>"7","M"=>"I",
            "O"=>"K","P"=>"M","S"=>"N","U"=>"?","V"=>"&","*"=>"Q","W"=>"O",
            "X"=>"R","Y"=>"p","Z"=>")","r"=>"S","s"=>"T","|"=>"u","?"=>"|","\""=>"6",
            "^"=>">","+"=>"Z","v"=>"U","z"=>"_","<"=>"V",">"=>"W",";"=>"X","B"=>"Y"
        );
        for ($i=0;$i<count($text);$i+=1){
            if (key_exists($text[$i],$shift)){
                $textAsArray[$i] = $shift[$text[$i]];
            }
        }
        return $text;
    }
    public function cipher4($text){
        $textLength = strlen($text);
        for ($i = 0; $i < $textLength; $i++){
            $asciiChange = $i+1;
            if($asciiChange >27){
                $asciiChange = $asciiChange %27;
            }
            $letterASCII = ord($text[$i]);
            $letterASCII += $asciiChange;
            $text[$i] = chr($letterASCII);
        }
        return $text;
    }
    public function cipher5($text){
        for($i = 0; $i<strlen($text);$i++){

        }
        return $text;
    }
    public function cipher6($text){
        for($i = 0; $i<strlen($text);$i++){

        }
        return $text;
    }
    public function cipher7($text){
        for($i = 0; $i<strlen($text);$i++){

        }
        return $text;
    }
    public function cipher8($text){
        for($i = 0; $i<strlen($text);$i++){

        }
        return $text;
    }
    public function cipher9($text){
        for($i = 0; $i<strlen($text);$i++){

        }
        return $text;
    }
    public function cipherA($text){
        for($i = 0; $i<strlen($text);$i++){

        }
        return $text;
    }
    public function cipherB($text){
        for($i = 0; $i<strlen($text);$i++){

        }
        return $text;
    }
    public function cipherC($text){
        for($i = 0; $i<strlen($text);$i++){

        }
        return $text;
    }
    public function cipherD($text){
        for($i = 0; $i<strlen($text);$i++){

        }
        return $text;
    }
    public function cipherE($text){
        for($i = 0; $i<strlen($text);$i++){

        }
        return $text;
    }
    public function cipherF($text){
        for($i = 0; $i<strlen($text);$i++){

        }
        return $text;
    }

    public function decrypt($text,$publicKey,$privateKey){

    }
    public function decipher0($text){
        $textLength = strlen($text);
        $splitInto = 0;
        $textAsArray = [];

        if($textLength>=5 && $textLength < 10){$splitInto = 2;}
        elseif ($textLength<15){$splitInto = 4;}
        elseif ($textLength<20){$splitInto = 8;}
        elseif ($textLength<30){$splitInto = 6;}
        elseif ($textLength<35){$splitInto = 10;}
        elseif ($textLength<45){$splitInto = 8;}
        elseif ($textLength<50){$splitInto = 4;}
        elseif ($textLength<60){$splitInto = 12;}
        elseif ($textLength<70){$splitInto = 14;}
        elseif ($textLength<80){$splitInto = 16;}
        elseif ($textLength<90){$splitInto = 12;}
        elseif ($textLength<100){$splitInto = 8;}
        elseif ($textLength<120){$splitInto = 14;}
        elseif ($textLength<150){$splitInto = 18;}
        elseif ($textLength<160){$splitInto = 14;}
        elseif ($textLength<180){$splitInto = 16;}
        elseif ($textLength<190){$splitInto = 8;}
        elseif ($textLength<200){$splitInto = 4;}
        elseif ($textLength<240){$splitInto = 9;}
        elseif ($textLength<280){$splitInto = 21;}
        elseif ($textLength<290){$splitInto = 32;}
        elseif ($textLength<300){$splitInto = 14;}
        elseif ($textLength<320){$splitInto = 35;}
        elseif ($textLength<340){$splitInto = 21;}
        elseif ($textLength<356){$splitInto = 4;}
        elseif ($textLength<456){$splitInto = 2;}
        elseif ($textLength<500){$splitInto = 5;}
        elseif ($textLength<550){$splitInto = 23;}
        elseif ($textLength>=550){$splitInto = 40;}
        $arrayOfTextBlocks = [];
        $leftBlockOfText = "";
        $index = 0;
        for($i= 0 ; $i<$splitInto;$i++){
            $textBlock = "";
            for ($y = 0;$y<floor($textLength/$splitInto);$y++){
                $textBlock .= $text[$index];
                $index++;
            }
            $arrayOfTextBlocks[] = $textBlock;
        }
        $arrayOfTextBlocks = array_reverse($arrayOfTextBlocks);
        foreach ($arrayOfTextBlocks as $textBlock){
            $textAsArray[] = $textBlock;
        }

        if($index<$textLength){
            for ($i = $index;$i<$textLength;$i++){
                $leftBlockOfText .= $text[$i];
            }
            $textAsArray[] = $leftBlockOfText;
        }
        return strrev(implode("",$textAsArray));
    }
    public function decipher1($text,$key,$privateKey,$secretKey){
        $textLength = strlen($text);
        $text = strrev($text);
        $textAsArray = str_split($text);
        $keyLength = strlen($key);
        $privateKeyLength = strlen($privateKey);
        $secretKeyLength = strlen($secretKey);
        $actualTextLength = $textLength - $keyLength - $privateKeyLength - $secretKeyLength;
        $insertIndex = floor($actualTextLength/3);
        for ($i = 0; $i < strlen($secretKey); $i++) {
            unset($textAsArray[intval($insertIndex*3+$i)]);
        }$textAsArray = array_values($textAsArray);
        for ($i = 0; $i < strlen($privateKey); $i++) {
            unset($textAsArray[intval($insertIndex*2+$i)]);
        }$textAsArray = array_values($textAsArray);
        for ($i = 0; $i < strlen($key); $i++) {
            unset($textAsArray[intval($insertIndex+$i)]);
        } $textAsArray = array_values($textAsArray);
        $text = strrev(implode("",$textAsArray));

        return $text;
    }
    public function decipher2($text,$key,$privateKey,$isFirst){
        list( $insertPositionKey, $insertPositionPrivateKey, $textAsArray) = array( 2, 3, str_split($text));
        if($isFirst) {
            for ($i = 0; $i < strlen($privateKey); $i++) {
                unset($textAsArray[$insertPositionPrivateKey]);
                $textAsArray = array_values($textAsArray);
            }
            for ($i = 0; $i < strlen($key); $i++) {
                unset($textAsArray[$insertPositionKey]);
                $textAsArray = array_values($textAsArray);
            }
        }
        $cypheredText = implode("",$textAsArray);
        $textLength = strlen($cypheredText);
        $isOdd = false;
        $counter = $textLength/2;
        if(!is_int($counter)) {
            $counter =  floor($counter);
            $isOdd = true;
        }
        $decypherText = $array = array_fill(0,$textLength, "0");
        $decypherText[count($decypherText)-1] = $cypheredText[0];
        $decypherText[0] = $cypheredText[1];

        $odd = 0;
        $shift = 0;

        if($isOdd){
            $decypherText[$counter] = $cypheredText[$textLength-1];
            $odd = 1;
        }else{
            $shift = 1;
        }
        $insertPosition = 1;
        for($i = 2; $i<$textLength-1-$odd;$i+=2){
            $num = count($decypherText)-1-$odd-$shift;
            $decypherText[count($decypherText)-1-$odd-$shift] = $cypheredText[$i];
            $decypherText[$insertPosition] = $cypheredText[$i+1];

            $shift+=1;
            $insertPosition+=1;
        }
    }
    public function decipher3($text){
        $shift = array_flip($shift = array(  "4"=>"z","2"=>"f","8"=>"s","1"=>"r","9"=>"k",
            "6"=>"w","0"=>"t","3"=>";","5"=>"@","7"=>"*","A"=>"b",
            "x"=>"y","t"=>"8","R"=>"4","Q"=>"d","@"=>"$","c"=>"l","!"=>"c","i"=>"G",
            "("=>"D","#"=>"#","e"=>"e","h"=>"h","n"=>"q","a"=>"g","b"=>"F",
            "C"=>"<","F"=>"g","o"=>"n","%"=>"B","&"=>"3","j"=>"x","_"=>"9",
            "H"=>"J","q"=>"i","k"=>"^","J"=>"0","d"=>"a","u"=>"j","l"=>"v",")"=>"+",
            "y"=>"5","E"=>"2","D"=>"o","f"=>"1","p"=>"!","L"=>"L","$"=>"%",
            "w"=>"E","m"=>"m","N"=>"(","G"=>"A","I"=>"H","T"=>"P","K"=>"7","M"=>"I",
            "O"=>"K","P"=>"M","S"=>"N","U"=>"?","V"=>"&","*"=>"Q","W"=>"O",
            "X"=>"R","Y"=>"p","Z"=>")","r"=>"S","s"=>"T","|"=>"u","?"=>"|","\""=>"6",
            "^"=>">","+"=>"Z","v"=>"U","z"=>"_","<"=>"V",">"=>"W",";"=>"X","B"=>"Y"
        ));
        for ($i=0;$i<count($text);$i+=1){
            if (key_exists($text[$i],$shift)){
                $textAsArray[$i] = $shift[$text[$i]];
            }
        }
        return $text;
    }
    public function decipher4($text){
        $textLength = strlen($text);
        for ($i = 0; $i < $textLength; $i++){
            $asciiChange = $i+1;
            if($asciiChange >27){
                $asciiChange = $asciiChange %27;
            }
            $letterASCII = ord($text[$i]);
            $letterASCII -= $asciiChange;
            $text[$i] = chr($letterASCII);
        }
        return $text;
    }
    public function decipher5($text){
        for($i = 0; $i<strlen($text);$i++){

        }
        return $text;
    }
    public function decipher6($text){
        for($i = 0; $i<strlen($text);$i++){

        }
        return $text;
    }
    public function decipher7($text){
        for($i = 0; $i<strlen($text);$i++){

        }
        return $text;
    }
    public function decipher8($text){
        for($i = 0; $i<strlen($text);$i++){

        }
        return $text;
    }
    public function decipher9($text){
        for($i = 0; $i<strlen($text);$i++){

        }
        return $text;
    }
    public function decipherA($text){
        for($i = 0; $i<strlen($text);$i++){

        }
        return $text;
    }
    public function decipherB($text){
        for($i = 0; $i<strlen($text);$i++){

        }
        return $text;
    }
    public function decipherC($text){
        for($i = 0; $i<strlen($text);$i++){

        }
        return $text;
    }
    public function decipherD($text){
        for($i = 0; $i<strlen($text);$i++){

        }
        return $text;
    }
    public function decipherE($text){
        for($i = 0; $i<strlen($text);$i++){

        }
        return $text;
    }
    public function decipherF($text){
        for($i = 0; $i<strlen($text);$i++){

        }
        return $text;
    }
}