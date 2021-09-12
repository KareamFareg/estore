<div>
    <title>On Sale Date</title>

    <div class="container" style='padding: 30px 0px ;'>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Sale Settings
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('success_message'))
                            <div class="alert alert-success">
                                <strong>success </strong>{{Session::get('success_message')}}
                            </div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="updateSale">
                            <div class="form-group">
                                <label class="col-md-4 control-label"> status</label>
                                <div class="col-md-4" >
                                    <select class=" form-control"  wire:model="status">
                                            <option value="0">Inactive</option>
                                            <option value="1">active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">sale date</label>
                                <div class="col-md-4">
                                    <input type="text" name="sale_date"  id="sale_date" placeholder="YYYY/MM/DD H:M:S" class=" form-control input-md" wire:model="sale_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary" >Update </button>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(function () {
            $('#sale_date').datetimepicker({
                format : 'Y-MM-DD h:m:s'
            })
           .on('dp.change',function (ev) {
                var data = $('#sale_date').val();
            @this.set('sale_date',data);
            });
        });
    </script>

@endpush
