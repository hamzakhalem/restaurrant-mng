
<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.adminccs')
  </head>
  <body>
    <div class="container-scroller">
        
        @include('admin.navbar')
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

    </div>
    @include('admin.adminjs')

  </body>
</html>