<!--order-5 order-lg-5-->
<?php
$get_alt_text = RDS_ALT_DATA;
$alt = "";
if (is_array($get_alt_text)) {
    foreach ($get_alt_text as $value) {
        if (in_array("footer-bg.webp", $value)) {
            $alt = 'alt="' . $value[3] . '"';
        }
    }
}

$img1x = [
    get_exist_image_url('footer', 'footer-bg'),
    get_exist_image_url('footer', 'footer-bg'),
    get_exist_image_url('footer', 'm-footer-bg')
];

$img2x = [
    get_exist_image_url('footer', 'footer-bg@2x'),
    get_exist_image_url('footer', 'footer-bg@2x'),
    get_exist_image_url('footer', 'm-footer-bg@2x')
];

$img3x = [
    get_exist_image_url('footer', 'footer-bg@3x'),
    get_exist_image_url('footer', 'footer-bg@3x'),
    get_exist_image_url('footer', 'm-footer-bg@3x')
];

$img1x = implode(',', array_filter($img1x));
$img2x = implode(',', array_filter($img2x));
$img3x = implode(',', array_filter($img3x));    
?>

<?php if ($img1x || $img2x || $img3x) : ?>
<?php echo do_shortcode('[custom-bg-srcset class="footer_bg" img1x="'.$img1x.'" img2x="'.$img2x.'" img3x="'.$img3x.'" size1x="cover" size2x="cover" size3x="cover" m_position="center right" ]'); ?>
<?php endif; ?>

<?php
$get_alt_text = RDS_ALT_DATA;
// $footer_tem = json_decode(get_option("rds_template"), true);
$footer_logo_alt = "";
$footer_mobile_logo_alt = "";
$copyright_svg_alt = "";
if (is_array($get_alt_text)) {
    foreach ($get_alt_text as $value) {
        if (in_array("footer-logo.webp", $value)) {
            $footer_logo_alt = 'alt="' . $value[3] . '"';
        }

        if (in_array("m-footer-logo.webp", $value)) {
            $footer_mobile_logo_alt = 'alt="' . $value[3] . '"';
        }

        if (in_array("bc-logo.svg", $value)) {
            $copyright_svg_alt = 'alt="' . $value[3] . '"';
        }
    }
}
global $global_header_settings;

$locations_data = [];
$country_code = !empty($global_header_settings['country_code']) ? $global_header_settings['country_code'] : '';

