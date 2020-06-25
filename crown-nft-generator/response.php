<?php
global $wpdb;
require_once ('../../../wp-config.php');
//include('crown.php');
$plugin_dir = ABSPATH . 'wp-content/plugins/crown-nft-generator';
$plugin_url_cr = plugin_dir_url($plugin_dir);
//echo $plugin_dir;
?>
<link rel='stylesheet'  href='<?php echo $plugin_url_cr; ?>crown-nft-generator/css/bootstrap.min.css?ver=4.9.8' type='text/css' media='all' />
<link rel='stylesheet'  href='<?php echo $plugin_url_cr; ?>crown-nft-generator/css/dataTables.bootstrap.css' type='text/css' media='all' />
<link rel='stylesheet'  href='<?php echo $plugin_url_cr; ?>crown-nft-generator/css/dataTables.responsive.css?ver=4.9.8' type='text/css' media='all' />
<link rel='stylesheet'  href='<?php echo $plugin_url_cr; ?>crown-nft-generator/css/custom.css' type='text/css' media='all' />
<style>
    body {
            font-size: 140%;
        }
        table.dataTable th,
        table.dataTable td {
            white-space: nowrap;
        }
div.container { max-width: 1200px }
</style>
<div class=" container table-responsive">
<div class="conatiner btn-entry">
	<button type="button" class="btn btn-primary"><a href="https://WEBSITEURL/">Create New Entry</a></button>
</div>
<table id="data_table" class="table table-bordered table-striped"  style="width:100%">
	<thead>
		<tr>
			<th>ID</th>
			<th>Username</th>
			<th>Email</th>
			<th>NFTName</th>
			<th>NFTID</th>
			<th>NFTOwneraddress</th>
			<th>NFTMetadataAdminAddress</th>
            <th>nftToken</th> 
			<th>NFTMetadata</th> 
            <th>Date</th>
		</tr>
	</thead>
<?php
//	print_r($_GET);
$result = $wpdb->get_results('SELECT * FROM wp_crownform ORDER BY created DESC'
);

?>
<tbody>
<?php
foreach($result as $row){   
//print_r($row);
?>

	<tr>
		<td><?php echo $row->id;?></td>
		<td><?php echo $row->Username;?></td>
		<td><?php echo $row->Email;?></td>
		<td><?php echo $row->NFTName;?></td>
		<td><?php echo $row->NFTID;?></td>
		<td><?php echo $row->NFTOwneraddress;?></td>
		<td><?php echo $row->NFTMetadataAdminAddress;?></td>
		<td><?php echo $row->nftToken;?></td>
		<td><?php echo $row->NFTMetadata;?></td>
		<td><?php echo $row->created?></td>
	</tr>

<?php

}
?>

</tbody>

</table>
</div>
<script type='text/javascript' src='<?php echo $plugin_url_cr; ?>crown-nft-generator/js/jquery.min.js?ver=4.9.8'></script>
<script type='text/javascript' src='<?php echo $plugin_url_cr; ?>crown-nft-generator/js/bootstrap.min.js?ver=4.9.8'></script>
<script type='text/javascript' src='<?php echo $plugin_url_cr; ?>crown-nft-generator/js/popper.min.js?ver=4.9.8'></script>
<script type='text/javascript' src='<?php echo $plugin_url_cr; ?>crown-nft-generator/js/jquery.dataTables.min.js?ver=4.9.8'></script>
<script type='text/javascript' src='<?php echo $plugin_url_cr; ?>crown-nft-generator/js/dataTables.responsive.js?ver=4.9.8'></script>
<script type='text/javascript' src='<?php echo $plugin_url_cr; ?>crown-nft-generator/js/dataTables.bootstrap.js?ver=4.9.8'></script>
<script>
    $(document).ready(function(){
         $('#data_table').DataTable( {
             responsive: true

                });
    })
</script>