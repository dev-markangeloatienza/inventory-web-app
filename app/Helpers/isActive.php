<?php

function isActive($routeName, $class = 'bg-white text-secondary border-primary font-bold'){
    return request()->routeIs($routeName) ? $class : '';
}


?>