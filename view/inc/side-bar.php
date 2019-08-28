
<div class="logo" style='text-align:center'  >
    <img src="img/nome_logo_branco.png" width=150 alt="">
    </div>
    <div class="sidebar-wrapper">
    <ul class="nav">
        <li class="nav-item active  ">
        <a class="nav-link" href="calendario.php">
            <i class="fas fa-calendar-alt"></i>
            <p>Meu calendário</p>
        </a>
        </li>
        <li class="nav-item active  ">
        <a class="nav-link" href="navegar.php">
            <i class="fas fa-water"></i>
            <p>Navegar</p>
        </a>
        </li>
        <li class="nav-item active  ">
        <a class="nav-link" href="editarPerfil.php">
            <i class="fas fa-user"></i>
            <p>Editar Perfil</p>
        </a>
        </li>
        <li class="nav-item active">
        <a class="nav-link" href="verInteracoes.php">
            <i class="fas fa-hashtag"></i>
            <p>Interações</p>
        </a>
        </li>
        <li class="nav-item active  ">
        <a class="nav-link" href="configuracoes.php">
            <i class="fas fa-wrench"></i>
            <p>Configurações</p>
        </a>
        </li>
        <li   class="nav-item active  " role="presentation" <?= ($pagina == "../controller/sair.php") ? "class='nav-item active'" : "s" ?> >
        <a class="nav-link" href="../controller/sair.php">
            <i class="fas fa-door-closed"></i>
                <p>Sair</p></a>
        </a>
        </li>
    </ul>
    </div>
</div>