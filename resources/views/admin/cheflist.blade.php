
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
                <form action="{{ route('addchef') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id='name' placeholder='Chef Name' required>
                    </div>
                    <div class="form-group">
                        <label for="speciality">Speciality</label>
                        <input type="num" class="form-control" name="speciality" id='speciality' placeholder='Speciality' required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id='image' required>
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
                        <th scope="col">Name</th>
                        <th scope="col">Speciality</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                       
                    @foreach($chefs as $chef)
                         
                        <tr>
                            <td>{{ $chef->name }}</td>
                            <td>{{ $chef->speciality }}</td>
                            <td><img src="chefimages/{{ $chef->image  }}" alt="chefimg" srcset=""></td>
                            <td><a href="{{ route('deletechef', $chef->id )  }}">Delete</a> <a href="{{ route('updatechefpage', $chef->id )  }}">Update</a></td>
                           
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