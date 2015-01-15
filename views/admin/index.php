<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->title = 'Test CMS | Admin Pannel';

?>

<h3>Product list</h3>

<table class="table table-striped">
    <th>Name</th>
    <th>In stock</th>
    <?php
    
    foreach ($products as $key){
        echo '<tr><td>' . $key[0] . '</td>';
        echo '<td>' . $key[1] . '</td></tr>';
    }
    
    ?>
</table>