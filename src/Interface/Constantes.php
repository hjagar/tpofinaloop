<?php
namespace App\Interface;

class Constantes
{
    // Constantes de la aplicación
    const APP_NAME = "Sistema de Gestión de Alarmas";
    const APP_VERSION = "1.0.0";
    const APP_AUTHOR = "Gonzalo Molina";

    // Constantes de Menús
    const SELECT_OPTION = "Seleccione una opción: ";
    const FEATURE_NOT_IMPLEMENTED = "Funcionalidad no implementada %s.\n";
    const INVALID_OPTION = "Opción no válida.\n";
    const BACK_LABEL = 'Volver al menú anterior';
    const BACK_MESSAGE = 'Volviendo al menú anterior...';
    const EXIT_LABEL = 'Salir';
    const BACK_OPTION = '0';
    const EXIT_OPTION = 'X';
    const EXIT_MESSAGE = 'Saliendo...';
    const LIST_LABEL = "Listar %s";
    const ADD_LABEL = "Agregar %s";
    const MODIFY_LABEL = "Modificar %s";
    const DELETE_LABEL = "Eliminar %s";
    const PLURAL_MESSAGE = "%ss";

    // Constantes de formateo de texto
    const RED_COLOR = "\e[1;31m";    
    const GREEN_COLOR = "\e[1;32m";
    const YELLOW_COLOR = "\e[1;33m";
    const BLUE_COLOR = "\e[1;34m";
    const GREY_COLOR = "\e[1;37m";
    const RESET_COLOR = "\e[0m";
    const BOLD = "\e[1m";
    const UNDERLINE = "\e[4m";
    const UNDERLINE_RESET = "\e[24m";

    // Constantes de operaciones
    const NO_DATA = "No hay datos para mostrar.\n";
    const SAVE = "Guardar";
    const CANCEL = "Cancelar";
    const CANCEL_MESSAGE = "Operación cancelada.\n";
    const DELETE_MESSAGE = "Registro de %s eliminado con éxito.\n"; 
    const DELETE_ERROR_MESSAGE = "Error al eliminar: %s.\n";

    public static function formatMessage($message, ...$args): string
    {
        return sprintf($message, ...$args);
    }
}