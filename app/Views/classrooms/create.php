<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Classroom</title>
</head>
<body>
    <h1>Create Classroom</h1>
    <form action="/classrooms/store" method="post">
        <label for="classroom_name">Classroom Name:</label>
        <input type="text" name="classroom_name" id="classroom_name" required>

        
        <button type="submit">Save</button>
    </form>
</body>
</html>
