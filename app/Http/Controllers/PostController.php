<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->post->orderBy('title', 'DESC')->paginate(5);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

        $data = $request->all();
        $post = $this->post->create($data);
        flash('Post criado com sucesso')->success();
        return redirect()->route('posts.index');
        }
        catch(\Exception $e)
        {
            if(env('APP_DEBUG')){
                //retorna a mensagem do erro real
                flash($e->getMessage())->warning();
                return redirect()->back();
            }
            //retorna a mensagem de erro padrao
            flash('Post não foi criado com sucesso');
            return redirect()->back();
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            
        $post = $this->post->findOrFail($id);

        return view('posts.edit', compact('post'));
        }
        catch(\Exception $e) 
        {
            if(env('APP_DEBUG')){
                //retorna a mensagem do erro real
                flash($e->getMessage())->warning();
                return redirect()->back();
            }
            //retorna a mensagem de erro padrao
            flash('Post não encontrado...')->warning();
            return redirect()->back();
       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        try{

            $data = $request->all();

            $post = $this->post->findOrFail($id);
            $post->update($data);
            flash('Post Atualizado com Sucesso')->success();
            return redirect()->route('posts.index');
        }
        catch(\Exception $e) 
        {
            if(env('APP_DEBUG')){
                //retorna a mensagem do erro real
                flash($e->getMessage())->warning();
                return redirect()->back();
            }
            //retorna a mensagem de erro padrao
            flash('Post não foi atualizado...')->warning();
            return redirect()->back();
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       try{

        $post = $this->post->findOrFail($id);
        $post->delete();
        flash('Post removido com Sucesso')->success();
        return redirect()->route('posts.index');
       
        } 
        catch(\Exception $e) 
        {
            if(env('APP_DEBUG')){
                //retorna a mensagem do erro real
                flash($e->getMessage())->warning();
                return redirect()->back();
            }
            //retorna a mensagem de erro padrao
            flash('Post não pode ser removido')->warning();
            return redirect()->back();
       }
    }
}
