<?php

date_default_timezone_set('Africa/Nairobi');

//To get the total number of minutes:
//echo date('Y-m-d H-i-s');



function sec($date){
  $now =  date('Y-m-d H:i:s');
  $start_date = new DateTime($date);
  $since_start = $start_date->diff(new DateTime($now));
  
  
  $sec = $since_start->days * 24 * 60;
  $sec += $since_start->h * 60;
  $sec += $since_start->i;
  $sec = $sec * 60;
  
  return $sec;

}




//echo get_time_ago ( time ()- $sec);


function get_time_ago ( $time )
{
$time_difference = time () - $time ;
if ( $time_difference < 1 ) { return 'less than 1 second ago' ; }
  $condition = array ( 12 * 30 * 24 * 60 * 60 => 'year' ,
  30 * 24 * 60 * 60 => 'month' ,
  24 * 60 * 60 => 'day' ,
  60 * 60 => 'hr' ,
  60 => 'min' ,
  1 => 'sec'
  );
  foreach ( $condition as $secs => $str )
  {
  $d = $time_difference / $secs ;
  if ( $d >= 1 )
  {
  $t = round ( $d );
  return ' ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago' ;
  }
  }
  }
  
  
//This will output:

//2645654 minutes

?>