@extends('layouts.app')
{!! Charts::assets() !!}
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title qush">
                        <span class="glyphicon glyphicon-bookmark sp"></span><span class="quick-s sp">Quick</span><span class="short-q sp">Shortcuts</h3>
                </div></span>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 res-short">
                          <a href="{{ route('products.index') }}" class="btn btn-info btn-lg" role="button"><span class="glyphicon glyphicon-list-alt"></span> <br/>Products</a>
                          <a href="{{ URL::route('psales.create') }}" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> <br/>Sells</a>
                          @can('view_salereport')
                          <a href="{{url('salereportoutlet') }}" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-signal"></span> <br/>Reports</a>
                          @endcan
                          @can('view_outlet')
                          <a href="{{ URL::route('outlets.index') }}" class="btn btn-warning btn-lg" role="button"><span class="glyphicon glyphicon-file"></span> <br/>Outlet</a>
                          @endcan
                          @can('view_users')
                          <a href="{{ route('users.index') }}" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-user"></span> <br/>Users</a>
                          @endcan
                          @can('view_settings')
                          <a href="{{ URL::route('settings.index') }}" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-tag"></span> <br/>System Setting</a>
                          @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-bottom: 5%">
      <div class="col-md-12">
        <div class="panel res-graph">
          <center>
              {!! $sales->render() !!}
          </center>
        </div>
      </div>
    </div>
    <div class="row row-bot">
        <div class="col-md-6" style="margin-bottom: 5%">
          <div class="panel res-graph">
            <center>
                {!! $purchases->render() !!}
            </center>
          </div>
       </div>
      <div class="col-md-6">
        <div class="panel res-graph">
          <center>
            {!! $expense->render() !!}
          </center>
        </div>
      </div>
    </div>
@endsection
