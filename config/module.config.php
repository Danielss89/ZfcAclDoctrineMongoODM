<?php
return array(
    'di' => array(
        'instance' => array(
            'alias' => array(

            ),

            'ZfcAclDoctrineMongoODM\Mapper\AclLoaderDoctrineMongo' => array(
                'parameters' => array(
                    'dm' => 'mongo_dm',
                ),
            ),
        ),
    ),
);
