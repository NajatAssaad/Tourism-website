<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="editpass.css">
</head>
<body>
    <?php session_start();
    if($_SESSION['isloggedin']!=1){
        header("location:login.html");
    }?>
    <div class="container">
       <div class="left">
        <h1>Change Password</h1>
        <div class="must">
          <span>  password must contain:</span>
            <ul>
                <li id='5'>* At least 6 characters</li>
                <li id='6'>* At least 1 Upper Case letter(A..Z)</li>
                <li id='7'>* At least 1 Lower Case letter(a..z)</li>
                <li id='8'>* At least 1 digit (0..9)</li>
            </ul>
        </div>
       </div>
       <div class="right">
       <form action="editpass2.php" onsubmit="return validateForm()" method='post'>
        <table border="0">
      <tr><td><input type="password" id="old" name="old" placeholder="Old Password" required/>
      <div id="errorold"></div>
    </td></tr>
        <tr><td> <input type="password" placeholder="New Password"id="new" name="new" required/></td></tr>
       <tr><td> <input type="password" id="conf" name="conf" placeholder="Confirm Password" required/>
    <div id="error"></div>
    </td></tr>
       <tr class="phone">
        <td> <div class="must">
          <span>  password must contain:</span>
            <ul>
                <li id='1'>* At least 6 characters</li>
                <li id='2'>* At least 1 Upper Case letter(A..Z)</li>
                <li id='3'>* At least 1 Lower Case letter(a..z)</li>
                <li id='4'>* At least 1 digit (0..9)</li>
            </ul>
        </div></td></tr>
       <tr><td><input type="submit" value="save"/></td></tr> 
        <tr><td><input type="reset" value="cancel"/></td></tr>
        </table>
        </form>

       </div>
    </div>
  

    <?php
require_once 'connection.php';
$id = $_SESSION['user_id'];
$query = "SELECT pass_word FROM user WHERE User_id = $id";
$result = mysqli_query($con, $query);
$oldpass = mysqli_fetch_assoc($result)['pass_word'];
?>

<script>

function validateOldPass() {
    let inputOldPass = document.getElementById('old').value;
    let errordiv = document.getElementById('errorold');
    
    if (inputOldPass != <?php echo "$oldpass";?>) {
        errordiv.textContent = '*Incorrect password';
        errordiv.style.color = 'red';
        errordiv.style.fontSize = '12px';
        return false;
    } else {
        errordiv.textContent = '';
        return true;
    }
}

function validatepasswords() {
    let password = document.getElementById('new').value;
    let confirmPassword = document.getElementById('conf').value;
    let errordiv = document.getElementById('error');
  
    if (password === confirmPassword) {
        errordiv.textContent = '';
        return true;
    } else {
        errordiv.textContent = '*Passwords do not match!';
        errordiv.style.color = 'red';
        errordiv.style.fontSize = '12px';
        return false;
    }
}


function validLenght() {
    let pass = document.getElementById('new');
    let li = document.getElementById('1');
    let li2 = document.getElementById('5');
    
    if (pass.value.length < 6) {
        li.style.color = 'red';
        li2.style.color = 'red';
        return false;
    } else {
        li.style.textDecoration = 'line-through';
        li2.style.textDecoration = 'line-through';
        li.style.color = 'black';
        li2.style.color = 'black';
        return true;
    }
}



function validUpper(){

    let pass = document.getElementById('new').value;

    for (let i = 0; i < pass.length; i++) {
        if (pass[i] >= 'A' && pass[i] <= 'Z') {
            let li = document.getElementById('2');
            let li2 = document.getElementById('6');
            li.style.textDecoration = 'line-through';
            li2.style.textDecoration = 'line-through';
            li.style.color = 'black';
            li2.style.color = 'black';
            return true;
        }
    }

    let li = document.getElementById('2');
    let li2 = document.getElementById('6');
    li.style.color = 'red';
    li2.style.color = 'red';
    return false;
}


function validLower(){

let pass = document.getElementById('new').value;

for (let i = 0; i < pass.length; i++) {
    if (pass[i] >= 'a' && pass[i] <= 'z') {
        let li = document.getElementById('3');
        let li2 = document.getElementById('7');
        li.style.textDecoration = 'line-through';
        li2.style.textDecoration = 'line-through';
        li.style.color = 'black';
        li2.style.color = 'black';
        return true;
    }
}

let li = document.getElementById('3');
let li2 = document.getElementById('7');
li.style.color = 'red';
li2.style.color = 'red';
return false;
}




function validDigit(){

let pass = document.getElementById('new').value;

for (let i = 0; i < pass.length; i++) {
    if (pass[i] >= 0 && pass[i] <= 9) {
        let li = document.getElementById('4');
        let li2 = document.getElementById('8');
        li.style.textDecoration = 'line-through';
        li2.style.textDecoration = 'line-through';
        li.style.color = 'black';
        li2.style.color = 'black';
        return true;
    }
}

let li = document.getElementById('2');
let li2 = document.getElementById('6');
li.style.color = 'red';
li2.style.color = 'red';
return false;
}


function validateForm() {
    return (validatepasswords() && validateOldPass() && validLenght() && validUpper() && validLower() && validDigit());
}


</script>


</body>
</html>