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