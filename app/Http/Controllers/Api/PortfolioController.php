<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Database\Eloquent\Builder;


class PortfolioController extends Controller
{
    public function index (){
        $portfolios = Portfolio::with('type', 'technologies')->paginate(10);

        return response()->json($portfolios);
}
    public function getDetail ($slug){
        $portfolios = Portfolio::where('slug', $slug)->with('type', 'technologies')->first();

        return response()->json($portfolios);
}
    public function get_by_type ($id){
        $portfolios = Portfolio::where('type_id', $id)->with('type', 'technologies')->paginate(10);

        return response()->json($portfolios);
}
    public function get_by_tech ($id){
        $portfolios = Portfolio::with('type', 'technologies')
                    ->whereHas('technologies', function(Builder $query) use($id){
                        $query->where('technology_id',$id);
                    })->paginate(10);

        return response()->json($portfolios);
}

    public function type (){
        $type = Type::all();

        return response()->json($type);
}
    public function tech (){
        $technologies = Technology::all();

        return response()->json($technologies);
}

}
