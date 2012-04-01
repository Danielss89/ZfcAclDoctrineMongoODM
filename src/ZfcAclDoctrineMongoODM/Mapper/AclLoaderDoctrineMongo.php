<?php
namespace ZfcAclDoctrineMongoODM\Mapper;

use ZfcAcl\Model\Mapper;

class AclLoaderDoctrineMongo implements AclLoader 
{
    private $dm;
    
    public function loadAclByRoleId(ZendAcl $acl, $roleId)
    {
        
    }
    
    public function getDm ()
    {
        return $this->dm;
    }

    public function setDm ($dm)
    {
        $this->dm = $dm;
    }
}