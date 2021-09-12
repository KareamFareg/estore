<div>
    <title>Categories</title>

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
             @if(Session::has('delete_success'))
                 <p class="alert alert-success">{{Session::get('delete_success')}}</p>
             @endif
           <div class="panel-heeading">
               <div class="row">
                   <div class="col-md-6">
                        All Categories
                   </div>
                   <div class="col-md-6">
                       <a href="{{route('admin.add.category')}}" class="alert alert-success pull-right"> Add New Category</a>
                   </div>
               </div>
           </div>
            <div class="panel-body">
                <table class='table table-striped'>
                   <thead>
                     <tr>
                     <td>Category id</td>
                     <td>Category name</td>
                     <td>Category slug</td>
                     <td>Actions</td>                        
                     </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                      <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->slug}}</td>
                        <td>
                            <a href="{{route('admin.edit.category',['category_slug'=>$category->slug])}}"> <i class="fa fa-edit fa-2x"></i> </a>
                            <a href="#" onclick="confirm('Do You want to delete this category ?') || event.stopImmediatePropagation()" wire:click.prevent="deletecategory({{$category->id}})"> <i class="fa fa-times fa-2x"></i> </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
                <div class="text-center justify-center"> {{$categories->links()}}</div>
            </div>
         
         </div>
       </div>
     </div>
   </div>
</div>
