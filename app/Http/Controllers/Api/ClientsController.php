<?php

namespace App\Http\Controllers\Api;

use App\Models\Clients;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClientsResource;
// use Dotenv\Validator;
use Illuminate\Support\Facades\Validator;


class ClientsController extends Controller
{
    public function index(){

        // Example: Paginate with 10 clients per page
        // $clients = Clients::paginate(10);
        $clients=Clients::get();

        if($clients->count()>0){

            return ClientsResource::collection($clients);
        }else{
            return response()->json(['message'=> 'No record available'],200);
        }
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'fullName' => 'required|string|max:255',
            'address' => 'required',
            'mobileNumber' => 'required|string',
            'email' => 'required|string',
            'nic' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json([
                'message'=>'All Fields are mandentory',
                'error'=>$validator->messages(),

            ], 422);
        }
        
        $clients = Clients::create([
            'fullName' => $request->fullName,
            'address' => $request->address,
            'mobileNumber' => $request->mobileNumber,
            'email' => $request->email,
            'nic' => $request->nic,
        ]);
        return response()->json([
            'message'=>'Client Added Succcessfully',
            'data' =>new ClientsResource($clients)
        ], 200);
        
    }


// check for the this method, it might have some issues
    public function show(Clients $client){
        return new ClientsResource($client);
    }


    public function update(Request $request, Clients $client){
        $validator = Validator::make($request->all(),[
            'fullName' => 'required|string|max:255',
            'address' => 'required',
            'mobileNumber' => 'required|string',
            'email' => 'required|string',
            'nic' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json([
                'message'=>'All Fields are mandentory',
                'error'=>$validator->messages(),

            ], 422);
        }
        
        $client->update([
            'fullName' => $request->fullName,
            'address' => $request->address,
            'mobileNumber' => $request->mobileNumber,
            'email' => $request->email,
            'nic' => $request->nic,
        ]);
        return response()->json([
            'message'=>'Client updated Succcessfully',
            'data' =>new ClientsResource($client)
        ], 200);



    }

    
// ++++++++++++++++++++++++++++++++++++++++
    //please watch the error handling on the video++++++++++++++++++++
    public function destroy(Clients $client){
        $client->delete();
        return response()->json([
            'message'=>'Client Deleted Succcessfully',
        ], 200);
    }


}
