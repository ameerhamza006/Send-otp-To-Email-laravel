
//for login OTP

 public function sendotp(Request $request){
        
         $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
      
         $user = User::where('email',$request->email)->first();
        if(!$user){
             return back()->withSuccess('Email Not Regisered');
        }
       $userpass = Hash::check($request->password, $user->password);
       
        if(!$userpass){
             return back()->withSuccess('Password Not Match');
        }
        
       
       $otp = rand(1000,9999);
        Log::info("otp = ".$otp);
        
         $userr = User::where('email','=',$request->email)->update(['otp' => $otp]);
  
        $email_data = array(
        'name' => $user->name,
        'email' => $request->email,
        'otp' => $otp,
    );
          // send email with the template -- view/welcome_email.blade.php
    Mail::send('welcome_email', $email_data, function ($message) use ($email_data) {
        $message->to($email_data['email'], $email_data['name'],$email_data['otp'])
            ->subject('EXAMPLE Verification Code')
            ->from('example@gmail.com', 'Example From');
    });
       
       return view('front.pages.logins.otp',['email'=>$request->email,'password'=>$request->password]);
      
        
    }
    
    
    
    
      public function verifyotp(Request $request)
     {
        
      $user = User::where([['email',$request->email],['otp',$request->otp]])->first();
       if(!$user){
             return back()->withSuccess('Incorrect Code!');
        }

        $credentials = $request->only('email', 'password');
     
        if (Auth::attempt($credentials)) {
            
             return redirect()->route('redirects')
                        ->withSuccess('Signed in Succeccfully');
                
        }else{
              return back()->withSuccess('Login details are not valid');
        }
                
                
      
     }
    
    
    
