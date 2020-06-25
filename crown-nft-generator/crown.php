<?php

/*plugin name: crown-nft-generator
Plugin URI: https://developer.wordpress.org/
Description: Generate A Non Fungible Tokens on the Crown blockchain using shortcode [crw_registration]
Version: 2.0
Author: Defunctec*/

// CSS calls
function plugin_css() {
    wp_enqueue_style( 'css-handle', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css' );
    wp_enqueue_style( 'css-handle', plugin_dir_url( __FILE__ ) . 'css/jquery.dataTables.css' );
    wp_enqueue_style( 'custom', plugin_dir_url( __FILE__ ) . 'css/custom.css' );
}
add_action( 'wp_enqueue_scripts', 'plugin_css' );
// JS and CSS calls
function plugin_javascript() {
    // enqueue the script
    wp_enqueue_script( 'jquery.min', plugin_dir_url( __FILE__ ) . 'js/jquery.min.js' );
    wp_enqueue_script( 'bootstrap.min', plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js' );
    wp_enqueue_script( 'popper.min', plugin_dir_url( __FILE__ ) . 'js/popper.min.js' );
    wp_enqueue_script( 'jquery.dataTables', plugin_dir_url( __FILE__ ) . 'js/jquery.dataTables.min.js' );
    wp_enqueue_script( 'custom', plugin_dir_url( __FILE__ ) . 'js/custom.js' );
}
add_action( 'wp_enqueue_scripts', 'plugin_javascript' );
// Database section
global $jal_db_version;
$jal_db_version = '1.0';
function jal_install() {
	global $wpdb;
	global $jal_db_version;
	$table_name = 'wp_crownform';
	$charset_collate = $wpdb->get_charset_collate();
	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		Username tinytext NOT NULL,
		Email varchar(512) NOT NULL,
		NFTName varchar(512) NOT NULL,
		NFTID varchar(512) NOT NULL,
		NFTOwneraddress varchar(512) NOT NULL,
		NFTMetadataAdminAddress varchar(512) NOT NULL,
		nftToken varchar(512) NOT NULL,
		NFTMetadata varchar(512) NOT NULL,
		created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, 
		PRIMARY KEY  (id)
	) $charset_collate;";
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
	add_option( 'jal_db_version', $jal_db_version );
}
register_activation_hook( __FILE__, 'jal_install' );
register_activation_hook( __FILE__, 'registration_form' );
// HTML For plugin (This is what the user sees). 
function registration_form()
{
echo'<div class="container">
<div class="row">
	<div class="col-md-12">
		<div id="contact-form" class="crown-form">
			<form id="form" action="../wp-content/plugins/crown-nft-generator/ajaxform.php" method="post" name="crown-form">
				<div class="form-group" style="display:none">
					<label for="username">Username<span style="color:red;font-size: 15px;">*</span></label>
					<input type="text" class="form-control" id="Username" value="USERNAME" name="Username" readonly required>
				</div>
				<div class="form-group" style="display:none">
					<label for="email">Email Address<span style="color:red;font-size: 15px;">*</span></label>
					<input type="email" class="form-control" name="Email" value="USEREMAIL" id="Email" readonly required">
				</div>
				<div class="form-group" style="display:none">
					<label for="nftname">NFT Protocol<span style="color:red;font-size: 15px;">*</span></label>
					<input type="text" class="form-control" name="NFTName" value="WEBSITE-OWENER-PROTOCOL" id="NFTName" readonly required>
				</div>
				<div class="form-group">
					<label for="nftid">Enter your document, image or text hash here<span style="color:red;font-size: 15px;">*</span></label>
					<input type="text" class="form-control" name="NFTID" placeholder="Your Sha-256 Hash" id="NFTID" required>
				</div>
				<div class="form-group">
					<label for="nftownaddress">Owners Address (Use the address provided if you do not own a Crown address)<span style="color:red;font-size: 15px;">*</span></label>
					<input type="text" class="form-control" name="NFTOwneraddress" value="CROWNADDRESS" placeholder="Your Crown Address"  id="NFTOwneraddress" required>
				</div>
				<div class="form-group">
					<label for="adminaddress">Admin Address (Use the address provided if you do not own a Crown address)<span style="color:red;font-size: 15px;">*</span></label>
					<input type="text" class="form-control" name="NFTMetadataAdminAddress" value="CROWNADDRESS" placeholder="MetadataAdminAddr" id="NFTMetadataAdminAddress" required>
				</div>
				<div class="form-group">
					<label for="NFTMetadata">Enter a link to your image or text file here. You can use upto 255 characters <span style="color:red;font-size: 15px;">*</span></label>
					<textarea class="form-control" name="NFTMetadata" placeholder="Link to document or enter upto 255 characters of text" id="NFTMetadata" required></textarea>
				</div>
				<div class="form-group submit_btnn">
					<input name="submitbtn" type="submit" class="btn btn-danger" value="Submit" id="submit_form"/>
					<a class="btn btn-danger" href="../wp-content/plugins/crown-nft-generator/response.php'.@$_GET['page_id'].'" id="submit_form">Get All list</a>
				</div>
			</form>
			<span class="hidden"></span>
			<img src="" id="loading-img">
			<div class="response_msg"></div>
			</div>
		</div>
	</div>
</div>
<div class="selected_from"></div>';
return @$_GET['crw_registration'];
//	echo @$_GET['crw_registration'];
}

add_action( 'register_form', 'registration_form' );
add_shortcode('crw_registration','registration_form');

?>