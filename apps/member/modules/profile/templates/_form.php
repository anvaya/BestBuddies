<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="sf_admin_form">
  <?php echo form_tag_for($form, '@member') ?>
    <?php echo $form->renderHiddenFields(false) ?>

    <?php if ($form->hasGlobalErrors()): ?>
      <?php echo $form->renderGlobalErrors() ?>
    <?php endif; ?>

    <div id="tabs">
        <ul>
          <li><a href="#tabs-1">Login Information</a></li>
          <li><a href="#tabs-2">Emergency Contact Information</a></li>
          <li><a href="#tabs-3">Address Information</a></li>
          <li><a href="#tabs-4">Parent Information</a></li>
        </ul>
        
        <div id="tabs-1">
            <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
              <?php include_partial('profile/form_fieldset', array('member' => $member, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
            <?php endforeach; ?>
        </div>
        
        <div id="tabs-2">            
            <fieldset id="sf_fieldset_none">
                <?php foreach($form['emergency_data'] as $key=>$subform ):?>                    
                    <div class="sf_admin_form_row sf_admin_text">
                        <div>
                            <?php echo $subform["answser_text"]->renderLabel();?>
                            <div class="content">
                                <?php echo $subform["answser_text"];?>
                            </div>
                        </div>
                    </div>                
                <?php endforeach;?>
            </fieldset>
        </div>
        
        <div id="tabs-3">
            <fieldset id="sf_fieldset_none">
                <?php foreach($form['address_data'] as $key=>$subform ):?>
                    <div class="sf_admin_form_row sf_admin_text">
                        <div>
                            <?php echo $subform["answser_text"]->renderLabel();?>
                            <div class="content">
                                <?php echo $subform["answser_text"];?>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </fieldset>
        </div>
        
        <div id="tabs-4">
            <fieldset id="sf_fieldset_none">
                <?php foreach($form['parent_data'] as $key=>$subform ):?>
                    <div class="sf_admin_form_row sf_admin_text">
                        <div>
                            <?php echo $subform["answser_text"]->renderLabel();?>
                            <div class="content">
                                <?php echo $subform["answser_text"];?>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </fieldset>
        </div>
        
    </div>
    <?php include_partial('profile/form_actions', array('member' => $member, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  
</form>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#tabs').tabs();
    });
</script>