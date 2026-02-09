<?php

enum AccessLevel :int {

    case UNSET  = 0;
    case PUBLIC = 1;
    case USER   = 10;
    case ADMIN  = 100;
    case DEVELOPER = 200;

}