<?php
// functions.php
function buildSqlList(): string
{
    return "SELECT game_id, title FROM games ORDER BY title";
}

function buildSqlMain(int $id): string
{
    if ($id > 0) {

        return "SELECT * FROM `games` INNER JOIN ratings ON ratings.rating_id = games.esrb_id where game_id = $id;";
    }
    return "SELECT * FROM `games` INNER JOIN ratings ON ratings.rating_id = games.esrb_id";
}