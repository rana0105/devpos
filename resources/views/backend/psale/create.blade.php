@extends('layouts.app')
@section('content')
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">

	<div class="col-md-12">
	    <div class="panel">
	        <div class="panel-heading">
               	<div class="panel-title text-left">
                    <h3 class="title">Sale Product</h3>
                    <hr />
                </div>
    		</div>
    		@if(session('success'))
	            <div class="alert alert-success">
	              {{ session('success') }}
	            </div>
            @endif
    	    <form action="{{ route('psales.store') }}" method="POST" files="true" target="blank">
			{{ csrf_field() }}
            <div class="row">
            	<div class="col-xs-16 col-sm-12 col-md-7">
		            <div class="row">
    		            <div class="col-xs-12 col-sm-10 col-md-6">
    		                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    		                    <label for="name" class="cols-sm-2 control-label">Customer</label>
    		                    <label class="cols-sm-2 control-label" style="float: right;"><button type="button" class="btn btn-add" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i>Add</button></label>
    		                    <div class="cols-sm-10">
    		                        <select class="form-control livesearch" name="c_name" required="">
    		                        	<option value="0" disabled="true" selected="ture">--Select--</option>
    		                        	@foreach($customers as $customer)
    		                        		<option value="{{ $customer->id }}">{{ $customer->name }}
    		                        		</option>
    		                        	@endforeach
    		            		    </select> 
    		                        <small class="text-danger">{{ $errors->first('c_name') }}</small>
    		                    </div>
    		                </div>
    		            </div>
    		            <div class="col-xs-12 col-sm-10 col-md-6">
    		                <div class="form-group {{ $errors->has('s_name') ? ' has-error' : '' }}">
    		                    <label for="s_name" class="cols-sm-2 control-label">Waiter</label>
    		                    <div class="cols-sm-10">
    		                        <select class="form-control livesearch" name="s_name" required="">
    		                        	<option value="0" disabled="true" selected="ture">--Select--</option>
    		                        	@foreach($suppliers as $supplier)
    		                        		<option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}
    		                        		</option>
    		                        	@endforeach
    		            		    </select> 
    		                        <small class="text-danger">{{ $errors->first('s_name') }}</small>
    		                    </div>
    		                </div>
    		            </div>
    	       			<div class="col-xs-12 col-sm-10 col-md-6">
    		                <div class="form-group {{ $errors->has('s_name') ? ' has-error' : '' }}">
    		                    <label for="s_name" class="cols-sm-2 control-label">Search Product with Add</label>
    		                    <div class="cols-sm-10">
    		                        <select class="form-control livesearch productsearch" name="name" required="">
    		                        	<option value="0" disabled="true" selected="ture">--Search Product with Add--</option>
    		                        	@foreach($pro as $p)
    		                        		<option id="productsearch" value="{{ $p->id }}">{{ $p->name }}
    		                        		</option>
    		                        	@endforeach
    		            		    </select> 
    		                        <small class="text-danger">{{ $errors->first('name') }}</small>
    		                    </div>
    		                </div>
    		            </div>
    		            <div class="col-xs-12 col-sm-10 col-md-6">
    		                <div class="form-group {{ $errors->has('s_name') ? ' has-error' : '' }}">
    		                    <label for="s_name" class="cols-sm-2 control-label">Search Package with Add</label>
    		                    <div class="cols-sm-10">
    		                        <select class="form-control livesearch productsearch" name="name" required="">
    		                        	<option value="0" disabled="true" selected="ture">--Search Package with Add--</option>
    		                        	@foreach($pacpro as $p)
    		                        		<option id="productsearch" value="{{ $p->id }}">{{ $p->name }}
    		                        		</option>
    		                        	@endforeach
    		            		    </select> 
    		                        <small class="text-danger">{{ $errors->first('name') }}</small>
    		                    </div>
    		                </div>
    		            </div>
	                </div>

					<div class="form-group">
		            	<label for="product" class="cols-sm-2 control-label">Add Product</label>
		                <div class="table-responsive" style="height: 300px; border: solid 2px #036d21; overflow-y: auto;">
					       	<table class="table table-bordered table-hover"> 
					       		<thead>
					       			<th>Product</th>
					       			<th>Quantity</th>
					       			<th>UnitPrice</th>
					       			<th style="width: 100">Discount</th>
					       			<th>Vat%</th>
					       			<th style="width: 200">Sub Total</th>
					       		</thead>
					       		<tbody class="cahange" id="sale-table">

					       		
                                </tbody>
				       		</table>
				       		
			       		</div>
		       		</div>
		       		<div>
		       		<div class="table-responsive">
		       			<h5 style="text-align: center;"><b>Total Amount</b></h5>
			       		<table class="table table-bordered table-hover">
				       		<tfoot>
								<tr>
				       				<td>Total</td>
				       				<td><b class="total" id="total"></b></td>
				       			</tr>
				       			<tr>
				       				<td>Total Discount</td>
				       				<td><b class="discount"><input type="text" name="discount" class="form-control discount" id="discount_input"></b></td>
				       			</tr>
				       			<tr>
				       				<td>Net Total</td>
				       				<td><input type="text" readonly="" name="ntotal" id="ntotal" value="" class="form-control ntotal"></td>
				       			</tr>
				       			<tr>
				       				<td>Payment</td>
				       				<td><b class="payment"><input type="text" name="payment" class="form-control" id="payment_input"></b></td>
				       			</tr>
				       			<tr>
				       				<td>Due</td>
				       				<td><input type="text" name="due" readonly="" class="form-control due"></td>
				       			</tr>
				       		</tfoot>
				       	</table>
		       		</div>
			    </div>
	       		</div>
	       		<div class="col-xs-12 col-sm-12 col-md-4">
	       			<div class="row">
	       			    <h5 style="text-align: center;"><b>Category of Product</b></h5>
	       				<div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="" id="myCarousel">
					      <div class="carousel-inner">
					      @foreach($procates as $key => $procat)
					        <div class="item{{ $key == 0 ? ' active' : '' }}" style="margin: 1px;">

					          <div class="col-md-2 col-sm-2 col-xs-2">
					          
						          <div class="col-md-2 col-sm-2 col-xs-2 productCat" style="border: solid 2px #036d21; margin: 1px; height: 40px; width: 100px; background-color: #e5e5e5;">
						            <input type="hidden" name="" value="{{$procat->id}}" class="id">
						                    <b>{{ $procat->name }}</b>
			                       </div>
		                      
					          </div>  
					        </div>
					       @endforeach
					      </div>
					      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
					      <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
					    </div>
	       				<div class="packageCat" style="border: solid 2px #036d21; margin: 1px; height: 40px; width: 100px; background-color: #e5e5e5;">
	       					<p class="packageCat"><b>Package</b></p>
	       				</div>
	       			</div>
	       			<div class="showProduct" style="margin-top: 15px;">
		       			@foreach($product as $products)
		       				<div class="productinfo text-left image" style="">
		   						<img src="{{asset('upload_file/resize_images/')}}/{{ $products->image }}" alt="" class="img-responsive" />
								<p><b>{{ $products->sale_price }}</b></p>
								<input type="hidden" name="" value="{{$products->id}}" class="id">
							</div>
	                	@endforeach
	                	@foreach($pacates as $pacat)
                		<div class="productinfo text-left image" style="display:none;">
                			<p><b>{{ $pacat->name }}</b></p>
							<p><b>{{ $pacat->sale_price }}</b></p>
							<input type="hidden" name="" value="{{$pacat->id}}" class="id">
						</div>
						@endforeach
                	</div>
	       		</div>
       		</div>
		    <div class="form-group" style="margin-bottom: 3%; margin-top: 5%">
				<input type="submit"  value="Generate Invoice" class="btn btn-success">
				<a href="{{ URL::route('psales.create') }}" class="btn btn-warning btn-responsive">Reset</a>
			</div>
		</form>
	    </div>
	</div>

	<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create Customer</h4>
      </div>
      <div class="modal-body">
        <form action="{{ url('customerAdd') }}" method="POST" enctype="multipart/form-data" files="true">
						{{ csrf_field() }}
                        <div class="row main">
                            <div class="col-md-10 col-md-offset-1">
                               
        						<div class="col-xs-12 col-sm-10 col-md-6">
                                    <div class="form-group {{ $errors->has('type_name') ? ' has-error' : '' }}">
                                        <label for="type_name" class="cols-sm-2 control-label">Customer type</label>
                                        <div class="cols-sm-10">
                                            <select class="form-control" name="type_name">
                                            	<option value="0" disabled="true" selected="ture">--Select--</option>
        		                            	@foreach($type as $typ)
        		                            		<option value="{{ $typ->id }}">{{ $typ->type_name }}
        		                            		</option>
        		                            	@endforeach
                                		    </select> 
                                            <small class="text-danger">{{ $errors->first('type_name') }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-10 col-md-6">
                                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="cols-sm-2 control-label">Name</label>
                                        <div class="cols-sm-10">
                                            <input type="text" name="name" id="name" class="form-control"  placeholder="Name..."/>
                                          <small class="text-danger">{{ $errors->first('name') }}</small>
                                         </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-10 col-md-6">
                                    <div class="form-group {{ $errors->has('shop_name') ? ' has-error' : '' }}">
                                        <label for="shop_name" class="cols-sm-2 control-label">Shop Name</label>
                                        <div class="cols-sm-10">
                                            <input type="text" name="shop_name" id="shop_name" class="form-control"  placeholder="Shop Name..."/>
                                          <small class="text-danger">{{ $errors->first('shop_name') }}</small>
                                         </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-10 col-md-6">
                                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="cols-sm-2 control-label">Email</label>
                                        <div class="cols-sm-10">
                                            <input type="email" name="email" id="email" class="form-control"  placeholder="Email..."/>
                                          <small class="text-danger">{{ $errors->first('email') }}</small>
                                         </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-10 col-md-6">
                                    <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <label for="phone" class="cols-sm-2 control-label">Phone number</label>
                                        <div class="cols-sm-10">
                                            <input type="text" name="phone" id="phone" class="form-control"  placeholder="Phone number..."/>
                                          <small class="text-danger">{{ $errors->first('phone') }}</small>
                                         </div>
                                    </div>
                                </div>
                            
                                <div class="col-xs-12 col-sm-10 col-md-6">
                                    <div class="form-group {{ $errors->has('Customerimage') ? ' has-error' : '' }}">
                                        <label for="image" class="cols-sm-2 control-label">Image</label>
                                        <div class="cols-sm-10">
                                            <input type="file" name="image" id="image" class="form-control"/>
                                          <small class="text-danger">{{ $errors->first('image') }}</small>
                                         </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group" style="margin-left: 10%;">
							<input type="submit"  value="Submit" class="btn btn-success">
							<a href="{{ URL::route('customers.index') }}" class="btn btn-warning btn-responsive">Cancel</a>
						</div>
                    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endsection
