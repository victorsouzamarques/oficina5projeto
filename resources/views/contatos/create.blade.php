@extends('layouts.app')
@section('content')
<section id="criar-form">
<h1>Adicionar novo contato</h1>
<hr>
<form action="/contatos" id="formulario-criar" class="form-horizontal col-md-4 text-md-center" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="form-group col-md-12">
<input type="hidden" class="form-control" id="contatosNome" name="usuario" value="{{\Auth::user()->id}}">
</div>
<div class="form-group col-md-12">
<label for="image">Foto</label>
<input type="file" class="form-control" id="contatosImage"  name="image">
</div>
<div class="form-group col-md-12">
<label for="nome">Nome</label>
<input type="text" class="form-control" id="contatosNome" name="nome">
</div>
<div class="form-group col-md-12">
<label for="email">Email</label>
<input type="email" class="form-control" id="contatosEmail" name="email">
</div>
<div class="form-group col-md-12">
<label for="telefone">Telefone</label>
<input type="text" class="form-control" maxlength="15" id="telefone" name="telefone">
</div>
<div class="form-group col-md-12">
<label for="nascimento">Aniversário</label>
<input type="date" class="form-control" id="contatosNascimento" name="nascimento">
</div>
@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<button type="submit" class="btn btn-primary">Adicionar</button>
</form>
</section>
@endsection
