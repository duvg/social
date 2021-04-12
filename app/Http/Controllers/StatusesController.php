<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class StatusesController extends Controller
{
    public function store(): JsonResponse
    {
        request()->validate(['body' => 'required|min:5']);

        $status = Status::create([
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);

        return response()->json(['body' => $status->body]);
    }
}
