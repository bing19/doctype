<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../bower_components/normalize.css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="top-menu">
                <ul>
                    <?php getMenu($topMenu)?>
                </ul>
            </div>

            <div class="main-menu">
                <ul>
                    <?php getMenu($mainMenu)?>
                </ul>
            </div>
        </header>
    </div>
