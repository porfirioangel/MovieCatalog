<?php
/**
 * Created by PhpStorm.
 * User: porfirio
 * Date: 1/19/18
 * Time: 12:29 PM
 */

namespace Tests\Unit;


use Tests\TestCase;

class GenericTests
{
    private static $testCase;

    public static function setTestCase(TestCase $testCase)
    {
        GenericTests::$testCase = $testCase;
    }

    public static function testExpectedStatus($expected, $obtained)
    {
        GenericTests::$testCase->assertTrue($expected == $obtained,
            'Se esperaba el status ' . $expected . ' y se obtuvo ' .
            $obtained);
    }

    public static function testExpectedAttributes($expected, $obtained)
    {
        sort($expected);
        ksort($obtained);
        $esperados = '[' . implode(',', $expected) . ']';
        $obtenidos = '[' . implode(',', array_keys($obtained)) . ']';

        GenericTests::$testCase->assertTrue($esperados == $obtenidos,
            'Se esperaban los atributos ' . $esperados . ' y se obtuvieron' .
            $obtenidos);
    }

    public static function testEachElementAttributes($expected, $obtained)
    {
        sort($expected);
        $esperados = '[' . implode(',', $expected) . ']';

        $correctos = 0;
        $totales = count($obtained);

        foreach ($obtained as $element) {
            ksort($element);
            $obtenidos = '[' . implode(',', array_keys($element)) . ']';

            GenericTests::$testCase->assertTrue($esperados == $obtenidos,
                'Se esperaban los atributos ' . $esperados . ' y se obtuvieron' .
                $obtenidos . ' ' . $correctos . ' de ' . $totales . ' correctos');

            $correctos++;
        }
    }

    public static function testAttributeValue($expectedValue, $obtainedValue,
                                              $attributeName)
    {
        GenericTests::$testCase->assertTrue($expectedValue == $obtainedValue,
            'Se esperaba que "' . $attributeName . '" fuera ' .
            $expectedValue . ' y se obtuvo ' . $obtainedValue);
    }
}