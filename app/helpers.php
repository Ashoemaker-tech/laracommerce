<?php
// Use this inside a loop & formatted Total outside. For some reason it does not format properly inside loop
function formattedPrice($price)
{
    return '$' . number_format( $price, 2, '.', ',');
}

function formattedTotal($price)
{
    return '$' . number_format( $price / 100, 2, '.', ',');
}