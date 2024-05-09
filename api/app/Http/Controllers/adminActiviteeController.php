<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class adminActiviteeController extends Controller
{
    public function createActivitee(Request $request){
        $formFields = $request->validate([
            'titre' => ['required',Rule::unique('Activite','titre')],
            'Description'=>'required',
            'Lien_Youtube' => 'url',
            'Objectifs' => 'required',
            'Domaine' =>'required'
        ]);
        if($request->hasFile('IMAGE_PUB')){
            $formFields['IMAGE_PUB'] = $request->file('IMAGE_PUB')->store('IMAGE_PUBs','public');
        }
        Activites::create($formFields);
        return response()->json(['message'=>'the insertion was successful'],201);
    }

    public function updateActivitee(Request $request,Activite $activite){
        $formFields = $request->validate([
            'titre' => ['required',Rule::unique('Activite','titre')],

            'Description'=>'required',
            'Lien_Youtube' => 'url',
            'Objectifs' => 'required',
            'Domaine' =>'required'
        ]);
        if($request->hasFile('IMAGE_PUB')){
            $formFields['IMAGE_PUB'] = $request->file('IMAGE_PUB')->store('IMAGE_PUBs','public');
        }
        $activite->update($formFields);
        return response()->json(['message'=>'the update was successful'],200);
    }
    public function destroyActivitee(Activite $activite)
    {
        $activite->delete();
        return response()->json(['message'=>'the delete was successful'],200);
    }
}
