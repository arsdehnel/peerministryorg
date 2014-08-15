<?php
/*
Template Name: Cart
*/

get_header(); ?>

<div class="main" role="main">
  <article class="page">
    <header>
      <h2>Store</h2>
    </header>
    <div class="grid">
    	<div class="grid-2-12">
    		If you have any glitches or concerns email me at <script type="text/javascript">
                    //<![CDATA[
                    var l=new Array();
                    l[0]='>';l[1]='a';l[2]='/';l[3]='<';l[4]='|103';l[5]='|114';l[6]='|111';l[7]='|46';l[8]='|99';l[9]='|108';l[10]='|108';l[11]='|121';l[12]='|97';l[13]='|100';l[14]='|121';l[15]='|114';l[16]='|101';l[17]='|118';l[18]='|101';l[19]='|64';l[20]='|108';l[21]='|109';l[22]='|112';l[23]='>';l[24]='"';l[25]='|103';l[26]='|114';l[27]='|111';l[28]='|46';l[29]='|99';l[30]='|108';l[31]='|108';l[32]='|121';l[33]='|97';l[34]='|100';l[35]='|121';l[36]='|114';l[37]='|101';l[38]='|118';l[39]='|101';l[40]='|64';l[41]='|108';l[42]='|109';l[43]='|112';l[44]=':';l[45]='o';l[46]='t';l[47]='l';l[48]='i';l[49]='a';l[50]='m';l[51]='"';l[52]='=';l[53]='f';l[54]='e';l[55]='r';l[56]='h';l[57]=' ';l[58]='a';l[59]='<';
                    for (var i = l.length-1; i >= 0; i=i-1){
                    if (l[i].substring(0, 1) == '|') document.write("&#"+unescape(l[i].substring(1))+";");
                    else document.write(unescape(l[i]));}
                    //]]>
                    </script>.
    	</div>
    	<div class="grid-8-12 cart-wrapper">
    		<?php
    			if (have_posts()) : while (have_posts()) : the_post();
    				the_content('<p class="serif">Read the rest of this page &raquo;</p>');
				endwhile; endif;
			?>
    	</div>
    	<div class="grid-2-12 well cart">
    		<header>Download Instructions</header>
            <div class="well-contents">
                <p>After clicking on “Place order” the next window will provide the lines to click and download your files. You will also receive an email with the same opportunity to download files. </p>
            </div>
    	</div>
    </div>



  </article>

</div><!-- /.main -->

<?php get_footer(); ?>
