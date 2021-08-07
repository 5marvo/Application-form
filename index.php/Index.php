<!DOCTYPE html>
<html>
<head>
	<title>Insert data in MySQL database using Ajax</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <h1>Personal Information</h1>
        <form>
            
            <p>First name* <input type="text" placeholder="First name"></p>  
            <p>Middle name* <input type="text" placeholder="Middle name"></p>
            <p>Last name* <input type="text" placeholder="Last name"></p>
            <p>Date of birth* <input type="date" name="date" placeholder="Date of birth"></p>
            <p>Citizenship* <input type="text" placeholder="Citizenship"></p>
            
            <p>Country of birth*</p><select id="country"  name="country">
                
                <option value="Kenya">Kenya</option>
                <option value="Uganda">Uganda</option>
                <option value="Tanzania">Tanzania</option>
                <option value="Eritrea">Eritrea</option>

            </select>
        
            <p>ID/Passport*<input type="text" placeholder="ID/Passport"></p>
            <p>Gender*<p><input type="radio" name ="gender" value="Male"> Male </p> 
                      <p><input type="radio" name ="gender" value="Female">Female</p>
            <p>Years of Formal Education in English*<input type="text" placeholder="Years of Formal Education in English"></p>
            <p>Highest Level Of Education*<input type="radio" name="primary" value="primary">primary</p>
                                            <input type="radio" name="secondary" value="secondary">secondary</p>
                                            <input type="radio" name="postgraduate" value="postgraduate">postgraduate</p>
                                            <input type="radio" name="others" value="others">others</p>


           <p>If others,please specify* <input type="textarea" placeholder="..."
            style="height:100px; width:200px;"></p>
           

           <p>Upload passport size photo* <form action="/action_page.php">
            <input type="file" id="myFile" name="filename">
          </form>
           </p>

           <p>other languages spoken or written* <input type="text" placeholder="other languages spoken or written"></p>
           <p>Do you have any disability*<input type="radio" value="Yes">Yes</p>
                                         <input type="radio" value="no">No</p>

            <p>If Yes, please explain the nature of your disability <input type="textarea" placeholder="..."
                style="height:100px; width:200px;"></p>       
                
        <h1>Religious Affiliation</h1>

        <p>Religious Affiliation* <input type="radio" name="Protestant" value="Protestant">Protestant</p>
                                  <input type="radio" name="Roman Catholic" value="Roman Catholic">Roman Catholic</p>
                                  <input type="radio" name="Hindu" value="Hindu">Protestant</p>
                                  <input type="radio" name="African Traditional Religion" value="African Traditional Religion">African Traditional Religion</p>
                                  <input type="radio" name="Muslim" value="Muslim">Muslim</p> 
                                  <input type="radio" name="Ordained Minister(for divinity applicants)" value="Ordained Minister(for divinity applicants)">Ordained Minister(for divinity applicants)</p>
                                  <input type="radio" name="Others(please specify)" value="Others(please specify)">Others(please specify)</p>
        <p>Specify Religious Affiliation <input type="textarea" placeholder="..."
            style="height:100px; width:200px;"></p>
            
            
        <h1>Current Address</h1>

        <p>Postal Address* <input type="text" placeholder="Postal Address"></p>
        <p>Postal Code* <input type="text" placeholder="Postal Code"></p>
        <p>Town* <input type="text" placeholder="Town"></p>
        <p>Country* <input type="text" placeholder="Country"></p>
        <p>Telephone(home)* <input type="text" placeholder="Telephone(home)"></p>
        <p>Mobile no* <input type="text" placeholder="Mobile no"></p>
        <p>Email Address* <input type="text" placeholder="Email Address"></p>

        <input type="button" name="save" class="btn btn-primary" value="Save to database" id="butsave">
	
        </form>


        <script>
            $(document).ready(function() {
                $('#butsave').on('click', function() {
                    $("#butsave").attr("disabled", "disabled");
                    var First_name = $('#First_name').val();
                    var Middle_name = $('#Middle_name').val();
                    var Last_name = $('#Last_name').val();
                    var Gender = $('#Gender').val();
                    var Citizenship = $('#Citizenship').val();
                    var email = $('#email').val();
                    var country_of_birth = $('#country_of_birth').val();
                    var Date_of_birth = $('#Date_of_birth').val();
                    var ID_Passport = $('#ID_Passport').val();
                    var Years_of_formal_education_in_english = $('#Years_of_formal_education_in_english').val();
                    var Highest_level_of_education= $('#Highest_level_of_education').val();
                    if(First_name!="" && Middle_name!="" && Last_name!="" && Gender!="" && email!="" && Citizenship!="" && country_of_birth!="" && Date_of_birth!=""&& ID_Passport!="" && Years_of_formal_education_in_english!= ""&& Highest_level_of_education!=""){
                        $.ajax({
                            url: "save.php",
                            type: "POST",
                            data: {
                                First_name: First_name,
                                Middle_name:Middle_name,
                                Last_name:Last_name,
                                Gender: Gender,
                                email: email,
                                Citizenship: Citizenship,
                                country_of_birth: country_of_birth,
                                Date_of_birth:Date_of_birth,
                                ID_Passport:ID_Passport,
                                Years_of_formal_education_in_english: Years_of_formal_education_in_english,
                                Highest_level_of_education:Highest_level_of_education.	
                            },
                            cache: false,
                            success: function(dataResult){
                                var dataResult = JSON.parse(dataResult);
                                if(dataResult.statusCode==200){
                                    $("#butsave").removeAttr("disabled");
                                    $('#fupForm').find('input:text').val('');
                                    $("#success").show();
                                    $('#success').html('Data added successfully !'); 						
                                }
                                else if(dataResult.statusCode==201){
                                   alert("Error occured !");
                                }
                                
                            }
                        });
                    }
                    else{
                        alert('Please fill all the field !');
                    }
                });
            });
            </script>
</body>
</html>