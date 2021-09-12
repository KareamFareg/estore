<div>
    <title>Contacts</title>

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
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">
                                    All Contacts
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class='table table-striped'>
                                <thead>
                                <tr>
                                    <td>#</td>
                                    <td>name</td>
                                    <td>Email</td>
                                    <td>Phone</td>
                                    <td>Message</td>
                                    <td>Created At</td>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($contacts as $contact)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$contact->name}}</td>
                                        <td>{{$contact->email}}</td>
                                        <td>{{$contact->phone}}</td>
                                        <td>{{$contact->comment}}</td>
                                        <td>{{$contact->created_at}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="text-center justify-center"> {{$contacts->links()}}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

