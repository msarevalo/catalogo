<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <title>LOYALQUO</title>
    <link rel="shortcut icon" href="../../img/logo.ico" />
</head>
<body>
	<div class="container-fluid p-0">
  
<!-- Bootstrap row -->
<style type="text/css">
	@import url('https://fonts.googleapis.com/css?family=Montserrat');

/*-------------------------------- END ----*/
    #body-row {
        margin-left: 0;
        margin-right: 0;
    }

    #sidebar-container {
        min-height: 100vh;
        background-color: #5D6D7E;
        padding: 0;
        /* flex: unset; */
    }
    
    .sidebar-expanded {
        width: 230px;
    }
    
    .sidebar-collapsed {
        /*width: 60px;*/
        width: 100px;
    }

    /* ----------| Menu item*/    
    #sidebar-container .list-group a {
        height: 50px;
        color: white;
    }

    /* ----------| Submenu item*/    
    #sidebar-container .list-group li.list-group-item {
        background-color: #5D6D7E;
    }
    
    #sidebar-container .list-group .sidebar-submenu a {
        height: 45px;
        padding-left: 30px;
    }
    
    .sidebar-submenu {
        font-size: 0.9rem;
    }

    /* ----------| Separators */    
    .sidebar-separator-title {
        background-color: #5D6D7E;
        height: 35px;
    }
    
    .sidebar-separator {
        background-color: #5D6D7E;
        height: 25px;
    }
    
    .logo-separator {
        background-color: #5D6D7E;
        height: 60px;
    }
    
    a.bg-dark {
        background-color: #5D6D7E !important;
    }

</style>
<script type="text/javascript">
	// Hide submenus
$('#body-row .collapse').collapse('hide'); 

// Collapse/Expand icon
$('#collapse-icon').addClass('fa-angle-double-left'); 

// Collapse click
$('[data-toggle=sidebar-colapse]').click(function() {
    SidebarCollapse();
});

function SidebarCollapse () {
    $('.menu-collapsed').toggleClass('d-none');
    $('.sidebar-submenu').toggleClass('d-none');
    $('.submenu-icon').toggleClass('d-none');
    $('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapsed');
    
    // Treating d-flex/d-none on separators with title
    var SeparatorTitle = $('.sidebar-separator-title');
    if ( SeparatorTitle.hasClass('d-flex') ) {
        SeparatorTitle.removeClass('d-flex');
    } else {
        SeparatorTitle.addClass('d-flex');
    }
    
    // Collapse/Expand icon
    $('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');
}
</script>
<div class="row" id="body-row">
    <!-- Sidebar -->
    <div id="sidebar-container" class="sidebar-expanded d-none d-md-block"><!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
        <!-- Bootstrap List Group -->
        <ul class="list-group">
            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>Catalogo | LoyalQuo</small>
            </li>
            
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>ADMINISTRACION</small>
            </li>
            <!-- /END Separator -->
            <!-- Menu with submenu -->
            
            <a href="{{ route('area') }}" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-calendar fa-fw mr-3"><img src="../../img/area.png" style="width: 20px"></span>
                    <span class="menu-collapsed">Areas</span>
                </div>
            </a>
            <a href="{{ route('cargo') }}" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-calendar fa-fw mr-3"><img src="../../img/cargo.png" style="width: 20px"></span>
                    <span class="menu-collapsed">Cargos</span>
                </div>
            </a>
            <a href="{{ route('perfil') }}" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-calendar fa-fw mr-3"><img src="../../img/perfil.png" style="width: 20px"></span>
                    <span class="menu-collapsed">Perfiles</span>
                </div>
            </a>

            <a href="{{ route('usuario') }}" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-calendar fa-fw mr-3"><img src="../../img/usuario.png" style="width: 20px"></span>
                    <span class="menu-collapsed">Usuarios</span>
                </div>
            </a>
            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>OPCIONES</small>
            </li>
            <!-- /END Separator -->
            <a href="#" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-calendar fa-fw mr-3"><img src="../../img/calendar.png" style="width: 20px"></span>
                    <span class="menu-collapsed">Calendario</span>
                </div>
            </a>
            <a href="#" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-envelope-o fa-fw mr-3"><img src="../../img/notification.png" style="width: 20px"></span>
                    <span class="menu-collapsed">Notificaciones<span class="badge badge-pill badge-primary ml-2">5</span></span>
                </div>
            </a>
            <!-- Separator without title -->
            
            <!-- /END Separator -->
            <a href="#" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-question fa-fw mr-3"><img src="../../img/help.png" style="width: 20px"></span>
                    <span class="menu-collapsed">Ayuda</span>
                </div>
            </a>
            <a href="#" data-toggle="sidebar-colapse" class="bg-dark list-group-item list-group-item-action d-flex align-items-center" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span id="collapse-icon" class="fa fa-2x mr-3"><img src="../../img/logout.png" style="width: 20px"></span>
                    <span id="collapse-text" class="menu-collapsed">Cerrar Sesión</span>
                </div>
            </a>
            <form id="logout-form" action="#" method="POST" style="display: none;">
                @csrf
            </form>
            <!-- Logo -->
            <li class="list-group-item logo-separator d-flex justify-content-center">
                <img src='../../img/logo100x100.png' width="30" height="30" />    
            </li>   
        </ul><!-- List Group END-->
    </div><!-- sidebar-container END -->

    <!-- MAIN -->
    <div class="col">
        
        <div class="container">
    @yield('formulario')
</div>
       


    </div><!-- Main Col END -->
    
</div><!-- body-row END -->
  
  
</div><!-- container -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
@yield('scripts')