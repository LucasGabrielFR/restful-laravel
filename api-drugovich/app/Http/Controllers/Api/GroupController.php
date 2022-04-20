<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    private $group;
    private $loggedUser;

    public function __construct(Group $group)
    {
        $this->loggedUser = Auth::user();
        $this->group = $group;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->group->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->loggedUser->level == 2){
            return $this->group->create($request->all());
        }else{
            return response()->json(['error' => 'You are not authorized to create groups'], 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return $group->with('clients')->find($group->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        if($this->loggedUser->level == 2){
            $group->update($request->all());
            return response()->json($group, 200);
        }else{
            return response()->json(['error' => 'You are not authorized to update groups'], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        if($this->loggedUser->level == 2){
            if ($group != null) {
                $clients = $group->clients;
                foreach ($clients as $client) {
                    $client->group_id = null;
                    $client->save();
                }
                $group->delete();
                return response()->json(['message' => 'Group deleted']);
            }else{
                return response()->json(['message' => 'Group not found']);
            }
        }else{
            return response()->json(['message' => 'You are not authorized to delete groups']);
        }
        
    }
}
