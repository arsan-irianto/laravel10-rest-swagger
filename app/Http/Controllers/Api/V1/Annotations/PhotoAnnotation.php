<?php

namespace App\Http\Controllers\Api\V1\Annotations;

/**
 * Class PhotoAnnotation.
 *
 * @description: For swagger generated documentation routes to PhotoController
 * @author Arsan <arsan.irianto@gmail.com>
 * @since 2024-03-19
 */

class PhotoAnnotation
{
    /**
     * @OA\Get(
     *     path="/photos",
     *     operationId="photos.index",
     *     tags={"photos"},
     *     summary="Photo list",
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
     *                      @OA\Property(property="albumId", type="integer", example="1"),
     *                      @OA\Property(property="id", type="integer", example="1"),
     *                      @OA\Property(property="title", type="string", example="id labore ex et quam laborum"),
     *                      @OA\Property(property="url", type="string", example="https://via.placeholder.com/600/92c952"),
     *                      @OA\Property(property="thumbnailUrl", type="string", example="https://via.placeholder.com/150/92c952"),
     *                  )
     *              ),
     *              @OA\Property(property="links", type="object",
     *                  @OA\Property(property="first", type="string", example="/api/v1/photos?page=1"),
     *                  @OA\Property(property="last", type="string", example="/api/v1/photos?page=10"),
     *                  @OA\Property(property="prev", type="string", example=null),
     *                  @OA\Property(property="next", type="string", example="/api/v1/photos?page=2"),
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
     *                  @OA\Property(property="path", type="string", example="/api/v1/photos"),
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
     *     path="/photos/{id}",
     *     operationId="photos.show",
     *     tags={"photos"},
     *     summary="Photo By ID",
     *     security={{ "token":{}, "mobilekey":{} }},
     *     @OA\Parameter(
     *          name="id",
     *          description="Photo ID",
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
     *              @OA\Property(property="albumId", type="integer", example="1"),
     *              @OA\Property(property="id", type="integer", example="1"),
     *              @OA\Property(property="title", type="string", example="id labore ex et quam laborum"),
     *              @OA\Property(property="url", type="string", example="https://via.placeholder.com/600/92c952"),
     *              @OA\Property(property="thumbnailUrl", type="string", example="https://via.placeholder.com/150/92c952"),
     *          )
     *     )
     * )
     */
    public function show()
    {
    }

    /**
     * @OA\Post(
     *     path="/photos",
     *     operationId="photos.store",
     *     tags={"photos"},
     *     summary="Create New Photo",
     *     security={{ "token":{}, "mobilekey":{} }},
     *     @OA\RequestBody(
     *          description="Payload for Create New Photo",
     *          required=true,
     *          @OA\JsonContent(
     *              required={"albumId", "title", "url", "thumbnailUrl"},
     *              @OA\Property(property="albumId", type="integer", example="1"),
     *              @OA\Property(property="title", type="string", example="id labore ex et quam laborum"),
     *              @OA\Property(property="url", type="string", example="https://via.placeholder.com/600/92c952"),
     *              @OA\Property(property="thumbnailUrl", type="string", example="https://via.placeholder.com/150/92c952"),
     *          ),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              @OA\Property(property="albumId", type="integer", example="1"),
     *              @OA\Property(property="id", type="integer", example="1"),
     *              @OA\Property(property="title", type="string", example="id labore ex et quam laborum"),
     *              @OA\Property(property="url", type="string", example="https://via.placeholder.com/600/92c952"),
     *              @OA\Property(property="thumbnailUrl", type="string", example="https://via.placeholder.com/150/92c952"),
     *          )
     *     )
     * )
     */
    public function store()
    {
    }

    /**
     * @OA\Put(
     *     path="/photos/{id}",
     *     operationId="photos.update",
     *     tags={"photos"},
     *     summary="Update existing Photo",
     *     security={{ "token":{}, "mobilekey":{} }},
     *     @OA\Parameter(
     *          name="id",
     *          description="Photo ID",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          )
     *     ),
     *     @OA\RequestBody(
     *          description="Payload for update existing Photo",
     *          required=true,
     *          @OA\JsonContent(
     *              required={"albumId", "url", "thumbnailUrl"},
     *              @OA\Property(property="albumId", type="integer", example="1"),
     *              @OA\Property(property="title", type="string", example="id labore ex et quam laborum"),
     *              @OA\Property(property="url", type="string", example="https://via.placeholder.com/600/92c952"),
     *              @OA\Property(property="thumbnailUrl", type="string", example="https://via.placeholder.com/150/92c952"),
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
     * @OA\Patch(
     *     path="/photos/{id}",
     *     operationId="photos.updatePatch",
     *     tags={"photos"},
     *     summary="Update existing Photo",
     *     security={{ "token":{}, "mobilekey":{} }},
     *     @OA\Parameter(
     *          name="id",
     *          description="Photo ID",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          )
     *     ),
     *     @OA\RequestBody(
     *          description="Payload for update existing Photo",
     *          required=true,
     *          @OA\JsonContent(
     *              required={"albumId", "url", "thumbnailUrl"},
     *              @OA\Property(property="albumId", type="integer", example="1"),
     *              @OA\Property(property="title", type="string", example="id labore ex et quam laborum"),
     *              @OA\Property(property="url", type="string", example="https://via.placeholder.com/600/92c952"),
     *              @OA\Property(property="thumbnailUrl", type="string", example="https://via.placeholder.com/150/92c952"),
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
    public function updatePatch()
    {
    }

    /**
     * @OA\Delete(
     *     path="/photos/{id}",
     *     operationId="photos.destroy",
     *     tags={"photos"},
     *     summary="Delete existing Photo",
     *     security={{ "token":{}, "mobilekey":{} }},
     *     @OA\Parameter(
     *          name="id",
     *          description="Photo ID",
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
