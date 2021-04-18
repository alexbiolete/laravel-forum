<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Auth;
use App\Discussion;
use App\Channel;

class ForumsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $discussions = Discussion::orderBy('created_at', 'desc')->paginate(3);

        switch(request('filter')) {
            case 'me':
                $results = Discussion::where('user_id', Auth::id())->paginate(3);
                break;
            case 'solved':
                $answered = array();
                foreach (Discussion::all() as $discussion) {
                    if ($discussion->hasBestAnswer()) {
                        array_push($answered, $discussion);
                    }
                }
                $results = new Paginator($answered, 3);
                break;
            case 'unsolved':
                $unanswered = array();
                foreach (Discussion::all() as $discussion) {
                    if (!$discussion->hasBestAnswer()) {
                        array_push($unanswered, $discussion);
                    }
                }
                $results = new Paginator($unanswered, 3);
                break;
            default:
                $results = Discussion::orderBy('created_at', 'desc')->paginate(3);
                break;
        }

        return view('forum', ['discussions' => $results]);
    }
}
