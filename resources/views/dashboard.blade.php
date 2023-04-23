 @include('header')
 					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<br/><br/><br/><br/>
						@if(session('success'))
											    <div class="alert alert-success">{{ session('success') }}</div>
								@endif
								<div class="card-body">
    <h5 class="card-title">Total Deposits</h5>
    <p class="card-text">{{ $totalDeposits }}</p>
</div>

						<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container">
								<!--begin::Navbar-->
								<div class="card mb-5 mb-xl-10">
									<div class="card-body pt-9 pb-0">
										<!--begin::Details-->
										<div class="d-flex flex-wrap flex-sm-nowrap mb-3">
											<!--begin: Pic-->
											<div class="me-7 mb-4">
												<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
													<img src="assets/media/avatars/150-26.jpg" alt="image" />
													<div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
												</div>
											</div>
											<!--end::Pic-->
											<!--begin::Info-->
											<div class="flex-grow-1">
												<!--begin::Title-->
												<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
													<!--begin::User-->
													<div class="d-flex flex-column">
														<!--begin::Name-->
														<div class="d-flex align-items-center mb-2">
															<a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{ $user->name }}</a>
															<a href="#">
																<!--begin::Svg Icon | path: icons/duotone/Design/Verified.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-primary">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="#00A3FF" />
																		<path class="permanent" d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</a>
															<a href="#" class="btn btn-sm btn-light-success fw-bolder ms-2 fs-8 py-1 px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Good
														</div>
														<!--end::Name-->
													</div>
													<!--end::User-->
													<!--begin::Actions-->
													<div class="d-flex my-4">
														<a href="#" class="btn btn-sm btn-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_1">Deposit</a>
														<a href="#" class="btn btn-sm btn-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_offer_a_deal">Withdraw</a>
													</div>
													<!--end::Actions-->
												</div>
												<!--end::Title-->
												<!--begin::Stats-->
												<div class="d-flex flex-wrap flex-stack">
													<!--begin::Wrapper-->
													<div class="d-flex flex-column flex-grow-1 pe-8">
														<!--begin::Stats-->
														<div class="d-flex flex-wrap">
															<!--begin::Stat-->
															<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
																<!--begin::Number-->
																<div class="d-flex align-items-center">
																	<!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-up.svg-->
																	<span class="svg-icon svg-icon-3 svg-icon-success me-2">
																		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																				<polygon points="0 0 24 0 24 24 0 24" />
																				<rect fill="#000000" opacity="0.5" x="11" y="5" width="2" height="14" rx="1" />
																				<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
																			</g>
																		</svg>
																	</span>
																	<!--end::Svg Icon-->
																	<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="$user->current_balance" data-kt-countup-prefix="RS.">0</div>
																</div>
																<!--end::Number-->
																<!--begin::Label-->
																<div class="fw-bold fs-6 text-gray-400">Total Earning: {{ $totalDeposits }} </div>
																<!--end::Label-->
															</div>
															<!--end::Stat-->
															<!--begin::Stat-->
															<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
																<!--begin::Number-->
																<div class="d-flex align-items-center">
																	<!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-up.svg-->
																	<span class="svg-icon svg-icon-3 svg-icon-success me-2">
																		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																				<polygon points="0 0 24 0 24 24 0 24" />
																				<rect fill="#000000" opacity="0.5" x="11" y="5" width="2" height="14" rx="1" />
																				<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
																			</g>
																		</svg>
																	</span>
																	<!--end::Svg Icon-->
																	
																	<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="75">0</div>
																</div>
																<!--end::Number-->
																<!--begin::Label-->
																<div class="fw-bold fs-6 text-gray-400">No Of Tockens</div>
																<!--end::Label-->
															</div>
															<!--end::Stat-->
															<div class="card-body">
    <h5 class="card-title">Total Deposits</h5>
    <p class="card-text">${{ number_format($totalDeposits, 2) }}</p>
    <a href="{{ route('users.deposits.total', ['user' => Auth::user()->id]) }}" class="btn btn-primary">View Deposits</a>
