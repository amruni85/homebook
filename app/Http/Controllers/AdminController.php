<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homebook;

class AdminController extends Controller
{
    public function index(){
        //$homebooks = Homebook::all();
        $homebooks = Homebook::paginate(10);
        return view('admin.index')->with(compact('homebooks'));
    }

    public function show(Homebook $homebook){
        return view('admin.show', compact('homebook'));
    }

    public function delete(Homebook $homebook){
        if ($homebook->attachment != null){
            Storage::disk('public')->delete($homebook->attachment);
        }
        
        $homebook->delete();
        return redirect()
            ->route('admin:index')
            ->with([
                'alert-type' => 'alert-danger',
                'alert' => 'Booking has been deleted.'
            ]);
    }
}
