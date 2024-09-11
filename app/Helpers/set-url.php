<?php

// this function define the true url for the links
function set_url($redirectTo, $data)
{
    $url = $redirectTo.'/' . str_replace(' ', '-', $data);
    return url($url); 
}
