<?php

class Lisphp_ListTest extends Lisphp_TestCase
{
    public function setUp()
    {
        $this->list = new Lisphp_List(array(
            Lisphp_Symbol::get('define'),
            Lisphp_Symbol::get('pi'),
            new Lisphp_Literal(3.14)
        ));
    }

    public function testInvalidApplication()
    {
        $this->setExpectedException('Lisphp_InvalidApplicationException');
        $this->list->evaluate(new Lisphp_Scope);
    }

    public function testInvalidApplication2()
    {
        $this->setExpectedException('Lisphp_InvalidApplicationException');
        $l = Lisphp_Parser::parseForm('("trim" "  hello  ")', $_);
        $l->evaluate(new Lisphp_Scope);
    }

    public function testEvaluate()
    {
        $scope = new Lisphp_Scope;
        $scope['define'] = new Lisphp_Runtime_Define;
        $this->assertEquals(3.14, $this->list->evaluate($scope));
        $this->assertEquals(3.14, $scope['pi']);
    }

    public function testEvaluate530()
    {
        $scope = new Lisphp_Scope;
        $scope['f'] = function($a, $b) { return $a + $b; };
        $list = new Lisphp_List(array(
            Lisphp_Symbol::get('f'),
            new Lisphp_Literal(123),
            new Lisphp_Literal(456)
        ));
        $this->assertEquals(579, $list->evaluate($scope));
    }

    public function testCar()
    {
        $this->assertSame($this->list[0], $this->list->car());
    }

    public function testCdr()
    {
        $this->assertEquals(new Lisphp_List(array(Lisphp_Symbol::get('pi'),
                                                  new Lisphp_Literal(3.14))),
                            $this->list->cdr());
    }

    public function testToString()
    {
        $this->assertEquals('(define pi 3.14)', $this->list->__toString());
    }
}
