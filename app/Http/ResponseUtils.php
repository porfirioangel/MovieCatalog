<?php
/**
 * Created by PhpStorm.
 * User: porfirio
 * Date: 1/19/18
 * Time: 12:55 AM
 */

namespace App\Http;


class ResponseUtils
{
    public static function jsonResponse($code, $params)
    {
        $jsonResponse = response()->json($params);
        $jsonResponse->setStatusCode($code);
        return $jsonResponse;
    }
}