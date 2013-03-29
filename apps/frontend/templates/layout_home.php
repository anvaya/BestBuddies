<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    
      <div id="main_bg">
        <div id="footer_bg">
            <div id="page_wrapper">
                <div id="page_header">
                    <div id="logo">
                        <a href="#">
                            <?php echo image_tag("logo.png", array("alt"=>"BestBuddies","border"=>0) ); ?>                            
                        </a>
                    </div>
                    <div id="page_header_right">
                        <?php if($sf_user->isAuthenticated()):?>
                            <?php echo link_to("Log out","@sf_guard_signout") ?>
                        <?php endif;?>
                    </div>
                </div>
  
                <?php include("_menu.php"); ?>
                
                <div class="slider-wrapper theme-default">
                    <div id="slider" class="nivoSlider">
                        <img src="<?php echo public_path("images/toystory.jpg");?>" data-thumb="<?php echo public_path("images/toystory.jpg");?>" alt="" />
                        <img src="<?php echo public_path("images/up.jpg");?>" data-thumb="<?php echo public_path("images/up.jpg");?>" alt="" title="" />
                        <img src="<?php echo public_path("images/walle.jpg");?>" data-thumb="<?php echo public_path("images/walle.jpg");?>" alt="" data-transition="slideInLeft" />
                        <img src="<?php echo public_path("images/nemo.jpg");?>" data-thumb="<?php echo public_path("images/nemo.jpg");?>" alt="" title="" />
                    </div>                    
                </div>
                
                <div id="content_wrapper">                
                    <?php echo $sf_content;?>
                </div>
                
               <?php include("_footer.php");?>
                
            </div>
        </div>
      </div>
      
       <script type="text/javascript">
        $(window).load(function() {
        $('#slider').nivoSlider();
        });
      </script>
  </body>
</html>
