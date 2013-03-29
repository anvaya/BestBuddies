<?php

/**
 * calendar_event module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage calendar_event
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCalendar_eventGeneratorConfiguration extends sfModelGeneratorConfiguration
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
    return '%%id%% - %%member_id%% - %%event_type_id%% - %%from_date%% - %%to_date%% - %%title%% - %%description%% - %%address%% - %%city%% - %%state%% - %%zip%% - %%contact_person%% - %%phone_number%% - %%email_address%% - %%website%% - %%status%% - %%created_at%% - %%updated_at%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Calendar event List';
  }

  public function getEditTitle()
  {
    return 'Edit Calendar event';
  }

  public function getNewTitle()
  {
    return 'New Calendar event';
  }

  public function getFilterDisplay()
  {
    return array();
  }

  public function getFormDisplay()
  {
    return array();
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
    return array(  0 => 'id',  1 => 'member_id',  2 => 'event_type_id',  3 => 'from_date',  4 => 'to_date',  5 => 'title',  6 => 'description',  7 => 'address',  8 => 'city',  9 => 'state',  10 => 'zip',  11 => 'contact_person',  12 => 'phone_number',  13 => 'email_address',  14 => 'website',  15 => 'status',  16 => 'created_at',  17 => 'updated_at',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'member_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'event_type_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'from_date' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'to_date' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'title' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'description' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'address' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'city' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'state' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'zip' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'contact_person' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'phone_number' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'email_address' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'website' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'status' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'member_id' => array(),
      'event_type_id' => array(),
      'from_date' => array(),
      'to_date' => array(),
      'title' => array(),
      'description' => array(),
      'address' => array(),
      'city' => array(),
      'state' => array(),
      'zip' => array(),
      'contact_person' => array(),
      'phone_number' => array(),
      'email_address' => array(),
      'website' => array(),
      'status' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'member_id' => array(),
      'event_type_id' => array(),
      'from_date' => array(),
      'to_date' => array(),
      'title' => array(),
      'description' => array(),
      'address' => array(),
      'city' => array(),
      'state' => array(),
      'zip' => array(),
      'contact_person' => array(),
      'phone_number' => array(),
      'email_address' => array(),
      'website' => array(),
      'status' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'member_id' => array(),
      'event_type_id' => array(),
      'from_date' => array(),
      'to_date' => array(),
      'title' => array(),
      'description' => array(),
      'address' => array(),
      'city' => array(),
      'state' => array(),
      'zip' => array(),
      'contact_person' => array(),
      'phone_number' => array(),
      'email_address' => array(),
      'website' => array(),
      'status' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'member_id' => array(),
      'event_type_id' => array(),
      'from_date' => array(),
      'to_date' => array(),
      'title' => array(),
      'description' => array(),
      'address' => array(),
      'city' => array(),
      'state' => array(),
      'zip' => array(),
      'contact_person' => array(),
      'phone_number' => array(),
      'email_address' => array(),
      'website' => array(),
      'status' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'member_id' => array(),
      'event_type_id' => array(),
      'from_date' => array(),
      'to_date' => array(),
      'title' => array(),
      'description' => array(),
      'address' => array(),
      'city' => array(),
      'state' => array(),
      'zip' => array(),
      'contact_person' => array(),
      'phone_number' => array(),
      'email_address' => array(),
      'website' => array(),
      'status' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'calendar_eventForm';
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
    return 'calendar_eventFormFilter';
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
    return array(null, null);
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
