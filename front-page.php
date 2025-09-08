<?php 



/**

 * 

 * 

 * 

 */



view('header/header');
$homeContent = get_field('areashome');
//print_r($homeContent);
view('blocks/slider'); 
foreach( $homeContent as $key => $value){
    if ($value['acf_fc_layout'] == 'banner') {
        include ('views/blocks/banner.php');
    }
    else if ($value['acf_fc_layout'] == 'collection') {
        include ('views/blocks/collectionsHome.php');
    }
    else if ($value['acf_fc_layout'] == 'collection_content') {
        include ('views/blocks/sliderCollection.php');
    }
    else if ($value['acf_fc_layout'] == 'blog-content') {
        include ('views/blocks/blogHome.php');
    }
    else if ($value['acf_fc_layout'] == 'page_content') {
        include ('views/blocks/sliderPage.php');
    }
    else if ($value['acf_fc_layout'] == 'image_hotsposts') {
        include ('views/blocks/productsTooltip.php');
    }
	else if ($value['acf_fc_layout'] == 'second_banner') {
	$bannerTitle = $value['banner_title'];
	$bannerSubTitle = $value['banner_sub_title'];
	$bannerCta = $value['banner_link'];
	$bannerImage = $value['banner_image'];
	$bannerImageMob = $value['banner_image_mobile'];
	$bannerBtnText = $value['banner_buttun_text'];
	?>
	<section class="bannerLink">
		<div class="container">
			<div class="bannerLink-wrapper">
				<div class="headtitle">
					<span><?= $bannerTitle ?></span>
					<h2><?= $bannerSubTitle ?></h2>
					<a href="<?= $bannerCta ?>" class="btn btn__main">
						<span><?= $bannerBtnText ?></span>
						<img src="https://www.vitratiles.com/wp-content/themes/vitra/assets/img/svg/btn-arrow-solid.svg"
							alt="">
					</a>
				</div>
				<div class="gallery__single"> 
					<a href="<?= $bannerCta ?>">
						<picture>
							<source media="(max-width: 768px)"
								srcset="<?= $bannerImageMob ?>">
							<source media="(min-width: 768px)"
								srcset="<?= $bannerImage ?>">
							<img src="<?= $bannerImage ?>"
								alt="">
						</picture>
					</a>
				</div>
			</div>
		</div>
	</section>
<?php
}
}
?>

<?php
 view('blocks/newsletter');
view('footer/footer');
?>