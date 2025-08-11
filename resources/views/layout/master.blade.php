<!doctype html>

<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/printlab.PNG">
    <title>@yield('title') | PrintLab Web Solution</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('css/main.css')}}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
     <!-- SELECT 2 CSS -->
     <link href="{!! asset('assets/select2/dist/css/select2.css') !!}" rel="stylesheet">
</head>
<style>
    .nav-item.nav-link.dropdown-toggle.text-secondary{
        color: #fff !important;
    }
</style>
<body class="d-flex flex-column h-100">
	<div id="page">

		<div class="wrapper">

			<nav id="sidebar" class="active" >

				<div class="sidebar-header text-center">

					<h4 class="sidebar-title theme-item"><img src="{{asset('img/printlab.PNG')}}" alt="logo" class="app-logo" style="width: 160px; height: 50px;"></h4>
				</div>

				<ul class="list-unstyled components text-secondary" >
					<li><a href="{{route('dashboard')}}"><i
							class="data-feather theme-item" data-feather="home"></i> <span
							class="theme-item"> Dashboard</span></a></li>


					<li>
						<div class="sidebardropdown">
							<a href="javascript:void(0);" class="sidebar-dropdown-btn"
								id="dropdown-btn" onclick="myFunction()"><i
								class="data-feather theme-item" data-feather="user"></i> <span
								class="theme-item"> Parties</span><i
								class="sidenaviconopen float-end" id="sidenavicon"
								data-feather="chevron-up"></i></a>

							<div class="dropdown-container">
								<a href="{{route('customers.add_customer')}}" class="text-center">
                                    <i class="data-feather theme-item" ></i>
                                    <span class="data-feather theme-item">Add Customer</span>
                                </a>

                                <a href="{{route('customers.all_customers')}}" class="text-center">
                                    <i class="data-feather theme-item" ></i>
                                    <span class="data-feather theme-item"> View Customers</span>
                                </a>

                                <a href="{{route('users.add_user')}}" class="text-center">
                                    <i class="data-feather theme-item" ></i>
                                    <span class="data-feather theme-item">Add User</span>
                                </a>

                                <a href="{{route('users.all_users')}}" class="text-center">
                                    <i class="data-feather theme-item" ></i>
                                    <span class="data-feather theme-item"> View Users</span>
                                </a>

                                <a href="{{route('suppliers.add_supplier')}}" class="text-center">
                                    <i class="data-feather theme-item" ></i>
                                    <span class="data-feather theme-item">Add Suppliers</span>
                                </a>

                                <a href="{{route('suppliers.all_suppliers')}}" class="text-center">
                                    <i class="data-feather theme-item"></i>
                                    <span class="data-feather theme-item">View Suppliers</span>
                                </a>

                                <a href="{{route('users.testimonial.add_testimonial')}}" class="text-center">
                                    <i class="data-feather theme-item"></i>
                                    <span class="data-feather theme-item">Customer Testimonials</span>
                                </a>


							</div>
						</div>
					</li>

                    <li>
						<div class="sidebardropdown">
							<a href="javascript:void(0);" class="sidebar-dropdown-btn"
								id="dropdown-btn" onclick="myFunction()"><i
								class="data-feather theme-item" data-feather="grid"></i> <span
								class="theme-item"> Finance</span><i
								class="sidenaviconopen float-end" id="sidenavicon"
								data-feather="chevron-up"></i></a>

							<div class="dropdown-container">
								<a href="{{route('finance.requisitions.all_requisitions')}}" class="text-center">
                                    <i class="data-feather theme-item"></i>
                                    <span class="data-feather theme-item">Requisitions</span>
                                </a>

                                <a href="{{route('finance.expenses.all_expenses')}}" class="text-center">
                                    <i class="data-feather theme-item"></i>
                                    <span class="data-feather theme-item">Expenses</span>
                                </a>

                                <a href="{{route('finance.transactions.all_transactions')}}" class="text-center">
                                    <i class="data-feather theme-item"></i>
                                    <span class="data-feather theme-item">Customer Payments</span>
                                </a>
                                <a href="{{route('finance.report.debtors.all_debtors')}}" class="text-center">
                                    <i class="data-feather theme-item"></i>
                                    <span class="data-feather theme-item">Debtors Report</span>
                                </a>
                                <a href="{{route('finance.report.creditors.all_creditors')}}" class="text-center">
                                    <i class="data-feather theme-item"></i>
                                    <span class="data-feather theme-item">Creditors Report</span>
                                </a>

                                <a href="{{route('finance.report.profit_loss.all_profit_loss')}}" class="text-center">
                                    <i class="data-feather theme-item"></i>
                                    <span class="data-feather theme-item">Profit/Loss Report</span>
                                </a>
							</div>
						</div>
					</li>

                    <li>
						<div class="sidebardropdown">
							<a href="javascript:void(0);" class="sidebar-dropdown-btn"
								id="dropdown-btn" onclick="myFunction()"><i
								class="data-feather theme-item" data-feather="shopping-cart"></i> <span
								class="theme-item"> Orders</span><i
								class="sidenaviconopen float-end" id="sidenavicon"
								data-feather="chevron-up"></i></a>

							<div class="dropdown-container">
								<a href="{{route('job_order.all_orders')}}" class="text-center">
                                    <i class="data-feather theme-item" ></i>
                                    <span class="data-feather theme-item">All Orders</span>
                                </a>

                                <a href="{{route('job_order.status.pending')}}" class="text-center">
                                    <i class="data-feather theme-item" ></i>
                                    <span class="data-feather theme-item">Pending</span>
                                </a>

                                <a href="{{route('job_order.status.designed')}}" class="text-center">
                                    <i class="data-feather theme-item" ></i>
                                    <span class="data-feather theme-item">Designed</span>
                                </a>

                                <a href="{{route('job_order.status.proof_read')}}" class="text-center">
                                    <i class="data-feather theme-item" ></i>
                                    <span class="data-feather theme-item">Proof Read</span>
                                </a>

                                <a href="{{route('job_order.status.customer_approved')}}" class="text-center">
                                    <i class="data-feather theme-item"></i>
                                    <span class="data-feather theme-item">Customer Approved</span>
                                </a>

                                <a href="{{route('job_order.status.prepressed')}}" class="text-center">
                                    <i class="data-feather theme-item" ></i>
                                    <span class="data-feather theme-item">Prepressed</span>
                                </a>

                                <a href="{{route('job_order.status.printed')}}" class="text-center">
                                    <i class="data-feather theme-item"></i>
                                    <span class="data-feather theme-item">Printed</span>
                                </a>

                                <a href="{{route('job_order.status.binded')}}" class="text-center">
                                    <i class="data-feather theme-item" ></i>
                                    <span class="data-feather theme-item">Binded</span>
                                </a>

                                <a href="{{route('job_order.status.completed')}}" class="text-center">
                                    <i class="data-feather theme-item"></i>
                                    <span class="data-feather theme-item">Completed</span>
                                </a>

                                <a href="{{route('job_order.status.delivered')}}" class="text-center">
                                    <i class="data-feather theme-item" ></i>
                                    <span class="data-feather theme-item">Delivered</span>
                                </a>

							</div>
						</div>
					</li>


                    <li>
						<div class="sidebardropdown">
							<a href="javascript:void(0);" class="sidebar-dropdown-btn"
								id="dropdown-btn" onclick="myFunction()"><i
								class="data-feather theme-item" data-feather="user"></i> <span
								class="theme-item"> Users</span><i
								class="sidenaviconopen float-end" id="sidenavicon"
								data-feather="chevron-up"></i></a>

							<div class="dropdown-container">
								<a href="{{route('users.add_user')}}" class="text-center">
                                    <i class="data-feather theme-item"></i>
                                    <span class="data-feather theme-item">Add User</span>
                                </a>

                                <a href="{{route('users.all_users')}}" class="text-center">
                                    <i class="data-feather theme-item" ></i>
                                    <span class="data-feather theme-item">View All</span>
                                </a>

                                <a href="{{route('roles.add_role')}}" class="text-center">
                                    <i class="data-feather theme-item" ></i>
                                    <span class="data-feather theme-item"> Roles & Permissions</span>
                                </a>

							</div>
						</div>
					</li>

                    <li>
						<div class="sidebardropdown">
							<a href="javascript:void(0);" class="sidebar-dropdown-btn"
								id="dropdown-btn" onclick="myFunction()"><i
								class="data-feather theme-item" data-feather="user"></i> <span
								class="theme-item"> Settings</span><i
								class="sidenaviconopen float-end" id="sidenavicon"
								data-feather="chevron-up"></i></a>

							<div class="dropdown-container">
								<a href="{{route('settings.category.add_category')}}" class="text-center">
                                    <i class="data-feather theme-item"></i>
                                    <span class="data-feather theme-item">Category</span>
                                </a>

                                <a href="{{route('job_order.location.add_location')}}" class="text-center">
                                    <i class="data-feather theme-item"></i>
                                    <span class="data-feather theme-item">Locations</span>
                                </a>


                                <a href="{{route('roles.add_role')}}" class="text-center">
                                    <i class="data-feather theme-item" ></i>
                                    <span class="data-feather theme-item"> Users Roles & Permission</span>
                                </a>

							</div>
						</div>
					</li>
				</ul>

			</nav>

			<div id="bodywrapper" class="container-fluid showhidetoggle">

				<nav class="navbar navbar-expand-md  py-0"
					aria-label="navbarexample" id="navbar" style="background: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%); color:#fff">
					<div class="container-fluid">
						<button type="button" id="sidebarCollapse"
							class="btn btn-light py-0">
							<i data-feather="menu"></i> <span></span>
						</button>
						<img src="{{asset('img/printlab.PNG')}}" alt="logo"
							class="app-logo theme-item mx-2 navbrandarea1" style="width: 160px; height: 50px;">
						<!-- <h4 class="sidebar-title theme-item mt-2 navbrandarea2">PRINTLAB</h4> -->
						<button class="navbar-toggler py-0" type="button"
							data-bs-toggle="collapse" data-bs-target="#navbarsExample04"
							aria-controls="navbarsExample04" aria-expanded="false"
							aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"><i data-feather="menu"></i></span>
						</button>

						<div class="collapse navbar-collapse mx-1" id="navbarsExample04">
							<ul class="navbar-nav me-auto mb-2 mb-lg-0">

								<li class="nav-item">
									<div class="nav-dropdown">
										<a class="nav-item nav-link active text-secondary py-0"
											aria-current="page" href="{{route('dashboard')}}"><i
											class="data-feather theme-item" data-feather="home"></i> <span
											class="theme-item">Dashboard </span></a>
									</div>
								</li>

								<li class="nav-item dropdown nav-dropdown"><a
									class="nav-item nav-link dropdown-toggle text-secondary py-0"
									href="#" id="navbarDropdownMenuLink1" role="button"
									data-bs-toggle="dropdown" aria-expanded="false"><i
										class="data-feather theme-item" data-feather="user"></i> <span
										class="theme-item">Parties</span><i
										class="data-feather theme-item" data-feather="chevron-down"></i></a>
									<ul class="dropdown-menu"
										aria-labelledby="navbarDropdownMenuLink1">
										<li><a class="dropdown-item" href="{{route('customers.add_customer')}}">Add Customer</a></li>
										<li><a class="dropdown-item" href="{{route('customers.all_customers')}}"> View Customers</a></li>

                                        <li><a class="dropdown-item" href="{{route('users.add_user')}}">Add User</a></li>
										<li><a class="dropdown-item" href="{{route('users.all_users')}}"> View Usesr</a></li>

                                        <li><a class="dropdown-item" href="{{route('suppliers.add_supplier')}}">Add Suppliers</a></li>
										<li><a class="dropdown-item" href="{{route('suppliers.all_suppliers')}}">View Suppliers</a></li>
                                        <li><a class="dropdown-item" href="{{route('users.testimonial.add_testimonial')}}">Customer Testimonials</a></li>


									</ul>
								</li>

								<li class="nav-item dropdown nav-dropdown"><a
									class="nav-item nav-link dropdown-toggle text-secondary py-0"
									href="#" id="navbarDropdownMenuLink1" role="button"
									data-bs-toggle="dropdown" aria-expanded="false"><i
										class="data-feather theme-item" data-feather="grid"></i> <span
										class="theme-item">Finance</span><i
										class="data-feather theme-item" data-feather="chevron-down"></i></a>
									<ul class="dropdown-menu"
										aria-labelledby="navbarDropdownMenuLink1">
                                        {{-- <li><a class="dropdown-item" href="{{route('finance.requisitions.all_requisitions')}}">Requsitions</a></li> --}}
                                        <li><a class="dropdown-item" href="{{route('finance.expenses.all_expenses')}}">Expenses</a></li>
                                        <li><a class="dropdown-item" href="{{route('finance.transactions.all_transactions')}}">Customer Payments</a></li>
                                        <li><a class="dropdown-item" href="{{route('finance.report.debtors.all_debtors')}}">Debtors Report</a></li>
                                        <li><a class="dropdown-item" href="{{route('finance.report.creditors.all_creditors')}}">Creditors Report</a></li>
                                        <li><a class="dropdown-item" href="{{route('finance.report.profit_loss.all_profit_loss')}}">Profit/Loss Report</a></li>

									</ul>
								</li>




                                <li class="nav-item dropdown nav-dropdown"><a
									class="nav-item nav-link dropdown-toggle text-secondary py-0"
									href="#" id="navbarDropdownMenuLink1" role="button"
									data-bs-toggle="dropdown" aria-expanded="false"><i
										class="data-feather theme-item" data-feather="grid"></i> <span
										class="theme-item">Orders</span><i
										class="data-feather theme-item" data-feather="chevron-down"></i></a>
									<ul class="dropdown-menu"
										aria-labelledby="navbarDropdownMenuLink1">
										{{-- <li><a class="dropdown-item" href="#"></a></li>
										<li><a class="dropdown-item" href="#"></a></li> --}}
										<li class="dropdown-submenu">
                                            <a class="dropdown-item mr-3" href="#">External Orders <i class="data-feather" data-feather="chevron-right"></i></a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                                                <li><a class="dropdown-item" href="{{route('external_job_order.all_orders')}}">All Orders</a></li>
                                                <li><a class="dropdown-item" href="{{route('external_job_order.status.pending')}}">Pending</a></li>
                                                <li><a class="dropdown-item" href="{{route('external_job_order.status.designed')}}">Designed</a></li>
                                                <li><a class="dropdown-item" href="{{route('external_job_order.status.proof_read')}}">Proof Read</a></li>
                                                <li><a class="dropdown-item" href="{{route('external_job_order.status.customer_approved')}}">Customer Approved</a></li>
                                                <li><a class="dropdown-item" href="{{route('external_job_order.status.prepressed')}}">Prepressed</a></li>
                                                <li><a class="dropdown-item" href="{{route('external_job_order.status.printed')}}">Printed</a></li>
                                                <li><a class="dropdown-item" href="{{route('external_job_order.status.binded')}}">Binded</a></li>
                                                <li><a class="dropdown-item" href="{{route('external_job_order.status.completed')}}">Completed</a></li>
                                                <li><a class="dropdown-item" href="{{route('external_job_order.status.delivered')}}">Delivered</a></li>
                                            </ul>
                                        </li>

                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item mr-3" href="#">Internal Orders <i class="data-feather" data-feather="chevron-right"></i></a>
											<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                                                <li><a class="dropdown-item" href="{{route('job_order.all_orders')}}">All Orders</a></li>
                                                <li><a class="dropdown-item" href="{{route('job_order.status.pending')}}">Pending</a></li>
                                                <li><a class="dropdown-item" href="{{route('job_order.status.designed')}}">Designed</a></li>
                                                <li><a class="dropdown-item" href="{{route('job_order.status.proof_read')}}">Proof Read</a></li>
                                                <li><a class="dropdown-item" href="{{route('job_order.status.customer_approved')}}">Customer Approved</a></li>
                                                <li><a class="dropdown-item" href="{{route('job_order.status.prepressed')}}">Prepressed</a></li>
                                                <li><a class="dropdown-item" href="{{route('job_order.status.printed')}}">Printed</a></li>
                                                <li><a class="dropdown-item" href="{{route('job_order.status.binded')}}">Binded</a></li>
                                                <li><a class="dropdown-item" href="{{route('job_order.status.completed')}}">Completed</a></li>
                                                <li><a class="dropdown-item" href="{{route('job_order.status.delivered')}}">Delivered</a></li>
                                            </ul>
                                        </li>


									</ul>
								</li>

                                <li class="nav-item dropdown nav-dropdown"><a
									class="nav-item nav-link dropdown-toggle text-secondary py-0"
									href="#" id="navbarDropdownMenuLink1" role="button"
									data-bs-toggle="dropdown" aria-expanded="false"><i
										class="data-feather theme-item" data-feather="shopping-cart"></i> <span
										class="theme-item">Products</span><i
										class="data-feather theme-item" data-feather="chevron-down"></i></a>
									<ul class="dropdown-menu"
										aria-labelledby="navbarDropdownMenuLink1">
										<li><a class="dropdown-item" href="{{route('products.add_higher_education')}}">Create Product</a></li>
										<li><a class="dropdown-item" href="{{route('products.all_products')}}">All Products</a></li>

									</ul>
								</li>


                                <li class="nav-item dropdown nav-dropdown"><a
									class="nav-item nav-link dropdown-toggle text-secondary py-0"
									href="#" id="navbarDropdownMenuLink1" role="button"
									data-bs-toggle="dropdown" aria-expanded="false"><i
										class="data-feather theme-item" data-feather="user"></i> <span
										class="theme-item">Settings</span><i
										class="data-feather theme-item" data-feather="chevron-down"></i></a>
									<ul class="dropdown-menu"
										aria-labelledby="navbarDropdownMenuLink1">
										<li><a class="dropdown-item" href="{{route('settings.category.add_category')}}">Category</a></li>
										<li><a class="dropdown-item" href="{{route('job_order.location.add_location')}}">Locations</a></li>
                                        <li><a class="dropdown-item" href="{{route('roles.add_role')}}">Users Roles & Permission</a></li>

									</ul>
								</li>

							</ul>


							<a href="{{route('job_order.higher_education')}}"><button type="button" class="btn btn-lg" style="background-color: #df4226; color: #fff;">Create Job Order </button></a>

							<div class="usermenu">
								<div class="nav-dropdown py-0">
									<a href="#"
										class="nav-item nav-link dropdown-toggle text-secondary py-0"
										id="navbarDropdown3" role="button" data-bs-toggle="dropdown"
										aria-expanded="false"> <img class="theme-item user-avatar"
										src="{{asset('img/earth.svg')}}" alt="User image"> <!--<i class="theme-item" -->
										<!--data-feather="user"></i> --> <span class="theme-item">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</span><i class="theme-item" data-feather="chevron-down"></i></a>
									<ul class="dropdown-menu dropdown-menu-end"
										aria-labelledby="navbarDropdown3">
										<li><a href="{{route('users.view_profile')}}" class="dropdown-item mt-2"><i
												class="data-feather" data-feather="user"></i> Profile</a></li>

										<li><a href="{{route('logout')}}" class="dropdown-item mt-2"><i
												class="data-feather" data-feather="log-out"></i> Logout</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</nav>


				<div class="settings">
					<div class="modal fade" id="settingsModal"
						aria-labelledby="settingsModalTitle" aria-hidden="true"
						tabindex="-1">
						<!-- 				 data-bs-backdrop="static" data-bs-keyboard="false" -->
						<div class="modal-dialog modal-dialog-settings">
							<div class="modal-content">
								<div class="modal-header text-center">
									<h5 class="modal-title" id="exampleModalLabel">Settings</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-body">

									<section id="logincontent" class="shiftdown">

										<div class="row g-3 mb-3 mt-3">

											<div class="col-md-6">
												<h6 class="text-muted">Select Color</h6>
												<span onclick="changeColor('0')"
													class="btn btn-sm btn-primary rounded-circle"><span
													class="me-2"></span></span> <span onclick="changeColor('1')"
													class="btn btn-sm btn-success rounded-circle"><span
													class="me-2"></span></span> <span onclick="changeColor('2')"
													class="btn btn-sm btn-danger rounded-circle"><span
													class="me-2"></span></span> <span onclick="changeColor('3')"
													class="btn btn-sm btn-warning rounded-circle"><span
													class="me-2"></span></span> <span onclick="changeColor('4')"
													class="btn btn-sm btn-secondary rounded-circle"><span
													class="me-2"></span></span>
												<div class="d-flex justify-content-between">
													<button onclick="removeColorCookie()">Reset to
														Default</button>
												</div>
											</div>
											<div class="col-md-6">
												<h6 class="text-muted">Preferences</h6>
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox"
														id="flexSwitchCheckDefault"> <label
														class="form-check-label" for="flexSwitchCheckDefault">Switch
														option 1</label>
												</div>
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox"
														id="flexSwitchCheckChecked" checked> <label
														class="form-check-label" for="flexSwitchCheckChecked">Switch
														option 2</label>
												</div>
											</div>
										</div>
										<div class="row g-3 mb-3 mt-3">
											<div class="col-md-6">
												<div class="form-check">
													<input class="form-check-input" type="checkbox" value=""
														id="defaultCheck1" checked> <label
														class="form-check-label" for="defaultCheck1">
														Checkbox 1 </label>
												</div>
												<div class="form-check">
													<input class="form-check-input" type="checkbox" value=""
														id="defaultCheck2"> <label
														class="form-check-label" for="defaultCheck2">
														Checkbox 2</label>
												</div>
											</div>
											<div class="col-md-6">
												<h6 class="text-muted">View Size</h6>
												<div class="form-check">
													<input class="form-check-input" type="radio"
														name="flexRadioDefault" id="radioCompactView"> <label
														class="form-check-label" for="radioCompactView">
														Compact</label>
												</div>
												<div class="form-check">
													<input class="form-check-input" type="radio"
														name="flexRadioDefault" id="radioFullView"> <label
														class="form-check-label" for="radioFullView">
														Full-screen </label>
												</div>
												<div class="d-flex justify-content-between">
													<button onclick="removeViewSizeCookie()">Reset to
														Default</button>
												</div>

											</div>
										</div>
										<hr />
										<button class="btn btn-sm btn-danger" data-bs-dismiss="modal"
											type="button">
											<i data-feather="check-circle" class="mr-1"></i> Ok
										</button>
									</section>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div id="sidebarOverlayNav" class="screen-overlay float-end">
					<a href="javascript:void(0)" class="closebtn"
						onclick="closeOverlayNav()">&times;</a>
					<div class="screen-overlay-content text-secondary">
						<a href="#" class="active">About</a> <a href="#">Services</a> <a
							href="#">Clients</a> <a href="#">Contact</a>
					</div>
				</div>
                @yield('content')

            </div>

		</div>
	</div>
	<footer class="footer container mt-auto py-1">
		<div
			class="d-sm-flex justify-content-center justify-content-sm-between">
			<span
				class="text-muted d-block text-center text-sm-left d-sm-inline-block">
				Copyright © PrintLab <script>
					document.write(new Date().getFullYear())
				</script>
			</span>
		</div>
	</footer>
	<div id="loading" class="spinner-border text-primary align-middle"
		role="status"></div>

	<button class="btn btn-sm btn-primary rounded-circle"
		onclick="scrollToTopFunction()" id="scrollToTop" title="Scroll to top">
		<i data-feather="arrow-up-circle"></i>
	</button>

	<script src="{{asset('js/feather.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('js/Chart.min.js')}}"></script>
	<script src="{{asset('js/script.js')}}"></script>

	<script type="text/javascript">
		document.addEventListener("DOMContentLoaded", function(event) {
			feather.replace();
		});
	</script>
	<script type="text/javascript">
		var trafficchart = document.getElementById("trafficflow");
		var saleschart = document.getElementById("sales");

		var myChart1 = new Chart(trafficchart, {
			type : 'line',
			data : {
				labels : [ 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul',
						'Aug', 'Sep', 'Oct', 'Nov', 'Dec' ],
				datasets : [ {
					backgroundColor : "rgba(48, 164, 255, 0.5)",
					borderColor : "rgba(48, 164, 255, 0.8)",
					data : [ '1135', '1135', '1140', '1168', '1150', '1145',
							'1155', '1155', '1150', '1160', '1185', '1190' ],
					label : '',
					fill : true
				} ]
			},
			options : {
				responsive : true,
				title : {
					display : false,
					text : 'Chart'
				},
				legend : {
					position : 'top',
					display : false,
				},
				tooltips : {
					mode : 'index',
					intersect : false,
				},
				hover : {
					mode : 'nearest',
					intersect : true
				},
				scales : {
					xAxes : [ {
						display : true,
						scaleLabel : {
							display : true,
							labelString : 'Months'
						}
					} ],
					yAxes : [ {
						display : true,
						scaleLabel : {
							display : true,
							labelString : 'Number of Visitors'
						}
					} ]
				}
			}
		});

		var myChart2 = new Chart(saleschart, {
			type : 'bar',
			data : {
				labels : [ 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul',
						'Aug', 'Sep', 'Oct', 'Nov', 'Dec' ],
				datasets : [ {
					label : 'Income',
					backgroundColor : "rgba(76, 175, 80, 0.5)",
					borderColor : "#6da252",
					borderWidth : 1,
					data : [ "280", "300", "400", "600", "450", "400", "500",
							"550", "450", "650", "950", "1000" ],
				} ]
			},
			options : {
				responsive : true,
				title : {
					display : false,
					text : 'Chart'
				},
				legend : {
					position : 'top',
					display : false,
				},
				tooltips : {
					mode : 'index',
					intersect : false,
				},
				hover : {
					mode : 'nearest',
					intersect : true
				},
				scales : {
					xAxes : [ {
						display : true,
						scaleLabel : {
							display : true,
							labelString : 'Months'
						}
					} ],
					yAxes : [ {
						display : true,
						scaleLabel : {
							display : true,
							labelString : 'Number of Users'
						}
					} ]
				}
			}
		});
	</script>




