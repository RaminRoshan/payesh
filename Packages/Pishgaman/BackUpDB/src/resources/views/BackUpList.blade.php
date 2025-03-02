@extends($Template)

@section('content')
<form method="POST" action="">
    @csrf
    <div class="row toolbar" style="width: 99%">
        <div class="col-sm-12 col-md-2 col-lg-1">
            <a class="btn btn-success" style="width: 100%" href="{{route('BackUpAction')}}?action=addBackup"><i class="fa fa-download fa-pishgaman"></i></a>
        </div>       
        <div class="col-sm-12 col-md-2 col-lg-1">
            <button name="action" value="deleteBackup" class="btn btn-danger" style="width: 100%"><i class="fa fa-trash fa-pishgaman"></i></button>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
            <input name="search" class="form-control" placeholder="{{__('app.Search')}}" value="{{$search ?? ''}}">
        </div>
        <div class="col-sm-12 col-md-2 col-lg-2">
            <select name="orderby" class="form-control">
                <option value="">مرتب سازی</option>
                <option value="DESC|id"    @if($orderby == 'DESC|id') selected @endif>{{__('app.DESC|id')}}</option>
                <option value="ASC|id"     @if($orderby == 'ASC|id') selected @endif>{{__('app.ASC|id')}}</option>
                <option value="DESC|userId"  @if($orderby == 'DESC|userId') selected @endif>کاربر نزولی</option>
                <option value="ASC|userId"   @if($orderby == 'ASC|userId') selected @endif>کاربر صعودی</option>
            </select>
        </div>
        <div class="col-sm-12 col-md-2 col-lg-2">
            <select name="page_number" class="form-control">
                <option value="5"   @if($page_number == 5)   selected @endif>5</option>
                <option value="10"  @if($page_number == 10)  selected @endif>10</option>
                <option value="15"  @if($page_number == 15)  selected @endif>15</option>
                <option value="20"  @if($page_number == 20)  selected @endif>20</option>
                <option value="25"  @if($page_number == 25)  selected @endif>25</option>
                <option value="30"  @if($page_number == 30)  selected @endif>30</option>
                <option value="50"  @if($page_number == 50)  selected @endif>50</option>
                <option value="100" @if($page_number == 100) selected @endif>100</option>
                <option value="200" @if($page_number == 200) selected @endif>200</option>
                <option value="500" @if($page_number == 500) selected @endif>500</option>
                <option value="0"   @if($page_number == 0)   selected @endif>{{__('app.All')}}</option>
            </select>
        </div>
        <div class="col-sm-12 col-md-2 col-lg-2">
            <button type="submit" class="btn btn-default" title="{{__('app.Search')}}">
                <i class="fa fa-search" style="font-size: 20px;padding: 0 !important; width: 100%;"></i>
            </button>
        </div>
    </div>
    <hr>
    
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr class="text-center bg-antiquewhite">
                <th class="text-center">
                    <input type="checkbox" class="filled-in" id="checkall-toggle" title="{{__('app.selecte all')}}" onClick="checking();">
                    <label for="checkall-toggle"></label>
                </th>
                <th class="text-center">عنوان فایل</th>
                <th class="text-center">تاریخ</th>
                <th class="text-center">حذف</th>
                <th class="text-center">بازیابی</th>
            </tr>
        </thead>
        <tbody>
            @php $i = $BackUp->currentPage() * $page_number - $page_number + 1 ;@endphp
            @foreach($BackUp as $item)
            <tr class="text-center">
                <td>
                    <input type="checkbox" class="filled-in" id="chk{{$item->id}}" value="{{$item->id}}" name="mychk[]">
                    <label for="chk{{$item->id}}">{{$i++}}</label>
                </td>
                <td>
                    <a @if(($item->name ?? '') != '') href="{{url('media/DBBackUp/'.$item->name.'.sql')}}" @else onclick="alert('فایل یافت نشد')" @endif>
                        {{$item->name ?? 'خطا در نمایش'}}
                    </a>
                </td>
                <td>@php Verta::setStringformat('Y/n/j (H:i)'); echo Verta::instance($item->created_at) ?? 'خطا در نمایش'; @endphp </td>
                <td><a href="{{route('BackUpAction')}}?action=deleteBackup&id={{$item->id}}" class="btn btn-danger"><i class="fa fa-trash fa-pishgaman"></i></a></td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="document.getElementById('fileBackName').value='{{$item->id}}'">
                        <i class="fa fa-upload fa-pishgaman"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $BackUp->appends(request()->except('_token'))->links() }}
</form>



<form action="{{route('BackUpAction')}}">
    <input type="hidden" id="fileBackName" name="fileBackName">
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">بازیابی فایل پشتبان پایگاه داده</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <div class="modal-body">
                    در صورت تایید درخواست دیتابیس موجود حذف و فایل مورد نظر آپلود خواهد شد. آیا مطمئن هستید؟
                    <br>
                    <input class="form-control" name="pass" placeholder="کلمه عبور برای آپلود این فایل را وارد کنید">
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-info" name="action" value="uploadBackup">بله</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">خیر</button>
                </div>
                
            </div>
        </div>
    </div>
</form>
@endsection
