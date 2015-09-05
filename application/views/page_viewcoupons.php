<html>
    <head>
        <title></title>
    </head>
    <body>
        <ul>
            <?php foreach($coupon as $row):?>
                <li><?php echo $row["id"];?></li>
            <?php endforeach;?>
        </ul>
    </body>
</html>