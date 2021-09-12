<title>Home Sliders</title>
<div>
    <title>Home Sliders</title>
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
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    @if(Session::has('success_message'))
                        <p class="alert alert-success">{{Session::get('success_message')}}</p>
                    @endif
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                All Home slider
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.add.homeslider')}}" class="alert alert-success pull-right"> Add New Home slider</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class='table table-striped'>
                            <thead>
                            <tr>
                                <td>slider id</td>
                                <td>Image</td>
                                <td>Title</td>
                                <td>sub title</td>
                                <td>Link</td>
                                <td>price</td>
                                <td>status</td>
                                <td>Actions</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($homesliders as $homeslider)
                                <tr>
                                    <td>{{$homeslider->id}}</td>
                                    <td><img  height="40px" width="40px" src="{{asset('assets/images/homesliders')}}/{{$homeslider->image}}" alt="{{$homeslider->title}}"></td>
                                    <td>{{$homeslider->title}}</td>
                                    <td>{{$homeslider->subtitle}}</td>
                                    <td>{{$homeslider->link}}</td>
                                    <td>{{$homeslider->price}}</td>
                                    <td>{{$homeslider->status == 1 ? 'in Active' : 'Active'}}</td>
                                    <td>
                                        <a href="{{route('admin.edit.homeslider',['slider_id'=>$homeslider->id])}}"> <i class="fa fa-edit fa-2x"></i> </a>
                                        <a href="#" wire:click.prevent="deleteSlider({{$homeslider->id}})"> <i class="fa fa-times fa-2x"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>