<label for="{{$name}}">{{$text}}</label>
<input type="{{$type}}" class="form-control" id="{{$name}}" name='{{$name}}' placeholder="{{$placeholder}}" value="{{old($name)}}">
@error($name)
    <p>{{$message}}</p>
@enderror