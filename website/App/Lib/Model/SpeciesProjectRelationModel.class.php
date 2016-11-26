<?php

class SpeciesProjectRelationModel extends RelationModel 
{
     //定义主表名称
    protected $tableName = 'speciesproject';
    
    //定义关联关系
    protected $_link = array(
//        'researchteam' => array(
//            'mapping_type' => BELONGS_TO ,
//            'foreign_key' => 'researchTeam_researchTeamId'
//        ),
//        'datatoollink' => array(
//            'mapping_type' => HAS_MANY ,
//            'foreign_key' => 'speciesProject_speciesProjectId'
//        ),
        'publisharticle' => array(
            'mapping_type' => HAS_MANY ,
            'foreign_key' => 'speciesProject_speciesProjectId'
        ),
        'speciesrelativearticle' => array(
            'mapping_type' => HAS_MANY ,
            'foreign_key' => 'speciesProject_speciesProjectId'
        )
    );
}
