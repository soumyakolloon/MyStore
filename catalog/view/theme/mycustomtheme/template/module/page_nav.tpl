<script src="./catalog/view/javascript/jquery/pagination/jquery.quick.pagination.min.js"></script>
<script src="./catalog/view/javascript/jquery/share/jquery.tabSlideOut.v1.3.js"></script>
<!--<link rel="stylesheet" type="text/css" href="./catalog/view/css/pagination/styles.css">-->


<script type="text/javascript">
$(document).ready(function() {
	//$("ul.pagination3").quickPagination();
	$("ul.pagination1").quickPagination({pagerLocation:"both",pageSize:"3"});
});
</script>

<style type="text/css">
#content { background-color:white; }
</style>
<title></title>
</head>

<div id="page-wrap">
	<?php //include("../header.php"); ?>



<ul class="pagination1">
	<li>1 - Item 1 of 5</li>
    <li>2 - Item 2 of 5</li>
    <li>3 - Item 3 of 5</li>
    <li>4 - Item 4 of 5</li>
    <li>5 - Item 5 of 5</li>
 </ul>

<div class="clearing"></div>


<!-- end plugin html -->
<br/>
<br/>



	<!-- footer (includes analytics) -->
	<?php //include("../footer.php"); ?>

</div> <!-- end page wrap -->

