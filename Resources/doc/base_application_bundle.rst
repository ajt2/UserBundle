AdminBundle Integration
----------------------------------------

This current fork integrates the AdminBundle Admin class.

Edit your admin.yml file and these lines :

::

    sonata_admin:
        entities:

            user:
                label:      User
                group:      FOS
                class:      FOS\UserBundle\Admin\Entity\UserAdmin
                entity:     Application\FOS\UserBundle\Entity\User
                controller: FOSUserBundle:UserAdmin

            group:
                label:      Group
                group:      FOS
                class:      FOS\UserBundle\Admin\Entity\GroupAdmin
                entity:     Application\FOS\UserBundle\Entity\Group
                controller: FOSUserBundle:GroupAdmin
