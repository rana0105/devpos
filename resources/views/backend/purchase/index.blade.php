@extends('layouts.app')

@section('content')
	<div class="col-md-12">
    	<div class="panel">
            <div class="panel-title text-left">
                <h3 class="title">Purchase</h3>
                <hr />
            </div>
            <header class="panel-heading">
				      	@can('add_purchases')
							<a href="{{ URL::route('purchases.create') }}" class="btn btn-primary btn-sm">Create Purchase</a>
						@endcan
			</header>
			<div class="table-responsive">
				<table class="table table-striped table-hover">
						@if(session('success'))
							<div class="alert alert-success">
								{{ session('success') }}
							</div>
						@endif
					<thead>
						<th>Sr.</th>
						<th>Date</th>
						<th>Supplier</th>
						<th>Total Discount</th>
						<th>Total Amount</th>
						<th>Payment</th>
						<th>Due</th>
						{{-- <th class="text-align-center">Action</th> --}}
					</thead>
					<tbody>
						<?php $i=1; ?>
						@foreach($purchases as $purchase)
							<tr>
								<th>{{ $i++ }}</th>
								<td>{{ $purchase->date  }}</td>
								<td>{{ $purchase->suppliers->supplier_name }}</td>
								<td>{{ $purchase->t_discount }}</td>
								<td>{{ $purchase->total_amount }}</td>
								<td>{{ $purchase->payment }}</td>
								<td>{{ $purchase->due  }}</td>
								{{-- <td>
								@can('edit_purchases')
									<a href="{{ URL::route('purchases.edit', $purchase->id) }}" class="btn btn-info btn-responsive">
									<i class="glyphicon glyphicon-edit"></i></a>
								@endcan
								@can('delete_purchases')
								{!! Form::open(['route' => ['purchases.destroy', $purchase->id], 'method' => 'DELETE', 'class'=>'delete_form', 'style'=>'display:inline' ])!!}
								
								{{Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-responsive delete-btn'))}}
								{!! Form::close() !!}
								@endcan
								</td> --}}
							</tr>
						@endforeach 
					</tbody>
				</table>
			</div>
        </div>
    </div>
@endsection