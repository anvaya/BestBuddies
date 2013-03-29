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
   <div class="wrapper">
    <div class="content-wrapper">
   
    <div class="slim" id="blueBarHolder">
        <div id="blueBar" class=" fixed_elem slimHeader">
            <div id="headNav">
                <?php if($sf_user->isAuthenticated()):?>
                <ul id="pageNav" role="navigation">
                    <?php $guard_user = $sf_user->getGuardUser(); /* @var $guard_user sfGuardUser */?>                                        
                    <?php 
                            $allowed_song_fields = 1;
                            $allowed_client_fields =1;

                            $menu_items = array(
                                                    "Home"=>array("@default","default","index"),
                                                    "Applications"=>array("@application","application","index"),
                                                    "Members"=>array("@member","member","index"),
                                                    "Surveys"=>array("@survey","survey","index"),
                                                    "Question Bank"=>array("@question_bank","question_bank","index"),
                                                    "Events"=>array("@calendar_event","calendar_event","index"),
                                                    "Submissions"=>array("@survey_submission","survey_submission","index"),
                                                    "Users"=>array("@sf_guard_user","guard","users"),                                                    
                                                    "Groups"=>array("@sf_guard_group","guard","groups"),
                                                    "Member Types"=>array("@member_type","member_type","index"),
                                                    "Pages"=>array("@site_page","site_page","index"),
                                                    "Resources"=>array("@resource","resource","index"),
                                                    "Logout"=>array("@sf_guard_signout","sf_guard_auth","signout")    
                                                );
                    ?> 
                     <?php foreach($menu_items as $key=>$item):?>                        
                            <li class="topNavLink  middleLink">
                                <?php echo link_to($key, $item[0]); ?>
                            </li>                        
                    <?php endforeach;?>
                </ul>
            <?php endif;?>
            </div>
            <div class="app_title"><?php //echo sfConfig::get('app_title') ?></div>                       
        </div>        
    </div> 
    <?php if($sf_user->isAuthenticated()):?>    
        <br />
        <div align="right" ><strong>Welcome <?php echo $sf_user->getGuardUser()->getFirstName()." ".$sf_user->getGuardUser()->getLastName();?></strong></div>
    <?php endif;?>
        
        
    <div id="content">
        <?php echo $sf_content ?>
        <br/>        
    </div>
        
    </div> <!-- End of Content Wrapper -->
   </div>  <!-- End of Wrapper -->
   <?php include("_footer.php");?>
        
  </body>
</html>