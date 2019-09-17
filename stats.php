<div id="stats-div">
    <div>
        Время сервера:
        <?php
        date_default_timezone_set('Europe/Moscow');
        echo date('d.m.Y, G:i:s');
        ?>
    </div>

    <div>
        Время работы скрипта:
        <table>
            <?php
            $utime_spent = resources_time($ru_start, $ru_end, 'utime');
            $stime_spent = resources_time($ru_start, $ru_end, 'stime');
            ?>
            <tr>
                <td> user time </td>
                <td> <?php echo $utime_spent; ?> </td>
                <td> микросекунд </td>
            </tr>
            <tr>
                <td> system time </td>
                <td> <?php echo $stime_spent; ?> </td>
                <td> микросекунд </td>
            </tr>
            <tr>
                <td> всего </td>
                <td> <?php echo $utime_spent + $stime_spent; ?> </td>
                <td> микросекунд </td>
            </tr>
        </table>
    </div>
</div>
