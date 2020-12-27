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
            ->back()
            ->with(['alert' => 'Your booking has been successfully submitted. Thanks for choosing Abe Nor Homestay. See you soon!']);
    }

    public function show(Homebook $homebook){
        return view('homebook.show', compact('homebook'));
    }

}
