<?php

class View {

    var $ads;

    function __construct($ads) {
        $this->ads = $ads;
    }

    function draw() {
        echo '<div id="ads-container">' . $this->ads . '</div>';
        echo <<<EOD
        <div id="reset-container">
            <a href="index.php?reset=true">Reset Counters</a>
        </div>
        <div id="add-container">
            <form id="addForm" action="" method="POST">
                <input type="hidden" name="add" value="add" />
                <input type="text" name="title" />
                <input type="text" name="url" />
                <input type="text" name="description" />
                <input type="submit" value="Submit" />
            </form>
        </div>
EOD;
    }
}
?>