<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Requests\EventStoreRequest;
use App\Http\Requests\EventUpdateRequest;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $buscar = $request->buscar;
            $criterio = $request->criterio;
            if ($buscar==''){
        $events =Event::orderBy('name','ASC')->paginate(20);
        return view('admin.events.index', compact('events'));
            }
            else
            {
                $events =Event::orderBy('name','ASC')
                ->where($criterio, 'like', '%'. $buscar . '%')
                ->paginate(20);
                return view('admin.events.index', compact('events'));
            }
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::orderBy('name', 'ASC')->pluck('name', 'id');
        $tags       = Tag::orderBy('name', 'ASC')->get();
        return view('admin.events.create', compact('events', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = Event::create($request->all());
        if($request->file('image')){
            $path = Storage::disk('public')->put('image',  $request->file('image'));
            $event->fill(['file' => asset($path)])->save();
        }
        return redirect()->route('events.edit', $event->id)
        ->with('info', 'Event agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        return view('admin.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $event->fill($request->all())->save();
        if($request->file('image')){
            $path = Storage::disk('public')->put('image',  $request->file('image'));
            $event->fill(['file' => asset($path)])->save();
        }   
        return redirect()->route('.events.edit', 
        $event->id)->with('info', 'Info de event actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id)->delete();

        return back()->with('info', 'Eliminado correctamente');
    }
}
