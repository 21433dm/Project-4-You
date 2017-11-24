// JavaScript Document

      function validate()
      {
      
         if( document.signup.fname.value == "" )
         {
            alert( "Please provide your First name!" );
            document.signup.fname.focus() ;
            return false;
         }
		 
         if( document.signup.lname.value == "" )
         {
            alert( "Please provide your Surname!" );
            document.signup.lname.focus() ;
            return false;
         }
         
         if( document.signup.email.value == "" )
         {
            alert( "Please provide your Email!" );
            document.signup.email.focus() ;
            return false;
         }

         if( document.signup.username.value == "" )
         {
            alert( "Please provide your Username" );
            document.signup.username.focus() ;
            return false;
         }
		 
		 if( document.signup.password.value == "" )
         {
            alert( "Please provide a Password!" );
            document.signup.password.focus() ;
            return false;
         }

         if( document.signup.password2.value == "" )
         {
            alert( "Please confirm your Password!" );
            document.signup.password2.focus() ;
            return false;
         }
         
      }
	 
	 
      function validate2()
      {
      
         if( document.login.lemail.value == "" )
         {
            alert( "Please provide your Email!" );
            document.login.lemail.focus() ;
            return false;
         }
		 	 
		 if( document.login.lpassword.value == "" )
         {
            alert( "Please provide a Password!" );
            document.login.lpassword.focus() ;
            return false;
         }
         
      }
	  
	  
      function validate3()
      {
      
         if( document.contact.Name.value == "" )
        	{
           alert( "Please provide your full name!" );
            document.contact.Name.focus() ;
            return false;
         }
		 
         if( document.contact.Phoneno.value == "" )
         {
           alert( "Please provide your Phone Number!" );
            document.contact.Phoneno.focus() ;
            return false;
         }
         
         if( document.contact.Email.value == "" )
         {
            alert( "Please provide your Email!" );
            document.signup.Email.focus() ;
            return false;
         }
      }