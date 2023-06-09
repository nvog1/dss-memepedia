@extends('layouts.master')
@section('title', 'Admin | Memepedia')

@section('head')
<link rel="stylesheet" href="{{URL('css/admin.css')}}">
@endsection

@section('content')
@parent
<h1 class="admin-panel-title">Panel de Administración</h1>
<div class="admin-panel-items">
  <a class="admin-panel-item" href="{{route('admin.users')}}">
    Usuarios
  </a>
  <a class="admin-panel-item" href="{{route('admin.memes')}}">
    Memes
  </a>
  <a class="admin-panel-item" href="{{route('admin.evaluations')}}">
    Evaluations
  </a>
  <a class="admin-panel-item" href="{{route('admin.tags')}}">
    Tags
  </a>
  <a class="admin-panel-item" href="{{route('admin.news')}}">
    News
  </a>
  <a class="admin-panel-item" href="{{route('admin.tierLists')}}">
    Tier Lists
  </a>
</div>
@endsection