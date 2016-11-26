<?php

class CreatureRelationModel extends RelationModel 
{
     //定义主表名称
    protected $tableName = 'creature';
    
    //定义关联关系
    protected $_link = array(
        'speciesproject' => array(
            'mapping_type' => HAS_MANY ,
            'foreign_key' => 'creature_creatureId'
        )
    );
}
