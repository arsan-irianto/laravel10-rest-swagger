<?php

namespace App\Http\Controllers\Api\V1\Annotations;

/**
 * Class CommentAnnotation.
 *
 * @description: For swagger generated documentation routes to CommentController
 * @author Arsan <arsan.irianto@gmail.com>
 * @since 2024-03-19
 */

class CommentAnnotation
{
    /**
     * @OA\Get(
     *     path="/comments",
     *     operationId="comments.index",
     *     tags={"comments"},
     *     summary="Comment list",
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
     *                      @OA\Property(property="postId", type="integer", example="1"),
     *                      @OA\Property(property="id", type="integer", example="1"),
     *                      @OA\Property(property="name", type="string", example="id labore ex et quam laborum"),
     *                      @OA\Property(property="email", type="string", example="Eliseo@gardner.biz"),
     *                      @OA\Property(property="body", type="string", example="laudantium enim quasi est quidem magnam voluptate ipsam eos\ntempora quo necessitatibus\ndolor quam autem quasi\nreiciendis et nam sapiente accusantium"),
     *                  )
     *              ),
     *              @OA\Property(property="links", type="object",
     *                  @OA\Property(property="first", type="string", example="/api/v1/comments?page=1"),
     *                  @OA\Property(property="last", type="string", example="/api/v1/comments?page=10"),
     *                  @OA\Property(property="prev", type="string", example=null),
     *                  @OA\Property(property="next", type="string", example="/api/v1/comments?page=2"),
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
     *                  @OA\Property(property="path", type="string", example="/api/v1/comments"),
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
     *     path="/comments/{id}",
     *     operationId="comments.show",
     *     tags={"comments"},
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
     *              @OA\Property(property="postId", type="integer", example="1"),
     *              @OA\Property(property="id", type="integer", example="1"),
     *              @OA\Property(property="name", type="string", example="id labore ex et quam laborum"),
     *              @OA\Property(property="email", type="string", example="Eliseo@gardner.biz"),
     *              @OA\Property(property="body", type="string", example="laudantium enim quasi est quidem magnam voluptate ipsam eos\ntempora quo necessitatibus\ndolor quam autem quasi\nreiciendis et nam sapiente accusantium"),
     *          )
     *     )
     * )
     */
    public function show()
    {
    }
}
