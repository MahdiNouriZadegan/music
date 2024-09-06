<?php



function jalaiDate($date)
{
    return \Morilog\Jalali\Jalalian::forge($date)->format("Y/m/d");
}
