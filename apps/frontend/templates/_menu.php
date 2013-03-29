<?php        
          $resources = Doctrine::getTable("resource")->findAll();          
?>
        <div id="menu_bar">
          <ul id="css3menu1" class="topmenu" style="margin:0px; padding:0px;">
              <li class="topmenu"><a href="<?php echo url_for("@default") ?>" style="height:0px; line-height:0px;" class="menulink"><span>Home</span></a></li>
              <li class="topmenu"><a href="#" style="height:0px; line-height:0px;" class="menulink"><span>Resources</span></a>
               <ul>
                 <?php foreach($resources as $resource):?>
                    <li><a href="<?php echo url_for("@resources?rid=".$resource->getId()); ?>"><?php echo $resource->getTitle(); ?></a></li>
                 <?php endforeach;?>  
               </ul></li>
              
              </ul>
        </div>


