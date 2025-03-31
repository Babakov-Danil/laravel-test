<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Requests\Vacancies\IndexRequest;
use App\Http\Requests\Vacancies\StoreRequest;
use App\Http\Requests\Vacancies\UpdateRequest;
use App\Http\Resources\VacanciesResource;
use App\Models\Vacancies;
use Illuminate\Http\Request;

class VacanciesController extends Controller
{

    /**
     *  @OA\Get(
     *      path="/api/vacancies",
     *      summary="Fetch vacancies",
     *      tags={"Vacancies"},
     *      @OA\Parameter(
     *          description="Dynamic fields. Can be string(fields=a, b, c) or array(fields[]=a, b, c)",
     *          in="query",
     *          name="fields",
     *          @OA\Schema(type="string"),
     *          @OA\Examples(example="null", value="", summary=""),
     *          @OA\Examples(example="created_at", value="created_at", summary="With column created_at."),
     *          @OA\Examples(example="updated_at", value="updated_at", summary="With column updated_at."),
     *          @OA\Examples(example="requirements", value="requirements", summary="With column requirements."),
     *          @OA\Examples(example="with all", value="created_at, updated_at, requirements", summary="With all columns."),
     *      ),
     *
     *      @OA\Parameter(
     *          description="Sort by column",
     *          in="query",
     *          name="sort_by",
     *          @OA\Schema(type="string"),
     *          @OA\Examples(example="null", value="", summary="Not provided"),
     *          @OA\Examples(example="created_at", value="created_at", summary="Sort by created_at column."),
     *          @OA\Examples(example="salary", value="salary", summary="Sort by salary column."),
     *      ),

     *      @OA\Parameter(
     *          description="Sort by column",
     *          in="query",
     *          name="sort_type",
     *          @OA\Schema(type="string"),
     *          @OA\Examples(example="null", value="", summary="If not provided use default ASC."),
     *          @OA\Examples(example="asc", value="asc", summary="Sort ASC."),
     *          @OA\Examples(example="desc", value="desc", summary="Sort DESC."),
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="ok",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={
     *                      "data": {
     *                          {
     *                              "id": 1,
     *                               "name": "Some name",
     *                               "description": "Some description.",
     *                               "salary": 120000,
     *                          },
     *                          {
     *                              "id": 2,
     *                               "name": "Some name 2",
     *                               "description": "Some description 2.",
     *                               "salary": 10000,
     *                          }
     *                      },
     *                      "links": {
     *                          "first": "http://localhost:8000/api/vacancies?page=1",
     *                          "last": "http://localhost:8000/api/vacancies?page=4",
     *                          "prev": null,
     *                          "next": "http://localhost:8000/api/vacancies?page=2"
     *                      },
     *                      "meta": {
     *                          "current_page": 1,
     *                          "from": 1,
     *                          "last_page": 4,
     *                          "links": {
     *                              {
     *                                  "url": null,
     *                                  "label": "&laquo; Previous",
     *                                  "active": false
     *                              },
     *                              {
     *                                  "url": "http://localhost:8000/api/vacancies?page=1",
     *                                  "label": "1",
     *                                  "active": true
     *                              },
     *                              {
     *                                  "url": "http://localhost:8000/api/vacancies?page=2",
     *                                  "label": "2",
     *                                  "active": false
     *                              },
     *                              {
     *                                  "url": "http://localhost:8000/api/vacancies?page=3",
     *                                  "label": "3",
     *                                  "active": false
     *                              },
     *                              {
     *                                  "url": "http://localhost:8000/api/vacancies?page=4",
     *                                  "label": "4",
     *                                  "active": false
     *                              },
     *                              {
     *                                  "url": "http://localhost:8000/api/vacancies?page=2",
     *                                  "label": "Next &raquo;",
     *                                  "active": false
     *                              }
     *                          },
     *                          "path": "http://localhost:8000/api/vacancies",
     *                          "per_page": 10,
     *                          "to": 10,
     *                          "total": 32
     *                      }
     *                  },
     *                  summary="An result object."
     *              ),
     *         )
     *      ),
     *
     *      @OA\Response(
     *          response=422,
     *          description="Error: Unprocessable Content",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="error",
     *                  value={
     *                      "message": "The selected sort by is invalid.",
     *                      "errors": {
     *                          "sort_by": {
     *                              "The selected sort by is invalid."
     *                          }
     *                      },
     *                  },
     *                  summary="params with wrong type|value."
     *              ),
     *          ),
     *      ),
     *  )
     */
    public function index(IndexRequest $request)
    {
    }


