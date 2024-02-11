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
            <form action="{{ route('updatechef') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $chef->id }}"  name="id"/>
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control" name="name" id='name' value='{{ $chef->name }}' required>
                </div>
                <div class="form-group">
                    <label for="speciality">Speciality</label>
                    <input type="text" class="form-control" name="speciality" id='speciality' value='{{ $chef->speciality }}' required>
                </div>
                <div class="form-group">
                    <label for="image">image</label>
                    <input type="file" class="form-control" name="image" id='image' value='{{ $chef->iamge }}' required>
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