</div>

															<!--begin::Stat-->
															<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
																<!--begin::Number-->
																<div class="d-flex align-items-center">
																	<!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-down.svg-->
																	<span class="svg-icon svg-icon-3 svg-icon-danger me-2">
																		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																				<polygon points="0 0 24 0 24 24 0 24" />
																				<rect fill="#000000" opacity="0.5" x="11" y="5" width="2" height="14" rx="1" />
																				<path d="M6.70710678,18.7071068 C6.31658249,19.0976311 5.68341751,19.0976311 5.29289322,18.7071068 C4.90236893,18.3165825 4.90236893,17.6834175 5.29289322,17.2928932 L11.2928932,11.2928932 C11.6714722,10.9143143 12.2810586,10.9010687 12.6757246,11.2628459 L18.6757246,16.7628459 C19.0828436,17.1360383 19.1103465,17.7686056 18.7371541,18.1757246 C18.3639617,18.5828436 17.7313944,18.6103465 17.3242754,18.2371541 L12.0300757,13.3841378 L6.70710678,18.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 14.999999) scale(1, -1) translate(-12.000003, -14.999999)" />
																			</g>
																		</svg>
																	</span>
																	<!--end::Svg Icon-->
																	
																	<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="$user->earning_balance" data-kt-countup-prefix="RS.">0</div>
																</div>
																<!--end::Number-->
																<!--begin::Label-->
																<div class="fw-bold fs-6 text-gray-400">Total Withdraw</div>
																<!--end::Label-->
															</div>
															<!--end::Stat-->
														</div>
														<!--end::Stats-->
													</div>
													<!--end::Wrapper-->
													
												</div>
												<!--end::Stats-->
											</div>
											<!--end::Info-->
										</div>
										<!--end::Details-->
										<!--begin::Navs-->
										<div class="d-flex overflow-auto h-55px">
											<ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap">
												<!--begin::Nav item-->
												<li class="nav-item">
													<a class="nav-link text-active-primary me-6 active" href="#">Overview</a>
												</li>
												<!--end::Nav item-->
												<!--begin::Nav item-->
												<li class="nav-item">
													<a class="nav-link text-active-primary me-6" href="#">Payment Statements</a>
												</li>
												<!--end::Nav item-->
												
												
												<!--begin::Nav item-->
												<li class="nav-item">
													<a class="nav-link text-active-primary me-6" href="#">My Team</a>
												</li>
												<!--end::Nav item-->
												<!--begin::Nav item-->
												<li class="nav-item">
													<a class="nav-link text-active-primary me-6" href="#">Settings</a>
												</li>
												<!--end::Nav item-->
											</ul>
										</div>
										<!--begin::Navs-->
									</div>
								</div>
								<!--end::Navbar-->
								<!--begin::details View-->
								<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
									<!--begin::Card header-->
									<div class="card-header cursor-pointer">
										<!--begin::Card title-->
										<div class="card-title m-0">
											<h3 class="fw-bolder m-0">Profile Details</h3>
										</div>
										<!--end::Card title-->
									</div>
									<!--begin::Card header-->
									<!--begin::Card body-->
									<div class="card-body p-9">
										<!--begin::Row-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-bold text-muted">Full Name</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8">
												<span class="fw-bolder fs-6 text-gray-800">{{ $user->name }}</span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
										<!--begin::Input group-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-bold text-muted">Contact Phone
											<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i></label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 d-flex align-items-center">
												<span class="fw-bolder fs-6 text-gray-800 me-2">{{ $user->phone }}</span>
												<span class="badge badge-success">Verified</span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="row mb-10">
											<!--begin::Label-->
											<label class="col-lg-4 fw-bold text-muted">Allow Changes</label>
											<!--begin::Label-->
											<!--begin::Label-->
											<div class="col-lg-8">
												<span class="fw-bold fs-6 text-gray-800">Yes</span>
											</div>
											<!--begin::Label-->
										</div>
										<!--end::Input group-->
									</div>
									<!--end::Card body-->
								</div>
							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
					</div>
					<!--end::Content-->
					<!-- Deposit Modal -->	
	<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deposit</h5>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body">
              <form action="{{ route('deposit.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" name="amount" id="amount" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="payment_method">Payment Method:</label>
            <select name="payment_method" id="payment_method" class="form-control" required>
              <option value="">Select Payment Method</option>
              <option value="bank">Bank</option>
              <option value="mobile_bank">Mobile Bank</option>
            </select>
          </div>
          <div class="form-group">
            <label for="transaction_number">Transaction Number:</label>
            <input type="text" name="transaction_number" id="transaction_number" class="form-control" required>
          </div>
          <input type="hidden" name="user_id" value="{{ Auth::id() }}"><br/>
          <button type="submit" class="btn btn-primary">Deposit</button>
        </form>
            </div>
        </div>
    </div>
</div>
<!-- end::Deposit Modal -->					
@include('footer')