for ($i = 1; $i <= 3; $i++) {
    $location_key = 'location_' . $i;
    $phone_key = 'phone_number_' . $i;

    $location = !empty($global_header_settings[$location_key]) ? $global_header_settings[$location_key] : '';
    $phone = !empty($global_header_settings[$phone_key]) ? $global_header_settings[$phone_key] : '';

    if ($location && $phone) {
        $locations_data[] = [
            'location' => $location,
            'phone' => $phone
        ];
    }
}
//echo'<pre>';print_R($locations_data);
?>
<footer class=" border-top-primary overflow-hidden footer_bg">

    <div class="container-fluid text-md-start footer-outer px-0">
        <div class="container pt-lg-0">
            <div class="row justify-content-center text-lg-start text-center">
                <a class=" d-inline-block" href="<?php echo get_home_url(); ?>">
                    <div class="d-footer d-lg-block d-none ">
                        <img src="<?php echo get_exist_image_url(
                    	"footer",
                    	"footer-logo"
                    ); ?>" srcset="<?php echo get_exist_image_url(
	"footer",
	"footer-logo"
); ?> 1x, <?php echo get_exist_image_url(
 	"footer",
 	"footer-logo@2x"
 ); ?> 2x, <?php echo get_exist_image_url(
 	"footer",
 	"footer-logo@3x"
 ); ?> 3x" class="d-lg-block d-none img-fluid w-auto " style="" <?php echo $footer_logo_alt; ?> width="546"
                            height="167">
                    </div>
                    <div class="m-footer d-lg-none d-block ">

                        <img src="<?php echo get_exist_image_url(
                    	"footer",
                    	"m-footer-logo"
                    ); ?>" srcset="<?php echo get_exist_image_url(
	"footer",
	"m-footer-logo"
); ?> 1x, <?php echo get_exist_image_url(
 	"footer",
 	"m-footer-logo@2x"
 ); ?> 2x, <?php echo get_exist_image_url(
 	"footer",
 	"m-footer-logo@3x"
 ); ?> 3x" class="d-lg-none d-block img-fluid w-auto footer-logo" style="" <?php echo $footer_mobile_logo_alt; ?>
                            width="247" height="106">
                    </div>
                </a>
                <div class="col-lg-3 mb-0 mb-lg-5 mb-xl-0 text-center text-xl-start px-lg-0">

                    <?php
									$country_code =  !empty( $args["site_info"]["country_code"]) ?  $args["site_info"]["country_code"] : ''; 
									$phone = !empty( $args["site_info"]["phone"]) ?  $args["site_info"]["phone"] : ''; 
									?>
                    <div class=" footer-call-icon">
                        <div class="d-block w-100">
                            <div class="d-flex justify-content-lg-start justify-content-center pb-lg-0 pb-0 rpx_gap_10">
                                <i class="true_white icon-circle-phone2  text_18 line_height_25 d-lg-block d-none"></i>
                                <div class="">
                                    <div class="mobile-phone-box d-lg-none">
                                        <i
                                            class="color_primary true_white icon-circle-phone2 rpx_mr_10 text_24 line_height_25"></i>
                                        <span class="h8 pt-lg-0 phone-text d-flex">Phone:</span>
                                    </div>
                                    <p
                                        class="d-lg-block d-none pt-1 mb-0 true_white pt-lg-0 phone-text d-flex  h8 text-start rpx_pb_lg_7">
                                        Phone:</p>
                                    <a href="tel:<?php echo esc_attr($country_code . $phone); ?>"
                                        class="footer_phone_number position-relative">
                                        <?php echo esc_html($country_code . $phone); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($args["site_info"]["license_number"][0])) : ?>
                    <div class="position-relative d-lg-block d-block footer-call-icon ">
                        <div class="license-icon d-flex rpx_gap_10 justify-content-center justify-content-lg-start">
                            <i class="true_white icon-id-card2 text_23 line_height_25 mr-10 d-inline-block"></i>
                            <p class="true_white mb-0 text-start h8
                        ">
                                License:
                            </p>
                        </div>
                        <div class="d-flex gap_10 license-number">

                            <span class="d-inline-block footer_add text_normal  text-start">
                                <?php foreach ($args["site_info"]["license_number"] as $value) {
                    echo esc_html($value) . '<br class="rpx_mb_12">';
                } ?>
                            </span>
                        </div>
                    </div>
                    <?php endif; ?>


                </div>
                <div class=" col-lg-2 pt-lg-0 pt-3 d-lg-block d-none offset-lg-1 px-0">
                    <div class="">
                        <h6 class="d-block true_white rpx_mb_25 text-capitalize h6">
                            <?php echo !empty( $args["globals"]["footer"]["data"]["footer_menu_1_heading"] ) ?  $args["globals"]["footer"]["data"]["footer_menu_1_heading"] : ''; ?>
                            <?php //echo $args["globals"]["footer"]["data"]["footer_menu_1_heading"]; ?>
                        </h6>
                        <?php
                        $name = !empty($args["globals"]["footer"]["data"]["footer_menu_1_name"]) ?  $args["globals"]["footer"]["data"]["footer_menu_1_name"] : '';
                        	//$args["globals"]["footer"]["data"]["footer_menu_1_name"];
                        $menu = get_term_by("name", $name, "nav_menu");
                        $menu_items = wp_get_nav_menu_items($menu);
                        if (isset($menu_items) && !empty($menu_items)): ?>
                        <ul class="list-unstyled text_14">
                            <?php foreach (
                                	$menu_items
                                	as $key => $value
                                ) { ?>
                            <li class="footer_links  no_hover_underline">
                                <a class="footer_links " target="<?php echo $value->target; ?>" href="<?php echo $value->url; ?>">
                                           <?php
    if (!empty($value->post_title)) {
        echo esc_html($value->post_title);
    } else {
        echo esc_html($value->title);
    }
?>
                                        </a>
                            </li>
                            <?php } ?>
                        </ul>
                        <?php endif;
                        ?>
                    </div>
                </div>
                <div class=" col-lg-3 pt-lg-0 pt-3 d-lg-block d-none">
                    <div class="ps-xl-0">
                        <h6 class="d-block true_white rpx_mb_25 h6">
                            <?php echo !empty( $args["globals"]["footer"]["data"]["footer_menu_2_heading"] ) ?  $args["globals"]["footer"]["data"]["footer_menu_2_heading"] : ''; ?>
                            <?php //echo $args["globals"]["footer"]["data"]["footer_menu_2_heading"]; ?>
                        </h6>
                        <?php
                        $name = !empty($args["globals"]["footer"]["data"]["footer_menu_2_name"]) ?  $args["globals"]["footer"]["data"]["footer_menu_2_name"] : '';
                        	//$args["globals"]["footer"]["data"]["footer_menu_2_name"];
                        $menu = get_term_by("name", $name, "nav_menu");
                        $menu_items = wp_get_nav_menu_items($menu);
                        if (isset($menu_items) && !empty($menu_items)): ?>
                        <ul class="list-unstyled text_14">
                            <?php foreach (
                                	$menu_items
                                	as $key => $value
                                ) { ?>
                            <li class="footer_links  no_hover_underline">
                                <a class="footer_links " target="<?php echo $value->target; ?>" href="<?php echo $value->url; ?>">
                                           <?php
    if (!empty($value->post_title)) {
        echo esc_html($value->post_title);
    } else {
        echo esc_html($value->title);
    }
?>
                                        </a>
                            </li>
                            <?php } ?>
                        </ul>
                        <?php endif;
                        ?>
                    </div>
                </div>
                <div class=" col-lg-3 pt-lg-0 pt-0 location-footer">
                    <div class="d-flex flex-column">
                        <div class="order-lg-1 order-1 address-box-inner">
                            <h6 class="d-block true_white  rpx_mb_25 text_22 line_height_27 sm_text_16 sm_line_height_21 text-center text-lg-start sm_text_semibold">
                                <?php // if (count($args['site_info']['address']) > 1) {
                                //     echo 'Office Locations';
                                // } else {
                                //     echo 'Office Location';
                                // }
                                echo !empty( $args["site_info"]["address_heading"] ) ?  $args["site_info"]["address_heading"] : ''; 
                                //echo $args["site_info"]["address_heading"]; ?>
                            </h6>
                            <?php
                            if (!empty($args["site_info"]["address"])) {
                            $address = $args["site_info"]["address"];
                            foreach ($address as $value) { ?>
                            <p class="footer_add true_white text-center text-lg-start "> <?php echo $value[
                                	"address"
                                ]; ?><br> <?php echo $value[
	"city"
]; ?> <?php echo $value["state"]; ?> <?php echo $value["zip"]; ?></span></p>
                            <?php }
                            }
                            ?>
                        </div>
                        <div class="order-lg-2 order-3 hours-operation">
                            <h6 class="d-block rpx_mt_25 rpx_mb_12 rpx_mb_lg_25 h6  text-center text-lg-start  sm_text_16 line_height_21 "><?php 
                            echo !empty( $args["site_info"]["hours_heading"] ) ?  $args["site_info"]["hours_heading"] : '';
                           // echo $args["site_info"]["hours_heading"]; ?></h6>
                            <div class="mw-266">
                                <div class="row">
                                    <div class=" d-flex gap-2 mb-2">
                                        <p class="footer_add text-lg-start mb-0 text-center text_15 line_height_28">
                                            <?php echo !empty( $args["site_info"]["week_days"] ) ?  $args["site_info"]["week_days"] : '';
                                            //echo $args["site_info"]["week_days"]; ?></p>
                                        <p class="footer_add text-lg-start mb-0 text-center text_15 line_height_28"><?php 
                                        echo !empty( $args["site_info"]["weekday_hours"] ) ?  $args["site_info"]["weekday_hours"] : '';
                                        //echo $args["site_info"]["weekday_hours"]; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" d-flex gap-2 mb-2 ">
                                        <p class="footer_add text-lg-start mb-0 text-center text_15 line_height_28">
                                            <?php 
                                        echo !empty( $args["site_info"]["weekend_days"] ) ?  $args["site_info"]["weekend_days"] : '';
                                       // echo $args["site_info"]["weekend_days"]; ?>
                                        </p>
                                        <p class="footer_add text-lg-start   mb-0 text-center text_15 line_height_28">
                                            <?php 
                                        echo !empty($args["site_info"]["weekend_hours"] ) ?  $args["site_info"]["weekend_hours"] : '';
                                       // echo $args["site_info"]["weekend_hours"]; ?>
                                        </p>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class=" d-flex gap-2">

                                        <p class="footer_add text-lg-start  mb-0 text-center text-capitalize text_15 line_height_28">
                                           24/7 Emergency service available
                                        </p>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="order-lg-3 order-2 footer-social-icons ">
                            <h6 class="d-block mb-2   text-center text-lg-start h8 rpx_mb_12 rpx_mb_lg_10">
                                <?php echo !empty( $args["site_info"]["heading"] ) ?  $args["site_info"]["heading"] : ''; 
                        //echo $args["site_info"]["heading"]; ?></h6>
                            <div
                                class="text-center text-lg-start d-flex justify-content-center justify-content-lg-start   ">
                                <?php
                                 if (!empty($args["site_info"]["social_media"]["items"])) {
                                $socialItems =
                                	$args["site_info"]["social_media"]["items"];
                                foreach ($socialItems as $value) {
                                	echo '<a target="_blank" class=" social_media_icons no_hover_underline    ms-0 rpx_mr_12 sm_text_20 text_20 sm_line_height_25 no_hover_underline  " title="' .
                                		$value["icon_class"] .
                                		'" href="' .
                                		$value["url"] .
                                		'">
		            <i class="' .
                                		$value["icon_class"] .
                                		'"></i>
		        </a>';
                                }
                            }
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php
    $get_rds_template_data_array = RDS_TEMPLATE_DATA;
    // check is service area is enabled
    $enable_service_areas = $get_rds_template_data_array["globals"]["footer"];

    // get service area pagelist on which we need to show
    $service_areas =
    	$get_rds_template_data_array["globals"]["footer"]["service_areas"];
    $page_ids_to_show_service_areas = [];
    foreach ($service_areas as $value) {
    	$get_pageids = $value["page_ids"];
    	$page_ids_to_show_service_areas = array_merge(
    		$page_ids_to_show_service_areas,
    		$get_pageids
    	);
    }
    if (
    	$enable_service_areas["enable"] == true &&
    	is_page($page_ids_to_show_service_areas)
    ) {
    	get_template_part("page-templates/common/servicearea");
    }
    ?>
    <div class="  footer_copyright_bar  text-center text-start color_quaternary_bg">
        <div class="container">
            <i class=" icon-copyright4   me-1"></i> <?php echo date(
            	"Y"
            ); ?> <?php
            echo !empty( $args["site_info"]["copyright_title"] ) ?  $args["site_info"]["copyright_title"] : '';
 //echo $args["site_info"]["copyright_title"];
 if (!empty($args["site_info"]["bluecorona_branding"]) 	
 ) { ?><span class="d-none d-lg-inline-block p-alt ms-2 me-1">|</span><?php }

 ?> <br class=" d-block d-lg-none"> Web Design and Internet Marketing <br class="d-sm-none d-block"> by <a
                href="<?php 
         echo !empty( $args["site_info"]["bluecorona_link"] ) ?  $args["site_info"]["bluecorona_link"] : ''
         //echo $args["site_info"]["bluecorona_link"]; ?>"
                target="_blank"> RYNO Strategic Solutions</a>
            <span class="d-lg-inline-block d-block"><span class="d-none d-lg-inline-block p-alt ms-1 me-2">|</span><a
                    class=" footer_copyright_links" href="#" data-bs-toggle="modal"
                    data-bs-target="#disclaimer">Disclaimer</a> <span
                    class="d-inline-flex gap_6 align-items-center ms-1 me-1">|</span> <a class=" footer_copyright_links"
                    href="<?php echo get_home_url() .
	( !empty( $args["site_info"]["privacy_policy_link"] ) ?  $args["site_info"]["privacy_policy_link"] : '');//$args["site_info"]["privacy_policy_link"]; ?>">Privacy
                    Policy</a>

            </span>
        </div>
    </div>
    <div class="container-fluid m-0 p-0 d-lg-none fixed-bottom btn color_primary_bg" style="position:fixed;">
        <div class="container p-0 color_primary_bg">
            <div class="row no-gutters">
                <div class="col-12 schedule_service text-center">
                    <a href="/contact/"
                        class="rpx_py_20 d-flex align-items-center justify-content-center btn no_hover_underline mh-65">
                        <i class="icon-calendar2 m text_18 line_height_18 "></i>Schedule Online </a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade p-0" id="disclaimer" tabindex="-1" data-bs-backdrop="false" role="dialog"
        aria-labelledby="disclaimerLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content rounded-0">
                <div class="modal-header border-0 text-end ms-auto pb-0">
                    <button type="button" class="close border-0 bg-transparent ms-auto" data-bs-dismiss="modal"
                        aria-label="Close" style="opacity: 1;">
                        <span aria-hidden="true"><i class="icon-xmark1 true_black line_height_24 text_24"></i></span>
                    </button>
                </div>
                <div class="modal-body px-md-5 px-4 pb-5 col-md-10 offset-md-1 text-lg-start text-center">
                    <div id="disclaimerLabel" class="h1">Disclaimer</div>
                    <p class=""><?php 
                    echo !empty( $args["site_info"]["disclaimer_text"] ) ?  $args["site_info"]["disclaimer_text"] : '';
                    //echo $args["site_info"]["disclaimer_text"]; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade p-0 mobile_cta" id="mobile-cta" tabindex="-1" role="dialog" aria-labelledby="mobilectaLabel"
        aria-hidden="true">
        <div class="modal-dialog  modal-xl m-0 border_form bg_form pt-lg-3 pb-lg-4  true_white_bg order-lg-1 order-1 h-100"
            role="document">
            <div class="modal-content rounded-0 border-0 true_white_bg">
                <div class="modal-header border-0 text-end ms-auto pb-0">
                    <button type="button" class="close border-0 bg-transparent ms-auto" data-bs-dismiss="modal"
                        aria-label="Close" style="opacity: 1;">
                        <span aria-hidden="true"><i class="icon-xmark1 line_height_24 text_24"></i></span>
                    </button>
                </div>
                <div class="modal-body px-md-5 px-4 pb-5 col-md-10 offset-md-1 text-lg-start text-center">
                    <span class="d-block pt-lg-1 text-center font_default text_normal "><?php 
                     echo !empty( $args["globals"]["request_service"]["heading"] ) ?  $args["globals"]["request_service"]["heading"] : '';
                    //echo $args["globals"]["request_service"]["heading"]; ?></span>

                    <?php echo do_shortcode(
                    	"[gravityforms id=6 ajax=true]"
                    ); ?>

                </div>
            </div>
        </div>
    </div>
 
    <!-- video modal css start here -->



</footer>