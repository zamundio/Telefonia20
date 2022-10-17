<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\AmpliacionesGB
 *
 * @property string|null $linea_usuario_id
 * @property string|null $FECHA
 * @property int|null $GB_AMPLIADOS
 * @property string|null $Observaciones
 * @property int $id
 * @property-read \App\PlanGB|null $GetPlan
 * @property-read \App\LineaUsuario|null $ampliaciones
 * @method static \Illuminate\Database\Eloquent\Builder|AmpliacionesGB newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AmpliacionesGB newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AmpliacionesGB query()
 * @method static \Illuminate\Database\Eloquent\Builder|AmpliacionesGB whereFECHA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AmpliacionesGB whereGBAMPLIADOS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AmpliacionesGB whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AmpliacionesGB whereLineaUsuarioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AmpliacionesGB whereObservaciones($value)
 */
	class AmpliacionesGB extends \Eloquent {}
}

namespace App{
/**
 * App\CentroCosteExtra
 *
 * @property string|null $EMP_CODE
 * @property int $EMP_COST_CENTER
 * @property string|null $COST_CENTER_DESC
 * @method static \Illuminate\Database\Eloquent\Builder|CentroCosteExtra newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CentroCosteExtra newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CentroCosteExtra query()
 * @method static \Illuminate\Database\Eloquent\Builder|CentroCosteExtra whereCOSTCENTERDESC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CentroCosteExtra whereEMPCODE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CentroCosteExtra whereEMPCOSTCENTER($value)
 */
	class CentroCosteExtra extends \Eloquent {}
}

namespace App{
/**
 * App\CentrosCoste
 *
 * @method static \Illuminate\Database\Eloquent\Builder|CentrosCoste newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CentrosCoste newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CentrosCoste query()
 */
	class CentrosCoste extends \Eloquent {}
}

namespace App{
/**
 * App\DatatableHistTerminalesUsers
 *
 * @method static \Illuminate\Database\Eloquent\Builder|DatatableHistTerminalesUsers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DatatableHistTerminalesUsers newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DatatableHistTerminalesUsers query()
 */
	class DatatableHistTerminalesUsers extends \Eloquent {}
}

namespace App{
/**
 * App\EstadoStock
 *
 * @property int $Id
 * @property string|null $Estado
 * @property-read \App\TerminalMovil|null $estado
 * @method static \Illuminate\Database\Eloquent\Builder|EstadoStock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EstadoStock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EstadoStock query()
 * @method static \Illuminate\Database\Eloquent\Builder|EstadoStock whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstadoStock whereId($value)
 */
	class EstadoStock extends \Eloquent {}
}

namespace App{
/**
 * App\Estructura
 *
 * @property-read mixed $full_name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\LineaUsuario[] $lineas
 * @property-read int|null $lineas_count
 * @property-read Estructura|null $parent
 * @method static \Illuminate\Database\Eloquent\Builder|Estructura newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Estructura newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Estructura query()
 */
	class Estructura extends \Eloquent {}
}

namespace App{
/**
 * App\HistoricoTerminalesUsers
 *
 * @property int $idhistorico_terminales
 * @property int|null $id_linea
 * @property int|null $estado_ant
 * @property int|null $estado_act
 * @property string|null $fecha_asignacion
 * @property string|null $fecha_cambio
 * @property int|null $id_terminal
 * @property string|null $Observaciones
 * @method static \Illuminate\Database\Eloquent\Builder|HistoricoTerminalesUsers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HistoricoTerminalesUsers newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HistoricoTerminalesUsers query()
 * @method static \Illuminate\Database\Eloquent\Builder|HistoricoTerminalesUsers whereEstadoAct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoricoTerminalesUsers whereEstadoAnt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoricoTerminalesUsers whereFechaAsignacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoricoTerminalesUsers whereFechaCambio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoricoTerminalesUsers whereIdLinea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoricoTerminalesUsers whereIdTerminal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoricoTerminalesUsers whereIdhistoricoTerminales($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoricoTerminalesUsers whereObservaciones($value)
 */
	class HistoricoTerminalesUsers extends \Eloquent {}
}

