<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('convert'))
{

function convert($number){ 
	$txtnum1 = array('ศูนย์','หนึ่ง','สอง','สาม','สี่','ห้า','หก','เจ็ด','แปด','เก้า','สิบ'); 
	$txtnum2 = array('','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน'); 
	$number = str_replace(",","",$number); 
	$number = str_replace(" ","",$number); 
	$number = str_replace("บาท","",$number); 
	$number = explode(".",$number); 
	if(sizeof($number)>2){ 
		return 'ทศนิยมหลายตัวนะจ๊ะ'; 
		exit; 
	} 
	$strlen = strlen($number[0]); 
	$convert = ''; 
	for($i=0;$i<$strlen;$i++){ 
		$n = substr($number[0], $i,1); 
		if($n!=0){ 
			if($i==($strlen-1) AND $n==1){ $convert .= 'เอ็ด'; } 
			elseif($i==($strlen-2) AND $n==2){  $convert .= 'ยี่'; } 
			elseif($i==($strlen-2) AND $n==1){ $convert .= ''; } 
			else{ $convert .= $txtnum1[$n]; } 
			$convert .= $txtnum2[$strlen-$i-1]; 
		} 
	} 

	$convert .= 'บาท'; 
	if($number[1]=='0' OR $number[1]=='00' OR $number[1]==''){ 
		$convert .= 'ถ้วน'; 
	}else{ 
		$strlen = strlen($number[1]); 
		for($i=0;$i<$strlen;$i++){ 
			$n = substr($number[1], $i,1); 
			if($n!=0){ 
				if($i==($strlen-1) AND $n==1){$convert 
				.= 'เอ็ด';} 
				elseif($i==($strlen-2) AND 
				$n==2){$convert .= 'ยี่';} 
				elseif($i==($strlen-2) AND 
				$n==1){$convert .= '';} 
				else{ $convert .= $txtnum1[$n];} 
				$convert .= $txtnum2[$strlen-$i-1]; 
			} 
		} 
	$convert .= 'สตางค์'; 
	} 
	return $convert; 
	} 
}

if ( ! function_exists('num2wordsThai'))
{
	function num2wordsThai($num){   
	    $num=str_replace(",","",$num);
	    $num_decimal=explode(".",$num);
	    $num=$num_decimal[0];
	    $returnNumWord = "";   
	    $lenNumber=strlen($num);   
	    $lenNumber2=$lenNumber-1;   
	    $kaGroup=array("","สิบ","ร้อย","พัน","หมื่น","แสน","ล้าน","สิบ","ร้อย","พัน","หมื่น","แสน","ล้าน");   
	    $kaDigit=array("","หนึ่ง","สอง","สาม","สี่","ห้า","หก","เจ็ต","แปด","เก้า");   
	    $kaDigitDecimal=array("ศูนย์","หนึ่ง","สอง","สาม","สี่","ห้า","หก","เจ็ต","แปด","เก้า");   
	    $ii=0;   
	    for($i=$lenNumber2;$i>=0;$i--){   
	        $kaNumWord[$i]=substr($num,$ii,1);   
	        $ii++;   
	    }   
	    $ii=0;   
	    for($i=$lenNumber2;$i>=0;$i--){   
	        if(($kaNumWord[$i]==2 && $i==1) || ($kaNumWord[$i]==2 && $i==7)){   
	            $kaDigit[$kaNumWord[$i]]="ยี่";   
	        }else{   
	            if($kaNumWord[$i]==2){   
	                $kaDigit[$kaNumWord[$i]]="สอง";        
	            }   
	            if(($kaNumWord[$i]==1 && $i<=2 && $i==0) || ($kaNumWord[$i]==1 && $lenNumber>6 && $i==6)){   
	                if($kaNumWord[$i+1]==0){   
	                    $kaDigit[$kaNumWord[$i]]="หนึ่ง";      
	                }else{   
	                    $kaDigit[$kaNumWord[$i]]="เอ็ด";       
	                }   
	            }elseif(($kaNumWord[$i]==1 && $i<=2 && $i==1) || ($kaNumWord[$i]==1 && $lenNumber>6 && $i==7)){   
	                $kaDigit[$kaNumWord[$i]]="";   
	            }else{   
	                if($kaNumWord[$i]==1){   
	                    $kaDigit[$kaNumWord[$i]]="หนึ่ง";   
	                }   
	            }   
	        }   
	        if($kaNumWord[$i]==0){   
	            if($i!=6){
	                $kaGroup[$i]="";   
	            }
	        }   
	        $kaNumWord[$i]=substr($num,$ii,1);   
	        $ii++;   
	        $returnNumWord.=$kaDigit[$kaNumWord[$i]].$kaGroup[$i];   
	    }      
	    if(isset($num_decimal[1])){
	        $returnNumWord.="จุด";
	        for($i=0;$i<strlen($num_decimal[1]);$i++){
	                $returnNumWord.=$kaDigitDecimal[substr($num_decimal[1],$i,1)];  
	        }
	    }       
	    return $returnNumWord;   
	} 
}  

