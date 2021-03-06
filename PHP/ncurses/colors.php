<?php
/**
 * Created by PhpStorm.
 * User: Sam W. <samuel.walton@seven-labs.com>
 * Date: 11/25/2016
 * Time: 15:53
 */

$APP_TITLE = "Network Monitor";
$APP_VERSION = "1.0.0.0";
$APP_AUTHOR = "Seven-Labs, LLC";

ncurses_init();
ncurses_curs_set(0);

/// COMMENT ONE
ncurses_start_color();
ncurses_init_pair(1, NCURSES_COLOR_RED, NCURSES_COLOR_BLACK);
ncurses_init_pair(2, NCURSES_COLOR_GREEN, NCURSES_COLOR_BLACK);
ncurses_init_pair(3, NCURSES_COLOR_YELLOW, NCURSES_COLOR_BLACK);
ncurses_init_pair(4, NCURSES_COLOR_BLUE, NCURSES_COLOR_BLACK);
ncurses_init_pair(5, NCURSES_COLOR_CYAN, NCURSES_COLOR_BLACK);
ncurses_init_pair(6, NCURSES_COLOR_MAGENTA, NCURSES_COLOR_BLACK);
$screen = ncurses_newwin( 0, 0, 0, 0);
ncurses_wborder($screen, 0,0, 0,0, 0,0, 0,0);
//ncurses_wattron($screen, NCURSES_A_REVERSE);
ncurses_wattron($screen, NCURSES_A_BOLD);
ncurses_mvwaddstr($screen, 1, 2, "$APP_TITLE | v$APP_VERSION");
ncurses_wattroff($screen, NCURSES_A_BOLD);
//ncurses_wattroff($screen, NCURSES_A_REVERSE);
ncurses_getmaxyx($screen, $row, $col);
$string = "Window Output...";
ncurses_wattron($screen, NCURSES_A_BOLD);

/// COMMENT TWO
$startrow = ($row / 2) - 3;
$startcol = ($col / 2) - 3 - (strlen($string) / 2);

for ($i = 1; $i <= 6; ++$i) {
    /// COMMENT THREE
    ncurses_wcolor_set($screen, $i);
    ncurses_mvwaddstr($screen, $startrow + $i, $startcol + $i, $string);
}

ncurses_wattroff($screen, NCURSES_A_BOLD);

ncurses_wrefresh($screen);
ncurses_wgetch($screen);

ncurses_end();

?>