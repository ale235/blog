<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller {

    /**
     * 
     *
     */
    public function vote(Request $request) {
        if (!Auth::check()){ 
            return response()->json([
                'success' => false,
                'type' => 'error',
                'msg'  => 'You must be loged to do this action!'
            ], 200);
        }
        
        if(empty($request['response'])){
            return response()->json([
                'success' => false,
                'type' => 'warning',
                'msg'  => 'You must select 1 option please!'
            ], 200);
        }
        
        $response_id = @$request['response'][0];
        $users_id = Auth::id();
        
        
        $response = DB::table('response')->where('response_id', $response_id)->first();
        
        $is_vote = DB::table('view_users_survey')->where('users_id', $users_id)
                                           ->where('survey_id', $response->survey_id)
                                           ->first();
                                   //print_r($is_vote);
        
        if(!empty($is_vote)){
            return response()->json([
                'success' => false,
                'type' => 'error',
                'msg'  => 'You already voted for this survey!'
            ], 200);
        }
         
        DB::table('users_survey')->insert([
            'users_id' => $users_id,
            'response_id' => $response_id 
        ]);
        
        return response()->json([
            'success' => true,
            'type' => 'success',
            'msg'  => 'Thank you for yout vote :)'
        ], 200);
        
    }
    
}
