<?php

namespace App\Interface\Componentes\Enums;

class Constantes
{
    // Constantes de la aplicación
    const APP_NAME = "Sistema de Monitoreo de Temperatura";
    const APP_VERSION = "1.0.0";
    const APP_AUTHOR = "Gonzalo Molina";

    // Constantes de Menús
    const MENU_PRINCIPAL = "Menú Principal";
    const ADMINISTRACION_LABEL = "Administración de Sistema";
    const REPORTES_LABEL = "Reportes";

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
    const REGISTRO_TEMPERATURA_INFERIOR = "Registros de temperatura inferior";
    const REGISTRO_TEMPERATURA_SUPERIOR = "Registros de temperatura superior";
    const REGISTRO_TEMPERATURA_MENOR = "Registros de temperatura menor";
    const REGISTRO_TEMPERATURA_MAYOR = "Registros de temperatura mayor";


    // Constantes de formateo de texto
    const RED_COLOR = "\e[1;31m";
    const GREEN_COLOR = "\e[1;32m";
    const YELLOW_COLOR = "\e[1;33m";
    const BLUE_COLOR = "\e[1;34m";
    const GREY_COLOR = "\e[1;37m";
    const RESET_COLOR = "\e[0m";
    const ERROR_COLOR = "\e[1;31;43m";
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
    const DELETE_CONFIRMATION_MESSAGE = "¿Está seguro de que desea eliminar la %s con los siguientes datos (%s)?\n";
    const SAVE_MESSAGE = "Registro de %s guardado con éxito.\n";
    const SAVE_ERROR_MESSAGE = "Error al guardar: %s.\n";
    const GENERIC_ERROR_MESSAGE = "Error: %s.\n";
    const LIST_ERROR = "Error al recuperar lista de %s.\n";
    const NOT_FOUND_ERROR_MESSAGE = "No se encontró el registro de %s.\n";
    const UPDATE_SUBTITLE =  " Presione 'Enter' para mantener valor. Presione '-' para blanquear valor.";
    const UPDATE_MESSAGE = "Registro de %s actualizado con éxito.\n";
    const UPDATE_ERROR_MESSAGE = "Error al actualizar: %s.\n";
    const CHOICE_MESSAGE = "Seleccione una opción:";
    const CHOICE_ERROR_MESSAGE = "Opción no válida.\n";
    const REQUIRED = "%s es requerido.\n";
    const REQUIRED_SYMBOL = "*";
    const INPUT_INDENT = 2;

    public static function formatMessage($message, ...$args): string
    {
        return sprintf($message, ...$args);
    }
}
