<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class VerifyController extends Controller
{
    public function index(Request $request)
    {
        $valid = true;

        try {
            $this->validate($request, [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        } catch (ValidationException $e) {
            $valid = false;
        }

        return response()->json([
            'valid' => $valid
        ]);
    }
}
