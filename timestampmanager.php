<?php
    class timestampmanager {        
        public static function to_month_and_year($timestamp) {
            $year = substr($timestamp, 0, 4);
            $month = substr($timestamp, 5, 2);
            switch ($month){
                case "01":
                    $month = "January";
                    break;
                case "02":
                    $month = "February";
                    break;
                case "03":
                    $month = "March";
                    break;
                case "04":
                    $month = "April";
                    break;
                case "05":
                    $month = "May";
                    break;
                case "06":
                    $month = "June";
                    break;
                case "07":
                    $month = "July";
                    break;
                case "08":
                    $month = "August";
                    break;
                case "09":
                    $month = "September";
                    break;
                case "10":
                    $month = "October";
                    break;
                case "11":
                    $month = "November";
                    break;
                case "12":
                    $month = "December";
                    break;
                default:
                    $month = "Unknown Month";
                    break;
            }//switch
            return "$month, $year";
        }//to_month_and_year
    }//class

?>