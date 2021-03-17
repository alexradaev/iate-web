<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestModel;

class TestController extends Controller
{
    public function  getModels(){
        //TestModel::create(['name' => 'QQQ']);
        $models = TestModel::all();
        $model = TestModel::where(['name' => 'Test'])->first();
        dd($model->name);
    }
}
