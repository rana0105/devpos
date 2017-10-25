@extends('layouts.app')
@section('content')
	<div class="col-md-8 col-md-offset-2">
	    <div class="panel">
	        <div class="panel-heading">
	           <div class="panel-title text-left">
	                <h3 class="title">Stock Product</h3>
	                <hr />
	            </div>
        	</div>
	        <div class="table-responsive">
	        	<table class="table table-striped table-hover">
					@if(session('success'))
						<div class="alert alert-success">
							{{ session('success') }}
						</div>
					@endif
					<thead>
						<th>Sr.</th>
						<th>Product Name</th>
						<th>Quantity</th>
						<th>Unit Price</th>
						<th class="text-align-center">Action</th>
					</thead>
					<tbody>
					<?php $i=1; ?>
						@foreach($stocks as $stock)
							<tr>
								<th>{{ $i++  }}</th>
								<td>{{ $stock->products->name  }}</td>
								<td>{{ $stock->quantity }}</td>
								<td>{{ $stock->unit_price }}</td>
								
								<td>
								@can('edit_stocks')
									<a href="{{ URL::route('stocks.edit', $stock->id) }}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
								@endcan
								</td>	
							</tr>
						@endforeach 
					</tbody>
				</table>
	        </div>
	    </div>
	</div>
@endsection
