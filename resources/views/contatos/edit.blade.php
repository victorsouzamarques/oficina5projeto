@extends('layouts.app')
@section('content')
<section id="editar-pagina">
<h1>Editar Contato</h1>
<hr>
<form action="{{url('contatos', [$contato->id])}}" id="formulario-criar" class="form-horizontal col-md-4 text-md-center" method="POST" enctype="multipart/form-data">
<input type="hidden" name="_method" value="PUT">
{{ csrf_field() }}
<!-- <div class="form-group col-md-12">
<label for="title">Foto</label>
<input type="file" value="{{$contato->image}}" class="form-control" id="contatosImage"  name="image">
</div> -->
<div class="form-group col-md-12">
<label for="description">Nome</label>
<input type="text" value="{{$contato->nome}}" class="form-control" id="contatosNome" name="nome">
</div>
<div class="form-group col-md-12">
<label for="description">Email</label>
<input type="email" value="{{$contato->email}}" class="form-control" id="contatosEmail" name="email">
</div>
<div class="form-group col-md-12">
<label for="description">Telefone</label>
<input type="text" value="{{$contato->telefone}}" class="form-control" id="contatosTelefone" name="telefone">
</div>
<div class="form-group col-md-12">
<label for="description">Aniversário</label>
<input type="date" value="{{$contato->nascimento}}" class="form-control" id="contatosNascimento" name="nascimento">
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
<button type="submit" class="btn btn-primary">Alterar</button>
</form>
</section>
@endsection
