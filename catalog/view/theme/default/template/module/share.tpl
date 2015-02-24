<script src="../catalog/view/javascript/jquery/share/jquery.tabSlideOut.v1.3.js"></script>
<script type="text/javascript">
    $(function(){
        $('.slide-out-div').tabSlideOut({
            tabHandle: '.handle',                     //class of the element that will become your tab
            pathToTabImage: 'image/share.png', //path to the image for the tab //Optionally can be set using css
            imageHeight: '55px',                     //height of tab image           //Optionally can be set using css
            imageWidth: '55px',                       //width of tab image            //Optionally can be set using css
            tabLocation: 'left',                      //side of screen where tab lives, top, right, bottom, or left
            speed: 700,                               //speed of animation
            action: 'click',                          //options: 'click' or 'hover', action to trigger animation
            topPos: '400px',                          //position from the top/ use if tabLocation is left or right
            leftPos: '0px',                          //position from left/ use if tabLocation is bottom or top
            fixedPosition: true                      //options: true makes it stick(fixed position) on scroll
        });

    });
</script>

      <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username="></script>
<div class="addthis_toolbox addthis_32x32_style addthis_default_style">
    <a class="addthis_button_facebook"></a>
    <a class="addthis_button_twitter"></a>
    <a class="addthis_button_email"></a>
    <a class="addthis_button_google"></a>
    <a class="addthis_button_compact"></a>
</div>





