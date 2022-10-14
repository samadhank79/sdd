@if(session()->has('admin'))
<?php $s = session()->get('admin'); ?>

@elseif(session()->has('users'))
<?php $s = session()->get('users'); ?>
@endif
@extends('Layouts.Master')
@section('content')
<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">UPSI</h4>
						
						<div class="tab-content" id="myTabContent">

							@if(request()->is('AudittrailReportAdmin/'.$s->name) || request()->is('audit'))

							<div class="tab-pane fade show {{request()->is('AudittrailReportAdmin/'.$s->name)?'active':''}}" id="{{url('listupsi')}}" role="tabpanel" aria-labelledby="home-tab">
								<div class="card">
									<div class="card-body">


										<div class="table-responsive">
											<!--<button type="button" id="resetFilter" class="btn btn-danger mb-2"> Reset Filters</button>-->
											<table border="0" cellspacing="5" cellpadding="5" class="mb-2">
												<tbody><tr>
													<td>From date:</td>
													<td><input type="text" id="min" name="min" class="form-control"></td>
													<td>To date:</td>
													<td><input type="text" id="max" name="max" class="form-control"></td>
													<td><button type="button" id="resetFilter" class="btn btn-danger"> Reset Filters</button></td>
												</tr>
												<tr>
													<!--<td>To date:</td>-->
													<!--<td><input type="text" id="max" name="max" class="form-control"></td>-->
												</tr>
											</tbody></table>

											<table id="inactiveUpsi" class="table table-striped table-bordered" style="width:100%">
												<thead>
													<tr>
														<th>Id</th>
														<th>Old ID</th>
														<th>UPSI No</th>
														<th>Nature Of Information</th>
														<th>Legitimate </th>
														<th>Recipient</th>
														<th>Sender</th>
														<th>Type Of Sharing</th>
														<th>Date Of Sharing </th>
														<th>Period Of Sharing</th>
														<th>Mode Of Sharing</th>
														<th>Confidentiality Agreement</th>
														<th>Effective Date Of Agreement</th>
														<th>Description Of Agreement </th>
														<th>Confidentiality Intimation Date</th>
														<th>Purpose Of Sharing</th>
														<th>Information Description</th>
														<th>Remark </th>
														<th style="display:none;">Dsc </th>
														<th>User and Time Stamp</th>
														<th>Updated Date</th>
														<th>Deleted Date</th>
														<th>Status</th>

													</tr>
												</thead>
												<tbody>


													@if($inactiveUpsi)
													@foreach($inactiveUpsi as $s)
													<tr>
														<td>{{$s->id}}</td>
														<td>{{$s->last_id}}</td>
														<td>{{$s->upsinum}}</td>
														<td>{{$s->natureinfo}}</td>
														<td>{{$s->legitmate}}</td>
														<td>{{$s->recipienst}}</td>
														<td>{{$s->sender}}</td>
														<td>{{$s->sharingtype}}</td>
														<td>{{$s->dateofshare}}</td>
														<td>{{$s->periodofshare}}</td>
														<td>{{$s->modeofsharing}}</td>
														<td>{{$s->confidentiality}}</td>
														<td>{{$s->effectivedate}}</td>
														<td>{{$s->descriptionagreement}}</td>
														<td>{{$s->confintimatdate}}</td>
														<td>{{$s->purpose}}</td>
														<td>{{$s->descriptioninfo}}</td>
														<td>{{$s->remark}}</td>
														<td style="display:none;">{{$s->dsc}}</td>
														<td>{{$s->dsctime}}</td>
														<td>{{$s->updated_date}}</td>
														<td>{{$s->deleted_date}}</td>
														<td>
															<label class="{{$s->status=='active'?'badge badge-success':'badge badge-danger'}}">{{$s->status}}</label>
														</td>


													</tr>
													@endforeach
													@endif
												</tbody>
												<tfoot>
													<tr>
														<th>Id</th>
														<th>Old ID</th>
														<th>UPSI Number</th>
														<th>Nature Of Information</th>
														<th>Legitimate </th>
														<th>Recipient</th>
														<th>Sender</th>
														<th>Type Of Sharing</th>
														<th>Date Of Sharing </th>
														<th>Period Of Sharing</th>
														<th>Mode Of Sharing</th>
														<th>Confidentiality Agreement</th>
														<th>Effective Date Of Agreement</th>
														
														<th>Description Of Agreement </th>
														<th>Confidentiality Intimation Date</th>
														<th>Purpose Of Sharing</th>
														<th>Information Description</th>
														<th>Remark </th>
														<th style="display:none;">Dsc </th>

														<th>User and Time Stamp</th>
														<th>Updated Date</th>
														<th>Deleted Date</th>
														<th>Status</th>

													</tr>
												</tfoot>
											</table>
										</div>
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<!-- content-wrapper ends -->
	@endsection
	@push('inactiveUpsi')
	<script type="text/javascript">
		$(document).ready(function () {
			
			const table = $('#inactiveUpsi').DataTable({
				dom: 'Bfrtip',
				buttons: [
			// 	{
			// 		extend: 'excelHtml5',
			// 		title: filename,
			// 	// 'excel',
			// },
			{
				text: 'PDF Export',
				className: 'btn btn-primary',
				extend : 'pdfHtml5',
				title: 'Audit Trial ',
				orientation : 'landscape',
				pageSize : 'LEGAL',
				// titleAttr : 'PDF Export',
				pageSize : 'A2',

			}
			]
		});

			$.fn.dataTable.ext.search.push(
				function( settings, data, dataIndex ) {
					// var min = minDate.val();

					// var max = maxDate.val();

					var min = $('#min').datepicker('getDate')
					var max = $('#max').datepicker('getDate');

					var date = new Date(data[18]);


					

					if (
						( min === null && max === null ) ||
						( min === null && date <= max ) ||
						( min <= date   && max === null ) ||
						( min <= date   && date <= max )
						) {
						return true;
				}
				return false;
			}
			);

			// minDate = new DateTime($('#min'), {
			// 	format: 'MMMM Do YYYY'
			// });
			// maxDate = new DateTime($('#max'), {
			// 	format: 'MMMM Do YYYY'
			// });


			$('#min').datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
			$('#max').datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });

			// var table = $('#activeUpsi').DataTable();


			$('#min, #max').on('change', function () {
				table.draw();
			});

			$('#resetFilter').on('click',function(){
				$('#min').val("").datepicker("update");
				$('#max').val("").datepicker("update");
				
			})

		});  
	</script>
	@endpush

	<!-- Modal -->