namespace App{
/**
 * App\LineaUsuario
 *
 * @property string|null $cod_emp
 * @property int $id
 * @property string|null $Observaciones
 * @property string|null $ListadoXLS
 * @property int|null $Principal
 * @property string|null $Abreviado
 * @property-read \App\Estructura|null $Linea
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\AmpliacionesGB[] $ampliaciones
 * @property-read int|null $ampliaciones_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tarjeta[] $tarjetas
 * @property-read int|null $tarjetas_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\TerminalMovil[] $terminal_usuario
 * @property-read int|null $terminal_usuario_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\TerminalMovil[] $terminal_usuario_historico
 * @property-read int|null $terminal_usuario_historico_count
 * @method static \Illuminate\Database\Eloquent\Builder|LineaUsuario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LineaUsuario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LineaUsuario query()
 * @method static \Illuminate\Database\Eloquent\Builder|LineaUsuario whereAbreviado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LineaUsuario whereCodEmp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LineaUsuario whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LineaUsuario whereListadoXLS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LineaUsuario whereObservaciones($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LineaUsuario wherePrincipal($value)
 */
	class LineaUsuario extends \Eloquent {}
}

namespace App{
/**
 * App\ListadoFacturacion
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ListadoFacturacion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ListadoFacturacion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ListadoFacturacion query()
 */
	class ListadoFacturacion extends \Eloquent {}
}

namespace App{
/**
 * App\ListadoRed
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ListadoRed newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ListadoRed newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ListadoRed query()
 */
	class ListadoRed extends \Eloquent {}
}

namespace App{
/**
 * App\ListadoSede
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ListadoSede newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ListadoSede newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ListadoSede query()
 */
	class ListadoSede extends \Eloquent {}
}

namespace App{
/**
 * App\ModelosTerminales
 *
 * @property int $id
 * @property string|null $Terminal
 * @property string|null $foto
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\TerminalMovil[] $terminales
 * @property-read int|null $terminales_count
 * @method static \Illuminate\Database\Eloquent\Builder|ModelosTerminales newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelosTerminales newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelosTerminales query()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelosTerminales whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelosTerminales whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelosTerminales whereTerminal($value)
 */
	class ModelosTerminales extends \Eloquent {}
}

namespace App{
/**
 * App\PlanGB
 *
 * @property int|null $Id
 * @property string|null $GB
 * @property string|null $Observaciones
 * @method static \Illuminate\Database\Eloquent\Builder|PlanGB newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlanGB newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlanGB query()
 * @method static \Illuminate\Database\Eloquent\Builder|PlanGB whereGB($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlanGB whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlanGB whereObservaciones($value)
 */
	class PlanGB extends \Eloquent {}
}

namespace App{
/**
 * App\Tarjeta
 *
 * @property int|null $Abrev_XXX_Eliminar
 * @property int|null $linea_usuario_id
 * @property string|null $id
 * @property string|null $Observaciones
 * @property string|null $PIN
 * @property string|null $PUK
 * @property int|null $Principal
 * @property int|null $Datos
 * @property string|null $Fecha_Activacion
 * @property int $ID_KEY
 * @property-read \App\LineaUsuario|null $Linea
 * @method static \Illuminate\Database\Eloquent\Builder|Tarjeta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tarjeta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tarjeta query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tarjeta whereAbrevXXXEliminar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tarjeta whereDatos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tarjeta whereFechaActivacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tarjeta whereIDKEY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tarjeta whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tarjeta whereLineaUsuarioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tarjeta whereObservaciones($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tarjeta wherePIN($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tarjeta wherePUK($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tarjeta wherePrincipal($value)
 */
	class Tarjeta extends \Eloquent {}
}

namespace App{
/**
 * App\TerminalMovil
 *
 * @property int $id
 * @property int|null $IdTerminal
 * @property string|null $Nserie
 * @property string|null $IMEI
 * @property int|null $Estado
 * @property string|null $Observaciones
 * @property-read \App\EstadoStock|null $ChkEstado
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\LineaUsuario[] $linea_usuario
 * @property-read int|null $linea_usuario_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\LineaUsuario[] $linea_usuario_historico
 * @property-read int|null $linea_usuario_historico_count
 * @property-read \App\ModelosTerminales|null $modelo
 * @method static \Illuminate\Database\Eloquent\Builder|TerminalMovil newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TerminalMovil newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TerminalMovil query()
 * @method static \Illuminate\Database\Eloquent\Builder|TerminalMovil whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerminalMovil whereIMEI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerminalMovil whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerminalMovil whereIdTerminal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerminalMovil whereNserie($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerminalMovil whereObservaciones($value)
 */
	class TerminalMovil extends \Eloquent {}
}

