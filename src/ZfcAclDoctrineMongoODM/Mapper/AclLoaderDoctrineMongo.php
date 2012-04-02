<?php
namespace ZfcAclDoctrineMongoODM\Mapper;

use ZfcAcl\Model\Mapper\AclLoad as AclLoader,
Zend\Acl\Acl as ZendAcl;

class AclLoaderDoctrineMongo implements AclLoader 
{
    protected $dm;
    
    public function loadAclByRoleId(ZendAcl $acl, $roleId)
    {
        $this->loadResources($acl);
        $this->loadRoles($acl);
        $this->loadRules($acl);
    }
    
    protected function loadResources(ZendAcl $acl)
    {
        $resources = $this->getDm()->getRepository("ZfcAclDoctrineMongoODM\Document\Resource")->findAll();
        
        foreach($resources as $resource)
        {
            $parent = ($resource->getParent()) ? $resource->getParent()->getKey() : null;
            $acl->addResource($resource->getKey(), $parent);
        }
    }
    
    protected function loadRoles(ZendAcl $acl)
    {
        $roles = $this->getDm()->getRepository("ZfcAclDoctrineMongoODM\Document\Role")->findAll();
        
        foreach($roles as $role)
        {
            $parents = $role->getParentsArray();
            $acl->addRole($role->getName(), $parents);
        }
    }
    
    protected function loadRules(ZendAcl $acl)
    {
        $rules = $this->getDm()->getRepository("ZfcAclDoctrineMongoODM\Document\Rule")->findAll();
        
        foreach($rules as $rule)
        {
            $resource = $rule->getResource();
            $priveleges = $resource->getPrivilegesArray();
            if($rule->getType == "allow")
            {
                $acl->allow($rule->getRole()->getId(), $resource, $privileges);
            } else
            {
                $acl->deny($rule->getRole()->getId(), $resource, $privileges);
            }
        }
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