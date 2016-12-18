<?php

namespace Modules\News\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('news::index');
    }

    public function search(Request $request)
    {
        $data = [];
        dd($request->all());
        return response()->json(['errors' => true, 'data' => $data]);
    }

}
