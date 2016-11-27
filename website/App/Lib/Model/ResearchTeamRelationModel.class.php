<?php

class ResearchTeamRelationModel extends RelationModel 
{
     //定义主表名称
    protected $tableName = 'researchteam';
    
    //定义关联关系
    protected $_link = array(
        'user' => array(
            'mapping_type' => HAS_MANY ,
            'foreign_key' => 'researchTeam_researchTeamId' ,
        ),
        'publisharticle' => array(
            'mapping_type' => HAS_MANY ,
            'foreign_key' => 'researchTeam_researchTeamId' ,
        )
    );
}
