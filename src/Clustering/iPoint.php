<?php
namespace Algorithm\clustering;
interface iPoint
{
    public function distanceTo(iCenter $center);
    public function convertToCenter();
}
?>