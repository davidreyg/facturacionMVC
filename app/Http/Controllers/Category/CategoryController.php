<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Http\Repositories\CategoryRepository;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Category\CategoryCollection;
use App\Http\Requests\Category\CreateCategoryRequest;

class CategoryController extends ApiController
{

        /** @var  CategoryRepository */
    private $categoryRepository;

    public function __construct(CategoryRepository $categoriaRepo)
    {
        $this->categoryRepository = $categoriaRepo;
    }
    /**
       * @OA\Get(
       *     path="/categories",
       *     summary="Mostrar categorias",
       *     tags={"categories"},
       *     @OA\Response(
       *         response="401",
       *         description="Inserta tu token pues hermano!",
       *     ),
       *     @OA\Response(
       *         response=200,
       *         description="Lista de categorias. Correcto",
       *     ),
       *     security={
       *         {"bearer": {}}
       *     }
       * )
       */
    public function index()
    {
        $categories = $this->categoryRepository->all();

        return $this->showAll(new CategoryCollection($categories));
    }

    /**
     * @OA\Post(
     *     path="/categories",
     *     tags={"categories"},
     *     operationId="store",
     *     summary="Agregar una nueva categoria.",
     *     @OA\RequestBody(
     *         description="Categoria a ser creada",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Category")
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Inserta tu token pues hermano!",
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Creado",
     *     ),
     *     security={
     *         {"bearer": {}}
     *     }
     * )
     */
    public function store(CreateCategoryRequest $request)
    {
        $campos = $request->validated();
        $categoria = $this->categoryRepository->create($campos);

        return $this->showOne(new CategoryResource($categoria), 201);
    }

    /**
      * @OA\Get(
      *     path="/categories/{categoryId}",
      *     summary="Buscar categoria por ID",
      *     description="Retorna una sola categoria",
      *     operationId="show",
      *     tags={"categories"},
      *     @OA\Parameter(
      *         description="ID de la categoria a retornar",
      *         in="path",
      *         name="categoryId",
      *         required=true,
      *         @OA\Schema(
      *           type="integer",
      *           format="int64"
      *         )
      *     ),
      *     @OA\Response(
      *         response=200,
      *         description="successful operation",
      *         @OA\JsonContent(ref="#/components/schemas/Category")
      *     ),
      *     @OA\Response(
      *         response=401,
      *         description="Inserta tu token pues hermano!",
      *     ),
      *     @OA\Response(
      *         response="404",
      *         description="Categoria no existe"
      *     ),
      *     security={
      *       {"bearer": {}}
      *     }
      * )
      */
    public function show(Category $category)
    {
        return $this->showOne(new CategoryResource($category), 200);
    }


    /**
      * @OA\Put(
      *     path="/category/{categoryId}",
      *     tags={"category"},
      *     operationId="update",
      *     summary="Actualizar una categoria existente",
      *     description="",
      *     @OA\RequestBody(
      *         required=true,
      *         description="Categoria a ser actualizada",
      *         @OA\JsonContent(ref="#/components/schemas/Category")
      *     ),
      *     @OA\Parameter(
      *         description="ID de la categoria a actualizar",
      *         in="path",
      *         name="categoryId",
      *         required=true,
      *         @OA\Schema(
      *           type="integer",
      *           format="int64"
      *         )
      *     ),
      *     @OA\Response(
      *         response=404,
      *         description="Categoria no encontrada",
      *     ),
      *     @OA\Response(
      *         response=401,
      *         description="Inserta tu token pues hermano!",
      *     ),
      *     @OA\Response(
      *         response="200",
      *         description="Categoria actualizada correctamente"
      *     ),
      *     security={
      *       {"bearer": {}}
      *     }
      * )
      */
    public function update(CreateCategoryRequest $request, Category $category)
    {
        $campos = $request->validated();

        $category = $this->categoryRepository->update($campos, $category);

        return $this->showOne(new CategoryResource($category), 200);
    }

    /**
     * @OA\Delete(
     *     path="/categories/{categoryId}",
     *     summary="Elimina una categoria",
     *     description="",
     *     operationId="delete",
     *     tags={"categories"},
     *     @OA\Parameter(
     *         description="Id de la categoria a eliminar",
     *         in="path",
     *         name="categoryId",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Categoria no encontrada",
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Inserta tu token pues hermano!",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Tiene productos relacionados",
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Categoria eliminada correctamente"
     *     ),
     *     security={
     *       {"bearer": {}}
     *     }
     * )
     */
    public function destroy(Category $category)
    {
        if ($category->productos()->count()) {
            return $this->errorResponse("Esta category tiene productos relacionados", 403);
        }

        $category->delete();

        return $this->showOne(new CategoryResource($category), 200);
    }
}
