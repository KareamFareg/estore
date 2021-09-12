<div>
    <div>
        <title>Email Configration</title>

        <div class="container" style='padding: 30px 0px ;'>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">
                                    Add Email Configration
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            @if (Session::has('success_message'))
                                <div class="alert alert-success">
                                    <strong>success </strong>{{Session::get('success_message')}}
                                </div>
                            @endif
                            <form class="form-horizontal" wire:submit.prevent="storeEmailConfig">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">SMTP Driver</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Like protocol SMTP " class="form-control input-md" wire:model="driver">
                                        @error('driver') <p class="text-danger">{{$message}}</p>  @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Host Name</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Like smtp.gmail.com " class="form-control input-md" wire:model="host">
                                        @error('host') <p class="text-danger">{{$message}}</p>  @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Port</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="port number " class="form-control input-md" wire:model="port">
                                        @error('port') <p class="text-danger">{{$message}}</p>  @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Encryption</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Like TLS " class="form-control input-md" wire:model="encryption">
                                        @error('encryption') <p class="text-danger">{{$message}}</p>  @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">User Name</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Type your Name " class="form-control input-md" wire:model="user_name">
                                        @error('user_name') <p class="text-danger">{{$message}}</p>  @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Password</label>
                                    <div class="col-md-4">
                                        <input type="password" placeholder="*********" class="form-control input-md" wire:model="password">
                                        @error('password') <p class="text-danger">{{$message}}</p>  @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Sender Name</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Type Sender Name " class="form-control input-md" wire:model="sender_name">
                                        @error('sender_name') <p class="text-danger">{{$message}}</p>  @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Sender Email</label>
                                    <div class="col-md-4">
                                        <input type="email" placeholder="Type Sender Name " class="form-control input-md" wire:model="sender_email">
                                        @error('sender_email') <p class="text-danger">{{$message}}</p>  @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label"></label>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">Save Configuration</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
