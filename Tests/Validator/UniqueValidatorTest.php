<?php

namespace Bundle\FOS\UserBundle\Validator;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

class UniqueValidatorTest extends \PHPUnit_Framework_TestCase
{
    public function testEntityIsValid()
    {
        $fooA = new \stdClass();

        $constraint = $this->getMockBuilder('Bundle\FOS\UserBundle\Validator\Unique')->disableOriginalConstructor()->getMock();

        $userManager = $this->getMockBuilder('Bundle\FOS\UserBundle\Entity\UserManager')->disableOriginalConstructor()->getMock();
        $userManager->expects($this->once())
            ->method('validateUnique')
            ->with($fooA, $constraint)
            ->will($this->returnValue(true))
        ;

        $validator = new UniqueValidator($userManager);

        $this->assertTrue($validator->isValid($fooA, $constraint));
    }

    public function testEntityIsNotValid()
    {
        $fooA = new \stdClass();

        $constraint = $this->getMockBuilder('Bundle\FOS\UserBundle\Validator\Unique')->disableOriginalConstructor()->getMock();
        $constraint->message = 'Foo!';
        $constraint->property = 'Bar!';

        $userManager = $this->getMockBuilder('Bundle\FOS\UserBundle\Entity\UserManager')->disableOriginalConstructor()->getMock();
        $userManager->expects($this->once())
            ->method('validateUnique')
            ->with($fooA, $constraint)
            ->will($this->returnValue(false))
        ;

        $validator = new UniqueValidator($userManager);

        $this->assertFalse($validator->isValid($fooA, $constraint));
        $this->assertEquals($constraint->message, $validator->getMessageTemplate());
        $this->assertEquals(array('property' => $constraint->property), $validator->getMessageParameters());
    }

    public function testDocumentIsValid()
    {
        $this->markTestIncomplete('TODO implement');
    }

    public function testDocumentIsNotValid()
    {
        $this->markTestIncomplete('TODO implement');
    }
}
