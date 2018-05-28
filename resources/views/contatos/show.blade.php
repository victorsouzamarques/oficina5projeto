@extends('layouts.app')
@section('content')
<div class="jumbotron text-center">
<div  id="conteudo-show">
	<div class="voltar-inicial">
		<a href="{{url('contatos')}}"><i class="far fa-arrow-alt-circle-left"></i></a>
	</div>
	<p>
	<div class='col-xs-12'>		
		<div id="imagem-detalhes" class="blocos-infos-detalhes">
            <a class="thumbnail fancybox" rel="ligthbox" href="/images/{{$contato->image}}">
            	<img class="img-responsive" alt="" src="/images/{{$contato->image}}" />
                <div class='text-center'>
                </div> <!-- text-center / end -->
            </a>
        </div>
        <div id="nome-detalhes" class="blocos-infos-detalhes">
			<p><i class="far fa-user"></i> {{$contato->nome}}</p>
		</div>
        <div id="email-detalhes" class="blocos-infos-detalhes">
			<p><i class="far fa-envelope"></i> {{$contato->email}}</p>
		</div>
		<div id="telefone-detalhes" class="blocos-infos-detalhes">
			<p><i class="fas fa-phone"></i> {{$contato->telefone}}</p>
		</div>
		<div id="nascimento-detalhes" class="blocos-infos-detalhes">
			<p><i class="far fa-calendar-alt"></i> 	{{$contato->nascimento}}</p>
		</div>
		<div id="botaoeditar">
		<div class="acoesdetalhes">
			<a href="{{ URL::to('contatos/' . $contato->id . '/edit') }}">
				<button type="button" class="btn btn-warning">Editar</button>
			</a>
		</div>
		<div class="acoesdetalhes">
			<form action="{{url('contatos', [$contato->id])}}" method="POST">
			     <input type="hidden" name="_method" value="DELETE">
			   <input type="hidden" name="_token" value="{{ csrf_token() }}">
			   <input type="submit" class="btn btn-danger" value="Delete"/>
			</form>
		</div>
		</div>
	</div>
</div>
@endsection
