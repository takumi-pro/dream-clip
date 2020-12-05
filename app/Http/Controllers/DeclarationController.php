<?php

namespace App\Http\Controllers;

use App\Declaration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class DeclarationController extends Controller
{
    public function show(){
        $declarations = Declaration::all()->sortByDesc('created_at');

        return view('declaration.index',['declarations' => $declarations]);
    }

    public function create(){
        return view('declaration.create');
    }

    public function store(Request $request,Declaration $declaration){
        $declaration_flg = DB::table('declarations')->count();
        if($declaration_flg){
            return redirect()->route('articles.index');
        }

        $rules = [
            'deadline' => 'required',
            'title' => 'required|string|max:100',
        ];
        $message = [
            'deadline.required' => '入力必須です',
            'title.required' => '入力必須です',
            'title.max100' => '100文字以内で入力してください', 
        ];
        $validator = Validator::make($request->all(),$rules,$message);
        if($validator->fails()){
			return redirect()->action("App\Http\Controllers\DeclarationController@create")
				->withInput()
                ->withErrors($validator);
        }

        $declaration->title = $request->title;
        $declaration->deadline = $request->deadline;
        $declaration->user_id = $request->user()->id;
        $declaration->save();

        
        return redirect()->route('declaration');
    }
}
