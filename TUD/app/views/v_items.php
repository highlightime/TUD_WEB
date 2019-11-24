<html>
    <head>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
        <style>
            .items table{
                border-top: 1px solid #444444;
                border-collapse: collapse;
            }
            .items tr{
                border-bottom: 1px solid #444444;
                padding: 10px;
            }
            .items td{
                border-bottom: 1px solid #efefef;
                padding: 10px;
            }
            .items table .even{
                background: #efefef;
            }
            .items h2{
                font-family: "Montserrat", sans-serif;
            }
        </style>
    </head>
    <body>
        <div id="items" class="w3-row w3-grayscale items">
            <h2 align="center">Contents</h2>
            <table align="center">
                <thead align="center">
                <tr>
                    <td width="50" align="center">No</td>
                    <td width="500" align="center">Title</td>
                    <td width="100" align="center">Author</td>
                    <td width="200" align="center">Date</td>
                    <td width="50" align="center">Hits</td>
                </tr>
                </thead>
                <tbody>
                <?php
                    $total = count($data);

                    while($row = array_pop($data)){
                    if ($total % 2 == 0){
                ?>
                <tr class="even">
                    <?php }else{
                    ?>
                <tr>
                    <?php
                    }
                    ?>
                    <td width="50" align="center"><?=$total?></td>
                    <?php
                        if(strcmp("/TUD/public/c_items/getItems", $_SERVER['REQUEST_URI'])){
                            ?>
                            <td width="500" align="center"><a href="../c_item/getItem/<?= $row['board_id'] ?>"><?= $row['title'] ?></a></td>
                            <?php
                        }else{
                            ?>
                            <td width="500" align="center"><a href="c_item/getItem/<?= $row['board_id'] ?>"><?= $row['title'] ?></a></td>
                            <?
                    }?>
                    <td width="100" align="center"><?=$row['author']?></td>
                    <td width="200" align="center"><?=$row['date']?></td>
                    <td width="50" align="center"><?=$row['hit']?></td>
                    <?php
                    $total--;
                    }
                    ?>
                </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>