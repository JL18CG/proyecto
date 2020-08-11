@csrf
    <div class="form-group">
        <label for="name">Nombre</label>    
        <input class="form-control" type="text" name="name" id="name" value="{{old('name',$users->name)}}">
    </div>

    <div class="form-group">
        <label for="lastname">Apellido P</label>
        <input class="form-control" type="lastname" name="lastname" id="lastname" value="{{old('lastname',$users->lastname)}}">
    </div>

    <div class="form-group">
        <label for="surname">Apellido M</label>
        <input class="form-control" type="surname" name="surname" id="surname" value="{{old('surname',$users->surname)}}">
    </div>

    <div class="form-group">
        <label for="level">Nivel</label>    
        <input class="form-control" type="text" name="level" id="level" value="{{old('level',$users->level)}}">
    </div>

    <div class="form-group">
        <label for="email">email</label>
        <input class="form-control" type="email" name="email" id="email" value="{{old('email',$users->email)}}">
    </div>
 
   
    