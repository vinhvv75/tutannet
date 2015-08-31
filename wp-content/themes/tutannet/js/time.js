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
		moonPhase = '',
		moon_phase = Math.round(moon['phase'] * 10) / 10
		;
		
		
	
	if (moon_phase == 0) {
		moonPhase = 'New Moon'; 
	}
	else if (moon_phase > 0 && moon_phase < 0.25)  {
		moonPhase = 'Waxing Crescent';
	}
	else if (moon_phase == 0.25)  {
		moonPhase = 'First Quarter';
	}
	else if (moon_phase > 0.25 && moon_phase < 0.5)  {
		moonPhase = 'Waxing Gibbous';
	}
	else if (moon_phase == 0.5 || moon_phase == 1)  {
		moonPhase = 'Full Moon';
	}
	else if (moon_phase > 0.5 && moon_phase < 0.75)  {
		moonPhase = 'Waning Gibbous';
	}
	else if (moon_phase == 0.75)  {
		moonPhase = 'Last Quarter';
	}
	else if (moon_phase > 0.75 && moon_phase < 1)  {
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

	var lunarDate = getLunarDate(today.getDate(),(parseInt(today.getMonth())+1),today.getFullYear());
	
	var lunar = jQuery('#site-time-lunar');
	lunar.append(
		'<span>'+ lunarDate.day + ' / ' + lunarDate.month +'</span>'
	);
	
	var site_moon = document.getElementById('site-time-moon');
	
	drawPlanetPhase(site_moon, moon['fraction'], true, {diameter:30, earthshine:0.1, blur:0, lightColour: '#FFCF00', shadowColour: '#191970'})
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