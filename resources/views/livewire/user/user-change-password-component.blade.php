<div>
<title>Change Password</title>
<div class="container" style="padding: 30px 0px;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Change Password
                </div>
                <div class="panel-body">
                    @if(Session::has('change-pass'))
                       <div class="alert alert-success" role="alert">{{Session::get('change-pass')}} </div>
                    @endif
                    @if(Session::has('change-error'))
                       <div  class="alert alert-danger" role="alert">{{Session::get('change-error')}} </div>
                    @endif
                    <form class="form-horizontal" wire:submit.prevent="changePassword" >
                        <div class="form-group">
                            <label class="col-md-4 control-label">Current Password</label>
                           <div class="col-md-4">
                               <input type="password" placeholder="current password" class="form-control input-md" name="current_password" wire:model="current_password">
                                @error('current_password') <p class="text-danger">{{$message}}</p>@enderror
                           </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">New Password</label>
                           <div class="col-md-4">
                               <input type="password" placeholder="New password" class="form-control input-md" name="password"  wire:model="password">
                               @error('password') <p class="text-danger">{{$message}}</p>@enderror
                           </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Password conformation</label>
                           <div class="col-md-4">
                               <input type="password" placeholder="password confirmation" class="form-control input-md" name="password_confirmation" wire:model="password_confirmation">
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="col-md-4">
                                <button class="btn btn-primary" type="submit">Submit </button>
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