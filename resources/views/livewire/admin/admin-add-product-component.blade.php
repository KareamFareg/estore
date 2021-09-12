<div>
    <title>Add New Product</title>

    <div class="container" style='padding: 30px 0px ;'>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Product
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.products')}}" class="alert alert-success pull-right"> All Products</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('success_message'))
                            <div class="alert alert-success">
                                {{Session::get('success_message')}}
                            </div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="storeProduct" >
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Product Name</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="type Product name" class="form-control input-md" wire:model="name"  wire:keyup="generateslug"  autofocus>
                                        @error('name') <p class="text-danger">{{$message}}</p>  @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Product Slug</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="type Product slug" class="form-control input-md" wire:model="slug" >
                                        @error('slug') <p class="text-danger">{{$message}}</p>  @enderror
                                    </div>
                                 </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">short Description</label>
                                    <div class="col-md-4" wire:ignore>
                                        <textarea type="text" id="short_description" placeholder="Product short Description" class="form-control input-md" wire:model="short_description" ></textarea>
                                        @error('short_description') <p class="text-danger">{{$message}}</p>  @enderror
                                    </div>
                                </div>
                               <div class="form-group">
                                    <label class="col-md-4 control-label">Description</label>
                                    <div class="col-md-4" wire:ignore>
                                        <textarea type="text"  id="description" placeholder="type some words for Product Description" class="form-control input-md" wire:model="description" ></textarea>
                                        @error('description') <p class="text-danger">{{$message}}</p>  @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-md-4 control-label">Price</label>
                                        <div class="col-md-4">
                                            <input type="number" placeholder="type Product price" class="form-control input-md" step=".01" wire:model="regular_price" >
                                            @error('regular_price') <p class="text-danger">{{$message}}</p>  @enderror
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">sales Price</label>
                                    <div class="col-md-4">
                                        <input type="number" placeholder="type Product price" class="form-control input-md" step=".01" wire:model="sale_price" >
                                        @error('sale_price') <p class="text-danger">{{$message}}</p>  @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                        <label class="col-md-4 control-label">Stockpile</label>
                                        <div class="col-md-4">
                                            <select  wire:model="stock_status">
                                                <option>Select Stock status</option>
                                                    <option  value="instock">in stock</option>
                                                    <option  value="outofstock">out of stock</option>
                                            </select>
                                            @error('stock_status') <p class="text-danger">{{$message}}</p>  @enderror
                                        </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Category</label>
                                    <div class="col-md-4">
                                        <select required  wire:model="category_id">
                                            <option>Select Category </option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id') <p class="text-danger">{{$message}}</p>  @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                     <label class="col-md-4 control-label">Quantity</label>
                                     <div class="col-md-4">
                                        <input type="number" step="1" placeholder="type quantity of product" class="form-control input-md" wire:model="quantity" >
                                         @error('quantity') <p class="text-danger">{{$message}}</p>  @enderror
                                     </div>
                                </div>
                                <div class="form-group">
                                     <label class="col-md-4 control-label">SKU</label>
                                     <div class="col-md-4">
                                        <input type="text"   class="form-control input-md" wire:model="SKU" >
                                         @error('SKU') <p class="text-danger">{{$message}}</p>  @enderror
                                     </div>
                                </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Image</label>
                                        <div class="col-md-4">
                                            <input type="file" placeholder="select image to product" name="image" class="input-file" wire:model="image">
                                            @if($image)
                                                <img src="{{$image->temporaryUrl()}}" width="120">
                                                @endif
                                            @error('image') <p class="text-danger">{{$message}}</p>  @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Product Gallary</label>
                                        <div class="col-md-4">
                                            <input type="file" name="images" class="input-file" wire:model="images" multiple>
                                             @if($images)
                                                @foreach($images as $image)
                                                <img src="{{$image->temporaryUrl()}}" width="120">
                                                @endforeach
                                             @endif
                                            @error('image') <p class="text-danger">{{$message}}</p>  @enderror
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"></label>
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
@push('scripts')
    <script>
       $(function () {
           tinymce.init({
               selector:'#short_description',
               setup:function (editor) {
                   editor.on('Change',function (e) {
                       tinyMCE.triggerSave();
                       var sd_data = $('#short_description').val();
                       @this.set('short_description',sd_data);
                   });
               }
           });
           tinymce.init({
               selector:'#description',
               setup:function (editor) {
                   editor.on('Change',function (e) {
                       tinyMCE.triggerSave();
                       var d_data = $('#description').val();
                   @this.set('description',d_data);
                   });
               }
           });
       }) 
    </script>
    @endpush