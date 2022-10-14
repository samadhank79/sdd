@section('title') {{'natureinfo'}} @endsection
@extends('Layouts.Master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Nature Of Information</h4>
            <!-- <p class="card-description">
              Add class <code>.table</code>
            </p> -->


            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <a href="{{route('addnatureinfo')}}" class="nav-link {{request()->is('natureinfo/add')?'active':''}}">Add</a>

              </li>
              <li class="nav-item" role="presentation">
                <a href="{{route('listnatureinfo')}}" class="nav-link  {{request()->is('natureinfo/list')?'active': (request()->is('natureinfo')?'active':'')}}">List</a>

              </li>

            </ul>


            <div class="tab-content" id="myTabContent">


              @if(request()->is('natureinfo/add'))

              <div class="tab-pane fade show {{request()->is('natureinfo/add')?'active':''}} " id="{{url('addsender')}}" role="tabpanel" aria-labelledby="home-tab">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Nature Of Information</h4>
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
                        <div class="form-group col-md-6">
                        <label for="exampleInputName1">Nature Of Information</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Nature Of Information" value="{{old('natureinfo',request()->segment(3)?$natureinfo->natureinfo:'')}}" name="natureinfo" >
                        @error('natureinfo')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                        <div class="form-group col-md-6">
                        <label for="exampleInputName1">Status</label>
                        <select name="status" class="form-control">
                          <option value="">SELECT STATUS</option>
                          <option value="active"  selected   {{old('status')=='active'?'selected':''}}>Active</option>
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
              <div class="tab-pane fade show {{request()->is('natureinfo/edit/'.$natureinfo->id)?'active':''}}" id="{{url('addsender')}}" role="tabpanel" aria-labelledby="home-tab">



                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Nature Of Information</h4>
                    <!-- <p class="card-description">
                      Basic form elements
                    </p> -->
                    <form class="forms-sample" method="POST">
                      @csrf
                      <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="exampleInputName1">Nature Of Information</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Nature Of Information" value="{{old('natureinfo',request()->segment(3)?$natureinfo->natureinfo:'')}}" name="natureinfo">
                        @error('natureinfo')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      
                        <div class="form-group col-md-6">
                        <label for="exampleInputName1">Status</label>
                        <select name="status" class="form-control">
                          <option value="">SELECT STATUS</option>
                          <option value="active" selected {{old('status',$natureinfo->status)==='active'?'selected':''}}>Active</option>
                          <option value="inactive" {{old('status',$natureinfo->status)==='inactive'?'selected':''}}  >Inactive</option>
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





              @if(request()->is('natureinfo/list') || request()->is('natureinfo'))




              <div class="tab-pane fade show {{request()->is('natureinfo/list')?'active':(request()->is('natureinfo')?'active':'')}}" id="{{url('natureinfo')}}" role="tabpanel" aria-labelledby="home-tab">

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

                    <table id="natureinfo" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Nature Of Information</th>
                          
                          <th>Status</th>
                          <th>Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @if($natureinfo)
                        @foreach($natureinfo as $s)
                        <tr>
                          <td>{{$s->natureinfo}}</td>
                          
                          <td><label class="{{$s->status=='active'?'badge badge-success':'badge badge-danger'}}">{{$s->status}}</label></td>
                          <td>
                            <a href="{{route('editnatureinfo',$s->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                            <a href="{{route('deletenatureinfo',$s->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a></td>


                          </tr>
                          @endforeach
                          @endif

                        </tbody>
                        <tfoot>
                          <tr>
                            <th>Nature Of Information</th>
                            
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
  <!-- content-wrapper ends -->
  @endsection

  @push('natureinfo')
  <script type="text/javascript">
    $(document).ready(function () {
      $('#natureinfo').DataTable();
    });  
  </script>

  @endpush