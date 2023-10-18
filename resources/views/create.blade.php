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
<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Create Category</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('categories.index')}}" class="btn btn-primary">List</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
                        <form action="" method="post" id="categoryForm" enctype="multipart/form-data" name="categoryForm">
                           
                        <div class="card">
							<div class="card-body">								
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label for="name">Name</label>
											<input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                            <p></p>	
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
                                            <input type="hidden" id="image_id" name="image_id" value="">
											<label for="slug">Slug</label>
											<input type="text" name="slug" id="slug" class="form-control" placeholder="Slug">
                                            <p></p>		
										</div>
									</div>

                                    

                                 <div class="col-md-6">
										<div class="mb-3">
											<label for="status">Status</label>
                                            <select name="status" id="status" class="form-control">
                                                    <option value="active">Active</option>
                                                    <option value="block">Block</option>

                                            </select>
										</div>
									</div>
                                   										
								</div>
							</div>							
						</div>
						<div class="pb-5 pt-3">
							<button type="submit" class="btn btn-primary">Create</button>
							<a href="" class="btn btn-outline-dark ml-3">Cancel</a>
						</div>
                        </form>
					</div>
					<!-- /.card -->
				</section>

				<script type="text/javascript">
			$.ajaxSetup({
             headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
            });

			$("#categoryForm").submit(function(event){
            event.preventDefault();
            var element = $(this);
            $("button[type=submit]").prop('disabled',true);

            $.ajax({
                url: '{{route("categories.store")}}',
                type:'post',
                data: element.serializeArray(),
                dataType:'json',
                success: function(response){
                    $("button[type=submit]").prop('disabled',false);
                    
                    if(response["status"] == true){
                        window.location.href="{{route('categories.index')}}"

                        $("#name").removeClass('is-invalid')
                        .siblings('p').removeClass('invalid-feedback')
                        .html("");

                        $("#slug").removeClass('is-invalid')
                        .siblings('p').removeClass('invalid-feedback')
                        .html("");

                    } else{

                        var errors = response['errors'];
                    if(errors['name']){
                        $("#name").addClass('is-invalid')
                        .siblings('p').addClass('invalid-feedback')
                        .html(errors['name']);
                    } else{
                        
                        $("#name").removeClass('is-invalid')
                        .siblings('p').removeClass('invalid-feedback')
                        .html("");
                    
                    }

                    if(errors['slug']){
                        $("#slug").addClass('is-invalid')
                        .siblings('p').addClass('invalid-feedback')
                        .html(errors['slug']);
                        
                    } else{

                        $("#slug").removeClass('is-invalid')
                        .siblings('p').removeClass('invalid-feedback')
                        .html("");
                    }

                    }

                   

                }, error: function(jqXHR, exception){
                        console.log("Something wrong");
                }
            });
        });
		</script>
</body>
</html>