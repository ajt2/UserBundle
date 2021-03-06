<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\UserBundle\Admin\Entity;

use Sonata\AdminBundle\Admin\Admin;

class UserAdmin extends Admin
{
    protected $maxPerPage = 25;
    
    protected $list = array(
        'username' => array('identifier' => true),
        'email',
        'enabled',
        'locked',
        'createdAt',
    );

    protected $form = array(
        'username',
        'email',
        'enabled',
        'plainPassword' => array('type' => 'string'),
        'locked',
        'expired',
        'credentialsExpired',
        'credentialsExpireAt',
        'groups'
    );

    protected $formGroups = array(
        'General' => array(
            'fields' => array('username', 'email', 'plainPassword')
        ),
        'Groups' => array(
            'fields' => array('groups')
        ),
        'Management' => array(
            'fields' => array('locked', 'expired', 'enabled', 'credentialsExpired', 'credentialsExpireAt')
        )
    );

    protected $formOptions = array(
        'validation_groups' => 'admin'
    );

    protected $filter = array(
        'username',
        'locked',
        'email',
        'id',
    );

    protected $userManager;

    public function preInsert($user)
    {
        parent::preInsert($user);

        $this->getIdParameter()->updatePassword($user);
    }

    public function setUserManager($userManager)
    {
        $this->userManager = $userManager;
    }

    public function getUserManager()
    {
        return $this->userManager;
    }
}