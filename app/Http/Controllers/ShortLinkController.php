<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ShortLink;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ShortLinkController extends Controller
{
    public function index()
    {
        $shortLinks = ShortLink::latest()->get();
   
        return view('shortenLink', compact('shortLinks'));
    }

    public function store(Request $request)
    {
        $input['ip'] = "null";
        $input['link'] = $request->link;
        $input['code'] = str_random(6);
        $urlcode = $input['code'];
        $ban = DB::table('banned')->where('url', $input['link'])->first();;

        $validator = Validator::make($request->all(), [
            'link' => ['required', 'url'],
        ]);
        
        if($input['link'] == null) {
            return redirect('/')
                ->with('error', '단축을 원하는 긴 주소를 입력하세요.');
        } else if ($validator->fails()) {
            return redirect('/')
                ->with('error', '사용할 수 없는 주소에요.');
        }  else if($ban != null) {
            return redirect('/')
                ->with('error', '관리자에 의해 차단된 주소로, 생성할 수 없어요.');
        } else {
            ShortLink::create($input);
            return redirect('/')
                ->with('success', $urlcode);
        }
    }

    public function shortenLink($code)
    {
        $find = ShortLink::where('code', $code)->first();

        if($code == "") {
            return view('shortenLink', compact('shortLinks'));
        } else if($code == "terms") {
            return view('terms');
        } else if($find == "") {
            return redirect('/')
                ->with('error', '존재하지 않는 단축 주소로, 다시 확인해 주세요.');
        } else {
            ShortLink::where('id', $find->id)->update(['hit'=>$find->hit + 1]);
            return redirect($find->link);
        }
    }
}
