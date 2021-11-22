<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    
    public function index(){

        $search = request('search');

        if ($search) $events = Event::where([
            ['title', 'like', "%$search%"]
        ])->get();
        else $events = Event::all();


        return view('home',  ['events' => $events, 'search' => $search]);
    }

    public static function error(){
        return redirect('/')->with('msg', 'ERRO DESCONHECIDO');
    }

    public function create(){
        return view('events.create');
    }

    public function edit($id){
        $user = auth()->user();

        $edit = Event::findOrFail($id);

        if ($user->id !== $edit->user_id)
            return $this->error();

        return view('events.edit', ['event' => $edit]);
    }

    public function update(Request $request){
        $update = Event::findOrFail($request->id);

        $event = $request->all();

        if ($request->hasFile('img') && $request->file('img')->isValid()) {

            $image = $request->img;
            $extension = $image->extension();
            $name =
            md5(rand(-9999, 9999) .
                $image->getClientOriginalName() .
                strtotime('now')) .".". $extension;

            $image->move(public_path("img/events"), $name);

            $event['img'] = $name;

        } else $event['img'] = 'festa.jpg';

        $update->update($event);

        return redirect('/dashboard')->with('msg', 'Editado com sucesso!');
    }

    public function delete($id){
        Event::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Evento deletado com sucesso!');
    }

    public function join($id){
        $user = auth()->user();

        $event = Event::findOrFail($id);

        foreach ($event->users as $user_)
            if ($user->id == $user_->id)
                return redirect("/events/$id")
                ->with('msg', 'Você já confirmou presença neste evento!');

        $user->eventsAsParticipant()->attach($event->id);

        return redirect("/events/$id")->with('msg', 'Presença confirmada! Não se esqueça! '.
        'Data do evento: '.date('d/m/Y', strtotime($event->date)));
    }

    public function leave($id){

        $user = auth()->user();

        $event = Event::findOrFail($id);

        $user->eventsAsParticipant()->detach($id);

        return redirect('/dashboard')->with('msg', 'Presença removida com sucesso!');
    }

    public function show($id){
        $event = Event::findOrFail($id);

        $owner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 'owner' => $owner]);
    }

    public function store(Request $request){
        $event = new Event;

        try {
            $event->title = $request->title;
            $event->city = $request->city;
            $event->description = $request->description;
            $event->private = $request->private == '1' ? 0 : 1;
            $event->date = $request->date;
            $event->items = $request->items;

            $user = auth()->user();
            $event->user_id = $user->id;

            if ($request->hasFile('img') && $request->file('img')->isValid()) {

                $image = $request->img;
                $extension = $image->extension();
                $name =
                md5(rand(-9999, 9999) .
                    $image->getClientOriginalName() .
                    strtotime('now')) .".". $extension;

                $image->move(public_path("img/events"), $name);

                $event->img = $name;

            } else $event->img = 'festa.jpg';

            $event->save();

            return redirect('/')->with('msg', 'Evento criado com sucesso!');
        } catch (\Throwable $th) {
            return redirect('/events/create')->with('msg', 'Erro: todos os campos devem ser preenchidos!');
        }
    }

    public function dashboard(){
        $user = auth()->user();

        $events = Event::where('user_id', $user->id)->get();

        return view('/events/dashboard', [
            'events' => $events,
            'user' => $user,
            'eventsAsParticipant' => $user->eventsAsParticipant()->get(),
        ]);
    }

}
