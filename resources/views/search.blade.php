@extends('layouts.master')
@section('title', 'Search')

@section('head')
<link rel="stylesheet" href="{{URL('css/search.css')}}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
@parent
<div class="search-container">
  <form action="">
    <input class="search-input" type="text" placeholder="Busqueda ..." name="q" id="q" value="{{$q}}">

    <select name="filter" class="search-options">
      <option value="">Sin filtrado</option>
      <option value="name" {{$filter == 'name' ? 'selected' : null}}>Filtrar por nombre</option>
      <option value="description" {{$filter == 'description' ? 'selected' : null}}>Filtrar por descripción</option>
      <option value="author" {{$filter == 'author' ? 'selected' : null}}>Filtrar por autor</option>
      <option value="tags" {{$filter == 'tags' ? 'selected' : null}}>Filtrar por tags</option>
    </select>

    <select name="sort" class="search-options">
      <option value="new" {{$sort == 'new' ? 'selected' : null}}>Mas nuevos primero</option>
      <option value="old" {{$sort == 'old' ? 'selected' : null}}>Mas viejos primero</option>
      <option value="long" {{$sort == 'long' ? 'selected' : null}}>Mas largos primero</option>
      <option value="short" {{$sort == 'short' ? 'selected' : null}}>Mas cortos primero</option>
      <option value="alphabetical" {{$sort == 'alphabetical' ? 'selected' : null}}>Ordenar alfabeticamente</option>
    </select>

    <button type="submit"><i class="fa fa-search"></i></button>
  </form>
</div>

@if( count($memes) <= 0 )
  <div class="no-search-results">
    <h2>No se ha encontrado ningún meme con esos parametros de busqueda :(</h2>
    <img src="{{URL('/images/crying-cat-meme.gif')}}">
  </div>
@else 
  <div class="search-results">
    @foreach ($memes as $meme)
      <div class="meme-result">

        <div class="meme-flex-container">
          <div class="meme-flex-item meme-left-container">
            <img src="{{asset('storage/memes/'.(string)$meme->id)}}" class="meme-photo">
            
            <div class="like-count">{{count($meme->likes)}} 👍</div>

            <span>Tags:</tags>
            <div class="tags-container">
              @foreach ($meme->tags as $tag) 
                <strong><a class="tag-element" href="{{route('search', ['q' => $tag->name])}}">{{$tag->name}}</a></strong>
              @endforeach
            </div>

            <span>Author:</span>
            <strong><a class="tag-element" href="{{route('user.show', ['username' => $meme->author->username])}}">{{$meme->author->username}}</a></strong>
          </div>

          <div class="meme-flex-item meme-right-container">
            <a class="meme-title" href="{{route('meme.show', ['memeId' => $meme->id])}}">
              <h2 class="meme-title">{{$meme->name}}</h2>
            </a>
            <p class="meme-description">{{$meme->description}}</p>
          </div>
          
        </div>
      </div>
    @endforeach
  </div>
  
  <!-- Pagination -->
  <p class="pages">
    Páginas:
    @for ($i = 1; $i <= ceil($totalLength/$limit); $i++)
      <a class="{{ $i == $page ? 'selected-page' : null}}"href="{{route('search', ['q' => $q, 'filter' => $filter, 'sort' => $sort, 'l' => $limit, 'p' => $i])}}">{{ $i }}</a>
    @endfor
  </p>
@endif
@endsection