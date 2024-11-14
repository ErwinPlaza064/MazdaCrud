<?php
    if (isset($_SESSION['error_message'])) 
    {
        echo '<p style="color: red; text-align: center; margin-top:30px;">' . htmlspecialchars($_SESSION['error_message']) . '</p>';
        unset($_SESSION['error_message']);
    }

    if (isset($_SESSION['delate_message'])) 
    {
        echo '<p style="color: green; text-align: center; margin-right: 100px;">' . htmlspecialchars($_SESSION['delate_message']) . '</p>';
        unset($_SESSION['delate_message']);
    }