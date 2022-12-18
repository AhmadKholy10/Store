<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>
</head>
<style>
    .aTable {
    width: 800px;
    border-spacing: 2px;
}
.aTable tr {
    background-color: #DDD;
}
</style>
<body>
    <div class="aTable">
        <table class="table">
        <tr class="aTable tr">
          <th>id</th>
          <th>name</th>
          <th>quantity</th>
          <th>productId</th>
        </tr>
        @foreach ($boxes as $box)
        <tr>
            <td>{{ $box->id }}</td>
            <td>{{ $box->name }}</td>
            <td>{{ $box->quantity }}</td>
            <td>{{ $box->productId }}</td>
          </tr>
        @endforeach
      </table>
    </div>
      
</body>
</html>