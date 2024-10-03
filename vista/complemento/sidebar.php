<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?pagina=inicio">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Sistema</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="?pagina=inicio">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">MÓDULOS</div>
    <?php if($_SESSION["admin"]==1||$_SESSION["usuario"]==1||$_SESSION["invitado"]==1):?>
    <li class="nav-item">
        <a class="nav-link" href="?pagina=productos">
        <i class="fas fa-dolly-flatbed"></i>
            <span>Productos</span></a>
    </li>
    <?php endif;?>
    <?php if($_SESSION["admin"]==1||$_SESSION["usuario"]==1): ?>
    <li class="nav-item">
        <a class="nav-link" href="?pagina=ventas">
        <i class="fas fa-shopping-cart"></i>
            <span>Ventas</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="?pagina=clientes">
        <i class="far fa-id-badge"></i>
            <span>Clientes</span></a>
    </li>
    <?php endif; ?>
    <?php if($_SESSION["invitado"]==1||$_SESSION["admin"]==1): ?>
    <li class="nav-item">
        <a class="nav-link" href="?pagina=compra">
        <i class="fas fa-store"></i>
            <span>Compra</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="?pagina=proveedor">
        <i class="fas fa-cart-arrow-down"></i>
            <span>Proveedor</span></a>
    </li>
    <?php endif;?>
    <?php if($_SESSION["admin"]):?>
    <li class="nav-item">
        <a class="nav-link" href="?pagina=usuario">
        <i class="fas fa-users"></i>
            <span>Usuario</span></a>
    </li>
    <?php endif;?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
