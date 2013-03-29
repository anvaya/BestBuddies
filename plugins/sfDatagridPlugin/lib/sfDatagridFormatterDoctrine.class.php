<?php

class sfDatagridFormatterDoctrine extends sfDatagridFormatterDefault{
	/**
	 * Get the input for the filter
	 *
	 * @param string $type The type of the filter
	 * @param string $column The column name
	 * @param string $value The value of the input
	 * @param sfDatagrid $object The datagrid object
	 * @param string $suffix The url suffix
	 * @return string The html output
	 */
	protected function getInputFilter($type, $column, $value, $object, $suffix)
	{
		
		$output = '';
		
        			
		
		$adminrelated = Doctrine::getTable($object->_get('class') )->getColumnDefinition($column);
			    
    		switch($type)
    		{
    			
    			
    			case 'FOREIGN':
                                
                                
                            
                                $relations = Doctrine::getTable($object->_get('class'))->getRelations();
                                
                                foreach($relations as $key=>$relation)
                                {
                                    /* @var $relation Doctrine_Relation_LocalKey */
                                    if($relation->getLocalColumnName()==$column)
                                    {
                                        $c=  'sfWidgetFormDoctrineChoice'; //sfDatagrid::getConfig('class_for_foreign');
                                        $class = $key;
                                        
                                        if(class_exists($class))
                                        {
                                            $wSelect= new $c(
                                            array('model' => $class,  'add_empty' =>true)); 
                                            if($object->getOrderByForFilter($column))
                                            {
                                                $wSelect->setOption( 'order_by',$object->getOrderByForFilter($column));
                                            }
                                            $output = $wSelect->render('search[' . $column . ']', $value, array('style' => 'width: 100%;'));
                                            break;
    					} 
                                    }
                                }
                            
                               /*
			         if(($adminrelated instanceof ColumnMap)&&($adminrelated->isForeignKey()))
       				 {
    					$c=sfDatagrid::getConfig('class_for_foreign');
    					if(class_exists(sfInflector::camelize($adminrelated->getRelatedTableName()))){
    						$class=sfInflector::camelize($adminrelated->getRelatedTableName());
    					}else{
    						$class=sfInflector::camelize($adminrelated->getRelatedTableName());
    						$class=strtolower($class[0]).substr($class,1);
    						
    					}
    					
    					if(class_exists($class)){
							$wSelect= new $c(
							array('model' => $class,  'add_empty' =>true)); 
							if($object->getOrderByForFilter($column)){
								$wSelect->setOption( 'order_by',$object->getOrderByForFilter($column));
							}
							$output = $wSelect->render('search[' . $column . ']', $value, array('style' => 'width: 100%;'));
    					} 
    				}*/
					break;
    			case is_array($type):
    				$choices[''] = '';
    				
    				foreach($type as $key => $values)
    				{
    					$choices[$key] = $values;
    				}
    				
    				$wSelect = new sfWidgetFormSelect(array('choices' => $choices));
    				$output = $wSelect->render('search[' . $column . ']', $value, array('style' => 'width: 100%;'));
    				break;
    				
    			case 'NOTYPE':
    				$output = '';
    				break;
    			
    			case 'BOOLEAN':
                                $yes = $this->traduct(sfDatagrid::getConfig('text_yes'));
                                $no = $this->traduct(sfDatagrid::getConfig('text_no'));
                                
    				$wSelect = new sfWidgetFormSelect(array('choices' => array('' => '', 1 => $yes, 0 => $no)));
    				$output = $wSelect->render('search[' . $column . ']', $value, array('style' => 'width: 100%;'));
    				break;
    				
    			case (strtoupper($type) == 'DATE' || strtoupper($type) == 'TIMESTAMP'):
    				if(@array_key_exists('start_' . $object->_get('datagridName'), $value) && $value['start_' . $object->_get('datagridName')] != '')
    				{
    					$value1 = format_date(strtotime($value['start_' . $object->_get('datagridName')]), 'dd.MM.yyyy');
    				}
    				else
    				{
    					$value1 = '';
    				}
    				
    				if(@array_key_exists('start_' . $object->_get('datagridName'), $value) && $value['stop_' . $object->_get('datagridName')] != '')
    				{
    					$value2 = format_date(strtotime($value['stop_' . $object->_get('datagridName')]), 'dd.MM.yyyy');
    				}
    				else
    				{
    					$value2 = '';
    				}
    				if(@array_key_exists('null_' . $object->_get('datagridName'), $value) && $value['null_' . $object->_get('datagridName')] != '')
    				{
    					
    					$value3 = array('null'=>$value['null_' . $object->_get('datagridName')][0]);
    				}
    				else
    				{
    					$value3 = null;
    				}
    				$wDateStart = new sfWidgetFormInput();
    				$wDateStop = new sfWidgetFormInput();
    				
    				$output = '<span style="padding-bottom: 5px; display: block;">';
    				$output.= $this->traduct(sfDatagrid::getConfig('text_from')) . ' ';
    				$output.= $wDateStart->render('search[' . $column . '][start_' . $object->_get('datagridName') . ']', $value1, array('onclick' => 'displayDatePicker(this.name)', 'style' => 'width: 75px;'));
    				$output.= '</span>';
    				$output.= ' ' .$this->traduct(sfDatagrid::getConfig('text_to')) . ' ';
    				$output.= $wDateStop->render('search[' . $column . '][stop_' . $object->_get('datagridName') . ']', $value2, array('type' => 'text', 'onclick' => 'displayDatePicker(this.name)', 'style' => 'width: 75px;'));
    				
    				if((($adminrelated instanceof ColumnMap)&&(!$adminrelated->isNotNull()))){
    					$chk = new sfWidgetFormSelectCheckbox(array('choices'=>array('null'=>$this->traduct(sfDatagrid::getConfig('label_null')))));
    					$output .= $chk->render('search[' . $column . '][null_'. $object->_get('datagridName') . ']',$value3,array());
    				}
    				break;
    				
    			default:
    				$wInput = new sfWidgetFormInput();
    				$url = $object->_get('moduleAction') . '?' . $this->P_PAGE . '=1' . $suffix . '&' . $this->P_SORT . '=' . $object->_get('sortBy') . '&' . $this->P_ORDER . '=' . $object->_get('sortOrder');
    				$output = $wInput->render('search[' . $column . ']', $value, array('style' => 'width: 100%;', 'onkeydown' => 'dg_keydown(\'' . $object->_get('datagridName') . '-form\', \'' . $object->_get('datagridName') . '\', \'search\', \'' . url_for($url) . '\', event,'.(sfDatagrid::getConfig('freezepanes',false)?'true':'false').')'));
    				break;
    		}
		
		return content_tag('div', $output);
	}
	
}
?>