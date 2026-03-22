<?php

namespace App\Http\Controllers;

use App\Models\Guarantee;
use Illuminate\Http\Request;

class GuaranteeController extends Controller
{
    public function index()
    {
        $guarantees = Guarantee::orderBy('created_at', 'desc')->get();

        $headingTitle = heading('Yêu cầu bảo hành');
        $pageTitle = 'Yêu cầu bảo hành';

        return view('admin.pages.guarantee.index',
            compact('headingTitle', 'pageTitle', 'guarantees')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guarantee  $guarantee
     * @return \Illuminate\Http\Response
     */
    public function show(Guarantee $guarantee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guarantee  $guarantee
     * @return \Illuminate\Http\Response
     */
    public function edit(Guarantee $guarantee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guarantee  $guarantee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guarantee $guarantee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guarantee  $guarantee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guarantee $guarantee)
    {
        //
    }
}
