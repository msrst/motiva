<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function update(User $user)
    {
        $validated = request()->validate([
            'hair_id' => 'sometimes|integer',
            'face_id' => 'sometimes|integer',
            'body_id' => 'sometimes|integer',
            'legs_id' => 'sometimes|integer',
            'accessory_id' => 'sometimes|integer',
        ]);

        $user->update($validated);

        return response()->json($user);
    }
}
