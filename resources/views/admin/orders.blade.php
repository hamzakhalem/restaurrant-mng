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
      <div class="contianer">
        <form method="get" action="{{ route("searchOrder") }}" >
          @csrf
          <input type="text" name="search">
          <input type="submit" value="search" class="btn btn-dark">
        </form>
        <div class="table-responsive m-auto mt-4 " style="width: 80%">
            <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">Food name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Qte</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody>
                   
                @foreach($orders as $order)
                     
                    <tr>
                        <td>{{ $order->foodname }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->price * $order->quantity  }}</td>
                        {{-- <td><a href="{{ route('deletefood', $order->id )  }}">Delete</a> <a href="{{ route('updatefoodpage', $order->id )  }}">Update</a></td> --}}
                       
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