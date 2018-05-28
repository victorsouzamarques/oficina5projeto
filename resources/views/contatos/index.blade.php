@extends('layouts.app')
@section('content')
<div id="conteudo-contatos">
	<div id="usuario-logado">
		<h1>Meus Contatos</h1>
	</div>
	<div class="pesquisa-cria">
	<div id="criar-novo-contato" class="pesquisa-cria-bloco">
		<a href="{{url('contatos/create')}}"><i class="fas fa-plus-circle"></i></a>
	</div>
	<div id="procurar-cadastros-bloco-abrir" class="pesquisa-cria-bloco">
		<a id="procurar-cadastros-abrir"><i class="fas fa-search"></i></a>
	</div>
	<div id="procurar-cadastros-bloco-fechar" class="pesquisa-cria-bloco">
		<a id="procurar-cadastros-fechar"><i class="fas fa-search"></i></a>
	</div>
	<form class="form-horizontal col-md-4 text-md-center" id="formulario-pesquisa" action="">
        <div class="form-group col-md-12">
            <input type="text" class="form-control input" name="nome" value="{{ $_GET['search'] or '' }}" placeholder="Nome" autocomplete="off">
        </div>         

        <div class="form-group col-md-12">
            <input type="text" class="form-control input" name="telefone" value="{{ $_GET['search'] or '' }}" placeholder="Telefone" autocomplete="off">
        </div>            

        <div class="form-group col-sm-12">
            <button type="submit" class="btn btn-primary">BUSCAR</button>
        </div>
    </form>
	</div>
@foreach($contatos as $contato)
@if(\Auth::user()->id == $contato->usuario)
<div class="contatos-agenda">
	<div class="imagem-contatos">
        <a class="thumbnail fancybox" rel="ligthbox" href="/contatos/{{$contato->id}}">
            <img class="img-responsive" alt="" src="/images/{{ $contato->image }}" />
            <div class='text-center'>
                <small class='text-muted'>{{ $contato->nome }}</small>
            </div> <!-- text-center / end -->
        </a>
    </div>
	<div class="acoes-contatos">
	<div class="editar-contatos botoes-contatos">
		<a href="{{ URL::to('contatos/' . $contato->id . '/edit') }}">
		<button type="button" class="btn btn-warning">Editar</button>
		</a>
	</div>
	<div class="excluir-contatos botoes-contatos">
	<form action="{{url('contatos', [$contato->id])}}" method="POST">
	    <input type="hidden" name="_method" value="DELETE">
	   <input type="hidden" name="_token" value="{{ csrf_token() }}">
	   <input type="submit" class="btn btn-danger" value="Deletar"/>
	</form>
	</div>
	</div>
</div>
@endif
@endforeach	

</div>
@endsection