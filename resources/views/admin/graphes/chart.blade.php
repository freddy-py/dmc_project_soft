@extends('layouts.app')

@section('content')
<div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
    <div class="row pt-md-5 mt-md-3 mb-5">
    
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Chart Demo</div>
                <div class="card-body">
                        {!! $chart->container() !!}
                </div>
            </div>
        </div>
    </div>
</div>
{!! $chart->script() !!}
@endsection
