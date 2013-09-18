<?php

namespace model;

/* Show Date & Time */

class DateTime {
	
	private $weekdayID = "";
	private $weekday = "";
	private $monthID = "";
	private $month = "";


	public function getDateTime() {

 		/* Switch sats för veckodagar (%w: 0:Söndag - 6:Lördag) */
		$weekdayID = strftime("%w");

		switch ($weekdayID) {
		    case 0:
		        $weekday = "Söndag";
		        break;
		    case 1:
		        $weekday = "Måndag";
		        break;
		    case 2:
		        $weekday = "Tisdag";
		        break;
		    case 3:
		        $weekday = "Onsdag";
		        break;
		    case 4:
		        $weekday = "Torsdag";
		        break;
		    case 5:
		        $weekday = "Fredag";
		        break;
		    case 6:
		        $weekday = "Söndag";
		        break;
		}

		/* Switch sats för månader (%m: 01: januari - 12: december) */
		$monthID = strftime("%m");
		switch ($monthID) {
		    case '01':
		        $month = "Januari";
		        break;
		    case '02':
		        $month = "Februari";
		        break;
		    case '03':
		        $month = "Mars";
		        break;
		    case '04':
		        $month = "April";
		        break;
		    case '05':
		        $month = "Maj";
		        break;
		    case '06':
		        $month = "Juni";
		        break;
		    case '07':
		        $month = "Juli";
		        break;
		    case '08':
		        $month = "August";
		        break;
		    case '09':
		        $month = "September";
		        break;
		    case '10':
		        $month = "Oktober";
		        break;
		    case '11':
		        $month = "November";
		        break;
		    case '12':
		        $month = "December";
		        break;
		}

		/* Klockan UTC + 2 timmar (2h * 60min * 60sec)*/
		/* Format <<Fredag, den 13 September år 2013. Klockan är [09:59:42].>> */
		/* ucfirst(): makes first letter capital (for weekdays & month). */
		/* gmstrftime(): formats date & time based on locale settings */
		return ucfirst(gmstrftime("$weekday, den %#d $month år %Y. Klockan är [%H:%M:%S].", time() + 7200));
	}

}