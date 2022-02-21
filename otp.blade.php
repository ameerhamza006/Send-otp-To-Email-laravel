
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Email Verify - IQN</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
	

<style>


.login-container{
    margin-top: 5%;
    margin-bottom: 5%;
}
.login-form-1{
    padding: 5%;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-1 h3{
    text-align: center;
    color: #333;
}
.login-form-2{
    padding: 5%;
    background: #0062cc;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-2 h3{
    text-align: center;
    color: #fff;
}
.login-container form{
    padding: 10%;
}
.btnSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    border: none;
    cursor: pointer;
}
.login-form-1 .btnSubmit{
    font-weight: 600;
    color: #fff;
    background-color: #0062cc;
}
.login-form-2 .btnSubmit{
    font-weight: 600;
    color: #0062cc;
    background-color: #fff;
}
.login-form-2 .ForgetPwd{
    color: #fff;
    font-weight: 600;
    text-decoration: none;
}
.login-form-1 .ForgetPwd{
    color: #0062cc;
    font-weight: 600;
    text-decoration: none;
}



</style>

<body>



<div class="container login-container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 login-form-1">
                   
                  
                    @if(session('success'))
    <p class="text-danger text-center"><strong>{{session('success')}}</strong></p>
    
                  @else
                    <p class="text-success text-center"><strong>Code Successfully Send to Your Email</strong></p>
                   @endif
                 
                   
                    
                   
                    <form action="{{ route('verify.code') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control @error('otp') is-invalid @enderror" name="otp" placeholder="Code *" value="{{ old('otp') }}" required autofocus />
                        @error('otp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                       <input type="hidden"  name="email"  value="{{$email}}"   />
                        <input type="hidden"  name="password"  value="{{$password}}"   />
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Sign-In" />
                        </div>
                        
                    </form>
           
                </div>
               
            </div>
        </div>

	

</body>
</html>
