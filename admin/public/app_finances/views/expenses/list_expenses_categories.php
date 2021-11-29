
<?php //echo "LIST ";
	$rs= $paging_expenses_categories->paginate();
?>

<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Expenses Categories</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Finances</a></li>
                    <li class="breadcrumb-item"><a href="#">Expensesries</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <button class="btn btn-dark" onclick="$('#pg').val('app_finances');$('#view').val('expenses');$('#class_call').val('list_expenses');$('#keys').val('');document.myform.submit();"> <i class="feather icon-arrow-left"></i> &nbsp; Back </button>
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
                    <div class="card m-b-30" style="padding: 2em;">
                        <div class="row">
                            <div class="col-sm-2">
                            </div>
                            
                            <div class="col-sm-6">
                                <h5>Add Expense Category </h5>		
                                <div class="form-group row showcase_row_area">
                                    <div class="col-md-3 showcase_text_area"><label
                                            for="expencecategory_name">Category Name</label></div>
                                    <div class="col-md-9 showcase_content_area"><input type="text"
                                            class="form-control" id="expencecategory_name" name="expencecategory_name" value=""></div>
                                </div>
                                
                                <div class="form-group row showcase_row_area">
                                    <div class="col-md-3 showcase_text_area"><label
                                            for="expencecategory_description">Expense Category Description</label></div>
                                    <div class="col-md-9 showcase_content_area">
                                        <textarea class="form-control" name="expencecategory_description" id="" cols="30" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row showcase_row_area">
                                    <div class="col-md-3 showcase_text_area">
                                    </div>
                                    <div class="col-md-9 showcase_content_area">
                                        <button class="btn btn-success" onclick="$('#pg').val('app_finances');$('#view').val('expenses_categories');$('#class_call').val('add_expense_category');$('#keys').val('');document.myform.submit();"> <i class="feather icon-plus-square"></i> &nbsp; Submit </button>
                                    </div>
                                </div>    
                            </div>

                            <div class="col-sm-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            
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
											<?php echo $paging_expenses_categories->renderFirst('<span class="fa fa-angle-double-left"></span>');?>
											<?php echo $paging_expenses_categories->renderPrev('<span class="fa fa-arrow-circle-left"></span>','<span class="fa fa-arrow-circle-left"></span>');?>
											<input name="page" size="5" type="text" class="pagedisplay short pag_input" value="<?php echo $paging_expenses_categories->renderNavNum();?>" readonly />
											<?php echo $paging_expenses_categories->renderNext('<span class="fa fa-arrow-circle-right"></span>','<span class="fa fa-arrow-circle-right"></span>');?>
											<?php echo $paging_expenses_categories->renderLast('<span class="fa fa-angle-double-right"></span>');?>
											<?php $paging_expenses_categories->limitList($list->limit,"myform");?>
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
													<th class="sorting_asc" tabindex="0" aria-controls="dataTable" 			rowspan="1" colspan="1" aria-sort="ascending"
														aria-label="Name: activate to sort column descending"
														style="width: 40px;">#</th>
													<th class="sorting_asc" tabindex="0" aria-controls="dataTable" 			rowspan="1" colspan="1" aria-sort="ascending"
														aria-label="Name: activate to sort column descending"
														style="width: 150px;">Category Name</th>
													<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
														colspan="1" aria-label="Position: activate to sort column ascending"
														style="width: 140px;">Category Description</th>
													<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
														colspan="1" aria-label="Office: activate to sort column ascending"
														style="width: 120px;">Status</th>
													<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
														colspan="1" aria-label="Age: activate to sort column ascending"
														style="width: 120px;">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php 

													if($paging_expenses_categories->total_rows > 0 ){

														$page = (empty($page))? 1:$page;
														$num = (isset($page))? ($list->limit*($page-1))+1:1;
														
														$x=1;

														foreach ($rs as $val){
															$data =  $engine->getDataEncrypt($val);
															// var_dump($val); die();
												?>

												<tr role="row" class="odd">
													<td class="sorting_1"><?php echo $x;?></td>
													<td><?php echo $val['EXCAT_NAME']; ?></td>
													<td><?php echo $val['EXCAT_DESCRIPTION']; ?></td>
													<td>
														<?php
															if($val['EXCAT_STATUS'] == "0"){
														?>
															<span style="color: red;">Inactive</span>
														<?php
															}else if($val['EXCAT_STATUS'] == "1"){
														?>
															<span style="color: green;">Active</span>
														<?php
															}
														?>
													</td>
													<td> 
														<div class="row">
															<?php
															if($val['EXCAT_STATUS'] == "1"){
															?>
															<div class="col-sm-12 col-md-6">
																<a  href="javascript:void(0);" onclick="$('#pg').val('app_expenses');$('#view').val('add_category');$('#class_call').val('delete_category');$('#keys').val('<?php echo $val['EXCAT_CODE']; ?>');delete_func()" class="btn btn-danger btn-icon-split" >
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
										Showing <?php echo $paging_expenses_categories->renderNavNum();?>of <?php echo $paging_expenses_categories->max_pages; ?> pages
											<span class="separator">|</span>

											Total <?php  echo $paging_expenses_categories->total_rows; ?> records

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


