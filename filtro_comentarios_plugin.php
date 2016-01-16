<?php 
	/**
 * @package Hello_Dolly
 * @version 1.6
 */
/*
Plugin Name: Filtro de Comentários
Plugin URI: 
Description: Este plugin adiciona uma opção no painel administrativo do WordPress com a função de filtrar os comentários aprovados em um determinado intervalo de tempo.
Author: <a href="https://www.linkedin.com/in/v%C3%ADtor-martins-borges-ba164559">Vítor Martins Borges</a>
Version: 0.5
Author URI: 
*/


add_action('admin_menu', 'bcss_ticker_plugin_menu');

function bcss_ticker_plugin_menu(){
	add_menu_page('Filtro de Comentários', 'Filtro de comentarios', 'manage_options','config_novo', 'filtro_comentarios');
}


function filtro_comentarios(){
	include('config_novo.php');
}

?>