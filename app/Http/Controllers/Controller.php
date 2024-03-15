<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="{JSON} Placeholder API",
 *      @OA\License(name="MIT"),
 *      @OA\Attachable()
 * ),
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST
 * ),
 * @OA\SecurityScheme(
 *      securityScheme="token",
 *      in="header",
 *      type="http",
 *      scheme="bearer",
 *      bearerFormat="JWT",
 * )
 *  @OA\SecurityScheme(
 *      securityScheme="mobilekey",
 *      in="header",
 *      type="apiKey",
 *      name="X-API-KEY",
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
