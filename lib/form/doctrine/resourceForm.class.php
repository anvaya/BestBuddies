<?php

/**
 * resource form.
 *
 * @package    BestBuddies
 * @subpackage form
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class resourceForm extends BaseresourceForm
{
  public function configure()
  {
      $file_src_path = sfConfig::get('sf_data_dir')."/resources/";
      
      $this->widgetSchema['file_name'] = new sfWidgetFormInputFileEditable(array(
                                'label'     => 'File',
                                'file_src'  =>  $this->getObject()->getFileName(),
                                'is_image'  => false,
                                'edit_mode' => !$this->isNew(),
                                'template'  => '<div>%file%<br />%input%<br />%delete% %delete_label%</div>',
                              ));
      
      $this->validatorSchema['file_name_delete'] = new sfValidatorPass();
      $this->validatorSchema['file_name'] = new sfValidatorFile(array("path"=>$file_src_path,"required"=>false));
  }
}
