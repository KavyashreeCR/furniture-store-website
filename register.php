<?php include('include/header.php'); ?>

        <div class="container sign-in-up">
          <div class="row">
            <div class="col-md-6">
              <h1>Online Furniture Store</h1>
              <p>An online furniture shop that allows users to check for various furniture available at the online 
                store and purchase online. The project consists of list of furniture products displayed in various
                 models and designs. The user may browse through these products as per categories. If the user likes 
                 a product he may add it to his shopping cart. Once user wishes to checkout he must 
                register on the site first. He can then login using same id password next time.</p>
            </div>
            
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <h1 class="text-center mt-5">Register Account</h1>
                  
                  
                  <form method="post" class="mt-5 p-3">
                    
                    <?php 
                      if(isset($_POST['register'])){
                          
                          $fullname = $_POST['fullname'];
                          $email = $_POST['email'];
                          $password = $_POST['password'];
                          $conf_pass = $_POST['confirm-password'];
                          $address = $_POST['address'];
                          $city = $_POST['city'];
                          $postal_code = $_POST['code'];
                          $number = $_POST['phone_number'];
                          
                          if(!empty($fullname) or !empty($email) or !empty($password) or !empty($conf_pass) or !empty($address) or !empty($city) or !empty($postal_code) or !empty($number)){

                            if($password === $conf_pass){

                              $cust_query="INSERT INTO customer(`cust_name`,`cust_email`,`cust_pass`,`cust_add`,`cust_city`,`cust_postalcode`,`cust_number`) VALUES('$fullname','$email','$password','$address','$city','$postal_code','$number')";


                              if(mysqli_query($con,$cust_query)){
                                  $message="You Are Registered Successfully!";
                              }
                              
                              
                              
                            } 
                            else{
                                $error="Passwords do not Match";
                            }
                          }
                            else{
                          $error="All (*) Fields Required";
                      }
                      }
                    
                      ?>
                      <?php
                      if(isset($error)){
                      
                        echo "<div class='alert bg-danger' role='alert'>
                                <span class='text-white text-center'> $error</span>
                              </div>";
                    
                        }
                      else if(isset($message)){
                      
                        echo "<div class='alert bg-success' role='alert'>
                                <span class='text-white text-center'> $message</span>
                              </div>";
                    
                        }
                      
                      ?>
                    <div class="form-group">
            <input type="text" id="fullname" name="fullname" placeholder="Full Name" class="form-control" oninput="validateFullName()">
            <span id="fullNameError" style="color:red;"></span>
        </div>

        <div class="form-group">
            <input type="email" id="email" name="email" placeholder="Email" class="form-control" oninput="validateEmail()">
            <span id="emailError" style="color:red;"></span>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <input type="password" id="password" name="password" placeholder="Password" class="form-control" oninput="validatePassword()">
                    <span id="passwordError" style="color:red;"></span>
                </div>
            </div>
            <div class="col-sm-6 col-12 col-md-6">
                <div class="form-group">
                    <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" class="form-control" oninput="validateConfirmPassword()">
                    <span id="confirmPasswordError" style="color:red;"></span>
                </div>
            </div>
        </div>

        <!-- The rest of the form remains without specific validation for simplicity -->
        <div class="form-group">
            <input type="text" name="address" placeholder="Address" class="form-control">
        </div>

        <div class="row">
            <div class="col-md-6 col-6">
                <div class="form-group">
                    <input type="text" name="city" placeholder="City" class="form-control">
                </div>
            </div>
            
            <div class="col-md-6 col-6">
                <div class="form-group">
                    <input type="number" name="code" placeholder="Postal code" class="form-control">
                </div>
            </div>
        </div>

        <div class="form-group">
            <input type="number" name="phone_number" placeholder="Phone Number" class="form-control">
        </div>
    </form>

    <script>
        function validateFullName() {
            const regex = /^[a-zA-Z\s]+$/;
            const fullName = document.getElementById('fullname').value;
            document.getElementById('fullNameError').textContent = regex.test(fullName) ? "" : "Only alphabets and spaces are allowed.";
        }

        function validateEmail() {
            const regex = /^[a-zA-Z0-9.+_-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,}$/;
            const email = document.getElementById('email').value;
            document.getElementById('emailError').textContent = regex.test(email) ? "" : "Please enter a valid email address.";
        }

        function validatePassword() {
            const regex = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}/;
            const password = document.getElementById('password').value;
            document.getElementById('passwordError').textContent = regex.test(password) ? "" : "Password must contain at least 8 characters, including 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character.";
        }

        function validateConfirmPassword() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm-password').value;
            document.getElementById('confirmPasswordError').textContent = password === confirmPassword ? "" : "Passwords do not match.";
        }
    </script>

                      <div class="form-group text-center mt-4">
                        <input type="submit" name="register" class="btn btn-primary" value="Register">
                      </div>

                      <div class="text-center mt-4"> Already a Member? <a href="sign-in.php"> Sign in </a></div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
   
<?php include('include/footer.php');?>