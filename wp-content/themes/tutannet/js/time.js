/**
*  Time js for TuTanNet
* 
*/

jQuery(document).ready(function($){

var options = {
  	enableHighAccuracy: true,
  	timeout: 5000,
  	maximumAge: 0
};

navigator.geolocation.getCurrentPosition(sunCalc, error, options);

}); // End


function sunCalc(position) {
	var today = new Date();
		times = SunCalc.getTimes(today, position.coords.latitude, position.coords.longitude);
		moon = SunCalc.getMoonIllumination(today),
		moonPhase = '';
	
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
	console.log('You are at ' + position.coords.latitude + 'N ' + position.coords.longitude + 'E');
	console.log('Now is ' + today.toLocaleString());
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