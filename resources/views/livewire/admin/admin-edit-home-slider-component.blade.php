<div>
    <title>Edit Home Slider</title>
    <div class="container" style='padding: 30px 0px ;'>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Edit Home Slider
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.homeslider')}}" class="alert alert-success pull-right"> All home sliders</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('success_message'))
                            <div class="alert alert-success">
                                <strong>success </strong>{{Session::get('success_message')}}
                            </div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="updatehomeslider" >
                            <div class="form-group">
                                <label class="col-md-4 control-label">Title</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="type slider title" class="form-control input-md" wire:model="title"   required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"> Sub title</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="type slider sub title" class="form-control input-md" wire:model="subtitle" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">link</label>
                                <div class="col-md-4">
                                    <input type="text"  class="form-control input-md" wire:model="link" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Price</label>
                                <div class="col-md-4">
                                    <input type="number" placeholder="type slider price" class="form-control input-md" step=".01" wire:model="price" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">status</label>
                                <div class="col-md-4">
                                    <select  wire:model="status">
                                        <option  value="0">Active</option>
                                        <option  value="1">in Active</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Image</label>
                                <div class="col-md-4">
                                    <input type="file"  name="image" class="input-file" wire:model="newimage">
                                    @if($newimage)
                                        <img src="{{$newimage->temporaryUrl()}}" width="120">
                                        @else
                                        <img src="{{asset('assets/images/homesliders')}}/{{$image}}" width="120">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button class="btn btn-primary" >Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
