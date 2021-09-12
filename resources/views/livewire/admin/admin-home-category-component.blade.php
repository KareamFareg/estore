<div>
    <title>Add New Category</title>
    <div class="container" style='padding: 30px 0px ;'>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Category
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('success_message'))
                            <div class="alert alert-success">
                                <strong>success </strong>{{Session::get('success_message')}}
                            </div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="saveHomeCategories">
                            <div class="form-group">
                                <label class="col-md-4 control-label"> select Categories</label>
                                <div class="col-md-4" >
                                    <select class="sel_category form-control" name="categories[]" multiple="multiple" wire:model="sel_category">
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">number of products</label>
                                <div class="col-md-4">
                                    <input type="text" name="num_of_products" class="form-control input-md" wire:model="num_of_products">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary" >Save </button>
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
        $(document).ready(function () {
            $('.sel_category').select2();
            $('.sel_category').on('change',function () {
                let data = $('.sel_category').select2("val");
               @this.set('sel_category',data);
            });
        });
    </script>

@endpush
