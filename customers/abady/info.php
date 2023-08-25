<?php
error_reporting(E_ERROR | E_PARSE);

 
$ad_source="snap 1";
$map_embed_url="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3383.884070475232!2d35.867053999999996!3d31.991158!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ca10230662d61%3A0x722b2949a42db3bc!2z2YXZg9iq2Kgg2KfZhNi52KjYp9iv2Yog2YTZhNmF2K3Yp9mF2KfYqQ!5e0!3m2!1sar!2ssa!4v1693002496414!5m2!1sar!2ssa";
$logo_h='100px';
$logo_w='20px';
$customer_name='abady';
$customer_user_name='abady';
$max_needed_number=500;
$location_url="https://maps.app.goo.gl/TWes8qAPRT6ZKZtU6?g_st=ic";
//echo $ad_source;







try {



    $items = array();



$handle = fopen("services/asnan_services.txt", "r");
if ($handle) {
$i=0;
    while (($line = fgets($handle)) !== false) {
        //echo $line."<br>".$i; 
$i++;
$items['Peter'.$i]=$line;


    }

    fclose($handle);
}









$info = array(

    

    "website_title"=>"     تقييمات خرائط جوجل        ",
     "sub1"=>"      الحمزة للسيارات  ",
    "sub2"=>"أفضل عروض شانجان - شانجان جديدة بأفضل سعر   
      ",

    "counter_message"=>"     احجز قبل انتهاء العداد للحصول على العروض          ",



 "sidebar1_msg"=>"  عروض شهر رمضان المبارك  ",
 "sidebar2_msg"=>"  تجهيزات باحدث التقنيات     ",
 "sidebar3_msg"=>"     2  كادر طبي متميز       ",

    "form_sub1"=>"               ",
    "form_sub2"=>"      ",


 
    "ev_logo_name"=>$customer_name,


    
    "ev_form_sub1"=>"    
    املأ النموذج الآن
    
    ",


    "ev_form_sub2"=>"    
 لتحصل على نقاط اكثر في حال تم قبول تقييمك   
    ",


    
    "lt_sub1"=>"    
    
  
    ",


    "lt_sub2"=>"    



 


 
    ",




);


//echo "Peter is " . $age['Peter'] . " years old.";













$cats1 = array(

    "item0"=>"نساء   ",

    "item1"=>"رجال",
 





);


    
  } catch(Exception $e) {
    
  }





















 





?>