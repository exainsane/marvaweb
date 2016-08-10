<?php
     global $allowedposttags;
     $sectionNum                 = of_get_option('section_num', 4);
     $section_menu_title         = array("SECTION ONE","SECTION TWO","SECTION THREE","SECTION FOUR");
	 $section_content_color      = array("#ffffff","#595959","#ffffff","#595959","#ffffff");
	 $section_css_class          = array("","","","");
	 $section_background_size    = array("yes","no","no","yes");
	 $imagepath =  get_template_directory_uri() . '/images/';
	 $section_background = array(
	     array(
		'color' => '',
		'image' => $imagepath.'bg_01.jpg',
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'fixed' ),
		 array(
		'color' => '',
		'image' => $imagepath.'bg_02.jpg',
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'fixed' ),
		 array(
		'color' => '',
		'image' => $imagepath.'bg_03.jpg',
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'fixed' ),
		 array(
		'color' => '',
		'image' => $imagepath.'bg_04.jpg',
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'fixed' )
		 );
	 $section_image     = array(
								$imagepath.'1.png',
								$imagepath.'2.png',
							    $imagepath.'3.png',
								$imagepath.'4.png'
								);
	 
	 $section_content   = array('<p><h1 class="section-title">Impressive Design</h1><br>
<ul>
	<li>Elegans Lorem Ratio amoena</li>
	<li>fons et oculorum captans iconibus</li>
	<li> haec omnia faciant ad melioris propositi vestri website</li>
</ul>
</p>',
		'<p><h1 class="section-title">Responsive Layout</h1><br>
</p>',
			'<p><h1 class="section-title">Flexibility</h1><br>
<ul>
	<li>Lorem ipsum dolor sit amet</li>
	<li>consectetur adipiscingelit</li>
	<li>Integer sed magna vel </li>
	<li>Dapibus ege-stas turpis.</li>
</ul>
</p>',
		'<p><h1 class="section-title">Continuous  Support</h1><br>
<ul>
	<li>Lorem ipsum dolor sit amet</li>
	<li>consectetur adipiscingelit</li>
	<li>Integer sed magna vel velit</li>
	<li>Dapibus ege-stas turpis.</li>
</ul>
</p>' );
  $output                   = "";
  $sub_nav                  = "";
  
		if(  $sectionNum > 0 ) { 
		    for( $i=0; $i<$sectionNum; $i++ ){ 
			
		
	$menu_title     =  of_get_option('section_menu_title_'.$i, $section_menu_title[$i] );
	$class          =  of_get_option('section_css_class_'.$i, $section_css_class[$i]) ;
	$image  	    =  of_get_option('section_image_'.$i, $section_image[$i]) ;
	$content	    =  of_get_option('section_content_'.$i, $section_content[$i]);
	$content_color  =  of_get_option('section_content_color_'.$i, $section_content_color[$i]) ;
	$section_background_       = of_get_option( 'section_background_'.$i,$section_background[$i]);
    $background               = singlepage_get_background( $section_background_ );
    $section_background_size_  = of_get_option( 'background_size_'.$i, $section_background_size[$i] );
	$cur            = "";
	if( $i==0 )
	$cur  = "cur";
	$sub_nav       .= '<li class="'.$cur.'">'.esc_attr($menu_title).'</li>';

			if( $section_background_size_ == 'yes'){
				 $background .= '-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;background-size:100% 100%;';
				}
			if( $content_color  != "" ) $background .= 'color:'.esc_attr($content_color).';';

	
       $output .= '<section class="section '.esc_attr($class).'" style="'.$background.'">
	   <div class="container">
		<div class="section-inner">
			<div class="section-content">'.do_shortcode( wp_kses( $content , $allowedposttags ) ).'</div>
			<div class="section-image" style="background-image:url('.esc_url($image).')"></div>
		  </div>
		  <div class="clear"></div>
		</div>
        </section>';
	
			
		  }
		}
		?>
        <?php if( $sectionNum > 1 ){ ?>
	<div class="sub_nav">
		<ul><?php echo $sub_nav;?></ul>
	</div>
     <?php }?>
    <?php
	$featured_homepage_sidebar = of_get_option( 'featured_homepage_sidebar' ,'<div class="social-networks"><ul class="unstyled inline">
  <li class="facebook  display-icons"> <a rel="external" title="facebook" href="#"> <i class="fa fa-facebook fa-2x">&nbsp;</i> </a> </li>
  <li class="twitter  display-icons"> <a rel="external" title="twitter" href="#"> <i class="fa fa-twitter fa-2x">&nbsp;</i> </a> </li>
  <li class="flickr  display-icons"> <a rel="external" title="flickr" href="#"> <i class="fa fa-flickr fa-2x">&nbsp;</i> </a> </li>
  <li class="rss  display-icons"> <a rel="external" title="rss" href="#"> <i class="fa fa-rss fa-2x">&nbsp;</i> </a> </li>
  <li class="google-plus  display-icons"> <a rel="external" title="google-plus" href="#"> <i class="fa fa-google-plus fa-2x">&nbsp;</i> </a> </li>
  <li class="youtube  display-icons"> <a rel="external" title="youtube" href="#"> <i class="fa fa-youtube fa-2x">&nbsp;</i> </a> </li>
</ul></div>' );
	if( $featured_homepage_sidebar != '' ){
		echo '<div class="widget"><div class="widget_area">'.do_shortcode( wp_kses( $featured_homepage_sidebar , $allowedposttags ) ).'</div></div>';
		}
      
	 ?>
	<div class="content">
  <?php echo $output;?>
  <div class="clear"></div>
	</div>