<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Request;

class FriendshipController extends Controller
{
    public function index(Request $request)
    {
        $friendships = $request->user()->friends();

        $friends = $friendships->select(['id', 'name']);

        return Inertia::render('friends', [
            'friends' => $friends,
        ]);
    }
}
