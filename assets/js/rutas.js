/**
 * Sistema Roka - Módulo de Navegación (Futurista)
 * Versión: 2.0
 */

class NavigationManager {
    constructor() {
        this.modulos = document.getElementById('menu');
        this.delegacion = document.getElementById('delegation')?.value;
        this.init();
    }

    init() {
        // Ocultar icono de usuario si delegación no es 1
        if (this.delegation != 1) {
            document.getElementById('mUsu')?.classList.add('d-none');
        }

        // Configurar eventos de navegación
        this.setupNavigation();
        this.setupResponsive();
    }

    setupNavigation() {
        this.modulos?.addEventListener('click', e => {
            const targetClass = e.target.classList;
            
            // Mapeo de rutas con animación
            const routeMap = {
                'usu': { path: "modulo_usuario.php", color: "primary" },
                'pro': { path: "modulo_proveedor.php", color: "info" },
                'mat': { path: "materia.php", color: "warning" },
                'produ': { path: "productos.php", color: "success" },
                'cli': { path: "clientes.php", color: "danger" },
                'ven': { path: "ventas.php", color: "purple" }
            };

            for (const [key, value] of Object.entries(routeMap)) {
                if (targetClass.contains(key)) {
                    this.animateNavigation(value.color, () => {
                        window.location = value.path;
                    });
                    return;
                }
            }
        });
    }

    animateNavigation(color, callback) {
        const overlay = document.createElement('div');
        overlay.style.position = 'fixed';
        overlay.style.top = '0';
        overlay.style.left = '0';
        overlay.style.width = '100%';
        overlay.style.height = '100%';
        overlay.style.backgroundColor = `var(--bs-${color})`;
        overlay.style.opacity = '0';
        overlay.style.zIndex = '9999';
        overlay.style.transition = 'opacity 0.5s ease';
        document.body.appendChild(overlay);

        setTimeout(() => {
            overlay.style.opacity = '0.8';
            setTimeout(() => {
                callback();
            }, 500);
        }, 10);
    }

    setupResponsive() {
        // Sidebar para móviles
        $('[data-bs-toggle="collapse"]').on('click', () => {
            if($(window).width() < 768) {
                $('#sidebarCollapse').toggleClass('show');
                $('body').toggleClass('sidebar-open');
            }
        });

        // Cerrar sidebar al hacer clic fuera
        $(document).click((e) => {
            if($(window).width() < 768) {
                if(!$(e.target).closest('#sidebarCollapse, .navbar-toggler').length) {
                    $('#sidebarCollapse').removeClass('show');
                    $('body').removeClass('sidebar-open');
                }
            }
        });

        // DataTable responsive con configuración futurista
        if($('#usersDataTable').length) {
            $('#usersDataTable').DataTable({
                responsive: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                },
                dom: '<"top"lf>rt<"bottom"ip>',
                scrollX: true,
                scrollCollapse: true,
                fixedColumns: true,
                stateSave: true,
                buttons: ['copy', 'excel', 'pdf']
            });
        }
    }
}

// Inicialización cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    new NavigationManager();
});