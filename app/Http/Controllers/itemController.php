<?php

namespace App\Http\Controllers;

use App\Models\item;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class itemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return item::orderBy('created_at', 'DESC')->get();
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
        $item = new item();
        $item->name = $request->name;
        $item->save();
        return $item;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existedItem = Item::find($id);

        if ($existedItem) {
            $existedItem->completed = $request->item['completed'] ? true : false;
            $existedItem->completed_at = $request->item['completed'] ? Carbon::now() : null;
            $existedItem->save();
            return $existedItem;
        }

        return 'Item Not Found';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existedItem = Item::find($id);

        if ($existedItem) {
            $existedItem->delete();
            return 'Item Deleted';
        }

        return 'Item Not Found';
    }



    // public function task(Request $request)
    // {
    //     $array = array();
    //     //getting all data
    //     for ($i = 1; $i <= 10; $i++) {
    //         $response = Http::get('https://jsonmock.hackerrank.com/api/medical_records?page=' . $i);
    //         foreach (collect($response->json()['data']) as $data) {
    //             array_push($array, $data);
    //         }
    //     }
    //     //filter data
    //     $filtered = collect($array);
    //     $filtered = $filtered->where('doctor.name', $request->item['doctorName']);
    //     $filtered = $filtered->where('diagnosis.id', $request->item['diagnosisId']);
    //     // get temp array
    //     $dist  = array_column(
    //         array_column($filtered->values()->all(), 'vitals'),
    //         'bodyTemperature', 
    //     );
    //     //get min and max
    //     $max= floor(max($dist));
    //     $min= floor(min($dist));

    //     return array('min'=>$min,'max'=>$max);
    // }


}
