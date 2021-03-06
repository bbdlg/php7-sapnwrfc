--TEST--
getFunction() accepts only string parameter.
--SKIPIF--
<?php include("should_run_online_tests.inc"); ?>
--FILE--
<?php
$config = include "sapnwrfc.config.inc";
$c = new \SAPNWRFC\Connection($config);

function test($c, $param) {
    try {
        $c->getFunction($param);
        echo "ok\n";
    } catch(TypeError $e) {
        echo "fail\n";
    } catch(\SAPNWRFC\FunctionCallException $e) {
        echo "fail_lookup\n";
    }
}

test($c, 'RFC_PING');
test($c, 0);
test($c, []);
test($c, new \stdClass);
--EXPECT--
ok
fail_lookup
fail
fail
