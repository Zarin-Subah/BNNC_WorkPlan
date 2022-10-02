<?php
class Common{
    private static $ci_obj;
    
    public static function init(){
        if(!isset(self::$ci_obj)){
            self::$ci_obj=& get_instance();
        }
        return self::$ci_obj;
    }
   	public static function foramt_date($date){
   		$date1 = strtotime($date);
   		$date2 = date('F j, Y',$date1);
   		return $date2;
   	}
    public static function foramt_time($time){
        $time1 = strtotime($time);
        $time2 = date('h:i:s A',$time1);
        return $time2;
    }
    public static function format_month($month){
        if($month==1){$month="January";}
        if($month==2){$month="February";}
        if($month==3){$month="March";}
        if($month==4){$month="April";}
        if($month==5){$month="May";}
        if($month==6){$month="June";}
        if($month==7){$month="July";}
        if($month==8){$month="August";}
        if($month==9){$month="September";}
        if($month==10){$month="October";}
        if($month==11){$month="November";}
        if($month==12){$month="December";}
        return $month;
    }
    public static function format_youtube_link($link) {
        $link=  str_replace('-', 'hfn', $link);
        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i';

        if (preg_match($longUrlRegex, $link, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        if (preg_match($shortUrlRegex, $link, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        $youtube_id=  str_replace('hfn', '-', $youtube_id);
        return 'https://www.youtube.com/embed/' . $youtube_id;
    }
}
?>