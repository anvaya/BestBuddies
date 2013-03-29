<?php

/**
 * blog_tag filter form base class.
 *
 * @package    BestBuddies
 * @subpackage filter
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class Baseblog_tagFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'blog_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('blog'), 'add_empty' => true)),
      'tag_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('tag'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'blog_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('blog'), 'column' => 'id')),
      'tag_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('tag'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('blog_tag_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'blog_tag';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'blog_id' => 'ForeignKey',
      'tag_id'  => 'ForeignKey',
    );
  }
}
