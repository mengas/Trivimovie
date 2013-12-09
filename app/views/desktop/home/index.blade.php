@extends('layouts.desktop')

@section('content')
    <br/>
    <section id="intro">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <h1 class="title"> Welcome to TriviMovie! </h1>
                <p class="lead"> Play a trivial game about movies, sum points, unlock new challenges and challenge your friends </p>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <button class="btn btn-success btn-block remote-load-trigger" data-src="/games"> Get started </button>
            </div>
        </div>
    </section>
@stop