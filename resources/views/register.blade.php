<form method="post" action="/postRegister">
    @csrf
    <input type="text" name="username"><br>
    <input type="password" name="password"><br>
    <button type="submit">Register</button><br>
</form>