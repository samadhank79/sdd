@if(session()->has('admin'))
<?php $s = session()->get('admin'); ?>

@elseif(session()->has('users'))
<?php $s = session()->get('users'); ?>
@endif
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{url('AdminAssets')}}/vendors/feather/feather.css">
    <link rel="stylesheet" href="{{url('AdminAssets')}}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{url('AdminAssets')}}/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{url('AdminAssets')}}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="{{url('AdminAssets')}}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="{{url('AdminAssets')}}/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{url('AdminAssets')}}/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{url('AdminAssets')}}/images/Amazelogo.png" />

    <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">

    <!-- //DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <!-- //FontAwsom -->
    <link rel="stylesheet" type="text/css"
    href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
    

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="index.html"><img
                    src="{{url('AdminAssets')}}/images/Amazelogo.png" class="mr-2" alt="logo" /></a>
                    <a class="navbar-brand brand-logo-mini" href="index.html"><img
                        src="{{url('AdminAssets')}}/images/Amazelogo.png" alt="logo" /></a>
                    </div>
                    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                            <span class="icon-menu"></span>
                        </button>

                        <ul class="navbar-nav navbar-nav-right">
                            <li class="nav-item nav-profile dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                                    <!-- <img src="{{url('AdminAssets')}}/images/faces/face28.jpg" alt="profile" /> -->
                                    <i class="icon-ellipsis"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                aria-labelledby="profileDropdown">
                                <!--<a class="dropdown-item">-->
                                    <!--    <i class="ti-settings text-primary"></i>-->
                                    <!--    Settings-->
                                    <!--</a>-->
                                    
                                    <a class="dropdown-item" href="{{route('changepassword')}}">
                                        <i class="fa fa-key"></i>
                                        ChangePassword
                                    </a>
                                    <a class="dropdown-item" href="{{route('logout')}}">
                                        <i class="ti-power-off text-primary"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                    <!-- <li class="nav-item nav-settings d-none d-lg-flex">
                        <a class="nav-link" href="#">
                            <i class="icon-ellipsis"></i>
                        </a>
                    </li> -->
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
                <span class="icon-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
            <!-- <div id="settings-trigger"><i class="ti-settings"></i></div> -->
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                    <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                </div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme">
                    <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                </div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles success"></div>
                    <div class="tiles warning"></div>
                    <div class="tiles danger"></div>
                    <div class="tiles info"></div>
                    <div class="tiles dark"></div>
                    <div class="tiles default"></div>
                </div>
            </div>
        </div>
        <div id="right-sidebar" class="settings-panel">
            <i class="settings-close ti-close"></i>
            <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab"
                    aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab"
                    aria-controls="chats-section">CHATS</a>
                </li>
            </ul>
            <div class="tab-content" id="setting-content">
                <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel"
                aria-labelledby="todo-section">
                <div class="add-items d-flex px-3 mb-0">
                    <form class="form w-100">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                            <button type="submit" class="add btn btn-primary todo-list-add-btn"
                            id="add-task">Add</button>
                        </div>
                    </form>
                </div>
                <div class="list-wrapper px-3">
                    <ul class="d-flex flex-column-reverse todo-list">
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox">
                                    Team review meeting at 3.00 PM
                                </label>
                            </div>
                            <i class="remove ti-close"></i>
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox">
                                    Prepare for presentation
                                </label>
                            </div>
                            <i class="remove ti-close"></i>
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox">
                                    Resolve all the low priority tickets due today
                                </label>
                            </div>
                            <i class="remove ti-close"></i>
                        </li>
                        <li class="completed">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox" checked>
                                    Schedule meeting for next week
                                </label>
                            </div>
                            <i class="remove ti-close"></i>
                        </li>
                        <li class="completed">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox" checked>
                                    Project review
                                </label>
                            </div>
                            <i class="remove ti-close"></i>
                        </li>
                    </ul>
                </div>
                <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
                <div class="events pt-4 px-3">
                    <div class="wrapper d-flex mb-2">
                        <i class="ti-control-record text-primary mr-2"></i>
                        <span>Feb 11 2018</span>
                    </div>
                    <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
                    <p class="text-gray mb-0">The total number of sessions</p>
                </div>
                <div class="events pt-4 px-3">
                    <div class="wrapper d-flex mb-2">
                        <i class="ti-control-record text-primary mr-2"></i>
                        <span>Feb 7 2018</span>
                    </div>
                    <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                    <p class="text-gray mb-0 ">Call Sarah Graves</p>
                </div>
            </div>
            <!-- To do section tab ends -->
            <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                <div class="d-flex align-items-center justify-content-between border-bottom">
                    <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                    <small
                    class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See
                All</small>
            </div>
            <ul class="chat-list">
                <li class="list active">
                    <div class="profile"><img src="{{url('AdminAssets')}}/images/faces/face1.jpg"
                        alt="image"><span class="online"></span></div>
                        <div class="info">
                            <p>Thomas Douglas</p>
                            <p>Available</p>
                        </div>
                        <small class="text-muted my-auto">19 min</small>
                    </li>
                    <li class="list">
                        <div class="profile"><img src="{{url('AdminAssets')}}/images/faces/face2.jpg"
                            alt="image"><span class="offline"></span></div>
                            <div class="info">
                                <div class="wrapper d-flex">
                                    <p>Catherine</p>
                                </div>
                                <p>Away</p>
                            </div>
                            <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                            <small class="text-muted my-auto">23 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="{{url('AdminAssets')}}/images/faces/face3.jpg"
                                alt="image"><span class="online"></span></div>
                                <div class="info">
                                    <p>Daniel Russell</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">14 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="{{url('AdminAssets')}}/images/faces/face4.jpg"
                                    alt="image"><span class="offline"></span></div>
                                    <div class="info">
                                        <p>James Richardson</p>
                                        <p>Away</p>
                                    </div>
                                    <small class="text-muted my-auto">2 min</small>
                                </li>
                                <li class="list">
                                    <div class="profile"><img src="{{url('AdminAssets')}}/images/faces/face5.jpg"
                                        alt="image"><span class="online"></span></div>
                                        <div class="info">
                                            <p>Madeline Kennedy</p>
                                            <p>Available</p>
                                        </div>
                                        <small class="text-muted my-auto">5 min</small>
                                    </li>
                                    <li class="list">
                                        <div class="profile"><img src="{{url('AdminAssets')}}/images/faces/face6.jpg"
                                            alt="image"><span class="online"></span></div>
                                            <div class="info">
                                                <p>Sarah Graves</p>
                                                <p>Available</p>
                                            </div>
                                            <small class="text-muted my-auto">47 min</small>
                                        </li>
                                    </ul>
                                </div>
                                <!-- chat tab ends -->
                            </div>
                        </div>
                        <!-- partial -->
                        <!-- partial:partials/_sidebar.html -->
                        <nav class="sidebar sidebar-offcanvas" id="sidebar">
                            <ul class="nav">
                                <li class="nav-item {{request()->is('dashboard')?'active':''}}">
                                    <a class="nav-link active" href="{{route('dashboard')}}">
                                        <i class="icon-grid menu-icon"></i>
                                        <span class="menu-title">Dashboard</span>
                                    </a>
                                </li>


                                @if(session()->has('admin'))

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                                      <i class="icon-columns menu-icon"></i>
                                      <span class="menu-title">Masters</span>
                                      <i class="menu-arrow"></i>
                                  </a>
                                  <div class="collapse" id="form-elements">
                                      <ul class="nav flex-column sub-menu">

                                        <li class="nav-item {{request()->is('member/list')?'active':(request()->is('member')?'active':(request()->is('member/edit/'.request()->segment(3))?'active':(request()->is('member/add')?'active':'')))}}">
                                            <a class="nav-link" href="{{route('member')}}">
                                                <i class="icon-head menu-icon"></i>
                                                <span class="menu-title">Member Reg</span>
                                            </a>
                                        </li>
                                        <li class="nav-item {{request()->is('natureinfo/list')?'active':(request()->is('natureinfo')?'active':(request()->is('natureinfo/edit/'.request()->segment(3))?'active':(request()->is('natureinfo/add')?'active':'')))}}">
                                            <a class="nav-link" href="{{route('natureinfo')}}">
                                                <i class="icon-paper menu-icon"></i>
                                                <span class="menu-title">Natureinfo</span>
                                            </a>
                                        </li>
                                        <li class="nav-item {{request()->is('recipienst/list')?'active':(request()->is('recipienst')?'active':(request()->is('recipienst/edit/'.request()->segment(3))?'active':(request()->is('recipienst/add')?'active':'')))}}">
                                            <a class="nav-link" href="{{route('recipienst')}}">
                                                <i class="icon-head menu-icon"></i>
                                                <span class="menu-title">Recipients </span>
                                            </a>
                                        </li>
                                        <li class="nav-item {{request()->is('senders/list')?'active':(request()->is('senders')?'active':(request()->is('senders/edit/'.request()->segment(3))?'active':(request()->is('senders/add')?'active':'')))}}">
                                            <a class="nav-link" href="{{route('senders')}}">
                                                <i class="icon-head menu-icon"></i>
                                                <span class="menu-title">Senders</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item {{request()->is('upsi/list')?'active':(request()->is('upsi')?'active':(request()->is('upsi/edit/'.request()->segment(3))?'active':(request()->is('upsi/add')?'active':(request()->is('upsi/preupsiadd')?'active':''))))}}">
                                <a class="nav-link" href="{{route('upsi')}}">
                                    <i class="icon-columns  menu-icon"></i>
                                    <span class="menu-title">UPSI Entry</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#reports" aria-expanded="false" aria-controls="form-elements">
                                  <i class="icon-columns menu-icon"></i>
                                  <span class="menu-title">Reports</span>
                                  <i class="menu-arrow"></i>
                              </a>
                              <div class="collapse" id="reports">
                                  <ul class="nav flex-column sub-menu">

                                    <li class="nav-item {{request()->is('DataflowReportAdmin/'.$s->name)?'active':''}}">
                                        <a class="nav-link" href="{{route('dataflow',$s->name)}}">
                                            <i class="icon-paper menu-icon"></i>
                                            <span class="menu-title">Data Flow  </span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{request()->is('AudittrailReportAdmin/'.$s->name)?'active':''}}">
                                        <a class="nav-link" href="{{route('audit',$s->name)}}">
                                            <i class="icon-paper menu-icon"></i>
                                            <span class="menu-title">Audit Trial</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>



                        @elseif(session()->has('users'))

                        <li class="nav-item {{request()->is('upsi/list')?'active':(request()->is('upsi')?'active':(request()->is('upsi/edit/'.request()->segment(3))?'active':(request()->is('upsi/add')?'active':'')))}}">
                            <a class="nav-link"  href="{{route('upsi')}}">
                                <i class="icon-paper menu-icon"></i>
                                <span class="menu-title">UPSI Entry</span>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#reports" aria-expanded="false" aria-controls="form-elements">
                                  <i class="icon-columns menu-icon"></i>
                                  <span class="menu-title">Reports</span>
                                  <i class="menu-arrow"></i>
                              </a>
                              <div class="collapse" id="reports">
                                  <ul class="nav flex-column sub-menu">

                                    <li class="nav-item {{request()->is('DataflowReportAdmin/'.$s->name)?'active':''}}">
                                        <a class="nav-link" href="{{route('dataflow',$s->name)}}">
                                            <i class="icon-paper menu-icon"></i>
                                            <span class="menu-title">Data Flow  </span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{request()->is('AudittrailReportAdmin/'.$s->name)?'active':''}}">
                                        <a class="nav-link" href="{{route('audit',$s->name)}}">
                                            <i class="icon-paper menu-icon"></i>
                                            <span class="menu-title">Audit Trial</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li> -->
                        @else
                        @endif


                    </ul>
                </nav>
            <!-- partial -->