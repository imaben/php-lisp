<?php

class Lisphp_ScopeTest extends Lisphp_TestCase
{
    public function setUp()
    {
        $this->scope = new Lisphp_Scope;
        $this->scope['abc'] = 1;
        $this->scope['def'] = true;
        $this->scope[Lisphp_Symbol::get('ghi')] = null;
    }

    public function testGet()
    {
        $this->assertEquals(1, $this->scope['abc']);
        $this->assertEquals(true, $this->scope[Lisphp_Symbol::get('def')]);
        $this->assertNull($this->scope['ghi']);
        $this->assertNull($this->scope['x']);
    }

    public function testExists()
    {
        $this->assertTrue(isset($this->scope['abc']));
        $this->assertTrue(isset($this->scope['x']));
    }

    public function testUnset()
    {
        unset($this->scope['abc']);
        $this->assertNull($this->scope['abc']);
    }

    public function testSuperscope()
    {
        $scope = new Lisphp_Scope($this->scope);
        $this->assertSame($this->scope, $scope->superscope);
        $this->assertEquals(1, $scope['abc']);
        $this->assertNull($scope['x']);
        $this->scope['abc'] = 2;
        $this->assertEquals(2, $this->scope['abc']);
        $this->assertEquals(2, $scope['abc']);
        $scope['abc'] = 3;
        $this->assertEquals(3, $this->scope['abc']);
        $this->assertEquals(3, $scope['abc']);
        $scope['abc'] = null;
        $this->assertNull($scope['abc']);
        $this->assertNull($this->scope['abc']);
        $scope['def'] = false;
        unset($scope['def']);
        $this->assertNull($scope['def']);
        $this->assertNull($this->scope['def']);
    }

    public function testLet()
    {
        $scope = new Lisphp_Scope($this->scope);
        $scope->let('abc', 'overridden');
        $this->assertEquals('overridden', $scope['abc']);
    }

    public function testListSymbols()
    {
        $this->assertEquals(
            array(),
            array_diff(array('abc', 'def', 'ghi'), $this->scope->listSymbols())
        );
        $scope = new Lisphp_Scope($this->scope);
        $scope->let('jkl', 123);
        $scope->let('abc', 456);
        $this->assertEquals(
            array(),
            array_diff(array('def', 'ghi', 'jkl', 'abc'), $scope->listSymbols())
        );
    }
}
