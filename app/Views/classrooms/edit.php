<h1>Edit Classroom</h1>
    <form action="/classrooms/update/<?= $classroom['classroom_id']; ?>" method="post">
        <label for="classroom_name">Classroom Name:</label>
        <input type="text" name="classroom_name" id="classroom_name" value="<?= esc($classroom['classroom_name']); ?>">
        <button type="submit">Update</button>
    </form>
    <a href="/classrooms">Back to Classroom List</a>