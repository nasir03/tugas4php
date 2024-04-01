<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Saya - Produk</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Tempat Motor Mewah</h1>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="produk.html">Produk</a></li>
                <li><a href="pesan.php">Pesan</a></li>
                <li><a href="galeri.html">Galeri</a></li>
                <li><a href="guestbook.php">Guestbook</a></li>
            </ul>
        </nav>
    </header>
    <main>
      
        <section>
            <h2>Guestbook</h2>

            <?php
            
            function displayGuestbook() {
                $file = "guestbook.txt";
                if (file_exists($file)) {
                    $guestbook = file_get_contents($file);
                    echo nl2br($guestbook); 
                } else {
                    echo "Guestbook is empty.";
                }
            }

            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST["name"];
                $email = $_POST["email"];
                $message = $_POST["message"];
                $entry = "Name: $name\nEmail: $email\nMessage: $message\n\n";

              
                $file = "guestbook.txt";
                file_put_contents($file, $entry, FILE_APPEND);

               
                $to = "tujuan@example.com"; 
                $subject = "New Guestbook Entry";
                $body = "New entry added by: $name\nEmail: $email\nMessage: $message";
                $headers = "From: pengirim@example.com"; 

               
                ini_set("SMTP", "mail.example.com");
                ini_set("smtp_port", "587");
                

                echo "Entry added successfully!";
            }
            ?>

          
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" required><br>
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required><br>
                <label for="message">Message:</label><br>
                <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>
                <input type="submit" value="Submit">
            </form>

            <hr>

          
            <h3>Entries:</h3>
            <?php
            displayGuestbook(); 
            ?>
        </section>
    </main>
    <footer>
        <p>Hak Cipta © 2024 Website Saya. Muhamad Nasir.</p>
    </footer>
</body>
</html>
