<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SupportResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\SupportService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{

     /**
     * Display a listing of the resource.
     */
    public function index(Request $request, User $user)
    {
        $users = $user->all();

        return $users;
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request, User $user)
    // {
    //     $user = $user->created($request)

    //     return new SupportResource($support);
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     if(!$support = $this->service->findOne($id)){
    //         return response()->json([
    //             'error' => "Not Found"
    //         ], Response::HTTP_NOT_FOUND);
    //     }

    //     return new SupportResource($support);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(StoreUpdateSupport $request, string $id)
    // {
    //     $support = $this->service->update(
    //         UpdateSupportDTO::makeFromRequest($request, $id)
    //     );

    //     if(!$support) {
    //         return response()->json([
    //             'error' => "Not Found"
    //         ], Response::HTTP_NOT_FOUND);
    //     }

    //     return new SupportResource($support);

    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
    //     if(!$this->service->findOne($id)){
    //         return response()->json([
    //             'error' => "Not Found"
    //         ], Response::HTTP_NOT_FOUND);
    //     }

    //     $this->service->delete($id);

    //     return response()->json([], Response::HTTP_NO_CONTENT);
    // }
}
