<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Models\Homebook;

class HomebookController extends Controller
{

    public function index(){
        $homebooks = Homebook::all();
        return view('homebook.index')->with(compact('homebooks'));
    }

    public function create(){
        return view('homebook.create');
    }

    public function store(Request $request){
        $homebook = new Homebook();
        $homebook->checkin = $request->get('checkin');
        $homebook->checkout = $request->get('checkout');
        $homebook->adult = $request->get('adult');
        $homebook->child = $request->get('child');
        $homebook->infant = $request->get('infant');
        $homebook->notes = $request->get('notes');
        $homebook->user_id = Auth::id();
        $homebook->save();

        if($request->hasFile('attachment')){
            $filename = $homebook->id.'-'.date("Y-m-d").'.'.$request->attachment->getClientOriginalExtension();
            Storage::disk('public')->put($filename, File::get($request->attachment));
            $homebook->update(['attachment'=>$filename]);
        }

        return redirect()
            ->route('homebook:index')
            ->with([
                'alert-type' => 'alert-success',
                'alert' => 'Your booking has been saved. Thank you for choosing Abe Nor Homestay. Seen you soon!'
            ]);
    }

    public function show(Homebook $homebook){
        return view('homebook.show', compact('homebook'));
    }

    public function edit(Homebook $homebook){
        return view('homebook.edit', compact('homebook'));
    }

    public function update(Homebook $homebook, Request $request){
        $homebook->update($request->only('notes', 'attachment'));

        if($request->hasFile('attachment')){
            $filename = $homebook->id.'-'.date("Y-m-d").'.'.$request->attachment->getClientOriginalExtension();
            Storage::disk('public')->put($filename, File::get($request->attachment));
            $homebook->update(['attachment'=>$filename]);
        }

        return redirect()
            ->route('homebook:index')
            ->with([
                'alert-type' => 'alert-primary',
                'alert' => 'Your booking has been updated.'
            ]);
    }

    public function delete(Homebook $homebook){
        
        if ($homebook->attachment != null){
            Storage::disk('public')->delete($homebook->attachment);
        }
        
        $homebook->delete();
        return redirect()
            ->route('homebook:index')
            ->with([
                'alert-type' => 'alert-danger',
                'alert' => 'Your booking has been cancelled.'
            ]);
    }

}
