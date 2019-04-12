<?php

final class Lisphp_Runtime_Define implements Lisphp_Applicable
{
    public function apply(Lisphp_Scope $scope, Lisphp_List $arguments)
    {
        $name = $arguments[0];
        if ($name instanceof Lisphp_Symbol) {
            $retval = $arguments[1]->evaluate($scope);
        } elseif ($name instanceof Lisphp_List) {
            $params = $name->cdr();
            $body = $arguments->cdr();
            $name = $name->car();
            $retval = new Lisphp_Runtime_Function($scope, $params, $body);
        } else {
            throw new InvalidArgumentException(
                'first operand of define form must be symbol or list'
            );
        }
        $scope->define($name, $retval);

        return $retval;
    }
}
