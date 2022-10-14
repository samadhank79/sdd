@section('title') {{'Upsi'}} @endsection
@extends('Layouts.Master')
@section('content')
<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">UPSI</h4>
						<!-- <p class="card-description">
							Add class <code>.table</code>
						</p> -->
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item" role="presentation">
								<a href="{{route('addupsi')}}" class="nav-link {{request()->is('upsi/add')?'active':''}}">Add</a>

							</li>
							<li class="nav-item" role="presentation">
								<a href="{{route('listupsi')}}" class="nav-link  {{request()->is('upsi/list')?'active': (request()->is('upsi')?'active':'')}}">List</a>

							</li>
							<li class="nav-item" role="presentation">
								<a href="{{route('preupsiadd')}}" class="nav-link  {{request()->is('upsi/preupsiadd')?'active': (request()->is('preupsiadd')?'active':'')}}">Add Old Records</a>

							</li>

						</ul>
						<div class="tab-content" id="myTabContent">


							@if(request()->is('upsi/add'))

							<div class="tab-pane fade show {{request()->is('upsi/add')?'active':''}} " id="{{url('addupsi')}}" role="tabpanel" aria-labelledby="home-tab">
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Add UPSI</h4>
										<!-- <p class="card-description">
											Basic form elements
										</p> -->
										@if(session()->has('success'))
										<div class="alert alert-success alert-dismissible fade show" role="alert">
											<strong>{{ session()->get('success') }} !</strong> 
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										@endif
										<form class="forms-sample" method="POST">
											@csrf
											<div class="form-row">
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Nature Of Information</label>
													<select name="natureinfo" class="form-control">
														<option value="">Selete Nature of Info</option>

														@if($natureinfo)
														@foreach($natureinfo as $f)
														<option value="{{$f->id}}" {{old('natureinfo')==$f->id?'selected':''}}>{{$f->natureinfo}}</option>
														@endforeach
														@endif
													</select>
													@error('natureinfo')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Legitimate Purpose</label>
													<select name="legitmate" class="form-control">
														<option value="">Legimate Purpose</option>
														<option value="yes" {{old('legitmate')=='yes'?'selected':''}}>Yes</option>
														<option value="no" {{old('legitmate')=='no'?'selected':''}}>No</option>
													</select>
													@error('legitmate')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Recipient </label>
													<select name="recipienst" class="form-control">
														<option value="">Selete Recipiniest</option>
														@if($recipt)
														@foreach($recipt as $r)
														<option value="{{$r->id}}" {{old('recipienst')==$r->id?'selected':''}}>{{$r->name}}</option>
														@endforeach
														@endif
													</select>
													@error('recipienst')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Sender </label>
													<select name="sender" class="form-control">
														<option value="">Selete Sender</option>
														@if($send)
														@foreach($send as $s)
														<option value="{{$s->id}}" {{old('sender')==$s->id?'selected':''}}>{{$s->name}}</option>
														@endforeach
														@endif
													</select>
													@error('sender')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Type Of Sharing</label>

													<select name="sharingtype" id="sharingtype" class="form-control">
														<option value="">Select Type Of Sharing</option>

														<option value="ongoing" {{old('sharingtype')=='ongoing'?'selected':''}}>Ongoing</option>
														<option value="ontime" {{old('sharingtype')=='ontime'?'selected':''}}>Ontime</option>

													</select>
													@error('sharingtype')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
												<div class="form-group col-lg-4" id="enddategroup">
													<label for="exampleInputName1">End Date</label>

													<input type="date" name="enddate" id="enddate" class="form-control" value="{{old('enddate',request()->segment(3)?$upsi->enddate:'')}}" >
													@error('enddate')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Date Of Sharing</label>
													<input type="date" class="form-control" id="exampleInputName1"  value="{{old('dateofshare',request()->segment(3)?$sender->dateofshare:'')}}" name="dateofshare">
													@error('dateofshare')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
											<hr>
											<div class="form-row">

												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Period of Sharing</label>
													<input type="text" class="form-control" id="exampleInputName1"  value="{{old('periodofshare',request()->segment(3)?$sender->periodofshare:'')}}" name="periodofshare" placeholder="Period of Sharing">
													@error('periodofshare')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>

												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Mode Of Sharing</label>
													<select name="modeofsharing" class="form-control">
														<option value="" >Select Mode Of Sharing</option>
														<option value="physical" {{old('modeofsharing')=='physical'?'selected':''}}>Physically</option>
														<option value="electrically" {{old('modeofsharing')=='electrically'?'selected':''}}>Electronically</option>
														<option value="both" {{old('modeofsharing')=='both'?'selected':''}}>Both</option>

													</select>
													@error('modeofsharing')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Confidentiality  Agreement </label>
													<select name="confidentiality" class="form-control" id="confidentiality">
														<option value="">Select Confidencialtiy</option>
														<option value="yes" {{old('confidentiality')=='yes'?'selected':''}}>Yes</option>
														<option value="no" {{old('confidentiality')=='no'?'selected':''}}>No</option>

													</select>
													@error('confidentiality')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
											<div class="form-row">

												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Effective Date Of Agreement</label>
													<input type="date" class="form-control" id="effectivedate"  value="{{old('effectivedate',request()->segment(3)?$sender->effectivedate:'')}}" name="effectivedate">
													@error('effectivedate')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Confidentiality Intimation Date</label>
													<input type="date" class="form-control" id="confintimatdate"  value="{{old('confintimatdate',request()->segment(3)?$upsi->confintimatdate:'')}}" name="confintimatdate" >
													@error('confintimatdate')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Purpose of Sharing</label>
													<input type="text" class="form-control" id="exampleInputName1"  value="{{old('purpose',request()->segment(3)?$upsi->purpose:'')}}" name="purpose" placeholder="Purpose of Sharing">
													@error('purpose')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
											<hr>
											<div class="form-row">
												<div class="form-group col-lg-12">
													<label for="exampleInputEmail3">Description Of Agreement</label>
													<textarea class="form-control" name="descriptionagreement" placeholder="Description Of Agreement">{{old('descriptionagreement')}}</textarea>
													@error('descriptionagreement')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
											<div class="form-row">

												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Information Description</label>
													<input type="text" class="form-control" id="exampleInputName1"  value="{{old('descriptioninfo',request()->segment(3)?$upsi->descriptioninfo:'')}}" name="descriptioninfo" placeholder="Information Description">
													@error('descriptioninfo')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>

												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Remark</label>
													<input type="text" class="form-control" id="exampleInputName1"  value="{{old('remark',request()->segment(3)?$upsi->remark:'')}}" name="remark" placeholder="Remark">
													@error('remark')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Status</label>
													<select name="status" class="form-control">
														<option value="">SELECT STATUS</option>
														<option value="active"  selected {{old('status')=='active'?'selected':''}}>Active</option>
														<option value="inactive" {{old('status')=='inactive'?'selected':''}}>Inactive</option>
													</select>
													@error('status')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
											

											<input  name="{{request()->segment(3)?'update':'add'}}" type="submit" class="btn btn-primary mr-2" value="{{request()->segment(3)?'update':'add'}}">

										</form>
									</div>
								</div>

							</div>

							@endif



							@if(request()->is('upsi/preupsiadd'))

							<div class="tab-pane fade show {{request()->is('upsi/preupsiadd')?'active':''}} " id="{{url('preupsiadd')}}" role="tabpanel" aria-labelledby="home-tab">
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Add UPSI</h4>
										<!-- <p class="card-description">
											Basic form elements
										</p> -->
										@if(session()->has('success'))
										<div class="alert alert-success alert-dismissible fade show" role="alert">
											<strong>{{ session()->get('success') }} !</strong> 
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										@endif
										<form class="forms-sample" method="POST">
											@csrf
											<div class="form-row">
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Nature Of Information</label>
													<select name="natureinfo" class="form-control">
														<option value="">Selete Nature of Info</option>

														@if($natureinfo)
														@foreach($natureinfo as $f)
														<option value="{{$f->id}}" {{old('natureinfo')==$f->id?'selected':''}}>{{$f->natureinfo}}</option>
														@endforeach
														@endif
													</select>
													@error('natureinfo')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Legitimate Purpose</label>
													<select name="legitmate" class="form-control">
														<option value="">Legimate Purpose</option>
														<option value="yes" {{old('legitmate')=='yes'?'selected':''}}>Yes</option>
														<option value="no" {{old('legitmate')=='no'?'selected':''}}>No</option>
													</select>
													@error('legitmate')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Recipient </label>
													<select name="recipienst" class="form-control">
														<option value="">Selete Recipiniest</option>
														@if($recipt)
														@foreach($recipt as $r)
														<option value="{{$r->id}}" {{old('recipienst')==$r->id?'selected':''}}>{{$r->name}}</option>
														@endforeach
														@endif
													</select>
													@error('recipienst')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Sender </label>
													<select name="sender" class="form-control">
														<option value="">Selete Sender</option>
														@if($send)
														@foreach($send as $s)
														<option value="{{$s->id}}" {{old('sender')==$s->id?'selected':''}}>{{$s->name}}</option>
														@endforeach
														@endif
													</select>
													@error('sender')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Type Of Sharing</label>

													<select name="sharingtype" id="sharingtype" class="form-control">
														<option value="">Select Type Of Sharing</option>

														<option value="ongoing" {{old('sharingtype')=='ongoing'?'selected':''}}>Ongoing</option>
														<option value="ontime" {{old('sharingtype')=='ontime'?'selected':''}}>Ontime</option>

													</select>
													@error('sharingtype')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
												<div class="form-group col-lg-4" id="enddategroup">
													<label for="exampleInputName1">End Date</label>

													<input type="date" name="enddate" id="enddate" class="form-control" value="{{old('enddate',request()->segment(3)?$upsi->enddate:'')}}">
													@error('enddate')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Date Of Sharing</label>
													<input type="date" class="form-control" id="exampleInputName1"  value="{{old('dateofshare',request()->segment(3)?$sender->dateofshare:'')}}" name="dateofshare">
													@error('dateofshare')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
											<hr>
											<div class="form-row">

												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Period of Sharing</label>
													<input type="text" class="form-control" id="exampleInputName1"  value="{{old('periodofshare',request()->segment(3)?$sender->periodofshare:'')}}" name="periodofshare" placeholder="Period of Sharing">
													@error('periodofshare')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>

												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Mode Of Sharing</label>
													<select name="modeofsharing" class="form-control">
														<option value="" >Select Mode Of Sharing</option>
														<option value="physical" {{old('modeofsharing')=='physical'?'selected':''}}>Physically</option>
														<option value="electrically" {{old('modeofsharing')=='electrically'?'selected':''}}>Electronically</option>
														<option value="both" {{old('modeofsharing')=='both'?'selected':''}}>Both</option>

													</select>
													@error('modeofsharing')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Confidentiality  Agreement </label>
													<select name="confidentiality" class="form-control" id="confidentiality">
														<option value="">Select Confidencialtiy</option>
														<option value="yes" {{old('confidentiality')=='yes'?'selected':''}}>Yes</option>
														<option value="no" {{old('confidentiality')=='no'?'selected':''}}>No</option>

													</select>
													@error('confidentiality')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
											<div class="form-row">

												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Effective Date Of Agreement</label>
													<input type="date" class="form-control" id="effectivedate"  value="{{old('effectivedate',request()->segment(3)?$sender->effectivedate:'')}}" name="effectivedate">
													@error('effectivedate')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Confidentiality Intimation Date</label>
													<input type="date" class="form-control" id="confintimatdate"  value="{{old('confintimatdate',request()->segment(3)?$upsi->confintimatdate:'')}}" name="confintimatdate" >
													@error('confintimatdate')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Purpose of Sharing</label>
													<input type="text" class="form-control" id="exampleInputName1"  value="{{old('purpose',request()->segment(3)?$upsi->purpose:'')}}" name="purpose" placeholder="Purpose of Sharing">
													@error('purpose')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
                                            <hr>
											<div class="form-row">
												<div class="form-group col-lg-12">
													<label for="exampleInputName1">Previous Date</label>
													<input type="datetime-local" class="form-control" id="predate"  value="{{old('predate',request()->segment(3)?$upsi->predate:'')}}" name="predate" >
													@error('predate')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>	
											</div>
											
											<div class="form-row">
												<div class="form-group col-lg-12">
													<label for="exampleInputEmail3">Description Of Agreement</label>
													<textarea class="form-control" name="descriptionagreement" placeholder="Description Of Agreement">{{old('descriptionagreement')}}</textarea>
													@error('descriptionagreement')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
											<div class="form-row">

												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Information Description</label>
													<input type="text" class="form-control" id="exampleInputName1"  value="{{old('descriptioninfo',request()->segment(3)?$upsi->descriptioninfo:'')}}" name="descriptioninfo" placeholder="Information Description">
													@error('descriptioninfo')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>

												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Remark</label>
													<input type="text" class="form-control" id="exampleInputName1"  value="{{old('remark',request()->segment(3)?$upsi->remark:'')}}" name="remark" placeholder="Remark">
													@error('remark')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Status</label>
													<select name="status" class="form-control">
														<option value="">SELECT STATUS</option>
														<option value="active"  selected {{old('status')=='active'?'selected':''}}>Active</option>
														<option value="inactive" {{old('status')=='inactive'?'selected':''}}>Inactive</option>
													</select>
													@error('status')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
											

											<input  name="{{request()->segment(3)?'update':'add'}}" type="submit" class="btn btn-primary mr-2" value="{{request()->segment(3)?'update':'add'}}">

										</form>
									</div>
								</div>

							</div>

							@endif


							@if(request()->segment(3))
							<div class="tab-pane fade show {{request()->is('upsi/edit/'.$upsi->id)?'active':''}}" id="{{url('addupsi')}}" role="tabpanel" aria-labelledby="home-tab">



								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Edit UPSI</h4>
										<!-- <p class="card-description">
											Basic form elements
										</p> -->
										<form class="forms-sample" method="POST">
											@csrf
											<div class="form-row">
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Nature Of Information</label>
													<select name="natureinfo" class="form-control">
														<option value="">Selete Nature of Info</option>
														@if($natureinfo)
														@foreach($natureinfo as $f)
														<option value="{{$f->id}}" {{old('natureinfo',$f->id)==$f->id?'selected':''}}>{{$f->natureinfo}}</option>
														@endforeach
														@endif
													</select>
													@error('natureinfo')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Legitimate Purpose</label>
													<select name="legitmate" class="form-control">
														<option value="">Legimate Purpose</option>
														<option value="yes" {{old('legitmate',$upsi->legitmate)=='yes'?'selected':''}}>Yes</option>
														<option value="no" {{old('legitmate',$upsi->legitmate)=='no'?'selected':''}}>No</option>
													</select>
													@error('legitmate')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Recipient </label>
													<select name="recipienst" class="form-control">
														<option value="">Selete Recipiniest</option>
														@if($recipt)
														@foreach($recipt as $r)
														<option value="{{$r->id}}" {{old('recipienst',$r->id)==$r->id?'selected':''}}>{{$r->name}}</option>
														@endforeach
														@endif
													</select>
													@error('recipienst')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Sender </label>
													<select name="sender" class="form-control">
														<option value="">Selete Sender</option>
														@if($send)
														@foreach($send as $s)
														<option value="{{$s->id}}" {{old('sender',$s->id)==$s->id?'selected':''}}>{{$s->name}}</option>
														@endforeach
														@endif
													</select>
													@error('sender')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Type Of Sharing</label>
													<select name="sharingtype" id="sharingtype" class="form-control">
														<option value="">Select Type Of Sharing</option>
														<option value="ongoing" {{old('sharingtype',$upsi->sharingtype)=='ongoing'?'selected':''}}>Ongoing</option>
														<option value="ontime" {{old('sharingtype',$upsi->sharingtype)=='ontime'?'selected':''}}>Ontime</option>

													</select>
													@error('sharingtype')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
												<div class="form-group col-lg-4" id="enddategroup">
													<label for="exampleInputName1">End Date</label>

													<input type="date" name="enddate" id="enddate" class="form-control" value="{{old('enddate',request()->segment(3)?$upsi->enddate:'')}}">
													@error('enddate')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
											<hr>
											<div class="form-row">
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Date Of Sharing</label>
													<input type="date" class="form-control" id="exampleInputName1"  value="{{old('dateofshare',request()->segment(3)?$upsi->dateofshare:'')}}" name="dateofshare">
													@error('dateofshare')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Period Of Sharing</label>
													<input type="text" class="form-control" id="exampleInputName1"  value="{{old('periodofshare',request()->segment(3)?$upsi->periodofshare:'')}}" name="periodofshare">
													@error('dateofshare')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Mode Of Sharing</label>
													<select name="modeofsharing" class="form-control">
														<option value="" >Select Mode Of Sharing</option>
														<option value="physical" {{old('modeofsharing',$upsi->modeofsharing)=='physical'?'selected':''}}>Physically</option>
														<option value="electrically" {{old('modeofsharing',$upsi->modeofsharing)=='electrically'?'selected':''}}>Electronically</option>
														<option value="both" {{old('modeofsharing',$upsi->modeofsharing)=='both'?'selected':''}}>Both</option>

													</select>
													@error('modeofsharing')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Confidentiality  Agreement </label>
													<select name="confidentiality" class="form-control" id="confidentiality">
														<option value="">Select Confidencialtiy</option>
														<option value="yes" {{old('confidentiality',$upsi->confidentiality)=='yes'?'selected':''}}>Yes</option>
														<option value="no" {{old('confidentiality',$upsi->confidentiality)=='no'?'selected':''}}>No</option>

													</select>
													@error('confidentiality')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>


												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Effective Date Of Agreement</label>
													<input type="date" class="form-control" id="effectivedate"  value="{{old('effectivedate',request()->segment(3)?$upsi->effectivedate:'')}}" name="effectivedate">
													@error('effectivedate')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Confidentiality Intimation Date</label>
													<input type="date" class="form-control" id="confintimatdate"  value="{{old('confintimatdate',request()->segment(3)?$upsi->confintimatdate:'')}}" name="confintimatdate">
													@error('confintimatdate')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
											<hr>
											<div class="form-row">
												<div class="form-group col-lg-12">
													<label for="exampleInputEmail3">Description Of Agreement</label>
													<textarea class="form-control" name="descriptionagreement">{{old('descriptionagreement',$upsi->descriptionagreement)}}</textarea>
													@error('descriptionagreement')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Purpose of Sharing</label>
													<input type="text" class="form-control" id="exampleInputName1"  value="{{old('purpose',request()->segment(3)?$upsi->purpose:'')}}" name="purpose">
													@error('purpose')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Information Description</label>
													<input type="text" class="form-control" id="exampleInputName1"  value="{{old('descriptioninfo',request()->segment(3)?$upsi->descriptioninfo:'')}}" name="descriptioninfo">
													@error('descriptioninfo')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Remark</label>
													<input type="text" class="form-control" id="exampleInputName1"  value="{{old('remark',request()->segment(3)?$upsi->remark:'')}}" name="remark">
													@error('remark')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
											<div class="form-row">

												<div class="form-group col-lg-4">
													<label for="exampleInputName1">Status</label>
													<select name="status" class="form-control">
														<option value="">SELECT STATUS</option>
														<option value="active" selected {{old('status',$upsi->status)==='active'?'selected':''}}>Active</option>
														<option value="inactive" {{old('status',$upsi->status)==='inactive'?'selected':''}}  >Inactive</option>
													</select>
													@error('status')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>


											<input  name="{{request()->segment(3)?'update':'add'}}" type="submit" class="btn btn-primary mr-2" value="{{request()->segment(3)?'update':'add'}}">
										</form>
									</div>
								</div>
							</div>
							@endif
							@if(request()->is('upsi/list') || request()->is('upsi'))

							<div class="tab-pane fade show {{request()->is('upsi/list')?'active':(request()->is('upsi')?'active':'')}}" id="{{url('listupsi')}}" role="tabpanel" aria-labelledby="home-tab">
								<div class="card">
									<div class="card-body">
                  <!-- <h4 class="card-title">Basic Table</h4>
                  <p class="card-description">
                    Add class <code>.table</code>
                </p> -->
                @if(session()->has('update'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                	<strong>{{ session()->get('update') }} !</strong> 
                	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                		<span aria-hidden="true">&times;</span>
                	</button>
                </div>
                @endif
                @if(session()->has('delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                	<strong>{{ session()->get('delete') }} !</strong> 
                	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                		<span aria-hidden="true">&times;</span>
                	</button>
                </div>
                @endif
                <div class="table-responsive">

                	<table id="upsi" class="table table-striped table-bordered" style="width:100%">
                		<thead>
                			<tr>
                				<th>Id</th>
                				<th>UPSI No</th>
                				<th>Nature Of Information</th>
                				<th>Legitimate </th>
                				<th>Recipient</th>
                				<th>Sender</th>
                  				<!-- <th>Type Of Sharing</th>
                  				<th>Date Of Sharing </th>
                  				<th>Period Of Sharing</th>
                  				<th>Mode Of Sharing</th>
                  				<th>Confidentiality Agreement</th>
                  				<th>Effective Date Of Agreement</th>
                  				<th>Description Of Agreement </th>
                  				<th>Confidentiality Intimation Date</th>
                  				<th>Purpose Of Sharing</th>
                  				<th>Information Description</th>
                  				<th>Remark </th> -->
                  				<th>User and Time stamp</th>
                  				<th>Status</th>
                  				<th>Action</th>
                  			</tr>
                  		</thead>
                  		<tbody>



                  			@if($upsi)
                  			@foreach($upsi as $s)
                  			<tr>
                  				<td>{{$s->id}}</td>
                  				<td>{{$s->upsinum}}</td>
                  				<td>{{$s->natureinfo}}</td>
                  				<td>{{$s->legitmate}}</td>
                  				<td>{{$s->recipienst}}</td>
                  				<td>{{$s->sender}}</td>
                  				<!-- <td>{{$s->sharingtype}}</td>
                  				<td>{{$s->dateofshare}}</td>
                  				<td>{{$s->periodofshare}}</td>
                  				<td>{{$s->modeofsharing}}</td>
                  				<td>{{$s->confidentiality}}</td>
                  				<td>{{$s->effectivedate}}</td>
                  				<td>{{$s->descriptionagreement}}</td>
                  				<td>{{$s->confintimatdate}}</td>
                  				<td>{{$s->purpose}}</td> -->
                  				<!-- <td>{{$s->descriptioninfo}}</td>
                  					<td>{{$s->remark}}</td> -->
                  					<td>{{$s->dsctime}}</td>
                  					<td><label class="{{$s->status=='active'?'badge badge-success':'badge badge-danger'}} ">{{$s->status}}</label></td>
                  					<td>
                  						<a href="{{route('editupsi',$s->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                  						<a href="{{route('deleteupsi',$s->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
                  						<a href="" id="viewupsi" data-attr="{{ route('viewupsi', $s->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                  					</td>

                  				</tr>
                  				@endforeach
                  				@endif
                  			</tbody>
                  			<tfoot>
                  				<tr>
                  					<th>Id</th>
                  					<th>UPSI No</th>
                  					<th>Nature Of Information</th>
                  					<th>Legitimate </th>
                  					<th>Recipient</th>
                  					<th>Sender</th>
                  					<!-- <th>Type Of Sharing</th>
                  					<th>Date Of Sharing </th>
                  					<th>Period Of Sharing</th>
                  					<th>Mode Of Sharing</th>
                  					<th>Confidentiality Agreement</th>
                  					<th>Effective Date Of Agreement</th>
                  					<th>Purpose</th>
                  					<th>Description Of Agreement </th>
                  					<th>Confidentiality Intimation Date</th>
                  					<th>Purpose Of Sharing</th>
                  					<th>Information Description</th>
                  					<th>Remark </th> -->
                  					<th>User and Time stamp</th>
                  					<th>Status</th>
                  					<th>Action</th>
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

<!-- //Modal -->

<div class="modal fade bd-example-modal-lg" id="upsiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">UPSI </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="content">
				<input type="text" name="">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				
			</div>
		</div>
	</div>
</div>

<!-- content-wrapper ends -->
@endsection
@push('upsi')
<script type="text/javascript">
	$(document).ready(function () {


		$(function(){


			if($('#confidentiality').val()=='no'){
				$( "#effectivedate" ).prop( "disabled", true );
				$( "#confintimatdate" ).prop( "disabled", true );	
			}
			if($('#sharingtype').val()==='ongoing'){
				$( "#enddate" ).prop( "disabled", false );	
				$('#enddategroup').show();
			}else{
				$('#enddategroup').hide();
				$( "#enddate" ).prop( "disabled", true );	
			}
		})


		$(document).on('change','#sharingtype',function(){
			if($(this).val() === 'ongoing'){
				$('#enddategroup').show();
				$( "#enddate" ).prop( "disabled", false );	
			}else{

				$( "#enddate" ).prop( "disabled", true );	
				$('#enddategroup').hide();
			}
		});

		$(document).on('change','#confidentiality',function(){
			if($(this).val() ==='no'){
				
				$( "#effectivedate" ).prop( "disabled", true );
				$( "#confintimatdate" ).prop( "disabled", true );

			}
			if($(this).val() ==='yes'){
				
				$( "#effectivedate" ).attr( "disabled", false );
				$( "#confintimatdate" ).attr( "disabled", false );

				
			}

		})


		$('#upsi').DataTable();
		$(document).on('click','#viewupsi',function(e){
			e.preventDefault();
			let href = $(this).attr('data-attr');
			$.ajax({
				url: href,
				beforeSend: function() {
					$('#loader').show();
				},
                // return the result
                success: function(result) {
                	console.log(result);
                	$('#upsiModal').modal("show");
                	$('#content').html(result);

                },
                complete: function() {
                	$('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                	console.log(error);
                	alert("Page " + href + " cannot open. Error:" + error);
                	$('#loader').hide();
                },
                timeout: 8000
            })
		});
	});  
</script>
@endpush

<!-- Modal -->


