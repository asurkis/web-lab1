<div>
    <table>
        <tr>
            <td class="table-header"> X </td>
            <td class="table-header"> Y </td>
            <td class="table-header"> R </td>
            <td class="table-header"> Ответ </td>
        </tr>

        <?php
        $table_rows = explode(':', $cookie_table);
        for ($i = 0; $i + 1 < count($table_rows); $i++) {
            $table_cols = $table_rows[$i];
            if ($i + 2 === count($table_rows)) {
                echo '<tr class="last-row">';
            } else {
                echo '<tr>';
            }
            $cells = explode(';', $table_cols);
            echo '<td class="out-number"> ', (real) $cells[0], ' </td>';
            echo '<td class="out-number"> ', (real) $cells[1], ' </td>';
            echo '<td class="out-number"> ', (real) $cells[2], ' </td>';
            echo '<td> ', (bool) $cells[3] ? '' : '<strong>не</strong>', ' попадает </td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>

<form method="get">
    <input type="submit" name="reset" value="Очистить">
</form>
