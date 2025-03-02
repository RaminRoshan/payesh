<?php

namespace Pishgaman\BackUpDB\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Pishgaman\BackUpDB\Models\BackUp;
use Pishgaman\BackUpDB\Http\Lib\Mysqldump;
// use Pishgaman\LogActivity\Http\Lib\Log;
use Pishgaman\BackUpDB\Http\Lib\sqlImport;
use Illuminate\Support\Facades\Artisan;
use File;
use Config;
use ZipArchive;

class BackUpController extends Controller
{
    // protected $Log ;

    public function __construct()
    {
        // $this->Log = $Log;
        // $this->middleware('access:36');
    }

    /** تابع کنترلر **/
    public function action(Request $request)
    {
        if($request->has('action'))
        {
            $functionName = $request->action;

            if(method_exists($this,$functionName))
            {
                return $this::$functionName($request);
            }
            else
            return abort(404);
        }
        else
        return abort(404);

    }
    /** بازگشت فایل پشتیبان **/
    public function uploadBackup($request)
    {
        set_time_limit(0);

        // $BackUp = BackUp::find($request->fileBackName);
        // $file = base_path().'\\..\\media\\DBBackUp\\'.$BackUp->name.'.sql';
        // if(file_exists($file))
        // {
        //     if(config('database.BackUpPass') == $request->pass)
        //     {
        //         $sqlImport = new sqlImport;
        //         $sqlImport->Import($file);

        //         return redirect()->back();
        //     }
        //     else
        //     {
                session()->flash('status', 'شما دسترسی لازم برای بازیابی دیتابیس را ندارید');
                return redirect()->back();
        //     }
        // }
        // else
        // {
        //     session()->flash('status', 'خطا در بازیابی فایل موجود نیست');
        //     return redirect()->back();
        // }

    }

    /** حذف بک آپ **/
    public function deleteBackup($request)
    {

        if($request->has('mychk'))
        {
            $i= $j = 0;
            foreach ( $request->mychk as $k=> $c)
            {
                $BackUp = BackUp::find($c);
                $path   = base_path() . '/../media/DBBackUp/'.$BackUp->name.'.sql';
                if (File::exists($path)) {
                    $this->Log->Log('حذف فایل پشتیبان از دیتابیس:'.$BackUp->name);
                    unlink($path);
                    $BackUp->delete();
                    $i++;
                }
                else
                {
                    $BackUp->delete();
                    $j++;
                }
            }
            session()->flash('status', 'تعداد ' . $i . ' فایل با موفقیت حذف شد . تعداد '. $j . ' اصلاح شد');
            return redirect()->back();
        }
        else if($request->has('id'))
        {
            $BackUp = BackUp::find($request->id);
            $path   = base_path() . '/../media/DBBackUp/'.$BackUp->name.'.sql';
            if (File::exists($path)) {
                $this->Log->Log('حذف فایل پشتیبان از دیتابیس:'.$BackUp->name);
                unlink($path);
                $BackUp->delete();
                session()->flash('status', 'فایل پشتیبان با موفقیت حذف شد');
                return redirect()->back();
            }
            else
            {
                $BackUp->delete();
                session()->flash('status', 'فایل پشتیبان یافت نشد . دیتابیس اصلاح شد');
                return redirect()->back();
            }
        }
        else return abort(404);
    }
    /** اضافه کردن بک آپ**/
    public function addBackup($request)
    {
        // $this->Log->Log('ثبت فایل پشتیبان از دیتابیس');

        set_time_limit(0);

        $host     = Config::get('database.connections.mysql.host') ?? 'localhost';
        $database = Config::get('database.connections.mysql.database') ?? 'nope';
        $user     = Config::get('database.connections.mysql.username') ?? 'root';
        $pass     = Config::get('database.connections.mysql.password') ?? 'root';
        $path     = base_path() . '/../media/DBBackUp';
        $name     = date('Ymdhis');
        $OutPut   = $path.'/'.$name.'.sql';

        if(!File::isDirectory($path)) File::makeDirectory($path, 0777, true, true);

        $dump = new Mysqldump('mysql:host='.$host.';dbname='.$database, $user, $pass);
        $res = $dump->start($OutPut);

        // $zip = new ZipArchive();
        // $zip->open("$path/$name.zip", ZipArchive::CREATE);
        // $zip->addFile($OutPut, $name.'.sql');
        // $zip->close();

        // unlink($OutPut);

        $BackUp = new BackUp;
        $BackUp->name = $name;
        $BackUp->save();

        session()->flash('status', 'فایل پشتیبان با موفقیت اضافه شد');

        if($res) return redirect(route('BackUpAction').'?action=backUpList');
    }
    public function justBackup(Request $request)
    {
        ini_set('max_execution_time', 600);

        $host     = Config::get('database.connections.mysql.host') ?? 'localhost';
        $database = Config::get('database.connections.mysql.database') ?? 'nope';
        $user     = Config::get('database.connections.mysql.username') ?? 'root';
        $pass     = Config::get('database.connections.mysql.password') ?? 'root';
        $path     = base_path() . '/../media/DBBackUp';
        $name     = date('Ymdhis');
        $OutPut   = $path.'/'.$name.'.sql';

        if(!File::isDirectory($path)) File::makeDirectory($path, 0777, true, true);

        $dump = new Mysqldump('mysql:host='.$host.';dbname='.$database, $user, $pass);
        $res = $dump->start($OutPut);
        $BackUp = new BackUp;
        $BackUp->name = $name;
        $BackUp->save();

        // $zip = new \ZipArchive();
        // $zip->open("$path/$name.zip", ZipArchive::CREATE);
        // $zip->addFile($OutPut, $name.'.sql');
        // $zip->close();

        // unlink($OutPut);
    }
    /** لیست پشتیبان های گرفته شده **/
    public function backUpList($request)
    {
        // $this->Log->Log('مشاهده لیست فایل های پشتیبان پایگاه داده');

        $userm = auth()->user();
        /***** OrderBy *****/
        if($request->has('orderby'))
        {
            if($request->orderby != '')
            {
                $by = explode('|',$request->orderby);
                $BackUp = BackUp::orderBy($by[1],$by[0]);
                $orderby = $request->orderby;
            }
            else
            {
                $BackUp = BackUp::orderBy('id','DESC');
                $orderby = '';
            }
        }
        else
        {
            $BackUp = BackUp::orderBy('id','DESC');
            $orderby = '';
        }

        if($request->has('search'))
        {
            if($request->search != '')
            {
                $search = $request->search;
                $BackUp = $BackUp->where('name','like',"%". $search ."%");
            }
        }
        if($request->has('page_number'))
        {
            if($request->page_number == '0')
            {
                $page_number = $BackUp->count();
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

        $BackUp = $BackUp->paginate($page_number);
        $page = ['لیست Backup ها','میزکار'];
        return view('BackUpView::BackUpList',['userm'=>$userm ,'BackUp'=>$BackUp ,'page' => $page , 'orderby'=>$orderby , 'search' => $request->search , 'page_number' => $pg]);
    }
}
