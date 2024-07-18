<form method="post" action="/postAdd">
    @csrf
    <input type="number" name="num1"><br>
    <input type="number" name="num2"><br>
    <button type="submit">Add</button>
</form>