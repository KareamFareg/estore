<div>
    <div>
        <title>Show Privileges</title>

        <style>
            nav svg{
                height: 20px;
                color: #f00;
                padding: 0px;
            }
            nav .hidden{
                display: block !important;
            }
        </style>
        <div class="container" style='padding: 30px 0px ;'>
            @if (Session::has('user_changed'))
                <div class="alert alert-success">
                    <strong>success </strong>{{Session::get('user_changed')}}
                </div>
            @endif
            @if (Session::has('user_deleted'))
                <div class="alert alert-success">
                    <strong>success </strong>{{Session::get('user_deleted')}}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">
                                    All Users
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                           @if($users->count() > 0)
                            <table class='table table-striped'>
                                <thead>
                                <tr>
                                    <td>User id</td>
                                    <td>Name</td>
                                    <td>Email </td>
                                    <td>Created at</td>
                                    <td>Verified at</td>
                                    <td colspan="2" class="text-center">Action</td>
                                </tr>
                                </thead>
                                <tbody>
                                  @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td>{{$user->email_verified_at}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                                    Change Type
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" onclick="confirm('Are You Sure That You Want to Add this User to Admin Team?') || event.stopImmediatePropagation()"  wire:click.prevent="editUser({{$user->id}},'ADM')">Admin</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" onclick="confirm('Do You want to delete this User ?') || event.stopImmediatePropagation()" wire:click.prevent="deleteUser({{$user->id}})"> <i class="fa fa-times fa-2x"></i> </a>
                                        </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                            @else
                                <p>There is no users to show !</p>
                            @endif
                            <div class="text-center justify-center"> {{$users->links()}}</div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">
                                    Admin Team
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            @if($admins->count() > 0)
                            <table class='table table-striped'>
                                <thead>
                                <tr>
                                    <td>Admin id</td>
                                    <td>Name</td>
                                    <td>Email </td>
                                    <td>Created at</td>
                                    <td>Verified at</td>
                                    @if(Auth::user()->id == 1)
                                        <td colspan="2" class="text-center">Action</td>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($admins as $admin)
                                    <tr>
                                        <td>{{$admin->id}}</td>
                                        <td>{{$admin->name}}</td>
                                        <td>{{$admin->email}}</td>
                                        <td>{{$admin->created_at}}</td>
                                        <td>{{$admin->email_verified_at}}</td>
                                        @if(Auth::user()->id == 1)
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                                        Change Type
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#" onclick="confirm('Are You Sure That You Want to remove This Admin from Admin Team?') || event.stopImmediatePropagation()" wire:click.prevent="editUser({{$admin->id}},'USR')">User</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#" onclick="confirm('Do You want to delete this Admin ?') || event.stopImmediatePropagation()" wire:click.prevent="deleteUser({{$admin->id}})"> <i class="fa fa-times fa-2x"></i> </a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @else
                                <p>There is no Admins to show !</p>
                            @endif
                            <div class="text-center justify-center"> {{$admins->links()}}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
