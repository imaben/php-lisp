<?php

class Lisphp_QuoteTest extends Lisphp_TestCase
{
    public function testEvaluate()
    {
        $quote = new Lisphp_Quote(Lisphp_Symbol::get('abc'));
        $this->assertEquals(Lisphp_Symbol::get('abc'),
                            $quote->evaluate(new Lisphp_Scope));
    }

    public function testToString()
    {
        $quote = new Lisphp_Quote(Lisphp_Symbol::get('abc'));
        $this->assertEquals(':abc', $quote->__toString());
        $quote = new Lisphp_Quote(new Lisphp_List(array(
            Lisphp_Symbol::get('define'),
            Lisphp_Symbol::get('pi'),
            new Lisphp_Literal(3.14)
        )));
        $this->assertEquals(':(define pi 3.14)', $quote->__toString());
    }
}
