<?php

namespace App\Http\Controllers\Api\V1\Annotations;

/**
 * Class AlbumAnnotation.
 *
 * @description: For swagger generated documentation routes to AlbumController
 * @author Arsan <arsan.irianto@gmail.com>
 * @since 2024-03-19
 */

class AlbumAnnotation
{
    /**
     * @OA\Get(
     *     path="/albums",
     *     operationId="albums.index",
     *     tags={"albums"},
     *     summary="Album list",
     *     security={{ "token":{}, "mobilekey":{} }},
     *     @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          required=false,
     *          description="Limit value is number by default limit is 10. ex : ?limit=100",
     *          example="10",
     *          @OA\Schema(
     *              type="integer",
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="page",
     *          in="query",
     *          required=false,
     *          description="Page value is number. ex : ?page=1",
     *          example="1",
     *          @OA\Schema(
     *              type="integer",
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="direction",
     *          in="query",
     *          required=false,
     *          description="Direction value is array / string with rule if array ex : ?direction[]=id&direction[]=name. if string ex : ?direction=id",
     *          example="id",
     *          @OA\Schema(
     *              type="string",
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="order",
     *          in="query",
     *          required=false,
     *          description="Direction value is array / string with rule if array ex : ?order[]=asc&order[]=desc. if string ex : ?order=asc",
     *          example="DESC",
     *          @OA\Schema(
     *              type="string",
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="search",
     *          in="query",
     *          required=false,
     *          description="Search value is string with rule ex : ?search=news",
     *          @OA\Schema(
     *              type="string",
     *          )
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(
     *                      @OA\Property(property="userId", type="integer", example="1"),
     *                      @OA\Property(property="id", type="integer", example="1"),
     *                      @OA\Property(property="title", type="string", example="id labore ex et quam laborum"),
     *                  )
     *              ),
     *              @OA\Property(property="links", type="object",
     *                  @OA\Property(property="first", type="string", example="/api/v1/albums?page=1"),
     *                  @OA\Property(property="last", type="string", example="/api/v1/albums?page=10"),
     *                  @OA\Property(property="prev", type="string", example=null),
     *                  @OA\Property(property="next", type="string", example="/api/v1/albums?page=2"),
     *              ),
     *              @OA\Property(property="meta", type="object",
     *                  @OA\Property(property="current", type="integer", example=1),
     *                  @OA\Property(property="from", type="integer", example=1),
     *                  @OA\Property(property="last_page", type="integer", example=10),
     *                  @OA\Property(property="links", type="array",
     *                      @OA\Items(
     *                          @OA\Property(property="url", type="string", example=null),
     *                          @OA\Property(property="label", type="string", example="&laquo; Previous"),
     *                          @OA\Property(property="active", type="boolean", example="false"),
     *                      )
     *                  ),
     *                  @OA\Property(property="path", type="string", example="/api/v1/albums"),
     *                  @OA\Property(property="per_page", type="integer", example=1),
     *                  @OA\Property(property="to", type="integer", example=1),
     *                  @OA\Property(property="total", type="integer", example=10),
     *              ),
     *          )
     *     )
     * )
     */
    public function index()
    {
    }

    /**
     * @OA\Get(
     *     path="/albums/{id}",
     *     operationId="albums.show",
     *     tags={"albums"},
     *     summary="Comment By ID",
     *     security={{ "token":{}, "mobilekey":{} }},
     *     @OA\Parameter(
     *          name="id",
     *          description="Comment ID",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          )
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              @OA\Property(property="userId", type="integer", example="1"),
     *              @OA\Property(property="id", type="integer", example="1"),
     *              @OA\Property(property="title", type="string", example="id labore ex et quam laborum"),
     *          )
     *     )
     * )
     */
    public function show()
    {
    }

    /**
     * @OA\Post(
     *     path="/albums",
     *     operationId="albums.store",
     *     tags={"albums"},
     *     summary="Create New Album",
     *     security={{ "token":{}, "mobilekey":{} }},
     *     @OA\RequestBody(
     *          description="Payload for Create New Comment",
     *          required=true,
     *          @OA\JsonContent(
     *              required={"userId", "title"},
     *              @OA\Property(property="userId", type="string", format="integer", example=1),
     *              @OA\Property(property="title", type="integer", format="string", example="bar"),
     *          ),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="integer", format="integer", example=1),
     *              @OA\Property(property="userId", type="string", format="integer", example=1),
     *              @OA\Property(property="name", type="string", format="string", example="bar"),
     *              @OA\Property(property="title", type="string", format="string", example="bar"),
     *          )
     *     )
     * )
     */
    public function store()
    {
    }

    /**
     * @OA\Patch(
     *     path="/albums/{id}",
     *     operationId="albums.update",
     *     tags={"albums"},
     *     summary="Update album",
     *     security={{ "token":{}, "mobilekey":{} }},
     *     @OA\Parameter(
     *          name="id",
     *          description="Album ID",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          )
     *     ),
     *     @OA\RequestBody(
     *          description="Payload for update existing Album Title",
     *          required=true,
     *          @OA\JsonContent(
     *              required={"title"},
     *              @OA\Property(property="title", type="string", format="string", example="foo"),
     *          ),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Successfully update data"),
     *          )
     *     )
     * )
     */
    public function update()
    {
    }

    /**
     * @OA\Delete(
     *     path="/albums/{id}",
     *     operationId="albums.destroy",
     *     tags={"albums"},
     *     summary="Delete existing Album",
     *     security={{ "token":{}, "mobilekey":{} }},
     *     @OA\Parameter(
     *          name="id",
     *          description="Album ID",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          )
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Successfully delete data"),
     *          )
     *     )
     * )
     */
    public function destroy()
    {
    }
}
