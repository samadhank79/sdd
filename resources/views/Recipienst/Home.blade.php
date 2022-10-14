
@section('title') {{'Recipients'}} @endsection
@extends('Layouts.Master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Recipients</h4>
            <!-- <p class="card-description">
              Add class <code>.table</code>
            </p> -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <a href="{{route('addrecipienst')}}" class="nav-link {{request()->is('recipienst/add')?'active':''}}">Add</a>

              </li>
              <li class="nav-item" role="presentation">
                <a href="{{route('listrecipienst')}}" class="nav-link {{request()->is('recipienst/list')?'active':(request()->is('recipienst')?'active':'')}}">List</a>

              </li>

            </ul>
            <div class="tab-content" id="myTabContent">


              @if(request()->is('recipienst/add'))

              <div class="tab-pane fade show {{request()->is('recipienst/add')?'active':''}} " id="{{url('addrecipienst')}}" role="tabpanel" aria-labelledby="home-tab">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Recipients</h4>
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
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" value="{{old('name',request()->segment(3)?$recipienst->name:'')}}" name="name">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                        <div class="form-group col-lg-4">
                        <label for="exampleInputName1">Email</label>
                        <input type="text" class="form-control" id="" placeholder="Email" value="{{old('email',request()->segment(3)?$recipienst->email:'')}}" name="email">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                        <div class="form-group col-lg-4">
                        <label for="exampleInputName1">PAN/ADHAR/PASSPORT NO.</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="PAN/ADHAR/PASSPORT NO." value="{{old('idproof',request()->segment(3)?$recipienst->idproof:'')}}" name="idproof">
                        @error('idproof')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      </div>
                      <div class="form-row">
                       <div class="form-group col-lg-4">
                        <label for="exampleInputEmail3">Designation</label>
                        <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Designation" value="{{old('designation',request()->segment(3)?$sender->designation:'')}}" name="designation">
                        @error('designation')
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
              <div class="tab-pane fade show {{request()->is('recipienst/edit/'.$recipienst->id)?'active':''}}" id="{{url('addrecipienst')}}" role="tabpanel" aria-labelledby="home-tab">



                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Recipients</h4>
                    <!-- <p class="card-description">
                      Basic form elements
                    </p> -->
                    <form class="forms-sample" method="POST">
                      @csrf
                      <div class="form-row">
                        <div class="form-group col-lg-4">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" value="{{old('name',request()->segment(3)?$recipienst->name:'')}}" name="name">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                        <div class="form-group col-lg-4">
                        <label for="exampleInputName1">Email</label>
                        <input type="text" class="form-control" id="" placeholder="Email" value="{{old('email',request()->segment(3)?$recipienst->email:'')}}" name="email">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                        <div class="form-group col-lg-4">
                        <label for="exampleInputName1">PAN/ADHAR/PASSPORT NO.</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="PAN/ADHAR/PASSPORT NO." value="{{old('idproof',request()->segment(3)?$recipienst->idproof:'')}}" name="idproof">
                        @error('idproof')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-lg-4">
                        <label for="exampleInputEmail3">Designation</label>
                        <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Designation" value="{{old('designation',request()->segment(3)?$recipienst->designation:'')}}" name="designation">
                        @error('designation')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                        <div class="form-group col-lg-4">
                        <label for="exampleInputName1">Status</label>
                        <select name="status" class="form-control">
                          <option value="">SELECT STATUS</option>
                          <option value="active" selected {{old('status',$recipienst->status)==='active'?'selected':''}}>Active</option>
                          <option value="inactive" {{old('status',$recipienst->status)==='inactive'?'selected':''}}  >Inactive</option>
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

              @if(request()->is('recipienst/list') || request()->is('recipienst'))

              <div class="tab-pane fade show {{request()->is('recipienst/list')?'active':(request()->is('recipienst')?'active':'')}}" id="{{url('listsender')}}" role="tabpanel" aria-labelledby="home-tab">

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

                    <table id="recipienst" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Designation</th>
                          <th>PAN/ADHAR/PASSPORT NO</th>
                          <th>Status</th>
                          <th>Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @if($recipienst)
                        @foreach($recipienst as $s)
                        <tr>
                          <td>{{$s->name}}</td>
                          <td>{{$s->email}}</td>
                          <td>{{$s->designation}}</td>
                          <td>{{$s->idproof}}</td>
                          <td><label class="{{$s->status=='active'?'badge badge-success':'badge badge-danger'}}">{{$s->status}}</label></td>
                          <td>

                            <a href="{{route('editrecipienst',$s->id)}}" class="btn btn-success btn-sm rounded-0 "><i class="fa fa-edit"></i></a>
                            <a href="{{route('deleterecipienst',$s->id)}}" class="btn btn-danger btn-sm rounded-0"   onclick="return confirm('Are you sure?')" ><i class="fa fa-trash"></a></td>


                            </tr>
                            @endforeach
                            @endif

                          </tbody>
                          <tfoot>
                            <tr>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Designation</th>
                              <th>PAN/ADHAR/PASSPORT NO</th>
                              <th>Status</th>
                              <th>Action</th>

                            </tr>
                          </tfoot>
                        </table>


                      </div>
                      0.
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

    @push('recipienst')
    <script type="text/javascript">
      $(document).ready(function () {
        $('#recipienst').DataTable();
      });  
    </script>

    @endpush