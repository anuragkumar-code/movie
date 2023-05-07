<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth;

class OmdbController extends Controller
{
    public function testapi(){        

        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        // CURLOPT_URL => 'http://www.omdbapi.com/?i=tt3896198&apikey=c2f31e93',
        // CURLOPT_RETURNTRANSFER => true,
        // CURLOPT_ENCODING => '',
        // CURLOPT_MAXREDIRS => 10,
        // CURLOPT_TIMEOUT => 0,
        // CURLOPT_FOLLOWLOCATION => true,
        // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        // CURLOPT_CUSTOMREQUEST => 'GET',
        // ));

        // $response = curl_exec($curl);

        // curl_close($curl);
        // // echo $response;
        // $responseArray = json_decode($response, true);

        // // echo "<pre>"; print_r($responseArray); exit;

        // return view ('welcome',compact('responseArray'));

        return redirect('sign-in');

    

    }

    public function dashboardView(){

        $random = array('tt0848228','tt3896198','tt0371746');

        $data = array();

        foreach ($random as $key => $value) {

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://www.omdbapi.com/?i='.$value.'&apikey=c2f31e93',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            ));
    
            $response = curl_exec($curl);
    
            curl_close($curl);
            // echo $response;
            $responseArray = json_decode($response, true);

            $data[] = array(
                'Title' => $responseArray['Title'],
                'Released' => $responseArray['Released'],
                'Poster' => $responseArray['Poster'],
                'Plot' => $responseArray['Plot'],
                'imdbRating' => $responseArray['imdbRating'],
            );

        }

        // echo "<pre>"; print_r($data); exit;


        return view('dashboard', compact('data'));
    }

    public function searchMovie(Request $request){

        $name = $request->search;
        $name = str_replace(" ", "%20", $name);

        $data = array();

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://www.omdbapi.com/?s='.$name.'&apikey=c2f31e93',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        
        curl_close($curl);
        // echo $response;
        $responseArray = json_decode($response, true);

            // echo "<pre>"; print_r($responseArray); exit;


        if($responseArray['Response'] == 'True'){


            $data = $responseArray['Search'];

            return view('search', compact('data'));


        }else{
            $name = $request->search;
            return view('error', compact('name'));
            exit;
        }
    }

    public function viewDetail($id){

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://www.omdbapi.com/?i='.base64_decode($id).'&apikey=c2f31e93',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;
        $responseArray = json_decode($response, true);

        // echo "<pre>"; print_r($responseArray); exit;

        return view('movie-details',compact('responseArray'));
    }


    public function setFav(Request $request){
        $id = $request->id;
        $status = $request->status;
        
        $favArr = array();

        $getFav = DB::table('favourites')->where('users_id', Auth::id())->get();

        foreach ($getFav as $key => $value) {
            $idF = $value->favourite_id;

            $favArr[] = array('id'=>$idF);
        }

        $idArray = array_column($favArr, 'id');

        
        if(in_array($id,$idArray)){
            echo "N"; exit;
        }else{
        
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://www.omdbapi.com/?i='.$id.'&apikey=c2f31e93',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $responseArray = json_decode($response, true);

            if($status == 'set'){
                DB::table('favourites')->insert([
                    'users_id' => Auth::id(),
                    'favourite_id' => $id,
                    'favourite_name' => $responseArray['Title'],
                    'favourite_poster' => $responseArray['Poster'],
                    'favourite_ratings' => $responseArray['imdbRating'],
                    'updated_at' => NOW(),
                    'created_at' => NOW(),
                ]);

                echo "Y"; exit;

            }
        }

        
    }

    public function favourite(){

        $getData = DB::table('favourites')->where('users_id',Auth::id())->get();

        // echo "<pre>"; print_r($getData); exit;
        return view('favourite', compact('getData'));
    }

    public function delete(Request $request){
        $id = $request->id;

        DB::table('favourites')->where('id', $id)->delete();

        exit;
    }
}
