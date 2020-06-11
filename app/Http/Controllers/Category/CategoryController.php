<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Http\Repositories\CategoryRepository;
use App\Http\Resources\Category\CategoryCollection;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
