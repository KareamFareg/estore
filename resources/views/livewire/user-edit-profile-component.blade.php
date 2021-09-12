<div>
    <title> Edit Profile</title>

    <div class="container" style='padding: 30px 0px ;'>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Edit  Profile
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('edited_profile'))
                            <div class="alert alert-success">
                                <strong>success </strong>{{Session::get('edited_profile')}}
                            </div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="updateProfile" >
                            <div class="form-group">
                                <label class="col-md-4 control-label">Name</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Type Your name" class="form-control input-md" wire:model="name"   autofocus>
                                    @error('name') <p class="text-danger">{{$message}}</p>  @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">AGE</label>
                                <div class="col-md-4">
                                    <input type="number" placeholder="Type Your age" class="form-control input-md" wire:model="age"   autofocus>
                                    @error('age') <p class="text-danger">{{$message}}</p>  @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Gender</label>                                <div class="col-md-4">
                                    <select   required wire:model="gender" >
                                        <option  value="1">Male</option>
                                        <option  value="0">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Phone</label>
                                <div class="col-md-4">
                                    <input type="number" placeholder="Type Your Mobile Number" class="form-control input-md" wire:model="phone"   autofocus>
                                    @error('phone') <p class="text-danger">{{$message}}</p>  @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Country</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Type Your country" class="form-control input-md" wire:model="country"   autofocus>
                                    @error('country') <p class="text-danger">{{$message}}</p>  @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Address</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Type Your address" class="form-control input-md" wire:model="address"   autofocus>
                                    @error('address') <p class="text-danger">{{$message}}</p>  @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Image</label>
                                <div class="col-md-4">
                                    <input type="file"  name="new_profile_photo" class="input-file" wire:model="new_profile_photo">
                                    @if($new_profile_photo)
                                        <img src="{{$new_profile_photo->temporaryUrl()}}" width="120">
                                    @else
                                        <img src="{{asset('assets/images/users')}}/{{$profile_photo_path}}" width="120">
                                    @endif
                                    @error('new_profile_photo') <p class="text-danger">{{$message}}</p>  @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <button class="btn btn-primary" >Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
