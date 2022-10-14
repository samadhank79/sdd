@section('title') {{'member'}} @endsection
@extends('Layouts.Master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Members</h4>
            <!-- <p class="card-description">
              Add class <code>.table</code>
            </p> -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <a href="{{route('addmember')}}" class="nav-link {{request()->is('member/add')?'active':''}}">Add</a>

              </li>
              <li class="nav-item" role="presentation">
                <a href="{{route('listmember')}}" class="nav-link  {{request()->is('member/list')?'active': (request()->is('natureinfo')?'active':'')}}">List</a>

              </li>

            </ul>
            <div class="tab-content" id="myTabContent">


              @if(request()->is('member/add'))

              <div class="tab-pane fade show {{request()->is('member/add')?'active':''}} " id="{{url('addmember')}}" role="tabpanel" aria-labelledby="home-tab">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Member</h4>
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
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" value="{{old('name',request()->segment(3)?$users->name:'')}}" name="name">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                        <div class="form-group col-lg-4">
                        <label for="exampleInputName1">Email</label>
                        <input type="email" class="form-control" id="exampleInputName1" placeholder="Email" value="{{old('email',request()->segment(3)?$user->email:'')}}" name="email">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                        <div class="form-group col-lg-4">
                        <label for="exampleInputName1">Password</label>
                        <input type="password" class="form-control" id="exampleInputName1" placeholder="Password" value="{{old('passwd',request()->segment(3)?$user->passwd:'')}}" name="passwd">
                        @error('passwd')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-lg-4">
                        <label for="exampleInputName1">Designation</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Designation" value="{{old('designation',request()->segment(3)?$user->designation:'')}}" name="designation">
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
              <div class="tab-pane fade show {{request()->is('member/edit/'.$user->id)?'active':''}}" id="{{url('addsender')}}" role="tabpanel" aria-labelledby="home-tab">



                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Member</h4>
                    <!-- <p class="card-description">
                      Basic form elements
                    </p> -->
                    <form class="forms-sample" method="POST">
                      @csrf
                      <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" value="{{old('name',request()->segment(3)?$user->name:'')}}" name="name">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                        <div class="form-group col-md-6">
                        <label for="exampleInputName1">Email</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" value="{{old('email',request()->segment(3)?$user->email:'')}}" name="email">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="exampleInputName1">Designation</label>
                        
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" value="{{old('designation',request()->segment(3)?$user->designation:'')}}" name="designation">
                        @error('designation')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                        <div class="form-group col-md-6">
                        <label for="exampleInputName1">Status</label>
                        <select name="status" class="form-control">
                          <option value="">SELECT STATUS</option>
                          <option value="active" selected {{old('status',$user->status)==='active'?'selected':''}}>Active</option>
                          <option value="inactive" {{old('status',$user->status)==='inactive'?'selected':''}}  >Inactive</option>
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

              @if(request()->is('member/list') || request()->is('member'))

              <div class="tab-pane fade show {{request()->is('member/list')?'active':(request()->is('member')?'active':'')}}" id="{{url('member')}}" role="tabpanel" aria-labelledby="home-tab">

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

                    <table id="members" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Name </th>
                          <th>Email </th>
                          <th>Designation</th>
                          <th>Status</th>
                          <th>Action</th>

                        </tr>
                      </thead>
                      <tbody>
                        @if($users)
                        @foreach($users as $s)
                        <tr>
                          <td>{{$s->name}}</td>
                          <td><label >{{$s->email}}</label></td>
                          <td><label >{{$s->designation}}</label></td>
                          <td><label class="{{$s->status=='active'?'badge badge-success':'badge badge-danger'}}">{{$s->status}}</label></td>

                          <td>
                            <a href="{{route('editmember',$s->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                            <a href="{{route('deletemember',$s->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a></td>


                          </tr>
                          @endforeach
                          @endif

                        </tbody>
                        <tfoot>
                          <tr>
                           <th>Name </th>
                           <th>Email </th>
                           <th>Designation</th>
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

 @push('members')
 <script type="text/javascript">
  $(document).ready(function () {
    $('#members').DataTable();
  });  
</script>

@endpush