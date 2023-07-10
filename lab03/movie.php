
<?php
    include ("top.html");



    $movie=$_GET["film"];

    function info_movie($movie){
        $info = file($movie . '/info.txt', FILE_IGNORE_NEW_LINES);
        global $vote;
        list($title, $year, $vote) = $info;
        ?>
        <h1>
            <?=$title?>( <?= $year?> )
        </h1>
        <?php
    }
    
    function overview($movie){
        $info = file($movie . "\overview.txt");
        for ($i=0; $i < count($info); $i++) { 
            $title = explode(":", $info[$i]);
            $subtitle = explode(", ", $title[1]);
            ?>
        <dt>
            <?= $title[0] ?>
        </dt>
        <dd>
            <?php
                for ($j=0; $j < count($subtitle)-1; $j++) { 
                    echo "$subtitle[$j], ";
                }
                echo "$subtitle[$j].";
                ?>
        </dd>
        <?php
        }
    }



    function commentsupp($review){
        ?>
        <p class="quotes">
            <span>
                <?php
                $search = array("\r\n", "\r", "\n", "\t"," ","\"");
                $temp = str_replace($search, "", $review[1]);

                if($temp == "FRESH"){
                    ?>
                    <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/fresh.gif" alt="Fresh">
                    <?php
                }else{
                    ?>
                    <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rotten.gif" alt="Rotten">
                    <?php
                }
                ?>

                <q><?= $review[0]?></q>
            </span>
        </p>
        <p class="reviewers">
            <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic">
            <?=$review[2]?> <br>
            <span class="publications"> <?=$review[3]?> </span>
        </p>
        <?php
    }

    info_movie($movie);

    ?>
    <!--  -->
    <div id="main">
        <div id="right">
            <div>
                <img src="<?=$movie. "/overview.png"?>" alt="general overview">
            </div>

            <dl>
                <?=overview($movie);?>

            </dl>

        </div> <!-- chiusura div "right" -->
        <div id="left">
            <div id="left-top">
                
                <?php
                if($vote < 60){
                    ?>
                    <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rottenbig.png" alt="Rotten">
                    <?php
                }else{
                    ?>
                    <img src="https://courses.cs.washington.edu/courses/cse190m/11sp/homework/2/freshbig.png" alt="Fresh">
                    <?php
                }
                ?>

                <span class="evaluation"><?=$vote?>%</span>

            </div>

            <div id="columns">

                <?php 
                $rev = glob($movie."/review*.txt"); 
                global $numofrev;
                $numofrev = count($rev);
                ?>

                <div id="leftcolumn">
                
                    <?php

                    for ($i=0; $i < $numofrev && $i < 10; $i++) {
                        
                        if($i % 2 == 0){
                            $arrev = explode("/", $rev[$i]);
                            $file = file($movie . "/".$arrev[1], FILE_IGNORE_NEW_LINES);
                            commentsupp($file);
                        }else{
                            //do nothing 
                        }
                    }
                    ?>
                </div>
                <div id="rightcolumn">
                    <?php

                    for ($i=0; $i < $numofrev && $i < 10; $i++) {
                        if($i % 2 == 1){
                            $arrev = explode("/", $rev[$i]);
                            $file = file($movie . "/".$arrev[1], FILE_IGNORE_NEW_LINES);
                            commentsupp($file);
                        }else{
                            //do nothing
                        }
                    }

                    ?>
                </div>



            </div> <!-- chiusura div "columns" -->
        </div> <!-- chiusura div "left" -->

        <p id="bottom">(1-<?= $numofrev<10?$numofrev:10?>) of <?=$numofrev?></p>

    </div><!-- chiusura div "main" -->

<?php include("validators.html"); ?>