@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Titulo</th>
                <th>Criado em</th>
                <th>Atualizado em</th>
<<<<<<< HEAD
                <th>Ação</th>
=======
                <th>Opções</th>                
>>>>>>> 253eb80fd805a93f8d6022ac9202a3f5637b21a6
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
            <tr>
                <td>
                    {{$post->id}}
                </td>
                <td>
                    <a href="{{route('posts.show', ['post' => $post->id])}}">
                    {{$post->title}}
                    </a>
                </td>
                <td>
<<<<<<< HEAD
                    {{$post->created_at}}
                </td>
                <td>
                    {{$post->updated_at}}                
                </td>
                <td>
                <a href="{{route('posts.show', ['post' => $post->id])}}"><button type="submit" class="btn btn-lg btn-success">Atualizar</button>
=======
                {{$post->created_at}}
                </td>
                <td>
                {{$post->updated_at}}
                </td>
                <td>
                <a href="{{route('posts.show', ['post' => $post->id])}}"> <button type="submit" class="btn btn-lg btn-success">Editar</button>
>>>>>>> 253eb80fd805a93f8d6022ac9202a3f5637b21a6
                <button type="submit" class="btn btn-lg btn-danger">Apagar</button>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="3">
                        <h2>Nenhum Post encontrado!</h2>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{$posts->links()}}
    <hr>
    <div class="col-12">
        <a href="{{route('posts.create')}}" class="btn btn-lg btn-success">Criar Postagem</a>
    </div>
    <br>
@endsection