<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class IndexController extends Controller
{

    /**
     * @OA\Get(
     *     path="/index",
     *     operationId="index",
     *     tags={"Index"},
     *     summary="Get Index Page",
     *     description="Get Index Page Description",
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     */
    public function index(Request $request)
    {
        
    }

}