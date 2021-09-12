<div>
    <title>Admin Settings</title>

    <div class="container" style="padding: 30px 0px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add Settings
                    </div>
                    <div class="panel-body">
                        @if(Session::has('settings'))
                            <div class="alert alert-success" role="alert">{{Session::get('settings')}} </div>
                        @endif

                        <form class="form-horizontal" wire:submit.prevent="saveSettings" >
                            <div class="form-group">
                                <label class="col-md-4 control-label">Email</label>
                                <div class="col-md-4">
                                    <input type="text"  class="form-control input-md" name="email" wire:model="email">
                                    @error('email') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Phone Number 1</label>
                                <div class="col-md-4">
                                    <input type="text"  class="form-control input-md" name="phone" wire:model="phone">
                                    @error('phone') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Phone Number 2</label>
                                <div class="col-md-4">
                                    <input type="text"  class="form-control input-md" name="phone2" wire:model="phone2">
                                    @error('phone2') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Address</label>
                                <div class="col-md-4">
                                    <input type="text"  class="form-control input-md" name="address" wire:model="address">
                                    @error('address') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Map</label>
                                <div class="col-md-4">
                                    <input type="text"  class="form-control input-md" name="map" wire:model="map">
                                    @error('map') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Twitter</label>
                                <div class="col-md-4">
                                    <input type="text"  class="form-control input-md" name="twitter" wire:model="twitter">
                                    @error('twitter') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Facebook</label>
                                <div class="col-md-4">
                                    <input type="text"  class="form-control input-md" name="facebook" wire:model="facebook">
                                    @error('facebook') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Pinterest</label>
                                <div class="col-md-4">
                                    <input type="text"  class="form-control input-md" name="pinterest" wire:model="pinterest">
                                    @error('pinterest') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Instagram</label>
                                <div class="col-md-4">
                                    <input type="text"  class="form-control input-md" name="instagram" wire:model="instagram">
                                    @error('instagram') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Youtube</label>
                                <div class="col-md-4">
                                    <input type="text"  class="form-control input-md" name="youtube" wire:model="youtube">
                                    @error('youtube') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                   <button class="btn btn-primary btn-lg " type="submit" >Save</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
            <div class="col-md-4">

            </div>

        </div>

    </div>
</div>
