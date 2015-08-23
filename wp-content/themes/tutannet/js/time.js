/**
*  Time js for TuTanNet
* 
*/

jQuery(document).ready(function($){

var today = new Date(),
	latitude = 10.7500, longitude = 106.6667,
	times = SunCalc.getTimes(today, latitude, longitude);
	sunrise = times['sunrise'];
	night = times['night'];

sunCalc(times, latitude, longitude);

if (today > sunrise && today < night ) { $('#time_toolbar i').addClass('fa-sun-o'); } else { $('#time_toolbar i').addClass('fa-moon-o'); }



}); // End


function sunCalc(times, latitude, longitude) {
	var 
		todayLunar = getTodayString(),
		moon = SunCalc.getMoonIllumination(today),
		moonPhase = ''
		;
	
	if (moon['phase'] == 0) {
		moonPhase = 'New Moon'; 
	}
	else if (moon['phase'] > 0 && moon['phase'] < 0.25)  {
		moonPhase = 'Waxing Crescent';
	}
	else if (moon['phase'] == 0.25)  {
		moonPhase = 'First Quarter';
	}
	else if (moon['phase'] > 0.25 && moon['phase'] < 0.5)  {
		moonPhase = 'Waxing Gibbous';
	}
	else if (moon['phase'] == 0.5 || moon['phase'] == 1)  {
		moonPhase = 'Full Moon';
	}
	else if (moon['phase'] > 0.5 && moon['phase'] < 0.75)  {
		moonPhase = 'Waning Gibbous';
	}
	else if (moon['phase'] == 0.75)  {
		moonPhase = 'Last Quarter';
	}
	else if (moon['phase'] > 0.75 && moon['phase'] < 1)  {
		moonPhase = 'Waning Crescent';
	}
	
	
	console.log('  /********************/\n /    Sun Analysis    /\n/********************/');
	console.log('You are at ' + latitude + 'N ' + longitude + 'E');
	console.log('Now is ' + today.toLocaleString());
	console.log('Today in Vietnamese is "' + todayLunar + '"');
	console.log('Sunrise starts at ' + times['sunrise'].getHours() +  ':' + times['sunrise'].getMinutes());
	console.log('Sunset starts at ' + times['sunsetStart'].getHours() +  ':' + times['sunsetStart'].getMinutes());
	console.log('Night starts at ' + times['night'].getHours() +  ':' + times['night'].getMinutes());
	console.log('Tonight Moon is ' + moonPhase);
	console.log('\n');
}

function error(err) {
  console.warn('ERROR(' + err.code + '): ' + err.message);
};

function isDay() {
	var hr = (new Date()).getHours();
	if (hr >=6 && hr <= 18) {
		return true;
	}
	else {
		return false;
	}
}