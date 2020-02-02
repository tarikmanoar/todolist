<!doctype html>
<html lang="en">
<body>

    <p>Dear <span class="text-info">{{$user->name}} </span></p>
    <p>Please Active Your account By click Here!</p>
    <a href="{{route('varification',$user->remember_token)}} " class="btn btn-success">Active</a> <br><br>
    <p>Regrads By</p>
    <p style="color:blue">TarikManoar</p>
</body>

</html>
