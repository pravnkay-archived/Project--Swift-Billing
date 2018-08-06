@extends('layouts.backend')

@section('content')

<section class="pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Vanakkam !</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                        <br />

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
