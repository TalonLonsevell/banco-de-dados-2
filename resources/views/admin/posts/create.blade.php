@extends('admin.layouts.app')

@section('title', 'Cadastro de Posts')

@section('content')

<h1>Cadastrar Novo Post</h1>

<form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
  @include('admin.posts._partials.form')
</form>

@endsection