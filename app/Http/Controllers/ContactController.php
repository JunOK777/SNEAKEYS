<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
  // コンタクトページへ飛ぶ
    public function contact()
    {   
      return view('contact');
    }
  // レポートページへ飛ぶ
    public function report()
    {   
      return view('report');
    }
}
