<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Main Page</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        .container { max-width: 700px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px #ccc; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background: #007bff; color: #fff; }
        tr:nth-child(even) { background: #f9f9f9; }
        .form-inline { display: flex; gap: 10px; }
        input[type="text"], textarea {
            width: 95%;
            max-width: 295px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin: 0 auto;
            display: block;
        }
        button { padding: 8px 16px; background: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #0056b3; }
        .logout { float: right; background: #dc3545; }
        .logout:hover { background: #a71d2a; }
        .empty { text-align: center; color: #888; margin-top: 20px; }
    </style>
</head>
<body>
<div class="container">
    <form method="POST" action="/logout" style="text-align:right;">
        @csrf
        <button type="submit" class="logout">Logout</button>
    </form>
    <h2>Item List</h2>
    <form method="POST" action="/items" class="form-inline" style="margin-bottom:20px;">
        @csrf
        <input type="text" name="name" placeholder="Item Name" required>
        <input type="text" name="description" placeholder="Description">
        <button type="submit">Add Item</button>
    </form>
    @if ($items->isEmpty())
        <div class="empty">No items found.</div>
    @else
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($items as $item)
            <tr>
                <form method="POST" action="/items/{{ $item->id }}/update" class="form-inline">
                    @csrf
                    <td><input type="text" name="name" value="{{ $item->name }}" required></td>
                    <td><input type="text" name="description" value="{{ $item->description }}"></td>
                    <td>
                        <button type="submit">Update</button>
                </form>
                <form method="POST" action="/items/{{ $item->id }}/delete" style="display:inline;">
                    @csrf
                    <button type="submit" style="background:#dc3545;">Delete</button>
                </form>
                    </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endif
</div>
</body>
</html>
