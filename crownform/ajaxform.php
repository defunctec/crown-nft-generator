<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php';
global $wpdb;

//echo $wpdb->prefix ;

if(isset($_POST['Username']) && isset($_POST['Email']) && isset($_POST['NFTName']) && isset($_POST['NFTID']) && isset($_POST['NFTOwneraddress']) && isset($_POST['NFTMetadataAdminAddress']) && isset($_POST['NFTMetadata'])){

    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $nftname = $_POST['NFTName'];
    $nftid = $_POST['NFTID'];
    $nftownaddress = $_POST['NFTOwneraddress'];
    $adminaddress = $_POST['NFTMetadataAdminAddress'];
    $NFTMetadata = $_POST['NFTMetadata'];
//$shortcode=$_POST['hidden'];
//echo "<div class='shortcode' style:'display:none'>$shortcode;</div>";

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,"https:WEBSITEURL/crown_de/crown.php");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$_POST);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    $nft_Token = '0';
    $result_arr =   json_decode($server_output,true);
    //


    if($result_arr['result']!='' && $result_arr['result']!='null'){

        $nft_Token  =  $result_arr['result'];
        $table_name = 'wp_crownform';
        $insert=$wpdb->insert(
            $table_name,
            array(
                'Username' => $username,
                'Email' => $email,
                'NFTName' => $nftname,
                'NFTID'=> $nftid,
                'NFTOwneraddress'=> $nftownaddress,
                'NFTMetadataAdminAddress'=> $adminaddress,
                'nftToken' => $nft_Token,
                'NFTMetadata'=> $NFTMetadata));

        echo $nft_Token." Nft Token has generated successfully";
        die;


    }else{
        /* $table_name = $wpdb->prefix . 'crownform';
         $insert=$wpdb->insert(
         $table_name,
         array(
             'Username' => $username,
             'Email' => $email,
             'NFTName' => $nftname,
             'NFTID'=>$nftid,
             'NFTOwneraddress'=>$nftownaddress,
             'NFTMetadataAdminAddress'=>$adminaddress,
             'nftToken' => $nft_Token,
             'NFTMetadata'=>$NFTMetadata));*/

        if($result_arr['error']['message'] =='18: spec-tx-dup'){
            echo "Token has already generated for the same entry";

        }

        elseif(isset($result_arr['error']['message'])){
            echo $result_arr['error']['message'];
        }
        
        else {
            echo " Null return : Check CURLOPT_URL is correct";
        }


    }




    curl_close ($ch);

    ?>

    <?php
}

else {
    echo "An error occured !!.";
    exit;
}
?>