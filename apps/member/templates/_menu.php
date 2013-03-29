<?php        
          $resources = Doctrine::getTable("resource")->findAll();
          
?><?php if($sf_user->isAuthenticated()):?>        
        <div id="menu_bar">
          <ul id="css3menu1" class="topmenu" style="margin:0px; padding:0px;">
              <li class="topmenu"><a href="<?php echo url_for("@default") ?>" style="height:0px; line-height:0px;" class="menulink"><span>Home</span></a></li>
              <li class="topmenu"><a href="#" style="height:0px; line-height:0px;" class="menulink"><span>Resources</span></a>
               <ul>
                 <?php foreach($resources as $resource):?>
                    <li><a href="<?php echo url_for("@resources?rid=".$resource->getId()); ?>"><?php echo $resource->getTitle(); ?></a></li>
                 <?php endforeach;?>  
               </ul></li>
              <li class="topmenu"><a href="<?php echo url_for("@member"); ?>" style="height:0px; line-height:0px;" class="menulink"><span>Profile</span></a></li>
              <li class="topmenu"><a href="<?php echo url_for("calendar_event/calendar") ?>" style="height:0px; line-height:0px;" class="menulink"><span>Event Calendar</span></a></li>
              <li class="topmenu"><a href="#" style="height:0px; line-height:0px;" class="menulink"><span>Content Management</span></a></li>
              <li class="topmenu"><a href="#" style="height:0px; line-height:0px;" class="menulink"><span>Reports</span></a></li>                      
              <li class="topmenu"><a href="<?php echo url_for("@blog"); ?>" style="height:0px; line-height:0px;" class="menulink"><span>Blog</span></a></li>                     
              </ul>
        </div>
<?php endif; ?>

