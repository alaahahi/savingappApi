<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;

class CardController extends Controller
{
    use DisableAuthorization;
    protected $model = CardController::class; 
}
