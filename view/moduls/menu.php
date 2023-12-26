<link rel="stylesheet" type="text/css" href="css/menu.css">

<link href="https://fonts.googleapis.com/css?family=Fredoka+One|Pacifico|Vibur" rel="stylesheet">

<nav class="main-menu">

    <ul>

            <?php
                session_start();
            ?>
    </ul>

    
    <ul class="logout" style="margin-bottom: 71px;">
        <?php
            echo '<li>
            <a href="salir">
                <i class="fa fa-power-off fa-2x"></i>
                <span class="nav-text">
                    Salir
                </span>
            </a>
        </li> '
        ?>
    </ul>
    

</nav>