namespace App{
/**
 * App\TerminalesUsers
 *
 * @property int|null $linea_usuario_id
 * @property int|null $terminal_movil_id
 * @property string|null $f_cambio_alta
 * @property string|null $Observaciones
 * @property int|null $Actual
 * @property int|null $id
 * @property int $idx
 * @property-read \App\TerminalMovil|null $term
 * @method static \Illuminate\Database\Eloquent\Builder|TerminalesUsers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TerminalesUsers newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TerminalesUsers query()
 * @method static \Illuminate\Database\Eloquent\Builder|TerminalesUsers whereActual($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerminalesUsers whereFCambioAlta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerminalesUsers whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerminalesUsers whereIdx($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerminalesUsers whereLineaUsuarioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerminalesUsers whereObservaciones($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerminalesUsers whereTerminalMovilId($value)
 */
	class TerminalesUsers extends \Eloquent {}
}

namespace App{
/**
 * App\TreeEstructura
 *
 * @method static \Illuminate\Database\Eloquent\Builder|TreeEstructura newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeEstructura newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeEstructura query()
 */
	class TreeEstructura extends \Eloquent {}
}

namespace App{
/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\personalextra
 *
 * @property int|null $COMPANY_CODE
 * @property string|null $COMPANY_NAME
 * @property string $EMP_CODE
 * @property string|null $LAST_NAME
 * @property string|null $FIRST_NAME
 * @property string|null $EMP_COST_CENTER
 * @property string|null $COST_CENTER_DESC
 * @property string|null $HIRE_DATE
 * @property string|null $EMAIL
 * @property string|null $CURRENT_COMPANY
 * @property string|null $HOME_ADDRESS
 * @property string|null $HOME_CITY
 * @property string|null $HOME_STATE_CODE
 * @property string|null $HOME_CTRY_CODE
 * @property string|null $HOME_POSTAL_CODE
 * @property string|null $PHONE
 * @property string|null $GENDER_CODE
 * @property string|null $ACTUAL_LEAVE_DATE
 * @property string|null $BIRTH_DATE
 * @property string|null $EMP_GLOBAL_CODE
 * @property string|null $MAR_STAT_CODE
 * @property int|null $EXTERNAL
 * @property string|null $GLOBAL_POS_CODE
 * @property string|null $POSITION_TITLE
 * @property string|null $COMPANY
 * @property string|null $DIVISION
 * @property string|null $ZONE
 * @property string|null $AREA
 * @property string|null $SUBAREA
 * @property string|null $SUBAREA2
 * @property string|null $SUBAREA3
 * @property string|null $SUBAREA4
 * @property string|null $SUBAREA5
 * @property int|null $SUBAREA6
 * @property string|null $SUBAREA7
 * @property string|null $REPORTS_TO_POS_CODE
 * @property string|null $REPORTS_TO_GLOBAL_POS_CODE
 * @property string|null $BANK_ACCOUNT
 * @property string|null $IBAN_CODE
 * @property int|null $PROFESSIONAL_CODE
 * @property int|null $CONTRACT_CODE
 * @property string|null $CONTRACT_DESCRIPTION
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra query()
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereACTUALLEAVEDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereAREA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereBANKACCOUNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereBIRTHDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereCOMPANY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereCOMPANYCODE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereCOMPANYNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereCONTRACTCODE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereCONTRACTDESCRIPTION($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereCOSTCENTERDESC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereCURRENTCOMPANY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereDIVISION($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereEMAIL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereEMPCODE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereEMPCOSTCENTER($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereEMPGLOBALCODE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereEXTERNAL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereFIRSTNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereGENDERCODE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereGLOBALPOSCODE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereHIREDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereHOMEADDRESS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereHOMECITY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereHOMECTRYCODE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereHOMEPOSTALCODE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereHOMESTATECODE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereIBANCODE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereLASTNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereMARSTATCODE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra wherePHONE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra wherePOSITIONTITLE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra wherePROFESSIONALCODE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereREPORTSTOGLOBALPOSCODE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereREPORTSTOPOSCODE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereSUBAREA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereSUBAREA2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereSUBAREA3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereSUBAREA4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereSUBAREA5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereSUBAREA6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereSUBAREA7($value)
 * @method static \Illuminate\Database\Eloquent\Builder|personalextra whereZONE($value)
 */
	class personalextra extends \Eloquent {}
}

