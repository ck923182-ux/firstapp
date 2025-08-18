<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkillsController extends Controller
{

    public function skills(){

        $skill = ['php','wprdpress','js','larawl','css'];

return view("skills",["skillkey"=>$skill]);
    }
 
}
