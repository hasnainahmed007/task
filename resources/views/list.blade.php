<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="card">
<section class="content-header">					
					
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
				 <div class="container-fluid">
				 <form action="" method="get">
					<div class="row filter-row">
								<div class="col-sm-6 col-md-3 col-lg-3 mt-3 col-xl-2 col-12">
									<div class="form-group form-focus">
										<input type="text"  value="{{Request::get('category_name')}}" class="form-control floating" id="category_name" name="category_name">
										<label class="focus-lebel">Category Name</label>
										
									</div>
								</div>

								<div class="col-sm-6 col-md-3 col-lg-3 mt-3 col-xl-2 col-12">
									<div class="form-group form-focus">
									<input type="text" value="{{Request::get('slug')}}" class="form-control floating" id="slug" name="slug">
										<label class="focus-lebel">Slug</label>
										
									</div>
								</div>

								<div class="col-sm-6 col-md-3 col-lg-3 mt-3 col-xl-2 col-12">
									<div class="form-group form-focus select-focus">
										<select class="select floating"   id="status" name="status">
											<option>---Select Status---</option>
											@if($categories->isNotEmpty())
											@foreach($categories as $category)
											<option value="{{$category->status}}">{{$category->status}}</option>
											@endforeach
											@endif
										</select>
										
									</div>
								</div>
								
						</div>
						<button type="submit"  class="btn btn-default">
						<input type="submit" placeholder="Search">						
						</button>
						
                </form>
					
					<!-- <div class="card">
					    <form action="" method="get">
							<div class="card-header">
								<div class="card-title">
									<button type="button" onclick="window.location.href='{{route("categories.index")}}'"  class="btn btn-default btn-sm ">Reset</button>
								</div>
                    		      <div class="card-tools">
									<div class="input-group input-group" style="width: 250px;">
										<input type="text" value="{{Request::get('keyword')}}" name="keyword" class="form-control float-right" placeholder="Search">
					
										<div class="input-group-append">
										  <button type="submit" class="btn btn-default">
											<i class="fas fa-search"></i>
										  </button>
										</div>
									  </div>

								</div>
						     </div>
						</form>

								</div> -->
							</div>
						 

						
							<div class="card-body table-responsive p-0">								
								<table class="table table-hover text-nowrap">
									<thead>
										<tr>
											<th width="60">ID</th>
											<th>Name</th>
											<th>Slug</th>
											<th width="100">Status</th>
											<th width="100">Action</th>
										</tr>
									</thead>
                
									<tbody>
                                        @if($categories->isNotEmpty())
                                          @foreach($categories as $category)
                                          <tr>
											<td>{{$category->id}}</td>
											<td>{{$category->name}}</td>
											<td>{{$category->slug}}</td>
											<td>
                                                @if($category->status == 'active')
												<svg class="text-success-500 h-6 w-6 text-success" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
													<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
												</svg>
                                                @else
                                                <svg class="text-danger h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
													<path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
												</svg>
                                                @endif
											</td>
											<td>
												<a href="">
													<svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
														<path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
													</svg>
												</a>
												<a href="" class="text-danger w-4 h-4 mr-1">
													<svg wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
														<path	ath fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
												  	</svg>
												</a>
											</td>
										</tr>
                                        @endforeach
                                    
                                        @else
                                                <tr>
                                                    <td colspan="5">Record Not Found</td>
                                                </tr>
                                        @endif
										
										
										
										
                                        
									</tbody>
								</table>										
							</div>
							
							<div class="card-footer clearfix">
                                {{ $categories->links()}}
								
							</div>
						</div>
					</div>
					<!-- /.card -->
				</section>
				</div>
</body>
</html>

