<?php
return array(
    'di' => array(
        'instance' => array(
            'alias' => array(

            ),
            'mongo_driver_chain' => array(
                'parameters' => array(
                    'drivers' => array(
                        'user_annotation_driver' => array(
                            'class'              => 'Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver',
                            'namespace'          => 'ZfcAclDoctrineMongoODM\Document',
                            'paths'              => array('module/ZfcAclDoctrineMongoODM/src/ZfcAclDoctrineMongoODM/Document')
                        ),
                    )
                )
            ),
            'ZfcAclDoctrineMongoODM\Mapper\AclLoaderDoctrineMongo' => array(
                'parameters' => array(
                    'dm' => 'mongo_dm',
                ),
            ),
        ),
    ),
);
