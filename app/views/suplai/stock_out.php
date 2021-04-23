<main id="main">
	<!-- ======= Breadcrumbs Section ======= -->
	<section id="breadcrumbs" class="breadcrumbs">
		<div class="container">

			<div class="d-flex justify-content-between align-items-center">
				<h2 id="card-supp">Stock Out Page</h2>
				<ol>
					<li><a href="index.html">Home</a></li>
					<li>Stock Out</li>
				</ol>
			</div>

		</div>
	</section><!-- End Breadcrumbs Section -->

	<section id="content">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<?php Flasher::flash();?>
				</div>
			</div>
			<!-- add data stock out -->
			<div id="content-add"></div>
			<div class="row" id="add-content" style="display: none; opacity:0;">
				<div class="col-sm">
					<div class="card shadow bg-light rounded">
						<div class="card-body">
							<button type="button" class="close close-content" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h5 class="title mb-n2 text-center" id="title-content">Add Data Stock Out</h5>
							<hr>
							<form action="<?=BASEURL;?>/stock_out/add" method="POST">
								<div class="row">
									<div class="col-sm-2 ">
										<div class="form-group">
											<label for="code">Code Product</label>
											<select name="code" id="code" style="text-align-last: center;" required
												class="form-control form-control-sm code-stock-out">
												<option value="">------ choose ------ </option>
												<?php foreach ($data['code'] as $code) :?>
												<option value="<?=$code['code'];?>">
													<?=$code['code'];?>
												</option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label for="name">Name Product</label>
											<input type="text" class="form-control form-control-sm" name="name" id="name" readonly>
										</div>
									</div>
									<div class="col-sm-2">
										<div class="form-group">
											<label for="stock">Stock Product</label>
											<input type="text" class="form-control form-control-sm" name="stock" id="stock" readonly>
										</div>
									</div>
									<div class="col-sm-2">
										<div class="form-group">
											<label for="stock_out">Stock_out</label>
											<input type="text" class="form-control form-control-sm" name="stock_out" id="stock_out" required>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label for="date">Date</label>
											<input type="date" name="date-so" id="date-so" class="form-control form-control-sm"
												value="<?=date("Y-m-d")?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-5">
										<div class="form-group">
											<label for="info">Info</label>
											<input type="text" class="form-control form-control-sm" name="info" id="info"
												placeholder="rusak/expire/hilang" required>
										</div>
									</div>
								</div>
								<hr>
								<div class="form-group float-right mr-3 mb-n1">
									<button type="button" class="btn btn-sm btn-danger mr-1">Reset</button>
									<button type="submit" class="btn btn-sm btn-primary">Save</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<br>
			<!-- end add data stock out -->

			<div class="row">
				<div class="col-sm">
					<div class="card shadow bg-light rounded">
						<div class="card-body">
							<div class="row">
								<div class="col-sm-12">
									<a href="#breadcrumbs" class="btn btn-sm btn-primary float-right mb-2 btn-add-show shadow"
										id="btn-add-show"><i class="fas fa-plus"></i> Add</a>
								</div>
							</div>
							<div class="table-responsive">
								<table class="table table-striped table-bordered shadow rounded" id="tb-respon">
									<thead align="center" class="bg-info">
										<tr>
											<th>#</th>
											<th>Code Product</th>
											<th>Name Product</th>
											<th>Stock Out</th>
											<th>Info</th>
											<th>Date</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody align="center">
										<?php
                                        $no = 1;
                                        foreach ($data['out'] as $out): ?>
										<tr>
											<td><?=$no++;?>
											</td>
											<td><?=$out['code'];?>
											</td>
											<td><?=$out['name'];?>
											</td>
											<td><?=$out['stock_out'];?>
											</td>
											<td><?=$out['info'];?>
											</td>
											<td><?=$out['date'];?>
											</td>
											<td><a href="#edit" data-toggle="modal" data-target="#modal-stock-out"
													class="badge badge-info btn-edit-so" id="<?=$code['code'];?>"
													data-id="<?=$out['id'];?>">edit</a>
												<a href="<?=BASEURL;?>/stock_out/del/<?=$out['id'];?>" class="badge badge-danger">delete</a>
											</td>
										</tr>
										<?php endforeach;?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>


<!-- Modal -->
<div class="modal fade" id="modal-stock-out" tabindex="-1" aria-labelledby="modal-stock-outLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" style="width: 22rem;">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="title" align="center">Edit Data</h5>
				<hr>
				<form action="<?=BASEURL;?>/stock_out/up" method="POST">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="modal-code">Code</label>
								<select class="form-control form-control-sm modal-code" style="text-align-last: center;"
									name="modal-code" id="modal-code">
									<?php foreach ($data['code'] as $code) :?>
									<option value="<?=$code['code'];?>">
										<?=$code['code'];?>
									</option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="modal-name">Name</label>
								<input type="text" class="form-control form-control-sm" id="modal-name" name="modal-name">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="modal-out">Stock Out</label>
								<input type="text" class="form-control form-control-sm" id="modal-out" name="modal-out">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="modal-date">Date</label>
								<input type="date" class="form-control form-control-sm" id="modal-date" name="modal-date">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-8 offset-2">
							<div class="form-group">
								<label for="modal-info">Info</label>
								<input type="text" class="form-control form-control-sm" id="modal-info" name="modal-info">
							</div>
						</div>
					</div>
					<p>
					</p>
			</div>
			<div class="container">
				<input type="text" name="modal-stock-first" id="modal-stock-first" hidden>
				<input type="text" name="modal-stock-product" id="modal-stock-product" hidden>
				<input type="text" name="modal-code-product" id="modal-code-product" hidden>
				<input type="text" name="modal-id" id="modal-id" hidden>
				<input type="text" name="modal-out-first" id="modal-out-first" hidden>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
				</form>
			</div>
		</div>
	</div>
</div>
