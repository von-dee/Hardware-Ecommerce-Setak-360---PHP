
<?php //echo "LIST ";
$rs= $paging_expenses->paginate();
?>

<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Expenses</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Finances</a></li>
                    <li class="breadcrumb-item"><a href="#">Expenses</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-2">
            <div class="widgetbar">
				<button class="btn btn-primary-rgba" onclick="$('#pg').val('app_finances');$('#view').val('expenses_categories');$('#class_call').val('list_expenses_categories');$('#keys').val('');document.myform.submit();"> <i class="feather icon-server"></i>  &nbsp; Expense Category </button>
            </div>                        
        </div>
        <div class="col-md-4 col-lg-2">
            <div class="widgetbar">
				<button class="btn btn-primary-rgba" onclick="$('#pg').val('app_finances');$('#view').val('add');$('#class_call').val('getall');$('#keys').val('');document.myform.submit();"> <i class="feather icon-plus-square"></i> &nbsp; Add New Expense </button>
            </div>                        
        </div>
    </div>          
</div>
<!-- End Breadcrumbbar -->


<!-- Start Contentbar -->    
<div class="contentbar">                
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12 col-xl-12">
            <!-- Start row -->
            <div class="row">
                <!-- Start col -->
                <div class="col-lg-12 col-xl-12">
                    <div class="card m-b-30">
						<div class="table-responsive">
							<div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4" style="padding: 2em;">
								<div class="row align-items-center">
					
									<div class="col-sm-12 col-md-1">
										<label>Show </label>
									</div>
									
									<div class="col-sm-12 col-md-2">
										<div>
											<?php echo $paging_expenses->renderFirst('<span class="fa fa-angle-double-left"></span>');?>
											<?php echo $paging_expenses->renderPrev('<span class="fa fa-arrow-circle-left"></span>','<span class="fa fa-arrow-circle-left"></span>');?>
											<input name="page" size="5" type="text" class="pagedisplay short pag_input" value="<?php echo $paging_expenses->renderNavNum();?>" readonly />
											<?php echo $paging_expenses->renderNext('<span class="fa fa-arrow-circle-right"></span>','<span class="fa fa-arrow-circle-right"></span>');?>
											<?php echo $paging_expenses->renderLast('<span class="fa fa-angle-double-right"></span>');?>
											<?php $paging_expenses->limitList($list->limit,"myform");?>
										</div>
									</div>	

									
									<div class="col-sm-12 col-md-1">
										<label>Search:</label>
									</div>

									<div class="col-sm-12 col-md-3">
										<input type="search" class="form-control form-control-sm search_input" placeholder="" aria-controls="dataTable">
									</div>

									<div class="col-sm-12 col-md-2">
									</div>	
											
								</div>
								<br>
								<div class="row">
									<div class="col-sm-12">
									<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
										role="grid" aria-describedby="dataTable_info" style="width: 100%;">
										<thead>
											<tr role="row">
												<th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1"
													colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending"
													style="width: 40px;">#</th>
												<th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1"
													colspan="1" aria-sort="ascending"
													aria-label="Name: activate to sort column descending"
													style="width: 120px;">Expence Code</th>
												<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
													colspan="1" aria-label="Position: activate to sort column ascending"
													style="width: 120px;">Created By</th>
												<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
													colspan="1" aria-label="Office: activate to sort column ascending"
													style="width: 100px;">Date</th>
												<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
													colspan="1" aria-label="Age: activate to sort column ascending"
													style="width: 120px;">Total Amount</th>
												<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
													colspan="1" aria-label="Start date: activate to sort column ascending"
													style="width: 120px;">Paid Amount</th>
												<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
													colspan="1" aria-label="Salary: activate to sort column ascending"
													style="width: 120px;">Unpaid Amount</th>
												<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
													colspan="1" aria-label="Salary: activate to sort column ascending"
													style="width: 80px;">Status</th>
												<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
													colspan="1" aria-label="Salary: activate to sort column ascending"
													style="width: 200px;">Action</th>
											</tr>
										</thead>
									<tbody>

									<?php 
										
										if($paging_expenses->total_rows > 0 ){ 
											
											$page = (empty($page))? 1:$page;
											$num = (isset($page))? ($list->limit*($page-1))+1:1;
											
											$x=1;
											
											foreach ($rs as $val){
												$data =  $engine->getDataEncrypt($val);
												// var_dump($val); die();
												
									?>

									<tr role="row" class="odd">
										<td class="sorting_1"><?php echo $x;?></td>
										<td><?php echo $val['EXPS_CODE']; ?></td>
										<td><?php echo $val['EXPS_ACTORNAME']; ?></td>
										<td><?php echo $val['EXPS_DATEADDED']; ?></td>
										<td><?php echo $val['EXPS_TOTALAMOUNT']; ?></td>
										<td><?php echo $val['EXPS_AMOUNTPAID']; ?></td>
										<td><?php echo (float)$val['EXPS_TOTALAMOUNT'] - (float)$val['EXPS_AMOUNTPAID']; ?></td>
										<td>
											<?php
												if($val['EXPS_STATUS'] == "0"){
											?>
												<span style="color: red;">Inactive</span>
											<?php
												}else if($val['EXPS_STATUS'] == "1"){
											?>
												<span style="color: green;">Active</span>
											<?php
												}
											?>
										</td>
										<td> 
											<div class="row">
												<?php
												  if($val['EXPS_STATUS'] == "1"){
												?>
												<div class="col-sm-12 col-md-5">
													<a  href="javascript:void(0);" onclick="$('#pg').val('app_finances');$('#view').val('edit_expense');$('#class_call').val('details');$('#keys').val('<?php echo $data; ?>');document.myform.submit();" class="btn btn-primary btn-icon-split" >
														<span class="icon text-white-50">
															<i class="feather icon-edit"></i>
														</span>
														<span class="text">Edit</span>
													</a>
												</div>

												<div class="col-sm-12 col-md-6">
													<a  href="javascript:void(0);" onclick="$('#pg').val('app_finances');$('#view').val('list');$('#class_call').val('delete');$('#keys').val('<?php echo $val['EXPS_CODE']; ?>');delete_func()" class="btn btn-danger btn-icon-split" >
														<span class="icon text-white-50">
															<i class="feather icon-trash-2"></i>
														</span>
														<span class="text">Delete</span>
													</a>
												</div>
												<?php } ?>
											</div>
										</td>
									</tr>


									<?php
												$x= $x + 1;
											}

										}

									?>

									
								</tbody>
								
							</table>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-5">
										<div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
										Showing <?php echo $paging_expenses->renderNavNum();?>of <?php echo $paging_expenses->max_pages; ?> pages
											<span class="separator">|</span>

											Total <?php  echo $paging_expenses->total_rows; ?> records

										</div>
									</div>
								</div>
							</div>
						</div>
                    </div>
                </div>
				<!-- End col -->
			</div>
		</div>
	</div>
</div>


