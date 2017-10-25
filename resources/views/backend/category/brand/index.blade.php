@extends('layouts.app')
@section('content')
	<div class="col-md-8 col-md-offset-2">
    	<div class="panel">
           <div class="panel-title text-left">
                <h3 class="title">Product of Brand</h3>
                <hr />
            </div>
            <header class="panel-heading">
			      	@can('add_brands')
						<a href="{{ URL::route('brands.create') }}" class="btn btn-primary btn-sm">Create Brand</a>
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
						<th>Name</th>
						<th class="text-align-center">Action</th>
					</thead>
					<tbody>
						<?php $i=1; ?>
						@foreach($brands as $brand)
							<tr>
								<th>{{ $i++  }}</th>
								<td>{{ $brand->name }}</td>
								<td>
								@can('edit_brands')
								<a href="{{ URL::route('brands.edit', $brand->id) }}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
								@endcan
								{{-- @can('delete_brands')
								{!! Form::open(['route' => ['brands.destroy', $brand->id], 'method' => 'DELETE', 'class'=>'delete_form', 'style'=>'display:inline' ])!!}
								
								{{Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-responsive delete-btn'))}}
								{!! Form::close() !!}
								@endcan --}}
								</td>
							</tr>
						@endforeach 
					</tbody>
				</table>
			</div>
        </div>
    </div>
@endsection