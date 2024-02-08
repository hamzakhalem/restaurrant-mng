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
                    <th scope="col">Phone Number</th>
                    <th scope="col">Guest Number</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Message</th>
                  </tr>
                </thead>
                <tbody>
                   
                @foreach($reservations as $reservation)
                     
                    <tr>
                        <td>{{ $reservation->name }}</td>
                        <td>{{ $reservation->email }}</td>
                        <td>{{ $reservation->guest }}</td>
                        <td>{{ $reservation->phone }}</td>
                        <td>{{ $reservation->date }}</td>
                        <td>{{ $reservation->time }}</td>
                        <td>{{ $reservation->message }}</td>
                        {{-- <td><a href="{{ route('deletefood', $reservation->id )  }}">Delete</a> <a href="{{ route('updatefoodpage', $reservation->id )  }}">Update</a></td> --}}
                       
                    </tr>

                @endforeach
                </tbody>
            </table>
            
        </div>


    </div>
    @include('admin.adminjs')
  </body>
</html>