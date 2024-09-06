<?php



function jalaliDate($date)
{
    return \Morilog\Jalali\Jalalian::forge($date)->format("Y/m/d");
}
