@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Cooperator') }}
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-2">ID</dt>
                <dd class="col-sm-10">{{ $cooperator->id }}</dd>
              
                <dt class="col-sm-2">{{ __('Name')}}</dt>
                <dd class="col-sm-10">{{ $cooperator->name }}</dd>
              
                <dt class="col-sm-2">{{ __('Cooperator of office') }}</dt>
                <dd class="col-sm-10">{{ $cooperator->prayingHouse->locality }}</dd>
            </dl>
        </div>
    </div>
    <div class="card-deck">
        <div class="card text-white bg-primary mb-3" style="min-width: 18rem;">
            <div class="card-header">Cabeçalho</div>
            <div class="card-body">
                <h5 class="card-title">Título de Card Primary</h5>
                <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
            </div>
        </div>
        <div class="card mb-3" style="min-width: 18rem;">
            <div class="card-header">
    
            </div>
            <div class="card-body">
                <h5 class="card-title">Título de Card Primary</h5>
                <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
            </div>
        </div>
        <div class="card mb-3 mr-3" style="min-width: 18rem;">
            <div class="card-header">
    
            </div>
            <div class="card-body">
                <h5 class="card-title">Título de Card Primary</h5>
                <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
            </div>
        </div>
        <div class="card mb-3 mr-3" style="min-width: 18rem;">
            <div class="card-header">
    
            </div>
            <div class="card-body">
                <h5 class="card-title">Título de Card Primary</h5>
                <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
            </div>
        </div>
        <div class="card mb-3 mr-3" style="min-width: 18rem;">
            <div class="card-header">
    
            </div>
            <div class="card-body">
                <h5 class="card-title">Título de Card Primary</h5>
                <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
            </div>
        </div>
        
        <div class="card mb-3 mr-3">
                <div class="card-header">
        
                </div>
                <div class="card-body">
                    <h5 class="card-title">Título de Card Primary</h5>
                    <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
                </div>
            </div>
            
        <div class="card mb-3 mr-3">
                <div class="card-header">
        
                </div>
                <div class="card-body">
                    <h5 class="card-title">Título de Card Primary</h5>
                    <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
                </div>
            </div>
            
        <div class="card mb-3 mr-3">
                <div class="card-header">
        
                </div>
                <div class="card-body">
                    <h5 class="card-title">Título de Card Primary</h5>
                    <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
                </div>
            </div>
    </div>
    <div class="card">
        <div class="card-header">
            {{ __('Show administrative region') }}
        </div>
        <div class="card-body">
            
        </div>
    </div>
    @section('formAction')
    @show
    @section('modal')
    @show
@endsection