<?php

namespace Modules\Dashboard\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\System\Services\UsaepayClient;

class DashboardController extends Controller
{

    /**
     * SoapController constructor.
     *
     */
    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        /*$sourcekey = 'P3S5245eIt0WWa4ECr5X8GaN1IBKsMZ6';
        $sourcepin = '1234';
        $sandbox = true;
        $options = [
            'debug' => true,
        ];

        $usaepay = new UsaepayClient($sourcekey, $sourcepin, $sandbox, $options);

        $Request=array(
            'AccountHolder' => 'Tester Jones',
            'Details' => array(
                'Description' => 'Example Transaction',
                'Amount' => '4.00',
                'Invoice' => '44539'
            ),
            'CreditCardData' => array(
                'CardNumber' => '4444555566667779',
                'CardExpiration' => '0919',
                'AvsStreet' => '1234 Main Street',
                'AvsZip' => '99281',
                'CardCode' => '999'
            )
        );

        $res = $usaepay->runCredit($Request);
        dd($res);*/
        return view('dashboard::admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('dashboard::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('dashboard::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
