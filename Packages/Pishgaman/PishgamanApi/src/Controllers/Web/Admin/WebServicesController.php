<?php

namespace Pishgaman\PishgamanApi\Controllers\Web\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Pishgaman\Pishgaman\Database\Models\User\User;

class WebServicesController extends Controller
{
    private $validActions = [
        'WebService'
    ];

    protected $validMethods = [
        'GET' => ['WebService'],
        'POST' => [], 
        'PUT' => [],
        'DELETE' => []
    ];

    public function action(Request $request)
    {
        if ($request->has('action')) {
            $functionName = $request->action;
            $method = $request->method();
            if ($this->isValidAction($functionName, $method)) {
                return $this->$functionName($request);
            } else {
                return abort(404);
            }
        }
        return abort(404);
    }

    private function isValidAction($functionName, $method)
    {
        return in_array($functionName, $this->validActions) && in_array($functionName, $this->validMethods[$method]);
    }

    public function WebService($request)
    {
        if (!$this->isValidAction('WebService', 'GET')) {
            return response()->json(['errors' => 'requestNotAllowed'], 422);
        }

        $mix = ['packages/pishgaman/PishgamanApi/src/resources/vue/webServiceApp.js'];
        return view('PishgamanApiView::webService',compact('mix'));
    }

}
