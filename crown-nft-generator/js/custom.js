$(document).ready(function() {
  $('#submit_form').click(function(e) {
    e.preventDefault();

    $('.hidden').html('');
    // Validate entries from form
    var Username = $('#Username').val();
    var Email = $('#Email').val();
    var NFTName = $('#NFTName').val();
    var NFTID = $('#NFTID').val();
    var NFTOwneraddress = $('#NFTOwneraddress').val();
    var NFTMetadataAdminAddress = $('#NFTMetadataAdminAddress').val();
    var NFTMetadata = $('#NFTMetadata').val();
    //var shortcode=$("#hidden").val();
    var result_matc = /^[a-z1-5.()]*$/;
    var lower = NFTOwneraddress.substring(0, 3);
    var NFTOwnerlowercase = NFTOwneraddress.toLowerCase();
    var NFTMetadataAdminlower = NFTMetadataAdminAddress.toLowerCase();
    //var usernameRegex = new RegExp('/^[a-z1-5]{3,12}$/');
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var data = $('#form').serialize();
    //Error messages
    $(".error_r").remove();
    if (Username=="")
    {
      $("#Username").parent('.form-group').append("<span class='error_r'>Username Name is Required</span>");
        $(".error_r").fadeOut(10000);
      $(".hidden").show();
      return false;
    }
    if (!Username)
    {
      $("#Username").parent('.form-group').append("<span class='error_r'>Please fill username</span>");
        $(".error_r").fadeOut(10000);
         return false;
    }
    if (Email=="")
    {
      $("#Email").parent('.form-group').append("<span class='error_r'>Email Name is Required</span>");
        $(".error_r").fadeOut(10000);
        return false;
    }
     if (!regex.test(Email)) {
         $("#Email").parent('.form-group').append("<span class='error_r'>Please fill validate email</span>");
        $(".error_r").fadeOut(10000);
        return false;
      }
    if (NFTName=="")
    {
      $("#NFTName").parent('.form-group').append("<span class='error_r'>NFT Name is Required</span>");
        $(".error_r").fadeOut(10000);
        return false;
    }
    if (NFTName.length < 3 || NFTName.length > 12){
      //alert(NFTName.length);
        $("#NFTName").parent('.form-group').append("<span class='error_r'>Please Enter Correct NFT Name </span>");
        $(".error_r").fadeOut(10000);
      return false;
    }
    if (!NFTName.match(result_matc)){
        $("#NFTName").parent('.form-group').append("<span class='error_r'>Please Enter Correct NFT Name </span>");
        $(".error_r").fadeOut(10000);
      return false;
         }
    if (NFTID=="")
    {
      $("#NFTID").parent('.form-group').append("<span class='error_r'>NFT ID is Required</span>");
        $(".error_r").fadeOut(10000);
      return false;
    }
    if (NFTID.length < 3 || NFTID.length > 80){
      
        $("#NFTID").parent('.form-group').append("<span class='error_r'>Please Enter Correct NFT ID</span>");
        $(".error_r").fadeOut(10000);
      return false;
    }
    if (NFTOwneraddress=="")
    {
      $("#NFTOwneraddress").parent('.form-group').append("<span class='error_r'>NFT Owner Address is Required</span>");
        $(".error_r").fadeOut(10000);
      return false;
    }
    if (NFTOwneraddress.length<32 || NFTOwneraddress.length>70)
    {
      $("#NFTOwneraddress").parent('.form-group').append("<span class='error_r'>Please Enter Correct NFT Owner Address</span>");
        $(".error_r").fadeOut(10000);
      return false;
    }
    if (NFTMetadataAdminAddress=="")
    {
      $("#NFTMetadataAdminAddress").parent('.form-group').append("<span class='error_r'>NFT Meta Data Admin Address is Required</span>");
        $(".error_r").fadeOut(10000);
      return false;
    }
    if (NFTMetadataAdminAddress.length<32 || NFTMetadataAdminAddress.length>70)
    {
      $("#NFTMetadataAdminAddress").parent('.form-group').append("<span class='error_r'>Please Enter Correct NFT Metadata Admin Address</span>");
        $(".error_r").fadeOut(10000);
      return false;
    }
    if (NFTMetadata=="")
    {
      $("#NFTMetadata").parent('.form-group').append("<span class='error_r'>NFT Meta Data is Required</span>");
        $(".error_r").fadeOut(10000);
      return false;
    }
    else {
      $.ajax({
        type: 'POST',
        url: '/wp-content/plugins/crown-nft-generator/ajaxform.php',
        data: data,
        success: function(data) {
          //console.log(data);
          //console.log(data[0]);
          $('.hidden').html(data);
          $('.hidden').show();
        },
        error: function() {
          console.log('Issue with custom javascript');
        }
      });
    }
  });
});
