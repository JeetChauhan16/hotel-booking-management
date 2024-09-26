<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    
    public function index(Request $request)
    {
        
        return view('hotels/hotel-list');
    }

    public function getHotelData(Request $request)
    {
       
        $columns = ['id', 'name', 'location', 'created_at', 'updated_at'];

        $length = $request->input('length');
        $column = $request->input('column'); // Index
        $dir = $request->input('dir');
        $searchValue = $request->input('search');

        $query = Hotel::select($columns)
            ->when($searchValue, function ($query, $searchValue) {
                return $query->where('name', 'like', '%' . $searchValue . '%')
                    ->orWhere('location', 'like', '%' . $searchValue . '%');
            });

        $total = $query->count();

        $hotels = $query->orderBy($columns[$column], $dir)
            ->offset($request->input('start'))
            ->limit($length)
            ->get();

        $data = [];
        foreach ($hotels as $hotel) {
            $data[] = [
                'id' => $hotel->id,
                'name' => $hotel->name,
                'location' => $hotel->location,
                'action' => "<a class='btn btn-info btn-sm' href='hotels/$hotel->id'> View </a>
				"
            ];
        }

        return response()->json([
            'data' => $data,
            'draw' => $request->input('draw'),
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
        ]);

    }

    
    public function show($id)
    {
        $hotel = Hotel::with('rooms')->findOrFail($id);
        return view('hotels.show', compact('hotel'));
    }
}

