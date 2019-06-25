<?php

namespace App\Http\Controllers;

use App\Cart;

use App\User;
use App\Movie;
use App\Transaction;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add($id)
    {
        $movie = Movie::find($id);

        $peli = [
            'id' => $movie->id,
            'titulo' => $movie->title, 
            'precio' => 2.50
        ];

        session()->push('cart.movies', $peli);

        $limit = 15;
        $movies = Movie::make()->paginate($limit);

        return redirect('/movies');

    }

    public function remove($id, Request $request)
    {
        $movies = $request->session()->get('cart.movies');
        $keys = array_keys($movies);

        foreach($keys as $index) {
            if($movies[$index]['id'] == $id) {
                $request->session()->forget('cart.movies.' . $index);
            }
        }
        return redirect()->back();

    }
    
    public function flush(Request $request)
    {
        $request->session()->flush();
        return redirect('/movies');
    }

    public function checkout($id)
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = session('cart')['movies'];
        return view('cart.index')->with('movies', $movies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
