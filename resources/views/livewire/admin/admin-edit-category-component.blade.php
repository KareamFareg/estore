<div>
    <title>Edit Category</title>
    <div class="container" style='padding: 30px 0px ;'>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heeading">
                        <div class="row">
                            <div class="col-md-6">
                                Edit Category
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.category')}}" class="alert alert-success pull-right"> All Categories</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('success_editing'))
                            <div class="alert alert-success">
                                <strong>success </strong>{{Session::get('success_editing')}}
                            </div>
                        @endif
                        <form class="form-horizontal" wire:click.prevent="updatecategory">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Category Name</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="type category name" class="form-control input-md" wire:model="name" wire:keyup="generateslug">
                                    @error('name') <p class="text-danger">{{$message}}</p>  @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Category Slug</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="type category slug" class="form-control input-md" wire:model="slug">
                                    @error('slug') <p class="text-danger">{{$message}}</p>  @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>