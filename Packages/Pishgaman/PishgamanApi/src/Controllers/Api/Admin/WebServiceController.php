<?php

namespace Pishgaman\PishgamanApi\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Pishgaman\PishgamanApi\Database\Models\WsWebService;
use Pishgaman\PishgamanApi\Database\Models\WsWebServiceAccess;
Use Illuminate\Support\Facades\DB;
Use Pishgaman\Pishgaman\Repositories\UserRepository;

class WebServiceController extends Controller
{
    private $validActions = [
        'Webservice',
        'saveNewWebservice',
        'saveUpdateWebservice',
        'deleteWebservice',
        'getAccessUser',
        'searchUser',
        'selectUser',
        'deleteAccessUser',
        'changeWebserviceStatus'
    ];

    protected $validMethods = [
        'GET' => ['Webservice','getAccessUser','searchUser'],
        'POST' => ['saveNewWebservice','selectUser'], 
        'PUT' => ['saveUpdateWebservice','changeWebserviceStatus'],
        'DELETE' => ['deleteWebservice','deleteAccessUser']
    ];

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

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

    public function changeWebserviceStatus($request,)
    {
        $this->validate($request, [
            'id' => 'required' ,
        ]);

        $web = WsWebService::where('id',$request->id)->get()->first();
        $web->active = $web->active ? 0 : 1;
        $web->save();

        return response()->json(['status'=>'Ok']);
    }

    public function deleteAccessUser($request)
    {
        if (!$this->isValidAction('deleteAccessUser', 'DELETE')) {
            return response()->json(['errors' => 'requestNotAllowed'], 422);
        }

        $this->validate($request, [
            'id' => 'required' ,
        ]);

        WsWebServiceAccess::where('id',$request->id)->delete();

        return response()->json(['Result'=>'Ok']);
    }

    public function selectUser($request)
    {
        if (!$this->isValidAction('selectUser', 'POST')) {
            return response()->json(['errors' => 'requestNotAllowed'], 422);
        }

        $this->validate($request, [
            'user_id' => 'required' ,
            'service_id' => 'required' ,
        ]);

        if(WsWebServiceAccess::where([['user_id',$request->user_id],['web_service_id',$request->service_id]])->count() > 0)
        {
            return response()->json(['errors'=>['e1'=>'این دسترسی قبلا ایجاد شده است.']],422);
        }

        WsWebServiceAccess::insert([
            'user_id' => $request->user_id,
            'web_service_id' => $request->service_id,
        ]);

        return response()->json(['Result'=>'Ok']);
    }

    public function searchUser($request)
    {
        if (!$this->isValidAction('searchUser', 'GET')) {
            return response()->json(['errors' => 'requestNotAllowed'], 422);
        }

        $options = [
            'sortings' => [
                ['column' => 'name', 'order' => 'asc'],
            ],
            'conditions' => [
                ['column' => 'username', 'operator' => 'like', 'value' => '%'.$request->searchUser.'%'],
            ],
            'select' => ['id', 'name','last_name', 'email', 'created_at'],
            'count' => false, 
            'get' => true, 
        ];

        $users = $this->userRepository->Get($options);

        return response()->json(['users'=>$users]);
    }

    public function getAccessUser($request)
    {
        if (!$this->isValidAction('getAccessUser', 'GET')) {
            return response()->json(['errors' => 'requestNotAllowed'], 422);
        }

        $users = WsWebServiceAccess::where('web_service_id',$request->id)->with(['user'])->get();
        return response()->json(['users'=>$users]);
    }

    public function deleteWebservice($request)
    {
        if (!$this->isValidAction('deleteWebservice', 'DELETE')) {
            return response()->json(['errors' => 'requestNotAllowed'], 422);
        }

        $this->validate($request, [
            'id'      => 'required' ,
        ]);

        WsWebService::where('id',$request->id)->delete();

        return response()->json(['status'=>'Ok']);
    }

    public function saveUpdateWebservice($request)
    {
        if (!$this->isValidAction('saveUpdateWebservice', 'PUT')) {
            return response()->json(['errors' => 'requestNotAllowed'], 422);
        }

        WsWebService::where('id',$request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'help' => $request->help,
        ]);

        return response()->json(['Result'=>'Ok']);
    }

    public function saveNewWebservice($request)
    {
        if (!$this->isValidAction('saveNewWebservice', 'POST')) {
            return response()->json(['errors' => 'requestNotAllowed'], 422);
        }

        WsWebService::insert([
            'code' => bin2hex(random_bytes(6)),
            'name' => $request->name,
            'description' => $request->description,
            'help' => $request->help,
        ]);

        return response()->json(['Result'=>'Ok']);
    }

    public function Webservice($request)
    {
        if (!$this->isValidAction('Webservice', 'GET')) {
            return response()->json(['errors' => 'requestNotAllowed'], 422);
        }

        $Service = WsWebService::orderby('created_at','desc');

        if($request->has('page_number'))
        {
            if($request->page_number == '0')
            {
                $page_number = $Service->count();
                $pg= 0;
            }
            else
            {
                $pg = $page_number = $request->page_number;
            }
        }
        else
        {
            $pg = $page_number = 20;
        }

        $Service = $Service->with('accesses')->paginate($page_number);

        return response()->json(['Service'=>$Service]);

    }
}
