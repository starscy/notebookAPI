<?php

namespace App\Http\Controllers\Swagger\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @OA\Info(title="My documentation notebook API", version="0.1")
 * @OA\PathItem(
 *     path="/api/v1/"
 * )
 *
 * @OA\Post(
 *     path="/api/v1/notebook",
 *     summary="Create a notebook.",
 *     tags={"Notebook"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                  @OA\Schema (
 *                      @OA\Property(property="title", type="string", example="test notebook"),
 *                      @OA\Property(property="company", type="string", example="Vimm Bill Dane"),
 *                      @OA\Property(property="phone", type="string", example="8-999-64-64"),
 *                      @OA\Property(property="email", type="string", example="admin@mail.ru"),
 *                      @OA\Property(property="birthday", type="string", example="1990-10-06"),
 *                      @OA\Property(property="photo", type="string", example="www.vk.ru/photo/3.com")
 *                  )
 *             }
 *        ),
 *     ),
 *
 *      @OA\Response(
 *          response=201,
 *          description="OK",
 *          @OA\JsonContent(
 *              @OA\Property(property="success", type="string", example="true"),
 *              @OA\Property(property="data", type="object",
 *                   @OA\Property(property="id", type="integer", example="288"),
 *                   @OA\Property(property="title", type="string", example="test notebook"),
 *                   @OA\Property(property="company", type="string", example="Vimm Bill Dane"),
 *                   @OA\Property(property="phone", type="string", example="8-999-64-64"),
 *                   @OA\Property(property="email", type="string", example="admin@mail.ru"),
 *                   @OA\Property(property="birthday", type="string", example="1990-10-06"),
 *                   @OA\Property(property="photo", type="string", example="www.vk.ru/photo/3.com")
 *              ),
 *              @OA\Property (property="message", type="string", example="Notebook created successfully"),
 *          ),
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Invalid data value",
 *         @OA\JsonContent(
 *              @OA\Property(property="success", type="string", example="false"),
 *              @OA\Property(property="data", type="object",
 *                   @OA\Property(property="id", type="integer", example="288"),
 *                   @OA\Property(property="title", type="string", example="test notebook"),
 *                   @OA\Property(property="company", type="string", example="Vimm Bill Dane"),
 *                   @OA\Property(property="phone", type="string", example="8-999-64-64"),
 *                   @OA\Property(property="email", type="string", example="admin@mail.ru"),
 *                   @OA\Property(property="birthday", type="string", example="1990-10-06"),
 *                   @OA\Property(property="photo", type="string", example="www.vk.ru/photo/3.com")
 *              ),
 *              @OA\Property (property="message", type="string", example="Notebook created successfully"),
 *          ))
 * )
 *
 * @OA\Get(
 *     path="/api/v1/notebook",
 *     summary="List of notebooks.",
 *     tags={"Notebook"},
 *
 *     @OA\Property(property="page", type="integer", example="2"),
 *     @OA\Property(property="countPages", type="integer", example="10"),
 *
 *     @OA\Response(
 *          response=200,
 *          description="OK",
 *          @OA\JsonContent(
 *              @OA\Property(property="success", type="string", example="true"),
 *              @OA\Property(property="data", type="array", @OA\Items(
 *                   @OA\Property(property="id", type="integer", example="288"),
 *                   @OA\Property(property="title", type="string", example="test notebook"),
 *                   @OA\Property(property="company", type="string", example="Vimm Bill Dane"),
 *                   @OA\Property(property="phone", type="string", example="8-999-64-64"),
 *                   @OA\Property(property="email", type="string", example="admin@mail.ru"),
 *                   @OA\Property(property="birthday", type="string", example="1990-10-06"),
 *                   @OA\Property(property="photo", type="string", example="www.vk.ru/photo/3.com"),
 *                  )
 *              ),
 *              @OA\Property (property="message", type="string", example="Notebook created successfully"),
 *          ),
 *    ),
 *    @OA\Response(
 *          response=404,
 *          description="Error. Not found.",
 *          @OA\JsonContent(
 *              @OA\Property(property="success", type="string", example="false"),
 *              @OA\Property (property="message", type="string", example="Notebooks not found"),
 *          ),
 *    ),
 * )
 *
 * @OA\Get(
 *     path="/api/v1/notebook/{id}",
 *     summary="Returns a notebook.",
 *     tags={"Notebook"},
 *     @OA\Parameter (
 *         description="ID of notebook",
 *         in="path",
 *         name="id",
 *         required=true,
 *         example=11
 *     ),
 *
 *     @OA\Response(
 *          response=200,
 *          description="OK",
 *          @OA\JsonContent(
 *              @OA\Property(property="success", type="string", example="true"),
 *              @OA\Property(property="data", type="object",
 *                   @OA\Property(property="id", type="integer", example="288"),
 *                   @OA\Property(property="title", type="string", example="test notebook"),
 *                   @OA\Property(property="company", type="string", example="Vimm Bill Dane"),
 *                   @OA\Property(property="phone", type="string", example="8-999-64-64"),
 *                   @OA\Property(property="email", type="string", example="admin@mail.ru"),
 *                   @OA\Property(property="birthday", type="string", example="1990-10-06"),
 *                   @OA\Property(property="photo", type="string", example="www.vk.ru/photo/3.com")
 *              ),
 *              @OA\Property (property="message", type="string", example="Notebook created successfully"),
 *          ),
 *     ),
 *     @OA\Response(
 *          response=404,
 *          description="Error. Not found.",
 *          @OA\JsonContent(
 *              @OA\Property(property="success", type="string", example="false"),
 *              @OA\Property (property="message", type="string", example="Notebook not found"),
 *          ),
 *    ),
 * )
 *
 * @OA\Post(
 *     path="/api/v1/notebook/{id}",
 *     summary="Update a notebook.",
 *     tags={"Notebook"},
 *     @OA\Parameter (
 *         description="ID of notebook",
 *         in="path",
 *         name="id",
 *         required=true,
 *         example=10
 *     ),
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                  @OA\Schema (
 *                      @OA\Property(property="title", type="string", example="test notebook"),
 *                      @OA\Property(property="company", type="string", example="Vimm Bill Dane"),
 *                      @OA\Property(property="phone", type="string", example="8-999-64-64"),
 *                      @OA\Property(property="email", type="string", example="admin@mail.ru"),
 *                      @OA\Property(property="birthday", type="string", example="1990-10-06"),
 *                      @OA\Property(property="photo", type="string", example="www.vk.ru/photo/3.com")
 *                  )
 *             }
 *        ),
 *     ),
 *
 *     @OA\Response(
 *          response=200,
 *          description="OK",
 *          @OA\JsonContent(
 *              @OA\Property(property="success", type="string", example="true"),
 *              @OA\Property(property="data", type="object",
 *                   @OA\Property(property="id", type="integer", example="288"),
 *                   @OA\Property(property="title", type="string", example="test notebook"),
 *                   @OA\Property(property="company", type="string", example="Vimm Bill Dane"),
 *                   @OA\Property(property="phone", type="string", example="8-999-64-64"),
 *                   @OA\Property(property="email", type="string", example="admin@mail.ru"),
 *                   @OA\Property(property="birthday", type="string", example="1990-10-06"),
 *                   @OA\Property(property="photo", type="string", example="www.vk.ru/photo/3.com")
 *              ),
 *              @OA\Property (property="message", type="string", example="Notebook updated successfully"),
 *          ),
 *    ),
 *    @OA\Response(
 *         response=422,
 *         description="Invalid status value",
 *         @OA\JsonContent(
 *              @OA\Property(property="success", type="string", example="false"),
 *              @OA\Property(property="data", type="object",
 *                   @OA\Property(property="id", type="integer", example="288"),
 *                   @OA\Property(property="title", type="string", example="test notebook"),
 *                   @OA\Property(property="company", type="string", example="Vimm Bill Dane"),
 *                   @OA\Property(property="phone", type="string", example="8-999-64-64"),
 *                   @OA\Property(property="email", type="string", example="admin@mail.ru"),
 *                   @OA\Property(property="birthday", type="string", example="1990-10-06"),
 *                   @OA\Property(property="photo", type="string", example="www.vk.ru/photo/3.com")
 *              ),
 *              @OA\Property (property="message", type="string", example="Notebook created successfully"),
 *          ))
 * ),
 *
 * @OA\Delete(
 *     path="/api/v1/notebook/{id}",
 *     summary="Delete a notebook.",
 *     tags={"Notebook"},
 *     @OA\Parameter (
 *         description="ID of notebook",
 *         in="path",
 *         name="id",
 *         required=true,
 *         example=11
 *     ),
 *
 *     @OA\Response(
 *          response=200,
 *          description="OK",
 *          @OA\JsonContent(
 *              @OA\Property(property="success", type="string", example="true"),
 *              @OA\Property(property="data", type="object",
 *                   @OA\Property(property="id", type="integer", example="288"),
 *                   @OA\Property(property="title", type="string", example="test notebook"),
 *                   @OA\Property(property="company", type="string", example="Vimm Bill Dane"),
 *                   @OA\Property(property="phone", type="string", example="8-999-64-64"),
 *                   @OA\Property(property="email", type="string", example="admin@mail.ru"),
 *                   @OA\Property(property="birthday", type="string", example="1990-10-06"),
 *                   @OA\Property(property="photo", type="string", example="www.vk.ru/photo/3.com")
 *              ),
 *              @OA\Property (property="message", type="string", example="Notebook deleted successfully"),
 *          ),
 *    ),
 * )
 *
 */
class NotebookController extends Controller
{
    //
}
