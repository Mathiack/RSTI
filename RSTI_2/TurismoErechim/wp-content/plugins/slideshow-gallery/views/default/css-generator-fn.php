<?php

function sg_generate_css($styles) {
    // Define allowed HTML tags and attributes
    $allowed_html = array(
        'ul' => array('class' => array()),
        'span' => array(),
        'div' => array('id' => array(), 'class' => array(), 'style' => array()),
        'p' => array('class' => array(), 'style' => array()),
        'a' => array('href' => array(), 'style' => array(), 'class' => array()),
        'h3' => array('class' => array(), 'style' => array()),
        'img' => array('src' => array(), 'alt' => array(), 'width' => array(), 'height' => array(), 'style' => array()),
        // You can extend this array to allow any other tags and attributes necessary.
    );

    // Escape and sanitize variables
    $unique = esc_attr($styles['unique']);
    $wrapperid = wp_kses($styles['wrapperid'], $allowed_html);

    if (!empty($styles['wrapperid'])) : ?>
        ul.slideshow<?php echo esc_attr($unique); ?> { list-style:none !important; color:#fff; }
        ul.slideshow<?php echo esc_attr($unique); ?> span { display:none; }
        #<?php echo esc_attr($wrapperid); ?> { overflow:hidden; position:relative; width:<?php echo ($styles['width'] != "auto") ? esc_attr((int) $styles['width']) . 'px' : 'auto'; ?>; background:<?php echo wp_kses($styles['background'], $allowed_html); ?>; padding:0 0 0 0; border:<?php echo wp_kses($styles['border'], $allowed_html); ?>; margin:0; display:none; }
        #<?php echo esc_attr($wrapperid); ?> * { margin:0; padding:0; }
        #<?php echo esc_attr($wrapperid); ?> #fullsize<?php echo esc_attr($unique); ?> { position:relative; z-index:1; overflow:hidden; width:<?php echo ($styles['width'] != "auto") ? esc_attr((int) $styles['width']) . 'px' : 'auto'; ?>; height:<?php echo esc_attr((int) $styles['height']); ?>px; clear:both; border: none; }
        #<?php echo esc_attr($wrapperid); ?> #information<?php echo esc_attr($unique); ?> { text-align:left; font-family:Verdana, Arial, Helvetica, sans-serif !important; position:absolute; bottom:0; width:<?php echo ($styles['width'] != "auto") ? esc_attr((int) $styles['width']) . 'px' : '100%'; ?>; height:0; background:<?php echo wp_kses($styles['infobackground'], $allowed_html); ?>; color:<?php echo wp_kses($styles['infocolor'], $allowed_html); ?>; overflow:hidden; z-index:300; opacity:.7; filter:alpha(opacity=70); }
        #<?php echo esc_attr($wrapperid); ?> #information<?php echo esc_attr($unique); ?> h3 { color:<?php echo wp_kses($styles['infocolor'], $allowed_html); ?>; padding:4px 8px 3px; margin:0 !important; font-size:16px; font-weight:bold; }
        #<?php echo esc_attr($wrapperid); ?> #information<?php echo esc_attr($unique); ?> a { color:<?php echo wp_kses($styles['infocolor'], $allowed_html); ?>; }
        #<?php echo esc_attr($wrapperid); ?> #information<?php echo esc_attr($unique); ?> p { color:<?php echo wp_kses($styles['infocolor'], $allowed_html); ?>; padding:0 8px 8px; margin:0 !important; font-size: 14px; font-weight:normal; }
        #<?php echo esc_attr($wrapperid); ?> .infotop { margin-bottom:8px !important; top:0; }
        #<?php echo esc_attr($wrapperid); ?> .infobottom { margin-top:8px !important; bottom:0; }
        <?php if (empty($styles['resizeimages']) || $styles['resizeimages'] == "Y") : ?>
            #<?php echo esc_attr($wrapperid); ?> #image<?php echo esc_attr($unique); ?> { width:<?php echo ($styles['width'] != "auto") ? esc_attr((int) $styles['width']) . 'px' : 'auto'; ?>; }
            #<?php echo esc_attr($wrapperid); ?> #image<?php echo esc_attr($unique); ?> img { border:none; border-radius:0; box-shadow:none; position:absolute; height:auto; max-width:100%; margin:0 auto; display:block; }
        <?php else : ?>
            #<?php echo esc_attr($wrapperid); ?> #image<?php echo esc_attr($unique); ?> { width:<?php echo ($styles['width'] != "auto") ? esc_attr((int) $styles['width']) . 'px' : 'auto'; ?>; }
            #<?php echo esc_attr($wrapperid); ?> #image<?php echo esc_attr($unique); ?> img { border:none; border-radius:0; box-shadow:none; position:absolute; left:0%; right:0%; max-height:100%; max-width:100%; margin:0 auto; display:block; }
        <?php endif; ?>
        #<?php echo esc_attr($wrapperid); ?> .imgnav { position:absolute; width:25%; height:100%; cursor:pointer; z-index:250; }
        #<?php echo esc_attr($wrapperid); ?> #imgprev<?php echo esc_attr($unique); ?>:before { font-family:FontAwesome; content:"\f053"; font-size:30px; color:white; visibility:visible; left:0; text-align:left; width: auto; height:auto; line-height:160%; top:50%; margin:-30px 0 0 0; border-radius:0 10px 10px 0; background:black; padding:3px 10px 0 10px; position: absolute; display: inline-block; }
        #<?php echo esc_attr($wrapperid); ?> #imgprev<?php echo esc_attr($unique); ?> { display:none; -moz-user-select: none; -khtml-user-select: none; -webkit-user-select: none; -o-user-select: none; left:0; font-size:0px; }
        #<?php echo esc_attr($wrapperid); ?> #imgnext<?php echo esc_attr($unique); ?>:before { font-family:FontAwesome; content:"\f054"; font-size:30px; color:white; visibility:visible; right:0; text-align:right; width: auto; height:auto; line-height:160%; top:50%; margin:-30px 0 0 0; border-radius:10px 0 0 10px; background:black; padding:3px 10px 0 10px; position: absolute; display: inline-block; }
        #<?php echo esc_attr($wrapperid); ?> #imgnext<?php echo esc_attr($unique); ?> { display:none; -moz-user-select: none; -khtml-user-select: none; -webkit-user-select: none; -o-user-select: none; right:0; font-size:0px; }
        #<?php echo esc_attr($wrapperid); ?> #imglink<?php echo esc_attr($unique); ?> { position:absolute; zoom:1; background-color:#ffffff; height:100%; <?php if (!empty($styles['shownav']) && $styles['shownav'] == "true") : ?>width:50%; left:25%; right:20%;<?php else : ?>width:100%; left:0;<?php endif; ?> z-index:149; opacity:0; filter:alpha(opacity=0); }
        #<?php echo esc_attr($wrapperid); ?> .linkhover:before { font-family:FontAwesome; content:"\f14c"; font-size:30px; text-align:center; height:auto; line-height:160%; width:auto; top:50%; left:auto; right:auto; margin:-30px 0 0 0; padding:0px 12px; display: inline-block; position: relative; background:black; color:white; border-radius:10px; }
        #<?php echo esc_attr($wrapperid); ?> .linkhover { background:transparent !important; opacity:.4 !important; filter:alpha(opacity=40) !important; text-align:center; font-size:0px; }
        #<?php echo esc_attr($wrapperid); ?> #thumbnails<?php echo esc_attr($unique); ?> { background:<?php echo wp_kses($styles['background'], $allowed_html); ?>; }
        #<?php echo esc_attr($wrapperid); ?> .thumbstop { margin-bottom:8px !important; }
        #<?php echo esc_attr($wrapperid); ?> .thumbsbot { margin-top:8px !important; }
        #<?php echo esc_attr($wrapperid); ?> #slideleft<?php echo esc_attr($unique); ?>:before { font-family:FontAwesome; content: "\f104"; color:#999; position: absolute; height: auto; line-height:160%; width: auto; display: inline-block; top: 50%; font-size: 30px; margin: -30px 0 0 0; padding: 0 5px; }
        #<?php echo esc_attr($wrapperid); ?> #slideleft<?php echo esc_attr($unique); ?> { text-align:left; float:left; position:relative; width:20px; height:<?php echo esc_attr((int) $styles['thumbheight'] + 14); ?>px; background:#222; }
        #<?php echo esc_attr($wrapperid); ?> #slideleft<?php echo esc_attr($unique); ?>:hover { background-color:#333; }
        #<?php echo esc_attr($wrapperid); ?> #slideright<?php echo esc_attr($unique); ?>:before { font-family:FontAwesome; content: "\f105"; color:#999; position: absolute; height: auto; line-height:160%; width: auto; display: inline-block; top: 50%; font-size: 30px; margin: -30px 0 0 0; padding: 0 5px; }
        #<?php echo esc_attr($wrapperid); ?> #slideright<?php echo esc_attr($unique); ?> { text-align:left; float:right; position:relative; width:20px; height:<?php echo esc_attr((int) $styles['thumbheight'] + 14); ?>px; background:#222; }
        #<?php echo esc_attr($wrapperid); ?> #slideright<?php echo esc_attr($unique); ?>:hover { background-color:#333; }
        #<?php echo esc_attr($wrapperid); ?> #slidearea<?php echo esc_attr($unique); ?> { float:left; position:relative; background:<?php echo wp_kses($styles['background'], $allowed_html); ?>; width:<?php echo ($styles['width'] != "auto") ? esc_attr((int) $styles['width'] - 55) . 'px' : '90%'; ?>; margin:0 5px; height:<?php echo esc_attr((int) $styles['thumbheight'] + 14); ?>px; overflow:hidden; }
        #<?php echo esc_attr($wrapperid); ?> #slider<?php echo esc_attr($unique); ?> { position:absolute; width:<?php echo esc_attr($styles['sliderwidth']); ?>px !important; left:0; height:<?php echo esc_attr((int) $styles['thumbheight'] + 14); ?>px; }
        #<?php echo esc_attr($wrapperid); ?> #slider<?php echo esc_attr($unique); ?> img { width:<?php echo esc_attr($styles['thumbwidth']); ?>px; height:<?php echo esc_attr($styles['thumbheight']); ?>px; cursor:pointer; border:1px solid #666; padding:2px; float:left !important; }
        #<?php echo esc_attr($wrapperid); ?> #spinner<?php echo esc_attr($unique); ?> { position:relative; top:50%; left:45%; text-align:left; font-size:30px; }
        #<?php echo esc_attr($wrapperid); ?> #spinner<?php echo esc_attr($unique); ?> img { border:none; }
        <?php if (!empty($styles['infohideonmobile'])) : ?>
        @media (max-width:480px) { 	.slideshow-information { display: none !important; } }
        <?php endif; ?>
        <?php if (!empty($styles['thumbhideonmobile'])) : ?>
        @media (max-width:480px) { 	.slideshow-thumbnails { display: none !important; } }
        <?php endif; ?>
    <?php endif;

}

function sg_generate_css_responsive($styles) {
    // Define allowed HTML tags and attributes
    $allowed_html = array(
        'ul' => array('class' => array()),
        'span' => array(),
        'div' => array('id' => array(), 'class' => array(), 'style' => array()),
        'p' => array('class' => array(), 'style' => array()),
        'a' => array('href' => array(), 'style' => array(), 'class' => array()),
        'h3' => array('class' => array(), 'style' => array()),
        'img' => array('src' => array(), 'alt' => array(), 'width' => array(), 'height' => array(), 'style' => array()),
        // You can extend this array to allow any other tags and attributes necessary.
    );

    $resheight = esc_attr($styles['resheight'] . $styles['resheighttype']);
    $sliderheight = esc_attr($styles['thumbheight'] + 14);
    $unique = esc_attr($styles['unique']);
    $wrapperid = wp_kses($styles['wrapperid'], $allowed_html);

    if (!empty($styles['wrapperid'])) : ?>
        ul.slideshow<?php echo esc_attr($unique); ?> { list-style:none !important; color:#fff; }
        ul.slideshow<?php echo esc_attr($unique); ?> span { display:none; }
        #<?php echo esc_attr($wrapperid); ?> { overflow: hidden; position:relative; width:100%; background:<?php echo wp_kses($styles['background'], $allowed_html); ?>; padding:0 0 0 0; border:<?php echo wp_kses($styles['border'], $allowed_html); ?>; margin:0; display:none; }
        #<?php echo esc_attr($wrapperid); ?> * { margin:0; padding:0; }
        #<?php echo esc_attr($wrapperid); ?> #fullsize<?php echo esc_attr($unique); ?> { position:relative; z-index:1; overflow:hidden; width:100%; height:<?php echo $resheight; ?>; clear:both; border: none; }
        #<?php echo esc_attr($wrapperid); ?> #information<?php echo esc_attr($unique); ?> { text-align:left; font-family:Verdana, Arial, Helvetica, sans-serif !important; position:absolute; width:100%; height:0; background:<?php echo wp_kses($styles['infobackground'], $allowed_html); ?>; color:<?php echo wp_kses($styles['infocolor'], $allowed_html); ?>; overflow:hidden; z-index:300; opacity:.7; filter:alpha(opacity=70); }
        #<?php echo esc_attr($wrapperid); ?> #information<?php echo esc_attr($unique); ?> h3 { color:<?php echo wp_kses($styles['infocolor'], $allowed_html); ?>; padding:4px 8px 3px; margin:0 !important; font-size:16px; font-weight:bold; }
        #<?php echo esc_attr($wrapperid); ?> #information<?php echo esc_attr($unique); ?> a { color:<?php echo wp_kses($styles['infocolor'], $allowed_html); ?>; }
        #<?php echo esc_attr($wrapperid); ?> #information<?php echo esc_attr($unique); ?> p { color:<?php echo wp_kses($styles['infocolor'], $allowed_html); ?>; padding:0 8px 8px; margin:0 !important; font-size: 14px; font-weight:normal; }
        #<?php echo esc_attr($wrapperid); ?> .infotop { margin-bottom:8px !important; top:0!important; }
        #<?php echo esc_attr($wrapperid); ?> .infobottom { margin-top:8px !important; bottom:0!important; }
        <?php if (empty($styles['resizeimages']) || $styles['resizeimages'] == "Y") : ?>
            #<?php echo esc_attr($wrapperid); ?> #image<?php echo esc_attr($unique); ?> { width:100%; }
            #<?php echo esc_attr($wrapperid); ?> #image<?php echo esc_attr($unique); ?> img { border:none; border-radius:0; box-shadow:none; position:absolute; height:auto; width:100%; margin:0 auto; display:block; }
        <?php else : ?>
            #<?php echo esc_attr($wrapperid); ?> #image<?php echo esc_attr($unique); ?> { width:100%; }
            #<?php echo esc_attr($wrapperid); ?> #image<?php echo esc_attr($unique); ?> img { border:none; border-radius:0; box-shadow:none; position:absolute; left:0%; right:0%; max-height:100%; max-width:100%; margin:0 auto; display:block; }
        <?php endif; ?>
        #<?php echo esc_attr($wrapperid); ?> .imgnav { position:absolute; width:25%; height:100%; cursor:pointer; z-index:250; }
        #<?php echo esc_attr($wrapperid); ?> #imgprev<?php echo esc_attr($unique); ?>:before { font-family:FontAwesome; content:"\f053"; font-size:30px; color:white; visibility:visible; left:0; text-align:left; width: auto; height:auto; line-height:160%; top:50%; margin:-30px 0 0 0; border-radius:0 10px 10px 0; background:black; padding:3px 10px 0 10px; position: absolute; display: inline-block; }
        #<?php echo esc_attr($wrapperid); ?> #imgprev<?php echo esc_attr($unique); ?> { display:none; -moz-user-select: none; -khtml-user-select: none; -webkit-user-select: none; -o-user-select: none; left:0; font-size:0px; }
        #<?php echo esc_attr($wrapperid); ?> #imgnext<?php echo esc_attr($unique); ?>:before { font-family:FontAwesome; content:"\f054"; font-size:30px; color:white; visibility:visible; right:0; text-align:right; width: auto; height:auto; line-height:160%; top:50%; margin:-30px 0 0 0; border-radius:10px 0 0 10px; background:black; padding:3px 10px 0 10px; position: absolute; display: inline-block; }
        #<?php echo esc_attr($wrapperid); ?> #imgnext<?php echo esc_attr($unique); ?> { display:none; -moz-user-select: none; -khtml-user-select: none; -webkit-user-select: none; -o-user-select: none; right:0; font-size:0px; }
        #<?php echo esc_attr($wrapperid); ?> #imglink<?php echo esc_attr($unique); ?> { position:absolute; zoom:1; background-color:#ffffff; height:100%; <?php if (!empty($styles['shownav']) && $styles['shownav'] == "true") : ?>width:50%; left:25%; right:20%;<?php else : ?>width:100%; left:0;<?php endif; ?> z-index:149; opacity:0; filter:alpha(opacity=0); }
        #<?php echo esc_attr($wrapperid); ?> .linkhover:before { font-family:FontAwesome; content:"\f14c"; font-size:30px; text-align:center; height:auto; line-height:160%; width:auto; top:50%; left:auto; right:auto; margin:-30px 0 0 0; padding:0px 12px; display: inline-block; position: relative; background:black; color:white; border-radius:10px; }
        #<?php echo esc_attr($wrapperid); ?> .linkhover { background:transparent !important; opacity:.4 !important; filter:alpha(opacity=40) !important; text-align:center; font-size:0px; }
        #<?php echo esc_attr($wrapperid); ?> #thumbnails<?php echo esc_attr($unique); ?> { background:<?php echo wp_kses($styles['background'], $allowed_html); ?>; height:<?php echo $sliderheight; ?>px; width:100%; position:relative; overflow:hidden; }
        #<?php echo esc_attr($wrapperid); ?> .thumbstop { margin-bottom:8px !important; }
        #<?php echo esc_attr($wrapperid); ?> .thumbsbot { margin-top:8px !important; }
        #<?php echo esc_attr($wrapperid); ?> #slideleft<?php echo esc_attr($unique); ?>:before { font-family:FontAwesome; content: "\f104"; color:#999; position: absolute; height: auto; line-height:160%; width: auto; display: inline-block; top: 50%; font-size: 30px; margin: -30px 0 0 0; padding: 0 5px; }
        #<?php echo esc_attr($wrapperid); ?> #slideleft<?php echo esc_attr($unique); ?> { text-align:left; float:left; position:absolute; left:0; z-index:150; width:20px; height:<?php echo $sliderheight; ?>px; background:#222; }
        #<?php echo esc_attr($wrapperid); ?> #slideleft<?php echo esc_attr($unique); ?>:hover { background-color:#333; }
        #<?php echo esc_attr($wrapperid); ?> #slideright<?php echo esc_attr($unique); ?>:before { font-family:FontAwesome; content: "\f105"; color:#999; position: absolute; height: auto; line-height:160%; width: auto; display: inline-block; top: 50%; font-size: 30px; margin: -30px 0 0 0; padding: 0 5px; }
        #<?php echo esc_attr($wrapperid); ?> #slideright<?php echo esc_attr($unique); ?> { text-align:left; float:right; position:absolute; right:0; z-index:150; width:20px; height:<?php echo $sliderheight; ?>px; background:#222; }
        #<?php echo esc_attr($wrapperid); ?> #slideright<?php echo esc_attr($unique); ?>:hover { background-color:#333; }
        #<?php echo esc_attr($wrapperid); ?> #slidearea<?php echo esc_attr($unique); ?> { float:left; position:absolute; z-index:149; background:<?php echo esc_attr($styles['background']); ?>; width:100%; margin:0; height:<?php echo $sliderheight; ?>px; overflow:hidden; }
        #<?php echo esc_attr($wrapperid); ?> #slider<?php echo esc_attr($unique); ?> { position:absolute; width:<?php echo esc_attr($styles['sliderwidth']); ?>px !important; left:0; height:<?php echo $sliderheight; ?>px; padding:3px 20px 0 25px; }
        #<?php echo esc_attr($wrapperid); ?> #slider<?php echo esc_attr($unique); ?> img { width:<?php echo esc_attr($styles['thumbwidth']); ?>px; height:<?php echo esc_attr($styles['thumbheight']); ?>px; cursor:pointer; border:1px solid #666; padding:2px; float:left !important; }
        #<?php echo esc_attr($wrapperid); ?> #spinner<?php echo esc_attr($unique); ?> { position:relative; top:50%; left:45%; text-align:left; font-size:30px; }
        #<?php echo esc_attr($wrapperid); ?> #spinner<?php echo esc_attr($unique); ?> img { border:none; }
        <?php if (!empty($styles['infohideonmobile'])) : ?>
        @media (max-width:480px) { 	.slideshow-information { display: none !important; } }
        <?php endif; ?>
        <?php if (!empty($styles['thumbhideonmobile'])) : ?>
        @media (max-width:480px) { 	.slideshow-thumbnails { display: none !important; } }
        <?php endif; ?>
    <?php endif;

}
