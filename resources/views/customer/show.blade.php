@extends('layouts.admain')

@section('title', ' View Customer')

@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-8">
               <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="list-group">
                        @foreach($customers->cart->items as $item)
                        <li class="list-group-item"><span class="badge">{{ $item['price'] }}</span>
                        {{ $item['item']['name'] }} | {{ $item['qty'] }} Vé
                        </li>
                        @endforeach
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <strong>Total Price: {{ $customers->cart->totalPrice }}</strong>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12">
                            {{ Html::linkRoute('customer.index', '<< See All Customer', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection