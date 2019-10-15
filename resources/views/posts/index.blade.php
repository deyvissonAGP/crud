@extends('layouts.app')

@section('content')
    <div class="col-12">
        <a href="{{route('posts.create')}}" class="btn btn-lg btn-success">Criar Postagem</a>
    </div>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Titulo</th>
                <th>Criado em</th>
                <th>Atualizado em</th>
                <th>Opções</th>                
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>
                    <a href="{{route('posts.show', ['post' => $post->id])}}">
                    {{$post->title}}
                    </a>
                </td>
                <td>
                {{$post->created_at}}
                </td>
                <td>
                {{$post->updated_at}}
                </td>
                <td>
                <a href="{{route('posts.show', ['post' => $post->id])}}"> <button type="submit" class="btn btn-lg btn-success">Editar</button>
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
@endsection