<style>
    .select2-container .select2-selection--single{
        height: 37px;
        border: 1px solid #ced4da;
    }
</style>




	<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
	<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="	https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{!! asset('assets/select2/dist/js/select2.min.js') !!}"></script>


	<script src="{{asset('js/jspdf.min.js')}}"></script>
	<script>
		function onClick() {
			var pdfExport = new jsPDF('p', 'pt', 'a4');
			var htmlTableContent = document.getElementById("tableContent");
			pdfExport.fromHTML(htmlTableContent);
			pdfExport.save('tableData.pdf');
		};

		var element = document.getElementById("exportToPDF1");
		element.addEventListener("click", onClick);
	</script>
	<script>
		function showTableData() {
			var oTable = document.getElementById('finTable');
			var rowLength = oTable.rows.length;
			for (i = 0; i < rowLength; i++) {
				var oCells = oTable.rows.item(i).cells;
				var cellLength = oCells.length;
				for (var j = 0; j < cellLength; j++) {
					var cellVal = oCells.item(j).innerHTML;
					//alert(cellVal);
				}
			}
		}
	</script>



	<script type="text/javascript">

    $('select').select2({
        'width' : '100%'
    });

	$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
	</script>
    @if(Session::has("flash_success"))
        <script>
            toastr.success("{!! Session::get('flash_success') !!}");
        </script>
    @endif

    @if(Session::has("flash_error"))
        <script>
            toastr.error("{!! Session::get('flash_error') !!}");
        </script>
    @endif

    @yield('scripts')
</body>

</html>
