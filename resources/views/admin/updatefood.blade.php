<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/public">
    @include('admin.adminccs')
  </head>
  <body>
    <div class="container-scroller">
        
        @include('admin.navbar')

        <div class="container m-5">
            <form action="{{ route('updatefood') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $food->id }}"  name="id"/>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id='title' value='{{ $food->title }}' required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="num" class="form-control" name="price" id='price' value='{{ $food->price }}' required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" id='description' value='{{ $food->description }}' required>
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