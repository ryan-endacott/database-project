!!! 5
html
  head
    meta(name='viewport', content='width=device-width, initial-scale=1.0')
    //
       Bootstrap
    link(href='css/bootstrap.min.css', rel='stylesheet', media='screen')
    link(href='http://fonts.googleapis.com/css?family=Roboto:300', rel='stylesheet', type='text/css')
    link(rel='stylesheet', type='text/css', href='mystyle.css')
    script
      function registerUser()
      {
      //this entire function is error checking, if no errors are found it submits the register form in the else statement. It will need a primary key from the database
      var email=document.forms["register"]["email"].value;
      var atpos=email.indexOf("@");
      var dotpos=email.lastIndexOf(".");
      var uname=document.forms["register"]["username"].value;
      var password=document.forms["register"]["password"].value;
      var businessname=document.forms["register"]["business-name"].value;
      var address=document.forms["register"]["address"].value;
      var venue=document.forms["register"]["venue"].value;
      if (uname==null || uname=="" )
      {
      alert("Please enter a username");
      document.getElementById('username').style.color="black";
      return false;
      }
      else if(password==null || password==""){
      alert("Please provide a password");
      return false;
      }
      else if(venue==null || venue==""){
      alert("Please provide a venue type");
      return false;
      }
      else if(businessname==null || businessname==""){
      alert("Please provide a business name");
      return false;
      }
      else if(address==null || address==""){
      alert("Please provide your business address");
      return false;
      }
      else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
      {
      alert("That is not a valid E-mail address");
      return false;
      }
      else{
      //for the initial insert I don't think you will need a primary key. But once we get an edit button implemented once they are registered, it will need to be passed for the select statement
      document.forms['register'].elements['pk'].value = 1;
      document.forms['register'].submit();
      }
      }
      //alert box that states the hours, probably not needed. Was just cfhecking to make sure they were proper values
      function addHours()
      {
      var open=document.forms["register"]["open"].value;
      var close=document.forms["register"]["close"].value;
      alert(open +" to "+ close);
      }
  body
    #wrapper-register
      //
         jQuery (necessary for Bootstrap's JavaScript plugins)
      script(src='https://code.jquery.com/jquery.js')
      //
         Include all compiled plugins (below), or include individual files as needed
      script(src='js/bootstrap.min.js')
      #input
        form.register-form(name='register', action='')
          | "" method="post"
          input(type='hidden', name='pk')
          input(type='hidden', name='action', value='register')
          .header
            h1 I'm Bored
            span.header Please fill out the following form. Note that required fields are marked with *.
            hr
          .credentials
            span.header Personal information
            hr
            | Username:
            span.space
            input#username.box1.required(type='text', name='username', placeholder='*Username')
            span.tab
            | Password:
            span.space
            input.box1.required(type='password', name='password', placeholder='*Password')
            br
          .credentials
            | Email-address:
            span.space
            input.box1.required(type='text', name='email', placeholder='*Email-adress')
            span.tab
              | Type of Venue:
              select.box1(name='venue')
                option(value='')
                option(value='entertainment') Entertainment
                option(value='restaurant') Restaurant
                option(value='bar') Bar
          .credentials
            span.header Busniness information
            hr
            | Business Name:
            span.space
            input.box1.required(type='text', name='business-name', placeholder='*Business')
            span.tab
              | Address:
              span.space
              input.box1.required(type='text', name='address', placeholder='*Address')
          .credentials
            | Phone Number:
            span.space
            input.box1(type='text', name='phone_number', placeholder='Phone Number')
            span.tab
            | Website:
            span.space
            input.box1(type='text', name='website', placeholder='Website')
            span.tab
          .credentials
            span.header Hours
            hr
            .btn-group(name='days', data-toggle='buttons')
              label.btn.btn-primary.styler
                input(name='sunday', type='checkbox', value='Sunday')
                | Su
              label.btn.btn-primary
                input(name='monday', type='checkbox', value='Monday')
                | M
              label.btn.btn-primary
                input(name='tuesday', type='checkbox', value='Tuesday')
                | T
              label.btn.btn-primary
                input(name='wednesday', type='checkbox', value='Wednesday')
                | W
              label.btn.btn-primary
                input(name='thursday', type='checkbox', value='Thursday')
                | Th
              label.btn.btn-primary
                input(name='friday', type='checkbox', value='Friday')
                | F
              span.space
              label.btn.btn-primary
                input(name='saturday', type='checkbox', value='Saturday')
                | Sa
            select.dropDown(name='open')
              option(value='6:00 am') 6:00 am
              option(value='6:30 am') 6:30 am
              option(value='7:00 am') 7:00 am
              option(value='7:30 am') 7:30 am
              option(value='8:00 am') 8:00 am
              option(value='8:30 am') 8:30 am
              option(value='9:00 am', selected='') 9:00 am
              option(value='9:30 am') 9:30 am
              option(value='10:00 am') 10:00 am
              option(value='10:30 am') 10:30 am
              option(value='11:00 am') 11:00 am
              option(value='11:30 am') 11:30 am
              option(value='12:00 pm') 12:00 pm
              option(value='12:30 pm') 12:30 pm
              option(value='1:00 pm') 1:00 pm
              option(value='1:30 pm') 1:30 pm
              option(value='2:00 pm') 2:00 pm
              option(value='2:30 pm') 2:30 pm
              option(value='3:00 pm') 3:00 pm
              option(value='3:30 pm') 3:30 pm
              option(value='4:00 pm') 4:00 pm
              option(value='4:30 pm') 4:30 pm
              option(value='5:00 pm') 5:00 pm
              option(value='5:30 pm') 5:30 pm
              option(value='6:00 pm') 6:00 pm
              option(value='6:30 pm') 6:30 pm
              option(value='7:00 pm') 7:00 pm
              option(value='7:30 pm') 7:30 pm
              option(value='8:00 pm') 8:00 pm
              option(value='8:30 pm') 8:30 pm
              option(value='9:00 pm') 9:00 pm
              option(value='9:30 pm') 9:30 pm
              option(value='10:00 pm') 10:00 pm
              option(value='10:30 pm') 10:30 pm
              option(value='11:00 pm') 11:00 pm
              option(value='11:30 pm') 11:30 pm
              option(value='12:00 am') 12:00 am
              option(value='12:30 am') 12:30 am
              option(value='1:00 am') 1:00 am
              option(value='1:30 am') 1:30 am
              option(value='2:00 am') 2:00 am
              option(value='2:30 am') 2:30 am
              option(value='3:00 am') 3:00 am
              option(value='3:30 am ') 3:30 am
              option(value='4:00 am') 4:00 am
              option(value='4:30 am') 4:30 am
              option(value='5:00 am') 5:00 am
              option(value='5:30 am') 5:30 am
            select.dropDown(name='close')
              option(value='6:00 am') 6:00 am
              option(value='6:30 am') 6:30 am
              option(value='7:00 am') 7:00 am
              option(value='7:30 am') 7:30 am
              option(value='8:00 am') 8:00 am
              option(value='8:30 am') 8:30 am
              option(value='9:00 am', selected='') 9:00 am
              option(value='9:30 am') 9:30 am
              option(value='10:00 am') 10:00 am
              option(value='10:30 am') 10:30 am
              option(value='11:00 am') 11:00 am
              option(value='11:30 am') 11:30 am
              option(value='12:00 pm') 12:00 pm
              option(value='12:30 pm') 12:30 pm
              option(value='1:00 pm') 1:00 pm
              option(value='1:30 pm') 1:30 pm
              option(value='2:00 pm') 2:00 pm
              option(value='2:30 pm') 2:30 pm
              option(value='3:00 pm') 3:00 pm
              option(value='3:30 pm') 3:30 pm
              option(value='4:00 pm') 4:00 pm
              option(value='4:30 pm') 4:30 pm
              option(value='5:00 pm') 5:00 pm
              option(value='5:30 pm') 5:30 pm
              option(value='6:00 pm') 6:00 pm
              option(value='6:30 pm') 6:30 pm
              option(value='7:00 pm') 7:00 pm
              option(value='7:30 pm') 7:30 pm
              option(value='8:00 pm') 8:00 pm
              option(value='8:30 pm') 8:30 pm
              option(value='9:00 pm') 9:00 pm
              option(value='9:30 pm') 9:30 pm
              option(value='10:00 pm') 10:00 pm
              option(value='10:30 pm') 10:30 pm
              option(value='11:00 pm') 11:00 pm
              option(value='11:30 pm') 11:30 pm
              option(value='12:00 am') 12:00 am
              option(value='12:30 am') 12:30 am
              option(value='1:00 am') 1:00 am
              option(value='1:30 am') 1:30 am
              option(value='2:00 am') 2:00 am
              option(value='2:30 am') 2:30 am
              option(value='3:00 am') 3:00 am
              option(value='3:30 am ') 3:30 am
              option(value='4:00 am') 4:00 am
              option(value='4:30 am') 4:30 am
              option(value='5:00 am') 5:00 am
              option(value='5:30 am') 5:30 am
            button.addHours(type='button', name='add-hours', value='Add Hours', onclick='addHours()')
              span Add Hours
          .credentials
            | Deals and specials:
            br
            br
            textarea.specials.non-required(name='specials')
          .footer
            input.button(type='submit', name='submit', value='Register', onclick='registerUser()')
            input.button(type='button', name='cancel', value='Cancel', style='margin-left: 15px;', onclick='top.location.href=\'login.php\';')
