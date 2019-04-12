<?php

final class Lisphp_Runtime_Apply extends Lisphp_Runtime_BuiltinFunction
{
    protected function execute(array $arguments)
    {
        list($func, $args) = $arguments;
        if ($func instanceof Lisphp_Runtime_Function) {
            return $func->execute($args->getArrayCopy());
        }
    }
}
