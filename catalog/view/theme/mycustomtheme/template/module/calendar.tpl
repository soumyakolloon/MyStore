
<?php
/**
* Module for calendar:  Front view
* Author Soumya Kolloon Date: Feb 20/ 2015
**/
?>
<link rel="stylesheet" type="text/css" href="./catalog/view/css/calendar/calendar.css" />
<link rel="stylesheet" type="text/css" href="./catalog/view/css/calendar/custom_2.css" />


<script type="text/javascript" src="./catalog/view/javascript/jquery/calendar/jquery.calendario.js"></script>
<script type="text/javascript" src="./catalog/view/javascript/jquery/calendar/data.js"></script>

<div id="templatemo_container" style="width:700px;">

<div class="custom-calendar-wrap custom-calendar-full">
<div class="custom-header clearfix">

<h3 class="custom-month-year">
<span id="custom-month" class="custom-month"></span>
<span id="custom-year" class="custom-year"></span>
<nav>
<span id="custom-prev" class="custom-prev"></span>
<span id="custom-next" class="custom-next"></span>
<span id="custom-current" class="custom-current" title="Got to current date"></span>
</nav>
</h3>
</div>
<div id="calendar" class="fc-calendar-container"></div>
</div>
</div>

<script type="text/javascript">	
$(function() {

var cal = $( '#calendar' ).calendario( {
onDayClick : function( $el, $contentEl, dateProperties ) {

for( var key in dateProperties ) {
console.log( key + ' = ' + dateProperties[ key ] );
}

},
caldata : codropsEvents
} ),
$month = $( '#custom-month' ).html( cal.getMonthName() ),
$year = $( '#custom-year' ).html( cal.getYear() );

$( '#custom-next' ).on( 'click', function() {
cal.gotoNextMonth( updateMonthYear );
} );
$( '#custom-prev' ).on( 'click', function() {
cal.gotoPreviousMonth( updateMonthYear );
} );
$( '#custom-current' ).on( 'click', function() {
cal.gotoNow( updateMonthYear );
} );

function updateMonthYear() {				
$month.html( cal.getMonthName() );
$year.html( cal.getYear() );
}


});
</script>
