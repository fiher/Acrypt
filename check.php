<?php
$text = trim(fgets(STDIN));
$secretKey= "a";
$key = "two";
$privateKey = "one";
function cipher0($text){
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
function decipher0($text){
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
$text = cipher0($text);
echo "encripted text is ->>>> ".$text.PHP_EOL;
$text = decipher0($text);
echo "original text was ->>>>".$text;

