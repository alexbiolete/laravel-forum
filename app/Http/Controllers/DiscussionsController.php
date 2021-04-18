<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
Use App\Discussion;
use App\Reply;

class DiscussionsController extends Controller
{
    public function create()
    {
        return view('discussion.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'channel_id' => 'required',
            'title' => 'required',
            'content' => 'required'
        ]);

        $discussion = Discussion::create([
            'user_id' => Auth::id(),
            'channel_id' => $request->channel_id,
            'title' => $request->title,
            'content' => $request->content,
            'slug' => str_slug($request->title)
        ]);

        Session::flash('success', 'Discussion has been created.');

        return redirect()->route('discussion.show', ['slug' => $discussion->slug]);
    }

    public function show($slug)
    {
        $discussion = Discussion::where('slug', $slug)->first();
        
        $best_answer = $discussion->replies()->where('best_answer', 1)->first();

        return view('discussion.show')->with('discussion', $discussion)->with('best_answer', $best_answer);
    }

    public function edit($slug)
    {
        return view('discussion.edit', ['discussion' => Discussion::where('slug', $slug)->first()]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'content' => 'required'
        ]);

        $discussion = Discussion::find($id);
        $discussion->content = $request->content;

        $discussion->save();

        Session::flash('success', 'Discussion successfully edited.');

        return redirect()->route('discussion.show', ['slug' => $discussion->slug]);
    }

    public function reply(Request $request, $id)
    {
        $discussion = Discussion::find($id);
        
        $reply = Reply::create([
            'user_id' => Auth::id(),
            'discussion_id' => $id,
            'content' => $request->content
        ]);

        $reply->user->points += 25;
        $reply->user->save();

        Session::flash('success', 'Replied to discussion.');

        return redirect()->back();
    }
}
