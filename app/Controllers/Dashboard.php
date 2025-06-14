<?php
namespace App\Controllers;

use App\Models\VoteModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $voteModel = new VoteModel();
        $userId = session()->get('user_id');
        $voted = $voteModel->where('user_id', $userId)->first() ? true : false;
        return view('dashboard/index', ['voted' => $voted]);
    }
}