<?php

namespace App\Http\Controllers;

use App\Declaration;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;


class DeclarationController extends Controller
{
    public function index(){
        $declarations = Declaration::all()->sortByDesc('created_at');
        $user = Auth::user();
        return view('declaration.index',['declarations' => $declarations,'user' => $user]);
    }

    public function create(){
        return view('declaration.create');
    }

    public function store(Request $request,Declaration $declaration){
        $user = Auth::user();
        $user = User::where('name',$user->name)->first();
        $declaration_flg = $user->declarations->count();
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

        
        return redirect()->route('declarations.index');
    }

    public function destroy(Declaration $declaration){
        $declaration->delete();

        return redirect()->route('declarations.index');
    }

    public function edit(Declaration $declaration){

        return view('declaration.edit',['declaration' => $declaration]);
    }

    public function update(Declaration $declaration,Request $request){
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
        $declaration->fill($request->all())->save();
        return redirect()->route('declarations.index');
    }
}
