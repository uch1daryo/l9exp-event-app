<?php

namespace App\Http\Controllers;

use App\Mail\EventRegistered;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('events.index');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $users = User::select('id', 'name')->get()->toArray();
        $period = [
            'start' => str_replace('T', ' ', $request->start),
            'end' => str_replace('T', ' ', $request->end),
        ];
        return view('events.create', compact('users', 'period'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event;
        $event->user_id = $request->input('user_id');
        $event->start_at = $request->input('start_at');
        $event->end_at = $request->input('end_at');
        $str = $request->input('user_id') . $request->input('start_at') . $request->input('end_at');
        $event->cancel_code = hash('sha256', $str);
        $event->save();

        Mail::to($event->user->email)->send(new EventRegistered($event));

        return redirect('events')->with(
            'status',
            '登録が完了しました'
        );
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $event->user_id = $request->input('user_id');
        $event->start_at = $request->input('start_at');
        $event->end_at = $request->input('end_at');
        $event->save();
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
    }
}
