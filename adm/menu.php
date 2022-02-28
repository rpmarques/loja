<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="./principal.php" class="nav-link"> <i class="nav-icon fas fa-tachometer-alt"></i>
                <p> Principal </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p> Clientes <i class="right fas fa-angle-left"></i> </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="./clienteIncluir.php" class="nav-link"> <i class="far fa-circle nav-icon"></i>
                        <p>Incluir</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="./clienteListar.php" class="nav-link"> <i class="far fa-circle nav-icon"></i>
                        <p>Listar</p>
                    </a>
                </li>
            </ul>
        </li>

        <!-- MODULOS -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p> Produtos<i class="right fas fa-angle-left"></i> </p>
            </a>
            <ul class="nav nav-treeview">
                <!-- PRODUTOS -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p> Produtos <i class="right fas fa-angle-left"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./ctPagIncluir.php" class="nav-link"> <i class="far fa-dot-circle nav-icon"></i>
                                <p>Incluir</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./ctPagListar.php" class="nav-link"> <i class="far fa-dot-circle nav-icon"></i>
                                <p>Listar</p>
                            </a>
                        </li>
                    </ul>
                </li> <!-- PRODUTOS -->
                <!-- CATEGORIAS -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p> Categorias <i class="right fas fa-angle-left"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./categoriaIncluir.php" class="nav-link"> <i class="far fa-dot-circle nav-icon"></i>
                                <p>Incluir</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./categoriaListar.php" class="nav-link"> <i class="far fa-dot-circle nav-icon"></i>
                                <p>Listar</p>
                            </a>
                        </li>
                    </ul>
                </li> <!-- CATEGORIAS -->
                <!-- SUB-CATEGORIAS -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p> Sub-Categorias <i class="right fas fa-angle-left"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./subCategoriaIncluir.php" class="nav-link"> <i class="far fa-dot-circle nav-icon"></i>
                                <p>Incluir</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./subCategoriaListar.php" class="nav-link"> <i class="far fa-dot-circle nav-icon"></i>
                                <p>Listar</p>
                            </a>
                        </li>
                    </ul>
                </li> <!-- SUB-CATEGORIAS -->
                <!-- MARCAS -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p> Marcas <i class="right fas fa-angle-left"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./marcaIncluir.php" class="nav-link"> <i class="far fa-dot-circle nav-icon"></i>
                                <p>Incluir</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./marcaListar.php" class="nav-link"> <i class="far fa-dot-circle nav-icon"></i>
                                <p>Listar</p>
                            </a>
                        </li>
                    </ul>
                </li> <!-- MARCAS -->
            </ul>
        </li>

        <li class="nav-item">
            <a href="./logout.php" class="nav-link"> <i class="nav-icon fas fa-tachometer-alt"></i>
                <p> Sair </p>
            </a>
        </li>

        <li class="nav-header">EXEMPLOS</li>
        <li class="nav-item">
            <a href="#" class="nav-link"> <i class="fas fa-circle nav-icon"></i>
                <p>Exemplo</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p> Level 1 <i class="right fas fa-angle-left"></i> </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Level 2</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Level 2
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Level 3</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Level 3</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Level 3</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Level 2</p>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</nav>