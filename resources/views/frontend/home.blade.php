@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Swift Billing - Laravel Billing System</h2>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat qui nesciunt ea deserunt necessitatibus, dolore sit sed nobis iure consectetur non possimus. Quasi consectetur est a, delectus tenetur quae commodi fugiat perferendis voluptatem maiores! Ducimus iste temporibus veritatis eligendi! Necessitatibus. <br />
                        <br />
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laborum tempora repellendus debitis, aspernatur ipsa ab rerum in veniam veritatis quidem!

                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