    /**
     *  @OA\Post(
     *      path="/api/vacancies",
     *      summary="Add new vacancy",
     *      tags={"Vacancies"},
     *      @OA\RequestBody(
     *          @OA\JsonContent(
     *              allOf={
     *                  @OA\Schema(
     *                    @OA\Property(property="name", type="string", example="Test name"),
     *                    @OA\Property(property="description", type="string", example="Test description"),
     *                    @OA\Property(property="requirements", type="string", example="Test requirements"),
     *                    @OA\Property(property="salary", type="integer", example="100000"),
     *                  )
     *              }
     *          )
     *      ),
     *
     *      @OA\Response(
     *        response=200,
     *        description="ok",
     *        @OA\JsonContent(
     *          @OA\Property(property="status", type="string", example="ok"),
     *          @OA\Property(property="data", type="int", example=42, description="ID of the sotred row")
     *        )
     *      ),
     *
     *      @OA\Response(
     *          response=422,
     *          description="Error: Unprocessable Content",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="error",
     *                  value={
     *                      "message": "The description field is required. (and 1 more error).",
     *                      "errors": {
     *                          "description": {
     *                               "The description field is required."
     *                           },
     *                           "requirements": {
     *                               "The requirements field is required."
     *                           }
     *                      },
     *                  },
     *                  summary="no required parameters."
     *              ),
     *          ),
     *      ),
     *  )
     */
    public function store(StoreRequest $request)
    {
    }


    /**
     * @OA\Put(
     *   path="/api/vacancies/{id}",
     *   summary="update vacancy",
     *   tags={"Vacancies"},
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="string"),
     *     @OA\Examples(example="int", value="1", summary="An int value."),
     *   ),
     *
     *   @OA\Parameter(
     *     name="name",
     *     in="query",
     *     @OA\Schema(type="string"),
     *     @OA\Examples(example="string", value="new vacancy name", summary="New name"),
     *   ),
     *
     *   @OA\Response(
     *     response=200,
     *     description="ok",
     *     @OA\JsonContent(
     *       @OA\Examples(
     *          example="ok",
     *          summary="Example.",
     *          value={
     *              "status":"ok",
     *              "data": 1,
     *          }
     *       )
     *     )
     *   ),
     *
     *   @OA\Response(
     *     response=404,
     *     description="Error: Not Found",
     *     @OA\JsonContent(
     *       @OA\Examples(
     *          example="error",
     *          summary="Example.",
     *          value={
     *              "status": "error",
     *              "data": "no query results with id = 2"
     *          }
     *       )
     *     )
     *   ),
     *
     *   @OA\Response(
     *     response=422,
     *     description="Error: Unprocessable Content",
     *     @OA\JsonContent(
     *       @OA\Examples(
     *          example="error",
     *          summary="Example.",
     *          value={
     *              "message": "The salary field must be an integer.",
     *              "errors": {
     *                  "salary": {
     *                      "The salary field must be an integer."
     *                  }
     *              },
     *          }
     *       )
     *     )
     *   )
     * )
     */
    public function update(UpdateRequest $request, Vacancies $vacancy)
    {
    }

    /**
     *  @OA\Delete(
     *      path="/api/vacancies/{id}",
     *      summary="Delete vacancy",
     *      tags={"Vacancies"},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          @OA\Schema(type="string"),
     *          @OA\Examples(example="int", value="1", summary="An int value."),
     *      ),
     *  
     *      @OA\Response(
     *          response=200,
     *          description="ok",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="ok",
     *                  summary="Example.",
     *                  value={
     *                      "status":"ok",
     *                      "data": 1,
     *                  }
     *              )
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=404,
     *          description="Error: Not Found",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="error",
     *                  summary="Example.",
     *                  value={
     *                      "status": "error",
     *                      "data": "no query results with id = 2"
     *                  }
     *              )
     *          )
     *      ),
     *  )
     */
    public function destroy(Vacancies $vacancy)
    {
    }
}
