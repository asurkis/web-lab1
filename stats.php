Время сервера: <?php echo date('d.m.Y, h:m:s'); ?><br>
Время работы скрипта:
<table>
    <tr>
        <td> user time </td>
        <td> <?php echo resources_time($ru_start, $ru_end, 'utime'); ?> </td>
        <td> микросекунд </td>
    </tr>
    <tr>
        <td> system time </td>
        <td> <?php echo resources_time($ru_start, $ru_end, 'stime'); ?> </td>
        <td> микросекунд </td>
    </tr>
</table>
