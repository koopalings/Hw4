<?php

class View {

    var $ads;

    function __construct($ads) {
        $this->ads = $ads;
    }

    function draw() {
        echo <<<EOD
        <div id="add-container" class="left-container">
            <h2>Submit Ad</h2>
            <form id="addForm" action="" method="POST">
                <input type="hidden" name="add" value="add" />
                <label for="title">Title</label>
                <input type="text" name="title" required/>
                <label for="url">URL</label>
                <input type="text" name="url" required/>
                <label for="description">Description</label>
                <textarea type="text" name="description" required></textarea>
                <input type="submit" value="Submit" />
            </form>
        </div>
EOD;
        echo '<div class="left-container">';
        echo <<<EOD
        <div id="reset-container">
            <a href="index.php?reset=true">Reset Counters</a>
        </div> <br style="clear: both" />
EOD;
        echo '<div id="ads-container">' . $this->ads . '</div>';
        echo '</div>';
    }
}
?>