<?php

class CreateTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var $object \crazyfactory\generator\Create
	 */
	private $object;
    protected function setUp()
    {
    	if(file_exists('test_name')){
			`rm -Rf test_name`;
		}
    	$this->object = new \crazyfactory\generator\Create();
    }

    protected function tearDown()
    {
    	`rm -Rf test_name`;
    }

    // tests
    public function testClassExists()
    {
    	self::assertTrue(class_exists('crazyfactory\generator\Create'));
    }
    public function testExtendsSymfonyCommand(){
		$object = $this->object;
		self::assertTrue(is_subclass_of($object, 'Symfony\Component\Console\Command\Command'));
	}
    public function testMethodsExist(){
		self::assertTrue(method_exists($this->object, 'configure'));
		self::assertTrue(method_exists($this->object, 'execute'));

		$this->object->execute(new Input(), new Output());
	}
}
