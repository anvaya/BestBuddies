<?php

/**
 * site_page module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage site_page
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSite_pageGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getActionsDefault()
  {
    return array();
  }

  public function getFormActions()
  {
    return array(  '_delete' => NULL,  '_list' => NULL,  '_save' => NULL,  '_save_and_add' => NULL,);
  }

  public function getNewActions()
  {
    return array();
  }

  public function getEditActions()
  {
    return array();
  }

  public function getListObjectActions()
  {
    return array(  '_edit' => NULL,  '_delete' => NULL,);
  }

  public function getListActions()
  {
    return array(  '_new' => NULL,);
  }

  public function getListBatchActions()
  {
    return array(  '_delete' => NULL,);
  }

  public function getListParams()
  {
    return '%%title%% - %%slug%% - %%status_name%% - %%members_only%% - %%admin_only%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Site Pages';
  }

  public function getEditTitle()
  {
    return 'Edit Site Page "%%title%%"';
  }

  public function getNewTitle()
  {
    return 'New Site page';
  }

  public function getFilterDisplay()
  {
    return array(  0 => 'title',  1 => 'slug',  2 => 'status',  3 => 'members_only',  4 => 'admin_only',);
  }

  public function getFormDisplay()
  {
    return array(  'Page' =>   array(    0 => 'title',    1 => 'status',    2 => 'members_only',    3 => 'admin_only',    4 => 'display_order',  ),  'SEO' =>   array(    0 => 'meta_keywords',    1 => 'meta_description',  ),  'Content' =>   array(    0 => 'template',    1 => 'page_content',  ),);
  }

  public function getEditDisplay()
  {
    return array();
  }

  public function getNewDisplay()
  {
    return array();
  }

  public function getListDisplay()
  {
    return array(  0 => 'title',  1 => 'slug',  2 => 'status_name',  3 => 'members_only',  4 => 'admin_only',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'title' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Page Title',),
      'parent_page_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'page_content' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'meta_keywords' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'meta_description' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'status' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'display_order' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'template' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'members_only' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',),
      'admin_only' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',),
      'slug' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'title' => array(),
      'parent_page_id' => array(),
      'page_content' => array(),
      'meta_keywords' => array(),
      'meta_description' => array(),
      'status' => array(),
      'display_order' => array(),
      'template' => array(),
      'members_only' => array(),
      'admin_only' => array(),
      'slug' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'title' => array(),
      'parent_page_id' => array(),
      'page_content' => array(),
      'meta_keywords' => array(),
      'meta_description' => array(),
      'status' => array(),
      'display_order' => array(),
      'template' => array(),
      'members_only' => array(),
      'admin_only' => array(),
      'slug' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'title' => array(  'attributes' =>   array(    'size' => 100,  ),),
      'parent_page_id' => array(),
      'page_content' => array(),
      'meta_keywords' => array(  'attributes' =>   array(    'rows' => 2,    'cols' => 80,  ),),
      'meta_description' => array(  'attributes' =>   array(    'cols' => 80,  ),),
      'status' => array(),
      'display_order' => array(),
      'template' => array(),
      'members_only' => array(),
      'admin_only' => array(),
      'slug' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'title' => array(),
      'parent_page_id' => array(),
      'page_content' => array(),
      'meta_keywords' => array(),
      'meta_description' => array(),
      'status' => array(),
      'display_order' => array(),
      'template' => array(),
      'members_only' => array(),
      'admin_only' => array(),
      'slug' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'title' => array(),
      'parent_page_id' => array(),
      'page_content' => array(),
      'meta_keywords' => array(),
      'meta_description' => array(),
      'status' => array(),
      'display_order' => array(),
      'template' => array(),
      'members_only' => array(),
      'admin_only' => array(),
      'slug' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'site_pageForm';
  }

  public function hasFilterForm()
  {
    return true;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'site_pageFormFilter';
  }

  public function getPagerClass()
  {
    return 'sfDoctrinePager';
  }

  public function getPagerMaxPerPage()
  {
    return 20;
  }

  public function getDefaultSort()
  {
    return array('display_order', 'asc');
  }

  public function getTableMethod()
  {
    return '';
  }

  public function getTableCountMethod()
  {
    return '';
  }
}
