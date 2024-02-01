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
        <div class="table-responsive m-auto mt-4 " style="width: 80%">
            
            <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                   
                @foreach($users as $user)
                     
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        @if ($user->usertype == '0')
                            <td><a href="{{ route('delete', $user->id )  }}">Delete</a></td>
                        @else
                            <td>Noursin</td>
                        @endif
                    </tr>

                @endforeach
                </tbody>
            </table>
            
        </div>


    </div>
    @include('admin.adminjs')
  </body>
</html>