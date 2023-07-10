<?php include "top.html"; ?>

<form action="./signup-submit.php" method="get" enctype= "multipart/form-data">
    <fieldset>
        <legend>New User Signup:</legend>
        <strong>Name:</strong> <input type="text" name="name" id="name"><br>
        <strong>Gender: </strong> 
        <input type="radio" name="gender" id="genderm" value="M"> Male
        <input type="radio" name="gender" id="genderf" value="F" checked="checked"> Female <br>
        <strong>Age: </strong><input type="number" name="age" id="age" min="0" max="99" style="width: 12%"> <br>
        <strong>Personality type: </strong> <input type="text" name="type" id="type" maxlength="4" style="width: 12%;text-transform:uppercase">
        ( 
        <a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp">Don't know your type?</a> 
        )
        <br>
        <strong>Favorite OS: </strong> <select name="favoriteOS" id="favoriteOS">
        <option>Windows</option>
        <option>Mac OS X</option>
        <option selected="selected">Linux</option>
        </select> <br>
        <strong>Seeking age: </strong> 
        <input type="number" name="ageMin" id="ageMin"  min="0" max="99"> to
        <input type="number" name="ageMax" id="ageMax"  min="0" max="99"> <br>
        <input type="submit" value="Sign Up" name="sign up">
        
    </fieldset>

</form>

<?php include "bottom.html"; ?>