<?php

class Lisphp_FunctionalTest extends Lisphp_TestCase
{
    private $result;

    public function testFromFile()
    {
        $testFiles = glob(__DIR__ . '/Functional/*.lisphp');

        foreach ($testFiles as $file) {
            $this->result = '';

            $program = Lisphp_Program::load($file);
            $scope = Lisphp_Environment::full();
            $scope['echo'] = new Lisphp_Runtime_PHPFunction(array($this, 'displayStrings'));
            $program->execute($scope);
            $expected = file_get_contents(preg_replace('/\.lisphp$/', '.out', $file));

            $this->assertSame(trim($expected), trim($this->result));
        }
    }

    public function displayStrings()
    {
        $args = func_get_args();
        $this->result .= join('', array_map('strval', $args));
    }
}
