<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema()
 */
class Category extends Model
{
    /**
         * The product name
         * @var string
         *
         * @OA\Property(
         *   property="name",
         *   type="string",
         *   description="Nombre de la categoria"
         * )
         */

    protected $dates = ['deleted_at'];

    /**
     * The product name
     * @var string
     *
     * @OA\Property(
     *   property="description",
     *   type="string",
     *   description="Descripcion de la categoria"
     * )
     */
    public $fillable = ['name', 'description'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'string|required|min:4|max:20',
        'description' => 'string|nullable|min:4|max:100',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
