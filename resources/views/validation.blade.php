<form action="/validate" method="post">
    @csrf
    <input type="text" name="name" value={{old('name')}}>
    @error('name')
        <div>{{$message}}</div>
    @enderror
    <input type="text" name="email" value={{old('email')}}>
    @error('email')
        <div>{{$message}}</div>
    @enderror
    <input type="password" name="password" value={{old('password')}}>
    @error('password')
        <div>{{$message}}</div>
    @enderror
    <button type="submit">Submit</button> 
</form>