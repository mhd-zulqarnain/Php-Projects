<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body  style="text-align: center">
<h1>Student Record</h1>
<form action="next.php">

    <input type="text" placeholder=" UserName:" name="name"><br><br>
    <input type="password"  placeholder="Passward:" name="password"><br><br>

    Age:<select name="Age">
    <option >Enter your age</option>
    <option selected >17</option>
    <option >18</option>
    <option >19</option>
    <option >20</option>
        </select><br><br>

    Country:<select name="Country">
    <option >Enter your Country</option>
    <option >Pakistan</option>
    <option >India</option>
    <option >Turkey</option>
           </select>

    <br><br>
    Gender:
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="fmale">Female<br><br>


    <input type="submit" value="Submit">
    
</form>
</body>
</html>