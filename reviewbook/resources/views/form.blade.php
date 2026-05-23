<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatiblr" content="IE-egde">
        <meta name="viewport" content=""width=device-width, intial-scale="1.0">
        <title>Document</title>
    </head>
    <body>
        <h1>Buat Account Baru</h1>
        <h2>Sing Up Form</h2>
        <form method="POST" action="/welcome">
        @csrf
            <label>First name:</label><br>
            <input type="text" name="firstname"><br><br>
            <label>Last name:</label><br>
            <input type="text" name="lastname"><br><br>
            <label> Gender:</label><br><br>
            <input type="radio">Male<br>
            <input type="radio">Female<br>
            <input type="radio">Other<br><br>
            <label>Nationality:</label>
            <select name="Nationality">
            <option value="">Indonesia</option>
            <option value="">Jepang</option>
            <option value="">China</option>
            </select><br><br>
            <label> Language Spoken:</label><br><br>
            <input type="checkbox">Bahasa Indonesia<br>
            <input type="checkbox">English<br>
            <input type="checkbox">Japan<br>
            <input type="checkbox">other<br><br>
            <label> Bio:</label><br><br>
            <textarea cols="30" rows="10"></textarea><br><br>

            <input type="submit" value="sign up">
            </form>
            </body>
</html>

        </form>

    </body>
</html>