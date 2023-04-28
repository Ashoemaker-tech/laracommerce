<?php

function formattedPrice($price)
{
    // dd((float)$price);
    return number_format( (float)$price / 100, 2);
}