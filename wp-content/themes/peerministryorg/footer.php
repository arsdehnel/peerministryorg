<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
?>

    <footer>
        <nav class="navbar nav-footer">
            <div class="navbar-inner">
                <ul class="nav">
                    <li>National Director - Lyle Griner</li>
                    <li>( 612 ) 418 - 5572</li>
                    <li><script type="text/javascript">
                    //<![CDATA[
                    var l=new Array();
                    l[0]='>';l[1]='a';l[2]='/';l[3]='<';l[4]='|103';l[5]='|114';l[6]='|111';l[7]='|46';l[8]='|99';l[9]='|108';l[10]='|108';l[11]='|121';l[12]='|97';l[13]='|100';l[14]='|121';l[15]='|114';l[16]='|101';l[17]='|118';l[18]='|101';l[19]='|64';l[20]='|108';l[21]='|109';l[22]='|112';l[23]='>';l[24]='"';l[25]='|103';l[26]='|114';l[27]='|111';l[28]='|46';l[29]='|99';l[30]='|108';l[31]='|108';l[32]='|121';l[33]='|97';l[34]='|100';l[35]='|121';l[36]='|114';l[37]='|101';l[38]='|118';l[39]='|101';l[40]='|64';l[41]='|108';l[42]='|109';l[43]='|112';l[44]=':';l[45]='o';l[46]='t';l[47]='l';l[48]='i';l[49]='a';l[50]='m';l[51]='"';l[52]='=';l[53]='f';l[54]='e';l[55]='r';l[56]='h';l[57]=' ';l[58]='a';l[59]='<';
                    for (var i = l.length-1; i >= 0; i=i-1){
                    if (l[i].substring(0, 1) == '|') document.write("&#"+unescape(l[i].substring(1))+";");
                    else document.write(unescape(l[i]));}
                    //]]>
                    </script></li>
                    <li><a href="/everyday/content/newsletter" data-toggle="modal-external">E-News</a></li>
                    <li><a href="http://peerministryleadership.blogspot.com/" target="_blank">Blog</a></li>
                    <li><a href="http://www.facebook.com/pages/Bloomington-MN/Peer-Ministry/30163575347" target="_blank">Facebook</a></li>
                    <?php
                        $items = wp_get_nav_menu_items( 'footer' );
                        if( is_array( $items ) && count( $items ) ):
                            foreach( $items as $item ):
                                echo '<li><a href="'.$item->url.'"';
                                if( $cur_id == $item->object_id ):
                                    echo ' class="active"';
                                elseif( get_permalink( $cur_id ) == $item->url ):
                                    echo ' class="active"';
                                endif;
                                echo '>'.$item->title.'</a></li>';
                            endforeach;
                        endif;
                    ?>
                </ul>
            </div>
        </nav>
    </footer>
  <div class="modal-window">
    <div class="modal-close"><i class="icon-modal-close font-fontawesome"></i></div>
    <div class="modal-content"></div>
  </div>
  <div class="modal-overlay"></div>
</div> <!--! end of #container -->

  <!-- Javascript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery. fall back to local if necessary -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php echo $GLOBALS["TEMPLATE_RELATIVE_URL"] ?>js/vendor/jquery-1.8.0.min.js"><\/script>')</script>


  <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."js/plugins.js") ?>
  <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."js/vendor/spin.min.js") ?>
  <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."js/main.js") ?>

  <!-- asynchronous google analytics: mathiasbynens.be/notes/async-analytics-snippet
       change the UA-XXXXX-X to be your site's ID -->
  <!-- WordPress.com does not allow Google Analytics code to be built into themes they host.
       Add this section from HTML Boilerplate manually (html5-boilerplate/index.html), or use a Google Analytics WordPress Plugin-->

  <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
  <script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>

  <?php wp_footer(); ?>

</body>
</html>
