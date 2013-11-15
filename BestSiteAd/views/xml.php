<?php
/**
 *  Print out the results in XML
 */
class XMLView {
    static function draw($results) {
        echo '<Ad>';
        echo '<Id>' . $results['Id'] . '</Id>';
        echo '<Title>' . $results['Title'] . '</Title>';
        echo '<Url>' . $results['Url'] . '</Url>';
        echo '<Description>' . $results['Description'] . '</Description>';
        echo '</Ad>';
    }
}
?>