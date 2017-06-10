<?php

/**
 * Created by PhpStorm.
 * User: PC
 * Date: 02-May-17
 * Time: 09:50
 */
namespace Core;
class ConfigEncryption
{
    const DCRYPT_LETTERSCODE = ["a" =>55,"b"=>66];
   public static function getCipher2PrivateKeyPosition($length){
       if($length>0&&$length<6){
           return 4;
       }elseif ($length==7){
           return 2;
       }elseif ($length==8){
           return 5;
       }elseif ($length==9){
           return 6;
       }elseif ($length==10){
           return 3;
       }elseif ($length<100){
           return 66;
       }elseif ($length<200){
           return 72;
       }elseif ($length<250){
           return 173;
       }elseif ($length <500){
           return 443;
       }elseif ($length<800){
           return 522;
       }elseif ($length<1000){
           return 666;
       }elseif ($length<1200){
           return 573;
       }elseif ($length<1500){
           return 834;
       }
       return "not valid";
   }
   public static function getCipher2KeyPosition($length){
       if($length>0&&$length<6){
           return 2;
       }elseif ($length==7){
           return 3;
       }elseif ($length==8){
           return 6;
       }elseif ($length==9){
           return 4;
       }elseif ($length==10){
           return 5;
       }elseif ($length<100){
           return 36;
       }elseif ($length<200){
           return 82;
       }elseif ($length<250){
           return 213;
       }elseif ($length <500){
           return 323;
       }elseif ($length<800){
           return 622;
       }elseif ($length<1000){
           return 866;
       }elseif ($length<1200){
           return 273;
       }elseif ($length<1500){
           return 534;
       }
       return "not valid";
   }
   const SECRET_KEY = "42KDJ2D!$#!@KDI@D";



   //this might come in handy
//if($textLength>=5 && $textLength < 10){$splitInto = 2;}
//elseif ($textLength<15){$splitInto = 4;}
//elseif ($textLength<20){$splitInto = 8;}
//elseif ($textLength<30){$splitInto = 6;}
//elseif ($textLength<35){$splitInto = 10;}
//elseif ($textLength<45){$splitInto = 8;}
//elseif ($textLength<50){$splitInto = 4;}
//elseif ($textLength<60){$splitInto = 12;}
//elseif ($textLength<70){$splitInto = 14;}
//elseif ($textLength<80){$splitInto = 16;}
//elseif ($textLength<90){$splitInto = 12;}
//elseif ($textLength<100){$splitInto = 8;}
//elseif ($textLength<120){$splitInto = 14;}
//elseif ($textLength<150){$splitInto = 18;}
//elseif ($textLength<160){$splitInto = 14;}
//elseif ($textLength<180){$splitInto = 16;}
//elseif ($textLength<190){$splitInto = 8;}
//elseif ($textLength<200){$splitInto = 4;}
//elseif ($textLength<240){$splitInto = 9;}
//elseif ($textLength<280){$splitInto = 21;}
//elseif ($textLength<290){$splitInto = 32;}
//elseif ($textLength<300){$splitInto = 14;}
//elseif ($textLength<320){$splitInto = 35;}
//elseif ($textLength<340){$splitInto = 21;}
//elseif ($textLength<356){$splitInto = 4;}
//elseif ($textLength<456){$splitInto = 2;}
//elseif ($textLength<500){$splitInto = 5;}
//elseif ($textLength<550){$splitInto = 23;}
//elseif ($textLength>=550){$splitInto = 40;}
}