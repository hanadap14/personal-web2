<?php

namespace App\Http\Controllers;

use App\Models\Portfolio as ModelsPortfolio;
use App\Models\Category as ModelsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

class Portfolio extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = ModelsPortfolio::get();
        return view('portfolio.index',[
            'portfolios' => $portfolios
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ModelsCategory::get();
        return view('portfolio.create',['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        if( $path = $r->file('photo')->store('/',['disk' => 'portfolio_upload']) ) {
            $data = [
                'category_id' => $r->category,
                'photo' => $path,
                'title' => $r->title,
                'year' => $r->year
            ];

            ModelsPortfolio::create($data);

            return redirect('admin/portfolio')->with([
                'status' => 'success',
                'message' => $r->title.' has been added'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $port = ModelsPortfolio::find($id);

        return view('portfolio.image',[
            'port' => $port
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $port = ModelsPortfolio::find($id);
        $categories = ModelsCategory::get();
        return view('portfolio.edit',[
            'port' => $port,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, string $id)
    {
        $port = ModelsPortfolio::find($id);

        $port->category_id = $r->category;
        $port->title = $r->title;
        $port->year = $r->year;

        $port->save();

        return redirect('admin/portfolio')->with([
            'status' => 'success',
            'message' => $port->title.' has ben updated'
        ]);
    }

    public function changeimage(Request $r, string $id)
    {
        $port = ModelsPortfolio::find($id);

        if($port->photo != "") {
            if(File::delete('assets/portfolio/'.$port->photo)) {
                
                if( $path = $r->file('photo')->store('/',['disk' => 'portfolio_upload']) ) {
                    
                    $port->photo = $path;
                    $port->save();

                    return redirect('admin/portfolio')->with([
                        'status' => 'success',
                        'message' => $port->title.' has ben deleted'
                    ]);
                }
            }
        } else {
            if( $path = $r->file('photo')->store('/',['disk' => 'portfolio_upload']) ) {
                    
                $port->photo = $path;
                $port->save();

                return redirect('admin/portfolio')->with([
                    'status' => 'success',
                    'message' => $port->title.' has ben deleted'
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $portfolio = ModelsPortfolio::find($id);
        if(File::delete('assets/portfolio/'.$portfolio->photo)) {
            $portfolio->delete();

            return redirect('admin/portfolio')->with([
                'status' => 'success',
                'message' => $portfolio->title.' has ben deleted'
            ]);
        }
    }
}
