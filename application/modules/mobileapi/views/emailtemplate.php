<!DOCTYPE html>
<html lang="en">
    <head></head>
    <body>
        Reporting for
        <?php
            foreach ($reports as $report) {
                foreach ($report as $key => $value) {
                    echo "'$key' => '$value' <br />";
                }
            }
        ?>
    </body>
</html>