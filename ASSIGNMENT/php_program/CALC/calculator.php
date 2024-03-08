<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Unique Calculator</title>
</head>
<body>
    <div class="calculator">
        <?php
        $message = ''; // initialize $message variable
        if (isset($_POST['calculate'])) {
            $expression = $_POST['expression'];
            try {
                $result = eval('return '.$expression.';');
                $message = 'Result: '.$result;
            } catch (Exception | ParseError $e) { // catch both Exception and ParseError
                $message = 'Error: '.$e->getMessage();
            }
        }
        ?>
        <form method="post" action="calculator.php">
            <input type="text" id="expression" name="expression" class="expression" placeholder="Enter expression or equation...">
            <button class="calculate" type="submit" name="calculate">Calculate</button>
            <div id="result" class="result"><?php echo $message; ?></div>
        </form>
    </div>
</body>
</html>