function num2thai($number){
$t1 = array("ศูนย์", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
$t2 = array("เอ็ด", "ยี่", "สิบ", "ร้อย", "พัน", "หมื่น", "แสน", "ล้าน");
$zerobahtshow = 0; // ในกรณีที่มีแต่จำนวนสตางค์ เช่น 0.25 หรือ .75 จะให้แสดงคำว่า ศูนย์บาท หรือไม่ 0 = ไม่แสดง, 1 = แสดง
(string) $number;
$number = explode(".", $number);
if(!empty($number[1])){
if(strlen($number[1]) == 1){
$number[1] .= "0";
}else if(strlen($number[1]) > 2){
if($number[1]{2} < 5){
$number[1] = substr($number[1], 0, 2);
}else{
$number[1] = $number[1]{0}.($number[1]{1}+1);
}
}
}

for($i=0; $i<count($number); $i++){
$countnum[$i] = strlen($number[$i]);
if($countnum[$i] <= 7){
$var[$i][] = $number[$i];
}else{
$loopround = ceil($countnum[$i]/6);
for($j=1; $j<=$loopround; $j++){
if($j == 1){
$slen = 0;
$elen = $countnum[$i]-(($loopround-1)*6);
}else{
$slen = $countnum[$i]-((($loopround+1)-$j)*6);
$elen = 6;
}
$var[$i][] = substr($number[$i], $slen, $elen);
}
}	

$nstring[$i] = "";
for($k=0; $k<count($var[$i]); $k++){
if($k > 0) $nstring[$i] .= $t2[7];
$val = $var[$i][$k];
$tnstring = "";
$countval = strlen($val);
for($l=7; $l>=2; $l--){
if($countval >= $l){
$v = substr($val, -$l, 1);
if($v > 0){
if($l == 2 && $v == 1){
$tnstring .= $t2[($l)];
}elseif($l == 2 && $v == 2){
$tnstring .= $t2[1].$t2[($l)];
}else{
$tnstring .= $t1[$v].$t2[($l)];
}
}
}
}
if($countval >= 1){
$v = substr($val, -1, 1);
if($v > 0){
if($v == 1 && $countval > 1 && substr($val, -2, 1) > 0){
$tnstring .= $t2[0];
}else{
$tnstring .= $t1[$v];
}

}
}

$nstring[$i] .= $tnstring;
}

}
$rstring = "";
if(!empty($nstring[0]) || $zerobahtshow == 1 || empty($nstring[1])){
if($nstring[0] == "") $nstring[0] = $t1[0];
$rstring .= $nstring[0]."บาท";
}
if(count($number) == 1 || empty($nstring[1])){
$rstring .= "ถ้วน";
}else{
$rstring .= $nstring[1]."สตางค์";
}
return $rstring;
}


?>