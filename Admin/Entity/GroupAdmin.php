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

use Sonata\BaseApplicationBundle\Admin\EntityAdmin as Admin;

class GroupAdmin extends Admin
{
    
    protected $class = 'Application\FOS\UserBundle\Entity\DefaultGroup';

    protected $list = array(
        'name' => array('identifier' => true),
        'roles'
    );

    protected $form = array(
        'name',
//        'roles'
    );

    // don't know yet how to get this value
    protected $baseControllerName = 'FOSUserBundle:GroupAdmin';

    public function getNewInstance()
    {
        $class = $this->getClass();

        return new $class('');
    }
}