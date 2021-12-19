@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


 <div class="content-wrapper">
	  <div class="container-full">
			<section class="content">
		 	 <div class="row">
				  <div class="col-12">

						 <div class="box">
								<div class="box-header with-border">
								  	<h3 class="box-title">Official Receipt Record </h3>
								</div><!-- /.box-header -->

								<div class="box-body">
									<div class="table-responsive">
									  <table id="example2" class="table table-bordered table-striped">
											<thead>
												<tr>
													<th>OR#</th>
													<th>Tenant</th>
													<th>Bill</th>
													<th>Month</th>
													<th>Status</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												@foreach($allrecord as $record)
													<tr>
														<td>{{$record->or_number}}</td>

														@if($record->tenant_id == 0)
															<td>cancel</td>
														@else
															<td>{{$record->tenant->name}}</td>
														@endif

														@if($record->billing_id ==1)
															<td>Rental</td>
														@elseif($record->billing_id ==3)
															<td>Deep Well</td>
														@else
															<td></td>
														@endif
										
														@if($record->billing_id == 1)
															<td>
																{{ \Carbon\Carbon::parse($record->month)->format('F')}}
															</td>
														@elseif($record->billing_id==3)
															<td>
																{{ \Carbon\Carbon::parse($record->start_date)->format('F')}} 1  To {{ \Carbon\Carbon::parse($record->end_date)->format('F')}} 30
															</td>
														@else
															<td></td>	
														@endif

														@if($record->status == 0)
															<td>Paid</td>
														@elseif($record->status == 1)
															<td bgcolor="blue" style="color: white;">Partial</td>
														@else
															<td bgcolor="red" style="color: white;">Cancel</td>
														@endif

														<td>
															<a href="{{ route('official.receipt.edit', $record->or_number)}}" class="btn btn-primary">Edit</a>
														</td>
													</tr>
												@endforeach
											</tbody>

									  </table>
									</div>
								</div>
							<!-- /.box-body -->
						  </div>
						  <!-- /.box -->


		  	</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
  </div>
</div>


@endsection