<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeclareController extends Controller
{
    public function showDeclaration(){
        $declarations = [
            (object)[
                'id' => 1,
                'title' => 'ここに宣言する',
                'created_at' => now(),
                'user' => (object)[
                    'id' => 1,
                    'name' => 'taku',
                ],
            ],
        ];
        return view('declare.index',['declarations' => $declarations]);
    }
}
