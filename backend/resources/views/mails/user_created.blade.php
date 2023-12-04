<?php

use Illuminate\Support\Carbon;

?>

<h2>Пользователь добавил заметку</h2>

<p>Пользователь {{$user->first_name}} добавил заметку</p>

<p>Дата {{ Carbon::now() }}</p>
