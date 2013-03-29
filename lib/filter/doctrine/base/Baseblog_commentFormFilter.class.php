<?php

/**
 * blog_comment filter form base class.
 *
 * @package    BestBuddies
 * @subpackage filter
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class Baseblog_commentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'blog_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('blog'), 'add_empty' => true)),
      'author_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('member'), 'add_empty' => true)),
      'comment_text'      => new sfWidgetFormFilterInput(),
      'approved'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'parent_comment_id' => new sfWidgetFormFilterInput(),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'blog_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('blog'), 'column' => 'id')),
      'author_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('member'), 'column' => 'id')),
      'comment_text'      => new sfValidatorPass(array('required' => false)),
      'approved'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'parent_comment_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('blog_comment_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'blog_comment';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'blog_id'           => 'ForeignKey',
      'author_id'         => 'ForeignKey',
      'comment_text'      => 'Text',
      'approved'          => 'Number',
      'parent_comment_id' => 'Number',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
    );
  }
}
