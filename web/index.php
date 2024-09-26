<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Piesakies webināram!</h1>
    <form action="confirmation.php" method="post">
        <label for="name">Vārds</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="name">E-pasts</label>
        <input type="text" name="email" id="email">
        <br>
        <label for="level">Kursa līmenis</label>
        <select name="level" id="level">
            <option value="">Izvēlieties kursa līmeni</option>
            <option value="beginner">Beginner</option>
            <option value="intermediate">Intermediate</option>
            <option value="advanced">Advanced</option>
        </select>
        <hr>
        <legend>Vai vēlies saņemt info par citiem mūsu organizētajiem pasākumiem?</legend>
        <div>
            <input type="radio" id="yes" name="radio" value="yes">
            <label for="yes">Jā</label>
            <input type="radio" id="no" name="radio" value="no" checked>
            <label for="yes">Nē</label>
        </div>
        <input type="submit" value="submit">
        <hr>
        <a href="blog.php">Uz blogu</a>
    </form>
    <h1>Jau reģistrējušies</h1>
    <ul>
    <?php
        $clients = [
            1 => ["name" => "Jānis Bērziņš", "email" => "janis@berzins.com", "level" => "intermediate"],
            2 => ["name" => "Andris Krēsliņš", "email" => "andris@kreslins.com", "level" => "advanced"],
            3 => ["name" => "Antra Bērziņa", "email" => "antra@berzina.com", "level" => "beginner"],
        ];
        foreach($clients as $client) {
            $str = "Vārds: " . $client['name'] . ", E-pasts: " . $client['email'] . ", Līmenis: " . $client['level'];
            echo("<li>" . $str . "</li>");
        }
    ?>
    </ul>
    <script src="JS/app.js"></script>
</body>
</html>