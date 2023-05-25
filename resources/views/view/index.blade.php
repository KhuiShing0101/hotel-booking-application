<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}

.edit-btn {
    background-color: #03a1fc;
    padding: 5px 10px;
    border-radius: 5px;
}
.delete-btn {
    background-color: red;
    padding: 5px 10px;
    border-radius: 5px;
}
</style>
</head>
<body>

<h1>A Fancy Table</h1>

<a href="{{ url('/backend/view/create') }}">Create New</a>

<table id="customers">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Room</th>
    <th>Action</th>
  </tr>
  @foreach ($views as $key => $view)
      <tr>
        <td> {{ $view->id }} </td>
        <td> {{ $view->name }} </td>
        
        <td>
            <a href="{{ url('/backend/view/edit') }}/{{ $view->id }}" class="edit-btn">Update</a>
            <a href="{{ url('/backend/view/delete') }}/{{ $view->id }}" class="delete-btn">Delete</a>
        </td>
      </tr>
  @endforeach
</table>

</body>
</html>