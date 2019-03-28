<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class PersonController extends Controller
{
    public function storeItem(Request $request) 
    {
		$data = new Person ();

		$data->name = $request->name;
		$data->age = $request->age;
		$data->profession = $request->profession;

		$data->save ();

		return $data;
	}

	public function readItems() 
	{
		$data = Person::all ();
		return $data;
	}

	public function deleteItem(Request $request) 
	{
		$data = Person::find ( $request->id )->delete ();
	}

	public function editItem(Request $request, $id)
	{
		$data =Person::where('id', $id)->first();

		$data->name = $request->get('p_name');
		$data->age = $request->get('p_age');
		$data->profession = $request->get('p_profession');

		$data->save();

		return $data;
	}
}
