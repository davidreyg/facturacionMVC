<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Utils\ApiResponser;

/**
 * @OA\Info(
 *      version="1.0",
 *      title="FacturaloYa",
 *      description="Sistema de facturacion en linea. Con carrito de compras",
 *      @OA\Contact(
 *          email="neisserrey@upeu.edu.pe"
 *      ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
*/
/**
 *  @OA\Server(
 *      url="http://facturacionmvc.test/api/",
 *      description="Documentacion de la Facturacion en Linea"
 *  )
 */
class ApiController extends Controller
{
    use ApiResponser;
}
