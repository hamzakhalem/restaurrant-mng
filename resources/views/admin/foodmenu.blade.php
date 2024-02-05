
<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.adminccs')
  </head>
  <body>
    <div class="container-scroller col-12">
        
        @include('admin.navbar')
        <div class="w-100">

            <div class="container m-5">
                <form action="{{ route('addfood') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id='title' placeholder='Food title' required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="num" class="form-control" name="price" id='price' placeholder='Price' required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id='image' required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" id='description' placeholder='Food description' required>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-dark p-3 rounded " type="submit" value="Save">
                    </div>
                </form>
            </div>
            <!-- main-panel -->
            <div class="table-responsive m-auto mt-4 " style="width: 80%">
                
                <table class="table table-dark">
                    <thead>
                      <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                       
                    @foreach($foods as $food)
                         
                        <tr>
                            <td>{{ $food->title }}</td>
                            <td>{{ $food->price }}</td>
                            <td>{{ $food->Description }}</td>
                            <td><a href="{{ route('deletefood', $food->id )  }}">Delete</a></td>
                        </tr>
    
                    @endforeach
                    </tbody>
                </table>
                
            </div>
            
        </div>
    </div>
    @include('admin.adminjs')

  </body>
</html>