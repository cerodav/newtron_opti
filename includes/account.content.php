<?php 
$content=<<<EOT
<script>
function signup()
{
    var fullname=document.getElementById("fullname").value;
    var sex=document.getElementById("sex").value;
    var nation=document.getElementById("nation").value;
    var state=document.getElementById("state").value;
    var city=document.getElementById("city").value;
    var pcode=document.getElementById("pcode").value;
    var email=document.getElementById("email").value;
    var contact=document.getElementById("contact").value;
    var cid=document.getElementById("cid").value;
    var dept=document.getElementById("dept").value;
    var degree=document.getElementById("degree").value;
    var cname=document.getElementById("cname").value;
    var yos=document.getElementById("yos").value;
    var cadd=document.getElementById("cadd").value;
    var requname=document.getElementById("requname").value;
    var reqpassword=document.getElementById("reqpassword").value;
    var reppassword=document.getElementById("reppassword").value;

        
        var url = "./functions/variable_setting.php";
        var params = "fullname="+fullname+"&sex="+sex+"&nation="+nation+"&state="+state+"&city="+city+"&pcode="+pcode+"&email="+email+"&contact="+contact+"&cid="+cid+"&dept="+dept+"&degree="+degree+"&cname="+cname+"&yos="+yos+"&cadd="+cadd+"&requname="+requname+"&reqpassword="+reqpassword+"&reppassword="+reppassword;
        var xhr = new XMLHttpRequest();
        xhr.open("POST", url, true);

        //Send the proper header information along with the request
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {//Call a function when the state changes.
  if(xhr.readyState == 4 && xhr.status == 200) {
    document.getElementById("error_message").innerHTML=xhr.responseText;
  }
                                            }
        xhr.send(params);
}

function fbsignin()
{
    function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '377341012470622',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.3' // use version 2.2
  });


  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name+" with UID: "+response.id);
      
        
        var url = "./functions/fb_setting.php";
        var params = "fullname="+response.name+"&id="+response.id+"&fb=1";
        var xhr = new XMLHttpRequest();
        xhr.open("POST", url, true);

        //Send the proper header information along with the request
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {//Call a function when the state changes.
  if(xhr.readyState == 4 && xhr.status == 200) {
    if(xhr.responseText.localeCompare("redirect")==0)
        window.location="./index.php?page=home";
  }
}
        xhr.send(params);

        //window.location="./index.php?page=home";

    });
  }
}

function signin()
{
        var uname=document.getElementById("uname").value;
        var pword=document.getElementById("pword").value;

        var url = "./functions/signin_setting.php";
        var params = "uname="+uname+"&pword="+pword;
        var xhr = new XMLHttpRequest();
        xhr.open("POST", url, true);

        //Send the proper header information along with the request
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {//Call a function when the state changes.
        if(xhr.readyState == 4 && xhr.status == 200) {
            if(xhr.responseText.localeCompare("Success")==0)
            {  
                window.location="./index.php?page=home";
                }
                else
        document.getElementById("error_message_signin").innerHTML=xhr.responseText;
        }
                                            }
        xhr.send(params);
        }      
</script>
 <header>
       <section id="account" style="background-color:#000">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">ACCOUNT OPTIONS</h2>
                    <h5 class="section-heading">Sign in and be a part of our discussions</h5>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div id="account_wrapper">
                <div class="col-lg-4 col-md-6 text-center" >
                    <div class="service-box">
                        
                            <i class="fa fa-4x fa-diamond wow bounceIn text-primary"></i>
                            <h3>Sign In</h3>
                            <p class="text-muted">For users who already have an account in Newtron.in</p>
                            <br>
                            <form action="signin.php" method="post">
                            <input type="text" id="uname" class="form-control" placeholder="Your Username.."/><br>
                            <input type="password" id="pword" class="form-control" placeholder="Your Password.."/>
                            <br>
                            <a id="signinbtn" class="btn btn-default btn-xl wow tada" style="background-color:#FFF; color:#000">Sign in</a>
                            <p id="error_message_signin" style="color:#FFF"></p>
                            </form>
                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="service-box">
                        
                            <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>
                            <h3>Sign In via Facebook</h3>
                            <p class="text-muted">No account creation required, just a Facebook account</p>
                            <br>
                            <a id="fbsigninbtn" class="btn btn-default btn-xl wow tada" style="background-color:#FFF; color:#000">Facebook Sign In</a>
                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="service-box">
                        
                            <i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>
                            <h3>Create An Account</h3>
                            <p class="text-muted">Join the league of AI enthusiasts</p>
                            <br>
                            <a href="#signupsection" class="btn btn-default btn-xl wow tada" style="background-color:#FFF; color:#000">Sign Up</a>
                        
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    </header>
<section id="signupsection">
       
        <div class="container">
            <div class="row">
                <div id="account_wrapper">
                <div class="col-lg-4 col-md-6 text-center" >
                    <div class="service-box">
                    	
	                        <i class="fa fa-4x fa-diamond wow bounceIn text-primary"></i>
	                        <h3>Sign Up</h3>
	                        <p class="text-muted">New User Registration Newtron.in</p>
                            <br>
                            <form action="signup.php" method="post">
                            <input type="text" id="fullname" class="form-control" placeholder="Your fullname.."/><br>
                            <input type="text" id="sex" class="form-control" placeholder="Your sex.."/><br>
                            <input type="text" id="nation" class="form-control" placeholder="Your nationality.."/><br>
                            <input type="text" id="state" class="form-control" placeholder="Your state.."/><br>
                            <input type="text" id="city" class="form-control" placeholder="Your city.."/><br>
                            <input type="text" id="pcode" class="form-control" placeholder="Your pincode.."/><br>
                            <input type="text" id="email" class="form-control" placeholder="Your email.."/><br>
                            <input type="text" id="contact" class="form-control" placeholder="Your contact number.."/><br>
                            <input type="text" id="cid" class="form-control" placeholder="Your college ID.."/><br>
                            <input type="text" id="dept" class="form-control" placeholder="Dept that you are studying under.."/><br>
                            <input type="text" id="degree" class="form-control" placeholder="Degree that you are pursuing.."/><br>
                            <input type="text" id="cname" class="form-control" placeholder="Name of your college.."/><br>
                            <input type="text" id="yos" class="form-control" placeholder="Your year of study.."/><br>
                            <input type="text" id="cadd" class="form-control" placeholder="Your college address.."/><br>
                            <br>
                            <p>Account Credentials</p>
                            <input type="text" id="requname" class="form-control" placeholder="Your username.."/><br>
                            <input type="password" id="reqpassword" class="form-control" placeholder="Your password.."/><br>
                            <input type="password" id="reppassword" class="form-control" placeholder="Re-enter your password.."/><br>
                            <a id="signupbtn" class="btn btn-default btn-xl wow tada" style="background-color:#000; color:#FFF">Sign up</a>
                            </form>
                            <p id="error_message"  style="color:#F00"></p>
	                    
                    </div>
                </div>
                
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
    window.addEventListener("click",function(e){
    var ele=document.elementFromPoint(e.clientX,e.clientY);

    if(ele.id.localeCompare("signupbtn")==0)
    {
      signup();
    } 

    if(ele.id.localeCompare("signinbtn")==0)
    {
      signin();
    } 

    if(ele.id.localeCompare("fbsigninbtn")==0)
    {
      fbsignin();
    } 
    
  });
  </script>
    
EOT;
?>