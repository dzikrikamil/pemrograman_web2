<?php
function repeat(string $text, int $num = 10): void
{
    echo "<ol>
";
    for ($i = 0; $i < $num; $i++) {
        echo '<li>' . htmlspecialchars($text, ENT_QUOTES, 'UTF-8') . "</li>
";
    }
    echo "</ol>
";
}
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Parameter Default</title></head>
<body>
<?php
repeat("I'm the best", 15);
repeat("You're the man"); // Menggunakan nilai default: 10.
?>
</body>
</html>