<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
<script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>

<div class="chatScreen">

  <div class="user_area1">
    <p><img src="<?php echo SHOW_PROFILE_PATH.$details['profile_image']; ?>"><?php echo $details['first_name']." ".$details['last_name']; ?></p>
    <div class="comment_area1">
    <p><a href="javaScript:void(0);">likeaati.com</a></p>
  </div>
  </div>

</div>



<script type="text/javascript">
    $(document).ready(function () {
        
        var isMobile = {
            Android: function () {
                return navigator.userAgent.match(/Android/i);
            },
            iPhone: function () {
                return navigator.userAgent.match(/iPhone/i)
            },
            iPad: function () {
                return navigator.userAgent.match(/iPad/i)
            },
            any: function () {
                return (isMobile.Android());
            }
        };
            
       
      var goToStore = function() {
        if (isMobile.Android()) {
                
                // window.close();
                window.location.href = "intent://whatdoyouthink.app/questions/view/<?php echo $id;?>?QueryStringParameter=#Intent;scheme=http;package=com.likeaati;S.browser_fallback_url=https%3A%2F%2Fplay.google.com%2Fstore%2Fapps%2Fdetails%3Fid%3Dcom.likeaati%26hl%3Den;end";
            } else if(isMobile.iPhone() || isMobile.iPad()) {
                
                //window.close();
                window.location.href = "itms-apps://itunes.apple.com/us/app/wdyt/id1440712301?ls=1&mt=8";
            } else {
            }
    }
     
        $('.chatScreen').on('click', function() {
            goToStore();
    });
    
    goToStore();
    
    });
</script>


