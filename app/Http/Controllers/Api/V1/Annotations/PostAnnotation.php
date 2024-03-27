<?php

namespace App\Http\Controllers\Api\V1\Annotations;

/**
 * Class PostAnnotation.
 *
 * @description: For swagger generated documentation routes to PostController
 * @author Arsan <arsan.irianto@gmail.com>
 * @since 2024-03-15
 */

class PostAnnotation
{
    /**
     * @OA\Get(
     *     path="/posts",
     *     operationId="posts.index",
     *     tags={"posts"},
     *     summary="Post list",
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
     *                      @OA\Property(property="id", type="integer", example="1"),
     *                      @OA\Property(property="userId", type="integer", example="1"),
     *                      @OA\Property(property="title", type="string", example="sunt aut facere repellat provident occaecati excepturi optio reprehenderit"),
     *                      @OA\Property(property="body", type="string", example="quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto"),
     *                  )
     *              ),
     *              @OA\Property(property="links", type="object",
     *                  @OA\Property(property="first", type="string", example="/api/v1/posts?page=1"),
     *                  @OA\Property(property="last", type="string", example="/api/v1/posts?page=10"),
     *                  @OA\Property(property="prev", type="string", example=null),
     *                  @OA\Property(property="next", type="string", example="/api/v1/posts?page=2"),
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
     *                  @OA\Property(property="path", type="string", example="/api/v1/posts"),
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
     *     path="/posts/{id}",
     *     operationId="posts.show",
     *     tags={"posts"},
     *     summary="Post By ID",
     *     security={{ "token":{}, "mobilekey":{} }},
     *     @OA\Parameter(
     *          name="id",
     *          description="Post ID",
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
     *              @OA\Property(property="id", type="integer", example="1"),
     *              @OA\Property(property="userId", type="integer", example="1"),
     *              @OA\Property(property="title", type="string", example="sunt aut facere repellat provident occaecati excepturi optio reprehenderit"),
     *              @OA\Property(property="body", type="string", example="quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto"),
     *          )
     *     )
     * )
     */
    public function show()
    {
    }

    /**
     * @OA\Post(
     *     path="/posts",
     *     operationId="posts.store",
     *     tags={"posts"},
     *     summary="Create New Post",
     *     security={{ "token":{}, "mobilekey":{} }},
     *     @OA\RequestBody(
     *          description="Payload for Create New Post",
     *          required=true,
     *          @OA\JsonContent(
     *              required={"title", "body", "userId"},
     *              @OA\Property(property="title", type="string", format="string", example="foo"),
     *              @OA\Property(property="body", type="string", format="string", example="bar"),
     *              @OA\Property(property="userId", type="integer", format="integer", example=1),
     *          ),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="integer", format="integer", example=1),
     *              @OA\Property(property="title", type="string", format="string", example="foo"),
     *              @OA\Property(property="body", type="string", format="string", example="bar"),
     *              @OA\Property(property="userId", type="integer", format="integer", example=1),
     *          )
     *     )
     * )
     */
    public function store()
    {
    }

    /**
     * @OA\Put(
     *     path="/posts/{id}",
     *     operationId="posts.update",
     *     tags={"posts"},
     *     summary="Update existing Post",
     *     security={{ "token":{}, "mobilekey":{} }},
     *     @OA\Parameter(
     *          name="id",
     *          description="Post ID",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          )
     *     ),
     *     @OA\RequestBody(
     *          description="Payload for update existing Post",
     *          required=true,
     *          @OA\JsonContent(
     *              required={"title", "body", "userId"},
     *              @OA\Property(property="title", type="string", format="string", example="foo"),
     *              @OA\Property(property="body", type="string", format="string", example="bar"),
     *              @OA\Property(property="userId", type="integer", format="integer", example=1),
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
     *     path="/posts/{id}",
     *     operationId="posts.updatePatch",
     *     tags={"posts"},
     *     summary="Update existing Post",
     *     security={{ "token":{}, "mobilekey":{} }},
     *     @OA\Parameter(
     *          name="id",
     *          description="Post ID",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          )
     *     ),
     *     @OA\RequestBody(
     *          description="Payload for update existing Post",
     *          required=true,
     *          @OA\JsonContent(
     *              required={"title", "body", "userId"},
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
    public function updatePatch()
    {
    }

    /**
     * @OA\Delete(
     *     path="/posts/{id}",
     *     operationId="posts.destroy",
     *     tags={"posts"},
     *     summary="Delete existing Post",
     *     security={{ "token":{}, "mobilekey":{} }},
     *     @OA\Parameter(
     *          name="id",
     *          description="Post ID",
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

    /**
     * @OA\Get(
     *     path="/posts/{id}/comments",
     *     operationId="posts.showComments",
     *     tags={"posts"},
     *     summary="Comment list By Post ID",
     *     security={{ "token":{}, "mobilekey":{} }},
     *     @OA\Parameter(
     *          name="id",
     *          description="Post ID",
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
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(
     *                      @OA\Property(property="id", type="integer", example="1"),
     *                      @OA\Property(property="postId", type="integer", example="1"),
     *                      @OA\Property(property="userId", type="integer", example="1"),
     *                      @OA\Property(property="name", type="string", example="id labore ex et quam laborum"),
     *                      @OA\Property(property="email", type="string", example="Eliseo@gardner.biz"),
     *                      @OA\Property(property="body", type="string", example="laudantium enim quasi est quidem magnam voluptate ipsam eos\ntempora quo necessitatibus\ndolor quam autem quasi\nreiciendis et nam sapiente accusantium"),
     *                  )
     *              ),
     *              @OA\Property(property="links", type="object",
     *                  @OA\Property(property="first", type="string", example="/api/v1/posts/1/comments?page=1"),
     *                  @OA\Property(property="last", type="string", example="/api/v1/posts/1/comments?page=10"),
     *                  @OA\Property(property="prev", type="string", example=null),
     *                  @OA\Property(property="next", type="string", example="/api/v1/posts/1/comments?page=2"),
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
    public function showComments()
    {
    }
}
